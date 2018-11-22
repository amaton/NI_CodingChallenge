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

namespace NI\PreferenceTraktor\Data\Source;

/**
 * Interface for implementing different data source e.g json, sql, nosql, etc.
 *
 * @category Interface
 * @package  Source
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface Source
{
    /**
     * Read preferenceData set from file
     *
     * @param string $file which contains preferences json data set;
     *
     * @throws \Exception $exception in case unable parse json;
     * @return string
     */
    public function read($file = 'movies.json');

    /**
     * @return string of preference content
     */
    public function getContent();
}
