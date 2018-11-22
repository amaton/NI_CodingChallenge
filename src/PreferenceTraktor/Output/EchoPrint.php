<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category EchoPrint
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Output;

use NI\PreferenceTraktor\Data;

/**
 * EchoPrint Class is an output class;
 *
 * @category Class
 * @package  EchoPrint
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class EchoPrint extends AbstractPrint
{
    /**
     * Output of movie advises;
     *
     * @return void;
     */
    public function output()
    {
        $this->printInList();
        $this->printOutList();
    }

    /**
     * Print results
     *
     * @return void
     */
    protected function printOutList()
    {
        if (!empty($this->outputList)) {
            echo '<-=====ADVISED MOVIES=====->' . PHP_EOL;
            foreach ($this->outputList as $movieId) {
                echo $this->nameList->{$movieId} . PHP_EOL;
            }
        }
    }

    /**
     * Print init
     *
     * @return void
     */
    protected function printInList()
    {
        if (!empty($this->initialList)) {
            echo '<-=====LIKED MOVIES=====->' . PHP_EOL;
            foreach ($this->initialList as $movieId) {
                echo $this->nameList->{$movieId} . PHP_EOL;
            }
        }
    }
}
