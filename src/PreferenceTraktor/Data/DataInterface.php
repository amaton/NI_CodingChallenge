<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category DataInterface
 * @package  NI\PreferenceTraktor\Data\
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data;

/**
 * Interface for implementing data processing classes
 *
 * @category Interface
 * @package  DataInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface DataInterface
{
    /**
     * Data store constructor
     *
     * @param Source\SourceInterface $source containing initial preferences data;
     * @param Parser\ParserInterface $parser containing initial preferences data;
     */
    public function __construct(Source\SourceInterface $source, Parser\ParserInterface $parser);

    /**
     * @return \stdClass which contains movies info
     */
    public function getMovies();

    /**
     * @return array of users
     */
    public function getUserPreferences();

    /**
     * @param \stdClass $preferenceData for update
     * @return void
     */
    public function setPreferenceData($preferenceData);
}
