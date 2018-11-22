<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category Source
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data;

/**
 * Interface for implementing different data source e.g json, sql, nosql, etc.
 *
 * @category Interface
 * @package  Source
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface Data
{
    /**
     * @return \stdClass which contains movies info
     */
    public function getMovies();

    /**
     * @return array of users
     */
    public function getUserPreferences();
}
