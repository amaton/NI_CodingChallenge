<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category PreferenceTraktorInterface
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor;

/**
 * PreferenceTraktorInterface Interface
 * for implementing advising engines based on preferences;
 *
 * @category Interface
 * @package  PreferenceTraktorInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface PreferenceTraktorInterface
{
    /**
     * Init movie preferences data source and favorites list in constructor;
     *
     * @param Data\DataInterface $dataSource object with initial preferences data;
     * @param array|string $favorites of input favorite movies;
     */
    public function __construct(Data\DataInterface $dataSource, $favorites = '');

    /**
     * Main function to generate movie advises;
     *
     * @return array
     */
    public function advise();

    /**
     * @return array of result advises
     */
    public function getAdviseList();

    /**
     * @return array of result advises
     */
    public function getFavoriteList();
}
