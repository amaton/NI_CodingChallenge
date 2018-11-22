<?php
/**
 * NI\PreferenceTraktor advising engine
 *
 * PHP Version 7
 *
 * @category Exception
 * @package  NI\PreferenceTraktor\Data\Parser\Json
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\PreferenceTraktor\Data\Parser\Json;

/**
 * Json\Exception thrown when json parser unable to parse
 * most probably invalid json
 *
 * @category Class
 * @package  Exception
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

class Exception extends \Exception
{
    protected $message = 'Initial JSON data set is invalid or empty';
}
