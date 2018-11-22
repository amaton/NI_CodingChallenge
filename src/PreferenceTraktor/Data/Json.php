<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category File
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data;

/**
 * File Class is a data source class for initial movie/preferences data
 * from json file;
 *
 * @category Class
 * @package  File
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class Json implements Data
{
    /* @var $preferenceData \stdClass will contain movie preferences data set */
    protected $preferenceData;

    /**
     * The File constructor is private to prevent initiation with outer code
     * for singleton realization;
     *
     * @param string $json containing initial preferences data;
     */
    public function __construct($json = '')
    {
        if ($json) {
            $this->load($json);
        }
    }

    /**
     * Init preferenceData set from JSON file
     *
     * @param string $json containing initial preferences data;
     *
     * @throws \Exception $exception in case unable parse json;
     * @return void
     */
    public function load($json = '')
    {
        $this->preferenceData = json_decode($json);

        if ($this->preferenceData === null || empty($this->preferenceData)
        ) {
            $messageWrongJson = 'Initial JSON data set is invalid or empty';
            throw new \Exception($messageWrongJson, 1);
        }
    }

    /**
     * @return \stdClass which contains movies info
     */
    public function getMovies()
    {
        return $this->preferenceData->movies;
    }

    /**
     * @return array of users
     */
    public function getUserPreferences()
    {
        return $this->preferenceData->users;
    }
}
