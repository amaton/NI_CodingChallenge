<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category Exception
 * @package  NI\PreferenceTraktor\Data\Source\File
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data\Source\File;

/**
 * File\Exception thrown when file reader unable to read
 * most probably invalid file
 *
 * @category Class
 * @package  Exception
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class Exception extends \Exception
{
    protected $message = 'Initial File is invalid or empty';
}
