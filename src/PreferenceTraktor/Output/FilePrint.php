<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category FilePrint
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Output;

/**
 * EchoPrint Class is an output class to file;
 *
 * @category Class
 * @package  FilePrint
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class FilePrint extends AbstractPrint
{
    /**
     * Output of movie advises;
     *
     * @return void
     */
    public function output()
    {
        $outFile = getcwd() . DIRECTORY_SEPARATOR . 'movie_advise_' . time();
        $outData = implode(',', $this->outputList);
        try {
            touch($outFile);
            file_put_contents($outFile, $outData);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

        echo 'Advise file created => ' . $outFile . PHP_EOL;
    }
}
