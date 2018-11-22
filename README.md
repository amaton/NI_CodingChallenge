NI_CodingChallenge contains advising engine - small example of architecture which suggest movies
based on users preferences;

PreferenceTraktor\MovieTraktor is responsible for generating advices by getting advisers with most
similar interests, counting amount of similar advices from them and sorting by this amount;

PreferenceTraktor\Data is responsible for reading (Data\Source), parsing (Data\Parsing) and storing (Data\Data);

PreferenceTraktor\Outpit is responsible for advices output to file or directly (or easily extendable);

<h3>Requirements:</h3>
PHP 5.6 or later;

PHPUnit 5 or later (will be installed to vendor/bit/phpunit with composer);

<h3>Installation:</h3>
<code>composer install</code>

<h3>Example usage:</h3>
<code>php traktor.php [id1,id2,id3,...] [file_pass (respectively from app root dir)]</code>
Note: Both params are optional

<h3>To run tests:</h3>
<code>vendor/bit/phpunit</code>
