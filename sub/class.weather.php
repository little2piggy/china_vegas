<?php
//////////////////////////
class weather
{ // class : begin
//////////////////////////


// ------------------- 
// ATTRIBUTES DECLARATION
// -------------------

// HANDLING ATTRIBUTES
var $locationtext; // Text for Location (self set)
var $locationcode; // Yahoo Code for Location
var $fixurl;       // fix part of url 
var $allurl;       // generated url with location
var $parser;       // Instance of Class XML Parser
var $unit;         // F or C / Fahrenheit or Celsius

// CACHING ATTRIBUTES
var $cache_expires;
var $cache_lifetime;

// WEATHER ATTRIBUTES
var $title;        // Yahoo! Weather - Santiago, CI
var $city;         // Santiago
var $sunrise;      // 6:49 am
var $sunset;       // 08:05 pm
var $yahoolink;    // http://us.rd.yahoo.com/dailynews/rss/weather/Santiago__CI/*http://xml.weather.yahoo.com/forecast/CIXX0020_c.html

// ACTUAL SITUATION
var $acttext;      // Partly Cloudy
var $acttemp;      // 16
var $acttime;      // Wed, 26 Oct 2005 2:00 pm CLDT
var $imageurl;     // http://us.i1.yimg.com/us.yimg.com/i/us/nws/th/main_142b.gif
var $actcode;

// 5 Day Forecast day 1
var $fore_day1_day;     // Wed
var $fore_day1_date;    // 26 Oct 2005
var $fore_day1_tlow;    // 8
var $fore_day1_thigh;   // 19
var $fore_day1_text;    // Partly Cloudy
var $fore_day1_imgcode; // 29=Image for partly cloudy

// 5 Day Forecast day 2
var $fore_day2_day;     // Wed
var $fore_day2_date;    // 26 Oct 2005
var $fore_day2_tlow;    // 8
var $fore_day2_thigh;   // 19
var $fore_day2_text;    // Partly Cloudy
var $fore_day2_imgcode; // 29=Image for partly cloudy

// 5 Day Forecast day 3
var $fore_day3_day;     // Wed
var $fore_day3_date;    // 26 Oct 2005
var $fore_day3_tlow;    // 8
var $fore_day3_thigh;   // 19
var $fore_day3_text;    // Partly Cloudy
var $fore_day3_imgcode; // 29=Image for partly cloudy

// 5 Day Forecast day 4
var $fore_day4_day;     // Wed
var $fore_day4_date;    // 26 Oct 2005
var $fore_day4_tlow;    // 8
var $fore_day4_thigh;   // 19
var $fore_day4_text;    // Partly Cloudy
var $fore_day4_imgcode; // 29=Image for partly cloudy

// 5 Day Forecast day 5
var $fore_day5_day;     // Wed
var $fore_day5_date;    // 26 Oct 2005
var $fore_day5_tlow;    // 8
var $fore_day5_thigh;   // 19
var $fore_day5_text;    // Partly Cloudy
var $fore_day5_imgcode; // 29=Image for partly cloudy


// ------------------- 
// CONSTRUCTOR METHOD
// -------------------
function weather($location, $lifetime, $unit) // Santiago=CIXX0020
{
// Set Lifetime / Locationcode
$this->cache_lifetime = $lifetime;
$this->locationcode   = $location;
$this->unit           = $unit;
}

// ------------------- 
// FUNCTION PARSE
// -------------------
function parse()
{
// Concatenate RSS Url
$location = $this->locationcode;
//               http://xml.weather.yahoo.com/forecastrss?p=CIXX0020&u=c
$this->fixurl = "http://xml.weather.yahoo.com/forecastrss?u=";  
$this->fixurl = $this->fixurl. $this->unit . "&p=";
$this->allurl = $this->fixurl . $location;

// Create Instance of XML Parser Class
// and parse the XML File
$this->parser = new xmlParser();
$this->parser->parse($this->allurl);

// Call all internal Methods
$this->fill_weather_attributes();
$this->fill_actual_situation();
$this->fill_forecast_day1();
$this->fill_forecast_day2();
$this->fill_forecast_day3();
$this->fill_forecast_day4();
$this->fill_forecast_day5();

// FOR DEBUGGING PURPOSES
//$jetzt = time();
//print "<p><h1> file new parsed from url (exp $this->cache_expires now $jetzt</h1>";

}

// ------------------- 
// WEATHER ATTRIBUTES FILL
// -------------------
// *** Fill the weather attributes *****************************
function fill_weather_attributes()
{
// RENEWED 19.11.2005 MAV : Rss of Yahoo changed
$this->title =      $this->parser->output[0][child][0][child][0][content]; // OK
$this->city  =      $this->parser->output[0][child][0][child][6][attrs][CITY]; // OK
$this->sunrise  =   $this->parser->output[0][child][0][child][10][attrs][SUNRISE]; // OK
$this->sunset  =    $this->parser->output[0][child][0][child][10][attrs][SUNSET]; // OK
$this->yahoolink  = $this->parser->output[0][child][0][child][1][content]; // OK
}

// ------------------- 
// FILL ACTUAL SITUATION
// -------------------
// *** Fill ACTUAL SITUATION *****************************
function fill_actual_situation()
{
// RENEWED 19.11.2005 MAV : Rss of Yahoo changed
$this->acttext =    $this->parser->output[0][child][0][child][12][child][5][attrs][TEXT]; // OK
$this->acttemp =    $this->parser->output[0][child][0][child][12][child][5][attrs][TEMP]; // OK
$this->acttime =    $this->parser->output[0][child][0][child][12][child][5][attrs][DATE]; // OK
$this->imageurl =   "n/a";     // was the yahoo logo (nt left supported)
$this->actcode  =   $this->parser->output[0][child][0][child][12][child][5][attrs][CODE]; // OK
}

// ------------------- 
// FILL FORECAST DAY 1
// -------------------
// *** Fill Forecast Day 1 *****************************
function fill_forecast_day1()
{
// RENEWED 19.11.2005 MAV : Rss of Yahoo changed
$this->fore_day1_day     = $this->parser->output[0][child][0][child][12][child][7][attrs][DAY]; // OK
$this->fore_day1_date    = $this->parser->output[0][child][0][child][12][child][7][attrs][DATE]; // OK
$this->fore_day1_tlow    = $this->parser->output[0][child][0][child][12][child][7][attrs][LOW]; // OK
$this->fore_day1_thigh   = $this->parser->output[0][child][0][child][12][child][7][attrs][HIGH]; // OK
$this->fore_day1_text    = $this->parser->output[0][child][0][child][12][child][7][attrs][TEXT]; // OK
$this->fore_day1_imgcode = $this->parser->output[0][child][0][child][12][child][7][attrs][CODE]; // OK
}

// ------------------- 
// FILL FORECAST DAY 2
// -------------------
// *** Fill Forecast Day 2 *****************************
function fill_forecast_day2()
{
// RENEWED 19.11.2005 MAV : Rss of Yahoo changed
$this->fore_day2_day     = $this->parser->output[0][child][0][child][12][child][8][attrs][DAY]; // OK
$this->fore_day2_date    = $this->parser->output[0][child][0][child][12][child][8][attrs][DATE]; // OK
$this->fore_day2_tlow    = $this->parser->output[0][child][0][child][12][child][8][attrs][LOW]; // OK
$this->fore_day2_thigh   = $this->parser->output[0][child][0][child][12][child][8][attrs][HIGH]; // OK
$this->fore_day2_text    = $this->parser->output[0][child][0][child][12][child][8][attrs][TEXT]; // OK
$this->fore_day2_imgcode = $this->parser->output[0][child][0][child][12][child][8][attrs][CODE]; // OK
}

// ------------------- 
// FILL FORECAST DAY 3
// -------------------
// *** Fill Forecast Day 3 *****************************
function fill_forecast_day3()
{
// RENEWED 19.11.2005 MAV : Rss of Yahoo changed
$this->fore_day3_day     = $this->parser->output[0][child][0][child][12][child][9][attrs][DAY]; // OK
$this->fore_day3_date    = $this->parser->output[0][child][0][child][12][child][9][attrs][DATE]; // OK
$this->fore_day3_tlow    = $this->parser->output[0][child][0][child][12][child][9][attrs][LOW]; // OK
$this->fore_day3_thigh   = $this->parser->output[0][child][0][child][12][child][9][attrs][HIGH]; // OK
$this->fore_day3_text    = $this->parser->output[0][child][0][child][12][child][9][attrs][TEXT]; // OK
$this->fore_day3_imgcode = $this->parser->output[0][child][0][child][12][child][9][attrs][CODE]; // OK
}

// ------------------- 
// FILL FORECAST DAY 4
// -------------------
// *** Fill Forecast Day 4 *****************************
function fill_forecast_day4()
{
//$this->fore_day4_day     = $this->parser->output[0][child][0][child][12][child][10][attrs][DAY]; // OK
//$this->fore_day4_date    = $this->parser->output[0][child][0][child][12][child][10][attrs][DATE]; // OK
//$this->fore_day4_tlow    = $this->parser->output[0][child][0][child][12][child][10][attrs][LOW]; // OK
//$this->fore_day4_thigh   = $this->parser->output[0][child][0][child][12][child][10][attrs][HIGH]; // OK
//$this->fore_day4_text    = $this->parser->output[0][child][0][child][12][child][10][attrs][TEXT]; // OK
//$this->fore_day4_imgcode = $this->parser->output[0][child][0][child][12][child][10][attrs][CODE]; // OK
}

// ------------------- 
// FILL FORECAST DAY 5
// -------------------
// *** Fill Forecast Day 5 *****************************
function fill_forecast_day5()
{
//$this->fore_day5_day     = $this->parser->output[0][child][0][child][12][child][11][attrs][DAY]; // OK
//$this->fore_day5_date    = $this->parser->output[0][child][0][child][12][child][11][attrs][DATE]; // OK
//$this->fore_day5_tlow    = $this->parser->output[0][child][0][child][12][child][11][attrs][LOW]; // OK
//$this->fore_day5_thigh   = $this->parser->output[0][child][0][child][12][child][11][attrs][HIGH]; // OK
//$this->fore_day5_text    = $this->parser->output[0][child][0][child][12][child][11][attrs][TEXT]; // OK
//$this->fore_day5_imgcode = $this->parser->output[0][child][0][child][12][child][11][attrs][CODE]; // OK
}

// ------------------- 
// WRITE OBJECTO TO CACHE
// -------------------
function writecache()
{
$this->cache_expires = time() + $this->cache_lifetime;
$filename = $this->locationcode;
$s = serialize($this);
$fp = fopen($filename, "w");
fwrite($fp, $s);
fclose($fp);
}

// ------------------- 
// READ OBJECTO TO CACHE
// -------------------
function readcache()
{
$filename = $this->locationcode;
$intweather = new weather($this->locationcode, $this->cache_lifetime, $this->unit);
$fp = fopen ($filename, "r");
$intweather = unserialize(fread ($fp, filesize ($filename)));
fclose($fp);

$this->locationtext  = $intweather->locationtext ;
$this->locationcode = $intweather->locationcode;
$this->fixurl        = $intweather->fixurl       ;
$this->allurl        = $intweather->allurl       ;
$this->parser       = $intweather->parser      ;
$this->cache_expires = $intweather->cache_expires;
$this->cache_lifetime = $intweather->cache_lifetime;
$this->title         = $intweather->title        ;
$this->city          = $intweather->city         ;
$this->sunrise       = $intweather->sunrise      ;
$this->sunset        = $intweather->sunset       ;
$this->yahoolink     = $intweather->yahoolink    ;
$this->acttext       = $intweather->acttext      ;
$this->acttemp       = $intweather->acttemp      ;
$this->acttime       = $intweather->acttime      ;
$this->imageurl      = $intweather->imageurl     ;
$this->actcode = $intweather->actcode;
$this->fore_day1_day     = $intweather->fore_day1_day    ;
$this->fore_day1_date     = $intweather->fore_day1_date    ;
$this->fore_day1_tlow   = $intweather->fore_day1_tlow  ;
$this->fore_day1_thigh    = $intweather->fore_day1_thigh   ;
$this->fore_day1_text     = $intweather->fore_day1_text    ;
$this->fore_day1_imgcode  = $intweather->fore_day1_imgcode ;
$this->fore_day2_day     = $intweather->fore_day2_day    ;
$this->fore_day2_date     = $intweather->fore_day2_date    ;
$this->fore_day2_tlow    = $intweather->fore_day2_tlow   ;
$this->fore_day2_thigh    = $intweather->fore_day2_thigh   ;
$this->fore_day2_text     = $intweather->fore_day2_text    ;
$this->fore_day2_imgcode  = $intweather->fore_day2_imgcode ;
$this->fore_day3_day      = $intweather->fore_day3_day     ;
$this->fore_day3_date     = $intweather->fore_day3_date    ;
$this->fore_day3_tlow     = $intweather->fore_day3_tlow    ;
$this->fore_day3_thigh    = $intweather->fore_day3_thigh   ;
$this->fore_day3_text     = $intweather->fore_day3_text    ;
$this->fore_day3_imgcode  = $intweather->fore_day3_imgcode ;
$this->fore_day4_day      = $intweather->fore_day4_day     ;
$this->fore_day4_date     = $intweather->fore_day4_date    ;
$this->fore_day4_tlow     = $intweather->fore_day4_tlow    ;
$this->fore_day4_thigh   = $intweather->fore_day4_thigh  ;
$this->fore_day4_text     = $intweather->fore_day4_text    ;
$this->fore_day4_imgcode  = $intweather->fore_day4_imgcode ;
$this->fore_day5_day     = $intweather->fore_day5_day    ;
$this->fore_day5_date    = $intweather->fore_day5_date   ;
$this->fore_day5_tlow    = $intweather->fore_day5_tlow   ;
$this->fore_day5_thigh    = $intweather->fore_day5_thigh   ;
$this->fore_day5_text     = $intweather->fore_day5_text    ;
$this->fore_day5_imgcode  = $intweather->fore_day5_imgcode ;


}


// ------------------- 
// FUNCTION PARSECACHED
// -------------------
function parsecached()
{
 if (file_exists($this->locationcode)) 
{
$this->readcache();
if($this->cache_expires >= time())
{
//not exp.


} else {
$this->parse();
$this->writecache();
//still valid
}
} else {
$this->parse();
$this->writecache();
}
}//endmethod

//////////////////////////
} // class : end
//////////////////////////

?>