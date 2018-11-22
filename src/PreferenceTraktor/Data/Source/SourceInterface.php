<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category SourceInterface
 * @package  NI\PreferenceTraktor\Data\Source
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data\Source;

/**
 * Interface for implementing different data sources e.g file, sql, nosql, socket etc.
 *
 * @category Interface
 * @package  SourceInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface SourceInterface
{
    /**
     * Read content from file
     *
     * @param string $file which contains file name;
     *
     * @throws \Exception $exception in case unable read source;
     * @return string
     */
    public function read($file = '');

    /**
     * @return string of source content
     */
    public function getContent();
}
