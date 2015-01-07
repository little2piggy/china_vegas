<?php 
include("class.xml.parser.php");
include("class.weather.php");

$weather_chile = new weather("CHXX0123", 3600, "F");
$weather_chile->parsecached(); 
$atemp = $weather_chile->acttemp;
$ltemp = $weather_chile->fore_day2_tlow;
$htemp = $weather_chile->fore_day2_thigh;;
$curtemp = $weather_chile->acttemp;
$curtemp = tempConvert($curtemp);
$low = $weather_chile->fore_day2_tlow; // 8
$high = $weather_chile->fore_day2_thigh; // 19
$low = tempConvert($low);
$high = tempConvert($high);

$curwtr = $weather_chile->acttext;  // Partly Cloudy, current weather
$tmrwtr =  $weather_chile->fore_day2_text; // Partly Cloudy, tormorrow's weather
$today = "Current Conditions";
$tmr = "Tomorrow Forecast";
$sunrise = "Sunrise";
$sunset = "Sunset";
$low_ttl = "Low";
$high_ttl = "High";
if ($lang == "EN")
{}

else
{
	include_once("zh.php");
	global $weather;
	$curwtr = $weather[$curwtr];
	$tmrwtr = $weather[$tmrwtr];
	$today = $weather[$today];
	$tmr = $weather[$tmr];
	$wth_ttl = $weather[$wth_ttl];
	$sunrise = $weather[$sunrise];
	$sunset = $weather[$sunset];
	$low_ttl = $weather[$low_ttl];
	$high_ttl = $weather[$high_ttl];
}

echo "<p>&nbsp;<br><b>$today</b><br>";
echo $curtemp."&deg;C/".$atemp."&deg;F&nbsp;&nbsp;";     
echo $curwtr."<br>";      // 16
//echo "$sunrise: $weather_chile->sunrise<br>";      // 6:49 am
//echo "$sunset: $weather_chile->sunset</p>";       // 08:05 pm

echo "<p><b>".$tmr."</b><br>";
echo $low_ttl.": ".$low ."&deg;C/".$ltemp. "&deg;F<br>";
echo $high_ttl.": ".$high . "&deg;C/".$htemp."&deg;F<br>";  
echo $tmrwtr."</p>";    

function tempConvert($temp)
{
	$temp = ($temp-32)*5/9;
	$temp = round($temp, 0);
	return $temp;
}
?>