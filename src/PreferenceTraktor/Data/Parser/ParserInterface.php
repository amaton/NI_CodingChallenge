<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category ParserInterface
 * @package  NI\PreferenceTraktor\Data\Parser
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data\Parser;

/**
 * Interface for implementing different data parsers e.g json, xml etc.
 *
 * @category Interface
 * @package  ParserInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface ParserInterface
{
    /**
     * Parse content into stdClass or array
     *
     * @param string $content for parsing
     *
     * @throws \Exception $exception in case unable to parse;
     * @return \stdClass|array of parsed data
     */
    public function parse($content = '');

    /**
     * @return \stdClass|array of parsed data
     */
    public function getData();
}
