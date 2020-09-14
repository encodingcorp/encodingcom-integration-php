<?php
require('encodingcom-sendrequest.php');

// substitute with the user ID and userkey found in the dashboard of your Encoding.com user account
$encodingcom_userid = 12345;
$encodingcom_userkey = 'changeme';

// subsitute the source video here, see https://api.encoding.com/reference#mainfields-source for examples
$source_location = 'http://distribution.bbb3d.renderfarming.net/video/mp4/bbb_sunflower_1080p_30fps_normal.mp4';

// note that this request merely prepares a piece of source media for content, assigning it a MediaID and transferring it to processing storage if necessary.

$xml = <<<EOD
<?xml version="1.0"?>
<query>
  <userid>$encodingcom_userid</userid>
  <userkey>$encodingcom_userkey</userkey>
  <action>AddMedia</action>
  <source>$source_location</source>
    <format> 
        <output>mp4</output> 
        <size>320x240</size> 
        <bitrate>256k</bitrate> 
        <audio_bitrate>64k</audio_bitrate> 
        <audio_channels_number>2</audio_channels_number> 
        <keep_aspect_ratio>yes</keep_aspect_ratio> 
        <video_codec>mpeg4</video_codec> 
        <profile>main</profile> 
        <VCodecParameters>no</VCodecParameters> 
        <audio_codec>libfaac</audio_codec> 
        <two_pass>no</two_pass> 
        <cbr>no</cbr> 
        <deinterlacing>no</deinterlacing> 
        <keyframe>300</keyframe> 
        <audio_volume>100</audio_volume> 
        <file_extension>mp4</file_extension> 
        <hint>no</hint> 
    </format>
</query>
EOD;

// Invoke the sendrequest method to POST the XML to the API
sendrequest($xml);
