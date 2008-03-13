<html	>
<head>
<script type="text/javascript" src="swfobject.js"></script>

<style>
#transcript{ float:right;width:50% }
#player{ float:left;width:50% }
</style>
</head>

<div id="player">This text will be replaced</div>
 
<script type="text/javascript">
// this the code for the player
var so = new SWFObject('mediaplayer.swf','playerID','480','360','8');
so.addParam('allowscriptaccess','always');
so.addParam('allowfullscreen','true');
so.addVariable('height','360');
so.addVariable('width','480');
so.addVariable('file','honda_girls.flv');
so.addVariable('image','honda_girl.jpg');
so.addVariable('captions','honda_girl.zh.srt');
so.addVariable('enablejs','true');
so.addVariable('javascriptid','playerID');
so.addVariable('autostart','true');
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
//open the subtitle file for displaying time-subtitle links
$SRTFILE = fopen("honda_girl.zh.srt", "r");
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
<a href="javascript:sendEvent('scrub',20)"> go to 20th sec</a>
<a href="javascript:sendEvent('scrub',40)"> go to 40th sec</a>
<a href="javascript:sendEvent('playpause')"> Play/Pause</a>
<a href="javascript:sendEvent('stop')"> Stop</a>
</p>
<ul>
  <li>
  <a href="javascript:sendEvent('scrub',32)"> So when I drive my Honda, I feel like the whole world is flying.</a>
  </li>
  <li>
  <a href="javascript:sendEvent('scrub',86)"> Driving a QQ wasn't your mistake. Your mistake was trying to challenge a Honda.</a>
  </li>
  <li>
<a href="javascript:sendEvent('scrub',110)"> Because you dared pass me, you deserve to have your car vandalized.</a>
  </li>
</ul>
</div>

<!--

var currentPosition;
var currentRemaining;
function getUpdate(typ,pr1,pr2,swf) { 
	if(typ == "time") { currentPosition = pr1; pr2 == undefined ? null: currentRemaining = Math.round(pr2); }
};

<a href="javascript:sendEvent('scrub',currentPosition + 5)">forward +5 sec</a>

<a href="javascript:sendEvent('scrub',currentPosition + 5)">backward -5 sec</a>

-->


<body>

</body>
</html>
<?
fclose($SRTFILE);
?>
