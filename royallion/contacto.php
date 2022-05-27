<?php
require 'php/PHPMailerAutoload.php';
$Nombre = $_POST['fname'];
$Telefono = $_POST['phone'];
$Email = $_POST['email'];
$Mensaje = $_POST['message'];

// $header .= "charset=iso-8859-1 \r\n";

$mail = new PHPMailer;

$mail->isSMTP();                                     // Set mailer to use SMTP
$mail->CharSet = 'UTF-8';
$mail->Host = 'mail.royallioni.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'info@royallioni.com';                 // SMTP username
$mail->Password = 'lioni2021com';                         // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'info@royallioni.com';
$mail->FromName = 'Royal Lion Investment & Associated C.A.';
/*$mail->addAddress($Email, $RazonSocial); */    // Add a recipient
$mail->addAddress('info@royallioni.com', 'Contacto WEB');
// $mail->addReplyTo('info@babyqueen.com.ve', 'Contacto Web');
// $mail->addReplyTo('info@babyqueen.com.ve', 'Contacto Web');
  // Optional name
$mail->isHTML(true);                                 // Set email format to HTML
$mail->Subject = 'Solicitud de '.strtoupper($Nombre).' en royallioni.com';
$mail->Body    = '<style type="text/css">
                    a {color: #666;}
                    a:hover {color: #333;}
                    p {padding: 0; margin: 0;}
                    .body {width: 650px; background: #222; margin: 0 auto;}
                    .ReadMsgBody {width: 100%;} .ExternalClass{width: 100%;} /* Centres the newsletter within Hotmail */
                    .copy{color:#fff;}
                    .mensaje{text-transform: uppercase; margin-top: 20px;}
                  </style>
                  
                  <body style="background: #f8d179; padding: 0; margin: 0;">

                    <!-- Compatibility with OutItGoes.com Header -->
                    <table style="margin:0 auto; background: #231F20; width: 100%">
                            <tr>
                                <td></td>
                                <td width="650">
                    <!-- Compatibility with OutItGoes.com Header End -->


                    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #666; margin: 30px auto 0 auto;" class="wl-b-newsletter">

                    </table>
                    <table width="648" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border: 1px solid #ccc; background: #fff; font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em; text-align: left" class="wl-b-newsletter">
                      <tr>
                            <td>

                              <!-- Top Grey Bar -->
                              <table border="0" cellpadding="0" cellspacing="0" width="648" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; background: #f8d179">
                                  <tr>
                                        <td style="padding: 10px;">
                                            Solicitud de contacto desde <strong>www.royallioni.com</strong>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Top Grey Bar End -->

                                 <!-- Featured Story -->
                                <table border="0" cellpadding="0" cellspacing="0" width="648" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em">
                                      <tr>
                                        <td style="padding: 20px 0 20px 20px">
                                           <img src="http://www.royallioni.com/images/logo.png" alt="Logo" />
                                        </td>
                                        <td style="padding: 20px">
                                          <span style="color: #222; font-size: 25px; font-weight: 700; letter-spacing: -1px">Solicitud de '.strtoupper($Nombre).'</span><br />
                                          <p class="mensaje">
                                            Teléfono: <strong>'.$Telefono.'</strong><br />
                                            Email: <strong>'.$Email.'</strong><br />
                                            Mensaje: <strong>'.$Mensaje.'</strong><br />
                                            <br /><br />
                                          </p>
                                        </td>
                                      </tr>

                                  </table>
                                  <!-- Featured Story End -->
                            </td>
                      </tr>
                    </table>
                    <table width="650" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #666; padding: 10px;" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em">
                      <tr>
                          <td class="copy">Royal Lion Investment & Associated C.A.</td>
                        </tr>
                    </table>

                    <!-- Compatibility with OutItGoes.com Footer -->
                          </td>
                                <td></td>
                            </tr>
                        </table>
                    <!-- Compatibility with OutItGoes.com Footer End -->
                  </body>
';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mensaje  = '';
$enviado = 0;
if (!$mail->send()) {
  $enviado = 1;
  $mensaje = "Algo salio mal al enviar el mensaje. Intente de nuevo. Mailer Error: " . $mail->ErrorInfo;
} else {
  $enviado = 0;
  $mensaje =  "Tu mensaje ha sido enviado con exito, pronto estaremos comunicandonos con usted.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Royal Lion Investment & Associated C.A.</title>
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Vendor css -->
    <link rel="stylesheet" type="text/css" href="css/settings.css">
    <link rel="stylesheet" type="text/css" href="css/layers.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <!-- ================== Custom Css ==================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body class="home layout_changer">
<!-- =================================== Main body Wrapper =========================== -->
<div class="body_wrapper">
        <!-- pre loader  -->
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>
<!-- ================== welcome finance press ================= -->
        <section id="nosotros" class="about_finance_press">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 finance_text">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8 some_speach text-center">
<?php if ($enviado == 0) { ?>
                                <div class="icon_border envio">
                                    <span class="icon flaticon-money33">
                                        <i class="fa fa-check-square fa-2x"></i>
                                    </span>
                                </div>
                                <p style="font-size: 22px;">¡Mensaje Enviado!</p>
                                <p style="font-size: 22px;">Pronto nos pondremos en contacto.</p>
<?php } else { ?>
                                <div class="icon_border no-envio">
                                    <span class="icon flaticon-money33">
                                        <i class="fa fa-times-circle fa-2x"></i>
                                    </span>
                                </div>
                                <p style="font-size: 22px;">Su mensaje no pudo ser enviado.</p>
                                <p style="font-size: 22px;">Por favor, intente nuevamente.</p>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- ================== /welcome finance press ================= -->
<!-- ================================ Parallax Section =================== -->
        <section class="parallax envio-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 button text-center">
                        <a href="index.html#contacto" class="page-scroll hvr-sweep-to-rightB">Volver</a>
                    </div>
                </div>
            </div>
        </section>
<!-- ================================ /Parallax Section =================== -->
<!-- ========================= Footer ======================= -->
    <footer id="footer-envio">
        <div class="container">
            <div class="bottom_footer main_footer">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                        <p>Copyrights © 2016 Royal Lion Investment & Associated C.A. | Todos los derechos reservados.</p>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 left_space_fix subscribe_us">
                        <ul class="media_icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>
<!-- ========================= /Footer ======================= -->

    <!-- ======================= Js File ====================== -->
    <script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- ====================== Vendor js=================== -->
    <script src="js/jquery.themepunch.tools.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="js/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="js/revolution.extension.navigation.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script src="js/validate.js"></script>
    <script type="text/javascript" src="js/back-to-top.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
     
    <script type="text/javascript">
        (function($) {
            $.fn.jStockTicker = function(options) {
                if (typeof (options) == 'undefined') {
                    options = {};
                }
                var settings = $.extend( {}, $.fn.jStockTicker.defaults, options);
                var $ticker = $(this);
                var $wrap = null;
                settings.tickerID = $ticker[0].id;
                $.fn.jStockTicker.settings[settings.tickerID] = {};

                if ($ticker.parent().get(0).className != 'wrap') {
                    $wrap = $ticker.wrap("<div class='wrap'></div>");
                }

                var $tickerContainer = null;
                if ($ticker.parent().parent().get(0).className != 'container') {
                    $tickerContainer = $ticker.parent().wrap(
                            "<div class='container'></div>");
                }
                
                var node = $ticker[0].firstChild;
                var next;
                while(node) {
                    next = node.nextSibling;
                    if(node.nodeType == 3) {
                        $ticker[0].removeChild(node);
                    }
                    node = next;
                }
                
                var shiftLeftAt = $ticker.children().get(0).offsetWidth;
                $.fn.jStockTicker.settings[settings.tickerID].shiftLeftAt = shiftLeftAt;
                $.fn.jStockTicker.settings[settings.tickerID].left = 0;
                $.fn.jStockTicker.settings[settings.tickerID].runid = null;
                $ticker.width(2 * screen.availWidth);
                
                function startTicker() {
                    stopTicker();
                    
                    var params = $.fn.jStockTicker.settings[settings.tickerID]; 
                    params.left -= settings.speed;
                    if(params.left <= params.shiftLeftAt * -1) {
                        params.left = 0;
                        $ticker.append($ticker.children().get(0));
                        params.shiftLeftAt = $ticker.children().get(0).offsetWidth;
                    }
                    
                    $ticker.css('left', params.left + 'px');
                    params.runId = setTimeout(arguments.callee, settings.interval);
                    
                    $.fn.jStockTicker.settings[settings.tickerID] = params;
                }
                
                function stopTicker() {
                    var params = $.fn.jStockTicker.settings[settings.tickerID];
                    if (params.runId)
                        clearTimeout(params.runId);
                    
                    params.runId = null;
                    $.fn.jStockTicker.settings[settings.tickerID] = params;
                }
                
                function updateTicker() {           
                    stopTicker();
                    startTicker();
                }
                
                $ticker.hover(stopTicker,startTicker);      
                startTicker();
            };

            $.fn.jStockTicker.settings = {};
            $.fn.jStockTicker.defaults = {
                tickerID :null,
                url :null,
                speed :1,
                interval :20
            };
        })(jQuery);
    </script>
    <script type="text/javascript">
        $(window).load(function () {
            StockPriceTicker();
            setInterval(function() {StockPriceTicker();} , 60000);
        });
        function StockPriceTicker() {
            var Symbol = "", CompName = "", Price = "", ChnageInPrice = "", PercentChnageInPrice = ""; 
            var CNames = "^FTSE,HSBA.L,SL.L,BATS.L,BLND.L,FLG.L,RBS.L,RMG.L,VOD.L";
            var flickerAPI = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22" + CNames + "%22)&env=store://datatables.org/alltableswithkeys";
            var StockTickerHTML = "";
            
            var StockTickerXML = $.get(flickerAPI, function(xml) {
                $(xml).find("quote").each(function () {
                    Symbol = $(this).attr("symbol");
                    $(this).find("Name").each(function () {
                        CompName = $(this).text();
                    });
                    $(this).find("LastTradePriceOnly").each(function () {
                        Price = $(this).text();
                    });
                    $(this).find("Change").each(function () {
                        ChnageInPrice = $(this).text();
                    });
                    $(this).find("PercentChange").each(function () {
                        PercentChnageInPrice = $(this).text();
                    });
                    
                    var PriceClass = "GreenText", PriceIcon="up_green";
                    if(parseFloat(ChnageInPrice) < 0) { PriceClass = "RedText"; PriceIcon="down_red"; }
                    StockTickerHTML = StockTickerHTML + "<span class='" + PriceClass + "'>";
                    StockTickerHTML = StockTickerHTML + "<span class='quote'>" + CompName + " (" + Symbol + ")</span> ";
                    
                    StockTickerHTML = StockTickerHTML + parseFloat(Price).toFixed(2) + " ";
                    StockTickerHTML = StockTickerHTML + "<span class='" + PriceIcon + "'></span>" + parseFloat(Math.abs(ChnageInPrice)).toFixed(2) + " (";
                    StockTickerHTML = StockTickerHTML + parseFloat( Math.abs(PercentChnageInPrice.split('%')[0])).toFixed(2) + "%)</span>";
                });
                
                $("#dvStockTicker").html(StockTickerHTML);
                $("#dvStockTicker").jStockTicker({interval: 30, speed: 2});
            });
        }
    </script>
</div>
</body>
</html>