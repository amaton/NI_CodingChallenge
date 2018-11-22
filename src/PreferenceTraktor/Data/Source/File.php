<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category File
 * @package  NI\PreferenceTraktor\Data\Source
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data\Source;

/**
 * File Class is a data source class for files
 *
 * @category Class
 * @package  File
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class File implements SourceInterface
{
    /* @var $fileContent string will contain file content */
    protected $fileContent = '';

    /**
     * File source constructor will read file if $file passed
     *
     * @param string $file containing initial preferences data;
     */
    public function __construct($file = '')
    {
        if ($file) {
            $this->read($file);
        }
    }

    /**
     * Read file to $this->fileContent
     *
     * @param string $file which contains file name
     *
     * @throws File\Exception $exception in case unable to read the file
     * @return string
     */
    public function read($file = '')
    {
        $this->fileContent = '';

        $file = getcwd() . DIRECTORY_SEPARATOR . $file;
        if (is_readable($file)) {
            $this->fileContent = file_get_contents($file);
        }

        if (!$this->fileContent || empty($this->fileContent)
        ) {
            throw new File\Exception();
        }

        return $this->fileContent;
    }

    /**
     * @return string with file content
     */
    public function getContent()
    {
        return $this->fileContent;
    }
}
