<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category Json
 * @package  NI\PreferenceTraktor\Data\Parser
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data\Parser;

/**
 * Json is a parser class for json
 *
 * @category Class
 * @package  Json
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class Json implements ParserInterface
{
    /* @var $jsonData \stdClass|array will contain json data */
    protected $jsonData;

    /**
     * Json parser constructor will parse json if $json passed
     *
     * @param string $json containing initial preferences data;
     */
    public function __construct($json = '')
    {
        if ($json) {
            $this->parse($json);
        }
    }

    /**
     * Parse json into $this->jsonData
     *
     * @param string $json which contains valid json;
     *
     * @throws Json\Exception in case unable parse json;
     * @return \stdClass
     */
    public function parse($json = '')
    {
        $this->jsonData = json_decode($json);

        if ($this->jsonData === null || empty($this->jsonData)) {
            throw new Json\Exception();
        }

        return $this->jsonData;
    }

    /**
     * @return \stdClass with $this->jsonData
     */
    public function getData()
    {
        return $this->jsonData;
    }
}
