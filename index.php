<?php
$startdate = date("Y-m-d H:i:s");
$enddate = "2014-06-21 00:00:01";

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

    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/scripts.js"></script>
    <script type="text/javascript" src="./js/jquery.countdown.js"></script>
    <script type="text/javascript">
      $(function() {
        $('#counter').countdown({
          image: 'img/digits.png',
          startTime: '<?php echo $startTime; ?>'
        });


      });
    </script>
    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
    <script type="text/javascript">
      jQuery(function($) {

        /******************************
         * Events
         ******************************/
        /*
         $('.count').change(function() {
         var self = jQuery(this);
         count = self.val();
         id = self.attr('id');
         price = $('#price-' + id).html();
         price = price * count * 0.1;
         price = parseFloat(price).toFixed(2);
         $('#sum-' + id).html(price);
         
         
         
         //sumShort = parseInt(shortRadio) + parseInt(shortCheck);  
         var total = 0;
         $(".article-sum").each(function(i) {
         article_sum = parseFloat(this.innerHTML);
         total += article_sum;
         });
         //total = Math.ceil(total * 10) / 10;
         $('#total-sum').html(total);
         
         });
         */


        $('form').on('submit', function(e) {
          e.preventDefault();
          var validator = $("#pren").validate({
            errorClass: "invalid",
            validClass: "valid",
            messages: {
              "name": {
                required: 'Saknas'
              },
              "street1": {
                required: 'Saknas'
              },
              "zip": {
                required: 'Saknas'
              },
              "city": {
                required: 'Saknas'
              },
              "phone": {
                required: 'Saknas'
              },
              "email": {
                required: 'Saknas',
                email: 'Felaktig'
              }
            },
            submitHandler: function(form) {
              reponse = $.post('sendmail.php', $('#pren').serialize());
              alert(reponse);
            }
          });


        });

        /*
         jQuery("#pren").click(function(event) {
         event.preventDefault();
         });
         */


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
        <form id="pren" action="/splash/sendmail.php" method="post" class="form-horizontal">
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
              <input type="text" class="form-control" name="email" id="email" id="city" placeholder="Email">
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
                <input type="radio" id="pren8" name="pren" value="8"> Helår, 8 nr endast <strong>329:-</strong>
              </label>
              
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-7">
              <button type="submit" class="btn btn-default">Prenumerera</button>
            </div>
          </div>





        </form>       
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
