<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category EchoPrintOut
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

require_once __DIR__ . '/vendor/autoload.php';

use NI\PreferenceTraktor\MovieTraktor;
use NI\PreferenceTraktor\Data;
use NI\PreferenceTraktor\Output;

//Demonstration

//Init  input favorites list and file name
$inFavs = isset($argv[1]) ? $argv[1] : [42, 36, 33, 34, 88, 56, 57, 25];
$inFile = isset($argv[2]) ? $argv[2] : 'movies.json';

try {
    //Init data import
    $moviePreferencesData = new Data\MoviePreferences(
        new Data\Source\File($inFile),
        new Data\Parser\Json()
    );
    //Advise movies
    $mvt = new MovieTraktor($moviePreferencesData, $inFavs);
    $mvt->advise();
} catch (Exception $exception) {
    die($exception->getMessage());
}

//Output results
$out = new Output\EchoPrintOut(
    $moviePreferencesData->getMovies(),
    $mvt->getAdviseList(),
    $mvt->getFavoriteList()
);
$out->output();
