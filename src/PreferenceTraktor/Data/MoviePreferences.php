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
 * MoviePreferences is a data store class fo movie preferences
 *
 * @category Class
 * @package  MoviePreferences
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class MoviePreferences implements DataInterface
{
    /* @var $preferenceData \stdClass will contain movie preferences data set */
    protected $preferenceData;

    /**
     * Simple object data store constructor
     *
     * @param Source\SourceInterface $source containing initial preferences data;
     * @param Parser\ParserInterface $parser containing initial preferences data;
     */
    public function __construct(Source\SourceInterface $source, Parser\ParserInterface $parser)
    {
        $parser->parse($source->getContent());
        $this->preferenceData = $parser->getData();
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

    /**
     * @param \stdClass $preferenceData for update
     * @return void
     */
    public function setPreferenceData($preferenceData)
    {
        $this->preferenceData = $preferenceData;
    }
}
