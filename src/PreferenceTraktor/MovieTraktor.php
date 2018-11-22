<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category MovieTraktor
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor;

/**
 * MovieTraktor is an advising engine based on preferences data set;
 *
 * @category Class
 * @package  MovieTraktor
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
class MovieTraktor implements PreferenceTraktorInterface
{
    /* @var Data\DataInterface $dataSource will contain input movies ids; */
    private $dataSource;

    /* @var array $favoriteList will contain input movies ids; */
    private $favoriteList;

    /* @var array $adviseList will contain advised movies ids; */
    private $adviseList;

    const MIN_ADVISERS = 3;
    const MAX_RESULTS = 11;

    /**
     * Init movie preferences data source
     * and favorites list in constructor;
     *
     * @param Data\DataInterface $dataSource object with initial preferences data;
     * @param array|string $favorites of input favorite movies;
     *
     * @throws \Exception $exception in case empty favorites list;
     */
    public function __construct(Data\DataInterface $dataSource, $favorites = '')
    {
        $this->dataSource = $dataSource;
        $this->initFavorites($favorites);
    }

    /**
     * @param array|string $favorites of input favorite movies;
     * @throws \Exception $exception in case empty favorites list;
     */
    protected function initFavorites($favorites)
    {
        $this->favoriteList = is_array($favorites) ?
            $favorites : explode(',', $favorites);

        $movies = $this->dataSource->getMovies();
        foreach ($this->favoriteList as $key => $movieId) {
            $movieId = trim($movieId);
            if (!isset($movies->{$movieId})) {
                unset($this->favoriteList[$key]);
                continue;
            } else {
                $this->favoriteList[$key] = $movieId;
            }
        }
    }

    /**
     * Main function to generate movie advises
     * by getting advisers with most similar interests,
     * counting amount of similar advices from them
     * and sorting by this amount;
     *
     * @return array
     */
    public function advise()
    {
        $this->adviseList = [];
        $advisers = $this->getAdvisers();
        if (!empty($advisers)) {
            foreach ($advisers as $adviser => $advise) {
                // Put all advices together
                array_push($this->adviseList, ...$advise);
            }
            // Get weight for all movies
            $this->adviseList = array_count_values($this->adviseList);
            // Sort movies by weight desc
            arsort($this->adviseList);
            // Get sorted movies IDs
            $this->adviseList = array_keys($this->adviseList);
            // Take first TOP records
            $this->adviseList = array_slice($this->adviseList, 0, self::MAX_RESULTS);
        }

        return $this->adviseList;
    }

    /**
     * Generate advisers founding users with most similar movie taste
     * and their favorites movies except input ones;
     *
     * @return array
     */
    private function getAdvisers()
    {
        $advisers = [];
        foreach ($this->dataSource->getUserPreferences() as $user) {
            // Get count of common likes
            $commonCount = count(array_intersect($user->movies, $this->favoriteList));
            // Get advices from $user
            $userAdvice = array_diff($user->movies, $this->favoriteList);
            // If empty($this->favoriteList) we will use all users as advisers
            if ($commonCount && $userAdvice || empty($this->favoriteList)) {
                $commonData[$commonCount][$user->user_id] = $userAdvice;
            }
        }
        if (!empty($commonData)) {
            // Sort by common likes amount
            ksort($commonData);
            // Get top best advisers
            while (count($advisers) < self::MIN_ADVISERS && $next = array_pop($commonData)) {
                $advisers += $next;
            }
        }
        return $advisers;
    }

    /**
     * @return array of result advises
     */
    public function getAdviseList()
    {
        return $this->adviseList;
    }

    /**
     * @return array of result advises
     */
    public function getFavoriteList()
    {
        return $this->favoriteList;
    }
}
