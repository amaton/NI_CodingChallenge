<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category OutputInterface
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Output;

/**
 * Interface for results output class implementation;
 *
 * @category Interface
 * @package  OutputInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
interface OutputInterface
{
    /**
     * Output of movie advises;
     *
     * @return void
     */
    public function output();

    /**
     * Public method to re-init output data;
     *
     * @param array $outputList to display for user
     */
    public function setOutputList($outputList = []);

    /**
     * Public method to re-init initial data;
     *
     * @param array $initialList to display for user
     */
    public function setInitialList($initialList = []);

    /**
     * Public method to re-init initial data;
     *
     * @param \stdClass $nameList assoc to display for user
     */
    public function setNameList($nameList);
}
