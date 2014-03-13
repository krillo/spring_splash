<?php
$startdate = date("Y-m-d H:i:s");
$enddate = "2014-06-21 00:00:01";

$diff = strtotime($enddate) - strtotime($startdate);
$temp = $diff / 86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 
$days = floor($temp);
if(strlen($days) == 1){
  $days = '0'.$days;
}
$temp = 24 * ($temp - $days);
// hours 
$hours = floor($temp);
if(strlen($hours) == 1){
  $hours = '0'.$hours;
}
$temp = 60 * ($temp - $hours);
// minutes 
$minutes = floor($temp);
if(strlen($minutes) == 1){
  $minutes = '0'.$minutes;
}
$temp = 60 * ($temp - $minutes);
// seconds 
$seconds = floor($temp);
if(strlen($seconds) == 1){
  $seconds = '0'.$seconds;
}
$startTime = "{$days}:{$hours}:{$minutes}:{$seconds}";
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bootstrap 3, from LayoutIt!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/jquery.countdown.js"></script>
      <script type="text/javascript">
      $(function() {
        $('#counter').countdown({
          image: 'img/digits.png',
          startTime: '<?php echo $startTime; ?>'
        });


      });
    </script>
    <style type="text/css">
      br { clear: both; }
      .cntSeparator {
        font-size: 54px;
        margin: 10px 7px;
        color: #000;
      }
      .desc { margin: 7px 3px; }
      .desc div {
        float: left;
        font-family: Arial;
        width: 70px;
        margin-right: 65px;
        font-size: 13px;
        font-weight: bold;
        color: #000;
      }
    </style>  
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
      <div id="header-image">
        <img src="./img/logo.png" />
      </div>
		</div>
	</div>
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div id="header-subtitle">
        <img src="./img/subtitle.png" />
      </div>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div id="social-media">
        <!--social media here-->
      </div>
    </div>
  </div>
	<div class="row clearfix">
		<div class="col-md-12 column">
      <div id="counter-content">
        <div id="counter"></div> 
      </div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
      <div id="pren-form">
        
       
        
        
        <div class="wpcf7" id="wpcf7-f5-p6-o1"><form action="/?page_id=6#wpcf7-f5-p6-o1" method="post" class="wpcf7-form sent" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="5">
<input type="hidden" name="_wpcf7_version" value="3.7.2">
<input type="hidden" name="_wpcf7_locale" value="sv_SE">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f5-p6-o1">
<input type="hidden" name="_wpnonce" value="7c35555a47">
</div>
<p>Testerbjudande <span class="wpcf7-form-control-wrap tre-nr"><span class="wpcf7-form-control wpcf7-checkbox"></span></span> 3nr <strong>129:- </strong>  <span class="wpcf7-form-control-wrap atta-nr"><span class="wpcf7-form-control wpcf7-checkbox"></span></span> Helår, 8nr endast<strong>329:- </strong><br>
</p>
<p>Namn <span class="wpcf7-form-control-wrap namn"><input type="text" name="namn" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </p>
<p></p>
<p>Adress  (obligatorisk)<br>
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </p>
<p>Din epost (obligatorisk)<br>
    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </p>
<p>Ämne<br>
    <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </p>
<p>Ditt meddelande<br>
    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </p>
<p><input type="submit" value="Skicka" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://spring.dev/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Skickar..." style="visibility: hidden;"></p>
<div class="wpcf7-response-output wpcf7-display-none wpcf7-mail-sent-ok" role="alert" style="display: block;">Ditt meddelande har skickats. Tack!</div></form></div>
        
        
     
      </div>
		</div>
	</div>
    <div class="row clearfix">
    <div class="col-md-12 column">
      <div id="info-box">
        <div id="info-img">
          <img src="./img/bg.png" />
        </div>
        <div id="info-text">
          <h1>Chefsredaktören har ordet</h1>
          <p>
            När jag startade förlaget Mediavänner i oktober var en viktig ingrediens lust. 
            Att få jobba med mitt stora intresse löpning inom ramarna för vad bolaget gör är helt 
            enkelt grymt! Spring är en löpartidning som kommer ge massor av inspiration och löparglädje 
            till läsarna. Ambitionen är att det ska vara en viktig pusselbit för löparna, att Spring 
            ska motivera och faktiskt ge ståpäls - Spring ska uppfattas som seriös, passionerad och 
            grymt motiverande.
          </p>
        </div>
      </div>
    </div>
    <div class="row clearfix">
    <div class="col-md-12 column">
      <div id="footer">
        <img class="footer-img" src="./img/mediavanner-logo.png" />
      </div>
    </div>
  </div>
  </div>
</div>
</body>
</html>
