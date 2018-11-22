<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category PreferenceTraktor
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor;

/**
 * PreferenceTraktor Interface
 * for implementing advising engines based on preferences;
 *
 * @category Interface
 * @package  PreferenceTraktor
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface PreferenceTraktor
{
    /**
     * Init movie preferences data source and inFavs list in constructor;
     *
     * @param Data\Data $dataSource object with initial preferences data;
     * @param array|string $favorites of input favorite movies;
     */
    public function __construct(Data\Data $dataSource, $favorites = '');

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
