<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category AbstractPrintOut
 * @package  NI\PreferenceTraktor\Output\
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Output;

/**
 * AbstractPrintOut Class is an abstract output class to be extended with different printers;
 *
 * @category Abstract Class
 * @package  AbstractPrintOut
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
abstract class AbstractPrintOut implements OutputInterface
{
    /* @var $outputList array will contain list for output */
    protected $outputList;

    /* @var $initialList array will contain list init values */
    protected $initialList;

    /* @var $nameList \stdClass will contain show name values */
    protected $nameList;

    /**
     * AbstractPrintOut constructor set up data
     *
     * @param array $outputList to display for user
     * @param array $initialList to display for user
     * @param \stdClass $nameList assoc to display for user
     */
    public function __construct(
        $nameList,
        $outputList = [],
        $initialList = []
    ) {
        $this->setOutputList($outputList);
        $this->setInitialList($initialList);
        $this->setNameList($nameList);
    }

    /**
     * Public method to re-init output data;
     *
     * @param array $outputList to display for user
     */
    public function setOutputList($outputList = [])
    {
        $this->outputList = $outputList;
    }

    /**
     * Public method to re-init initial data;
     *
     * @param array $initialList to display for user
     */
    public function setInitialList($initialList = [])
    {
        $this->initialList = $initialList;
    }

    /**
     * Public method to re-init show names;
     *
     * @param \stdClass $nameList assoc to display for user
     */
    public function setNameList($nameList)
    {
        $this->nameList = $nameList;
    }

    /**
     * Output of movie advises;
     *
     * @return void
     */
    abstract public function output();
}
