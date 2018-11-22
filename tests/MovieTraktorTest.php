<?php
/**
 * NI_CodingChallenge File contains advising engine
 *
 * PHP Version 7
 *
 * @category Tests
 * @package  NI_CodingChallenge
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */

namespace NI\Tests;

use NI\PreferenceTraktor\MovieTraktor;
use NI\PreferenceTraktor\Data;
use PHPUnit\Framework\TestCase;

/**
 * NI_CodingChallenge Tests Class;
 *
 * @category Class
 * @package  Tests
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
class MovieTraktorTest extends TestCase
{
    /**
     * @var Data\MoviePreferences
     */
    private $movies;

    public function setUp()
    {
        $this->movies =new Data\MoviePreferences(
            new Data\Source\File('/tests/movies_test.json'),
            new Data\Parser\Json()
        );
    }

    /**
     * Test wrong file exception
     */
    public function testAdviseInvalidFile()
    {
        $this->expectException(Data\Source\File\Exception::class);
        $this->expectExceptionMessage('Initial File is invalid or empty');
        $file = new Data\Source\File();
        $this->movies = $file->read('tests/movies_test.son');
    }

    /**
     * Test wrong json exception
     */
    public function testAdviseInvalidJson()
    {
        $this->expectException(Data\Parser\Json\Exception::class);
        $this->expectExceptionMessage('Initial JSON data set is invalid or empty');
        $file = new Data\Source\File('tests/wrong_test.json');
        new Data\Parser\Json($file->getContent());
    }

    /**
     * Test advise engine
     *
     * @param array $favoriteList
     * @param array $adviseList
     *
     * @dataProvider adviseDataProvider
     */
    public function testAdvise($favoriteList, $adviseList)
    {
        $mvt = new MovieTraktor($this->movies, $favoriteList);
        $advises = $mvt->advise();
        self::assertEquals($adviseList, $advises);
    }

    /**
     * Provide input / output data
     *
     * @return array
     */
    public function adviseDataProvider()
    {
        return [
            //all movies sorted by like with at least one like would be advised
            'no like' => [
                'favoriteList' => [],
                'adviseList' => [2, 5, 1, 4, 3, 6, 8, 7, 11, 9],
            ],
            'one like' => [
                'favoriteList' => [1],
                'adviseList' => [2, 4, 5],
            ],
            'one like intersect' => [
                'favoriteList' => [5],
                'adviseList' => [8, 7, 11, 1, 4, 2]
            ],
            'few likes' => [
                'favoriteList' => [2,3],
                'adviseList' => [6, 1, 9, 4, 7, 11, 8, 5],
            ],
            'few more likes' => [
                'favoriteList' => [5,7,11],
                'adviseList' => [8, 2, 1, 4]
            ],
            'five likes' => [
                'favoriteList' => [1,3,5,7,11],
                'adviseList' => [8, 2, 4]
            ],
            //no advise if favorite movie has no single like
            'no one like' => [
                'favoriteList' => [10],
                'adviseList' => []
            ],
            //don't advise movies with no single like
            'all likes' => [
                'favoriteList' => [1,2,3,4,5,6,7,8,9,11],
                'adviseList' => []
            ],
            'one left' => [
                'favoriteList' => [1,2,3,4,5,6,7,8,9,10],
                'adviseList' => [11]
            ],
        ];
    }
}
