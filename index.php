<?php
$startdate = date("Y-m-d H:i:s");
$enddate = "2014-09-13 12:00:01";

$diff = strtotime($enddate) - strtotime($startdate);
$temp = $diff / 86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 
$days = floor($temp);
if (strlen($days) == 1) {
  $days = '0' . $days;
}
$temp = 24 * ($temp - $days);
// hours 
$hours = floor($temp);
if (strlen($hours) == 1) {
  $hours = '0' . $hours;
}
$temp = 60 * ($temp - $hours);
// minutes 
$minutes = floor($temp);
if (strlen($minutes) == 1) {
  $minutes = '0' . $minutes;
}
$temp = 60 * ($temp - $minutes);
// seconds 
$seconds = floor($temp);
if (strlen($seconds) == 1) {
  $seconds = '0' . $seconds;
}
$startTime = "{$days}:{$hours}:{$minutes}:{$seconds}";
?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Spring</title>
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
    <link rel="shortcut icon" href="img/favicon.ico?v=2">

    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/scripts.js"></script>
    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script type="text/javascript" src="./js/jquery.countdown.js"></script>    
    <script type="text/javascript">
      jQuery(function($) {



        //start the counter
        $('#counter').countdown({
          image: 'img/digits.png',
          startTime: '<?php echo $startTime; ?>',
          stepTime: 60,
          format: 'ddd:hh:mm:ss',
          digitImages: 6,
          digitWidth: 53,
          digitHeight: 77

        });

        // bind 'myForm' and provide a simple callback function 
        $('#myForm').ajaxForm(function() {
          alert("Thank you for your comment!");
        });


        //validate the form
        $("#msg-ok").hide();
        var validator = $("#pren-form").validate({
          //debug: true,
          rules: {
            name: {
              required: true
            },
            street1: {
              required: true
            },
            zip: {
              required: true
            },
            city: {
              required: true
            },
            phone: {
              required: true
            },
            email: {
              required: true,
              email: true
            }
          },
          messages: {
            name: "",
            street1: "",
            zip: "",
            city: "",
            phone: "",
            email: {
              required: "",
              email: 'Felaktig emailadress'
            }
          }, submitHandler: function(form) {
            $("#pren-button").button('loading');
            $(form).ajaxSubmit(function(response) {
              //dont bother to check for response because the plugin Gatekeeper spoils the return status... 
              $("#pren-button").button('reset');
              $("#msg-ok").show();
            });
          },
          highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
          },
          unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
          },
          errorElement: 'span',
          errorClass: 'help-block',
          errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
              error.insertAfter(element.parent());
            } else {
              error.insertAfter(element);
            }
          }
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
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
          return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/sv_SE/all.js#xfbml=1&appId=235281526582552";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
    <div class="container">
      <div class="row clearfix">
        <div class="col-sm-12 column">
          <div id="header-image">
            <img src="./img/logo.png" />
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-sm-12 column">
          <div id="header-subtitle">
            <img src="./img/subtitle.png" />
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-sm-12 column">
          <div id="social-media">
            <div class="fb-like" data-href="https://www.facebook.com/magasinspring" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
            </div>



            <a href="https://twitter.com/share" class="twitter-share-button" data-via="magasinspring" data-lang="sv" data-hashtags="jagspringer">Tweeta</a>
            <script>!function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                  js = d.createElement(s);
                  js.id = id;
                  js.src = p + '://platform.twitter.com/widgets.js';
                  fjs.parentNode.insertBefore(js, fjs);
                }
              }(document, 'script', 'twitter-wjs');</script>


            <style>.ig-b- { display: inline-block; }
              .ig-b- img { visibility: hidden; }
              .ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
              .ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
              @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                .ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
            <a href="http://instagram.com/magasinspring?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>

          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-sm-12 column">
          <div id="counter-content">
            <div id="counter"></div> 
          </div>
        </div>
      </div>
      <div class="row clearfix" id="subscribe">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-7 ">
          <strong>Var med redan från början!</strong> första nummret kommer den 15/9.
          Beställ redan idag så du inte missar något nummer!
        </div>
        <div class="col-sm-3">&nbsp;</div>
      </div>
      <div class="row clearfix">
        <form id="pren-form" action="sendmail.php" method="post" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-1">&nbsp;</div>
            <label for="name" class="col-sm-2 control-label">Namn* </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" id="name" placeholder="Namn">
            </div>
            <div class="col-sm-3">&nbsp;</div>
          </div>
          <div class="form-group">
            <div class="col-sm-1">&nbsp;</div>
            <label for="adress" class="col-sm-2 control-label">Adress* </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="street1" id="street1" placeholder="Adress">
            </div>
            <div class="col-sm-3">&nbsp;</div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <label for="zip" class="col-sm-2 control-label">Postnummer* </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="zip" id="zip" placeholder="Postnummer">
            </div>
            <div class="col-sm-3"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <label for="city" class="col-sm-2 control-label">Stad* </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="city" id="city" placeholder="Namn">
            </div>
            <div class="col-sm-3"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <label for="email" class="col-sm-2 control-label">Email* </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="email" id="email"  placeholder="Email">
            </div>
            <div class="col-sm-3"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-7">
              <label class="radio-inline">
                <input type="radio" id="pren3" name="pren" value="3"> 3 nr för <strong>129:-</strong>
              </label>
              <label class="radio-inline">
                <input type="radio" id="pren8" name="pren" value="8" checked > Helår, 8 nr endast <strong>329:-</strong>
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-7">
              <label class="checkbox-inline">
                <input type="checkbox" id="spam" value="JA" name="spam">Skicka mig gärna fler erbjudanden från Spring!
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-7">
              <!--button type="submit" class="btn btn-default">Prenumerera</button-->
              <input type="submit" class="btn btn-default" value="Prenumerera" id="pren-button" data-loading-text="Skickar..." /><span id="msg-ok"> Din beställning är skickad.</span>
            </div>
          </div>
        </form>       
      </div>
      <div class="row clearfix">
        <div class="col-sm-1">&nbsp;</div>
        <div class="col-sm-10" id="info-box" >
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
      <div class="col-sm-1">&nbsp;</div>
      <div class="clearfix">
        <div class="row" id="footer">
          <div class="col-sm-offset-8 col-sm-2">
            <img class="footer-img" src="./img/mediavanner-logo.png" />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
