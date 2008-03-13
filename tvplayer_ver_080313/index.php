<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="swfobject.js"></script>

<style>
#transcript{ float:right;width:50% }
#player{ float:left;width:50% }
</style>
</head>
<body>

<div id="player">Your browser cannot play this Flash Video</div>
 
<script type="text/javascript">
// this the code for the player
var so = new SWFObject('mediaplayer.swf','playerID','480','360','8');
so.addParam('allowscriptaccess','always');
so.addParam('allowfullscreen','true');
so.addVariable('height','360');
so.addVariable('width','480');
so.addVariable('file','honda_girl.flv');
so.addVariable('image','honda_girl.jpg');
so.addVariable('captions','honda_girl.srt');
so.addVariable('enablejs','true');
so.addVariable('javascriptid','playerID');
so.addVariable('autostart','false');
so.write('player');

// this function is caught by the JavascriptView object of the player.
function sendEvent(typ,prm) { thisMovie('playerID').sendEvent(typ,prm); };
// This is a javascript handler for the player and is always needed.
function thisMovie(movieName) {
	if(navigator.appName.indexOf("Microsoft") != -1) {
		return window[movieName];
	} else {
		return document[movieName];
	}
};

</script>


<div id="transcript">
<UL>
<?
  
  echo $_GET["x"];
//open the subtitle file for displaying time-subtitle links
$SRTFILE = fopen("honda_girl.srt", "r");
while (!feof($SRTFILE)) {
   $line = fgets($SRTFILE);
   if (preg_match('/(\d{2}):(\d{2}):(\d{2}),/',$line,$matches)){
     //     {$HH,$MM,$SS} = {$matches[1],$matches[2],$matches[3]};
     $time = array("HH" => $matches[1],
		   "MM" => $matches[2],
		   "SS" => $matches[3]);
     //     echo $srt_second;
     //print_r($matches);
     $text = fgets($SRTFILE);
     printSubtitleLink($time["MM"],$time["SS"],$text);
   }
}
?>
<UL>
</div>



<?
//to pattern match the necessary info
//$tline = "00:00:14,000 --> 00:00:17,000";
//print $line;
//preg_match('/(\d{2}):(\d{2}):(\d{2}),/',$tline,$matches);
//print_r($matches);
//$srt_second =  $matches[3];
//printSubtitleLink(10,"good");
function printSubtitleLink($minute,$second, $text)
{
  $srt_second =  $minute*60 + $second;
  echo "<li> $minute:$second <a href='javascript:sendEvent(\"scrub\",",$srt_second,")'>",$text,"</a></li>";
}
?>
<div id="content">
<p>
<a href="javascript:sendEvent('scrub',11)"> go to 11th sec</a>
<a href="javascript:sendEvent('scrub',40)"> go to 40th sec</a>
<a href="javascript:sendEvent('playpause')"> Play/Pause</a>
<a href="javascript:sendEvent('stop')"> Stop</a>
</p>
<ul>
  <li>
  <a href="javascript:sendEvent('scrub',32)"> So when I drive my Honda, I feel like the whole world is flying.</a>
  </li>
  <li>
<a href="javascript:sendEvent('scrub',110)"> Because you dared pass me, you deserve to have your car vandalized.</a>
  </li>
</ul>
</div>


<script type="text/javascript">
function loadMovie(fil,cap)
{
//var s1 = new SWFObject('mediaplayer.swf','playerID','480','360','7');
//s1.addVariable('file',fil);
//s1.addVariable('usecaptions', 'true');
//if(cap != '') { s1.addVariable('captions',cap); }
//s1.addParam('allowscriptaccess','always');
//s1.addParam('allowfullscreen','true');
//s1.addVariable('height','360');
//s1.addVariable('width','480');
//s1.addVariable('image','honda_girl.jpg');
//s1.addVariable('enablejs','true');
//s1.addVariable('javascriptid','playerID');
//s1.addVariable('autostart','true');
//s1.write('player');

if(cap != '') { so.addVariable('captions',cap); }
so.write('player');
}

</script>
<a href="javascript:loadMovie('honda_girl.flv','honda_girl.zh.srt');">Load Chinese</a>
<a href="javascript:loadMovie('honda_girl.flv','honda_girl.srt');">Load English</a>
<!--<a href="javascript:loadFile({file:'honda_girl.flv'});">Load File</a>-->

</body>
</html>
<?
fclose($SRTFILE);
?>
