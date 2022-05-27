<?php
require 'php/PHPMailerAutoload.php';
$Nombre = $_POST['name'];
$Email = $_POST['email'];
$Telefono = $_POST['cell'];
$Mensaje = $_POST['messaje'];

// $header .= "charset=iso-8859-1 \r\n";

$mail = new PHPMailer;

$mail->isSMTP();                                     // Set mailer to use SMTP
$mail->CharSet = 'UTF-8';
$mail->Host = 'mail.mayfrey.com.ve';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'info@mayfrey.com.ve';                 // SMTP username
$mail->Password = 'webend4242';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'info@mayfrey.com.ve';
$mail->FromName = 'Mayfrey C.A.';
/*$mail->addAddress($Email, $RazonSocial); */    // Add a recipient
$mail->addAddress('info@mayfrey.com.ve', 'Contacto WEB');
$mail->addReplyTo('yorbiochoa@mayfrey.com.ve', 'Contacto Web');
$mail->addReplyTo('karldosramos@mayfrey.com.ve', 'Contacto Web');
  // Optional name
$mail->isHTML(true);                                 // Set email format to HTML
$mail->Subject = 'Solicitud de '.strtoupper($Nombre).' en mayfrey.com.ve';
$mail->Body    = '<style type="text/css">
                    a {color: #666;}
                    a:hover {color: #333;}
                    p {padding: 0; margin: 0;}
                    .body {width: 650px; background: #4D867B; margin: 0 auto;}
                    .ReadMsgBody {width: 100%;} .ExternalClass{width: 100%;} /* Centres the newsletter within Hotmail */
                    .copy{color:#fff;}
                    .mensaje{text-transform: uppercase; margin-top: 20px;}
                  </style>
                  <body style="background: #4D867B; padding: 0; margin: 0;">

                    <!-- Compatibility with OutItGoes.com Header -->
                    <table style="margin:0 auto; background: #222; width: 100%">
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
                              <table border="0" cellpadding="0" cellspacing="0" width="648" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; border-top: 1px solid #fff; background: #f0f0f0">
                                  <tr>
                                        <td style="text-shadow: 1px 1px 1px #fff; padding: 10px;">
                                            Solicitud de contacto desde <strong>www.mayfrey.com.ve</strong>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Top Grey Bar End -->

                                 <!-- Featured Story -->
                                <table border="0" cellpadding="0" cellspacing="0" width="648" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em">
                                      <tr>
                                        <td style="padding: 20px 0 20px 20px">
                                           <img src="http://www.mayfrey.com.ve/images/favicon1.png" alt="Feature" />
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
                          <td class="copy">MayFrey C.A. &copy; 2016 J-29989382-0</td>
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
    <meta charset="utf-8">
    <title>MayFrey</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!--Favicon -->
    <link rel="icon" type="image/png" href="images/favicon1.png">
  <!-- CSS Files -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/responsive.css">
  <!-- End CSS Files -->
</head>
<body id="envio">
  <!-- Page Loader -->
  <section id="pageloader">
    <div class="loader-item fa fa-spin colored-border"></div>
  </section>

  <!-- Home Section -->
  <section id="home" class="main"> 
    <ul class="cd-slider">
      <li class="visible">  
        <div id="slides" class="home-video transparent pattern-black">
<?php if ($enviado == 0) { ?>
          <div class="home-details">
            <!-- Your Logo -->
            <section id="contact" class="section tacto enviado">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 center">
                              <div class="col-md-12 envio-check">
                                <i class="fa fa-check-square fa-5x"></i>
                              </div>
                              <div class="col-md-12">
                                <div class="margin20">
                                  <p><span>¡Mensaje Enviado!</span></p>
                                  <p><span>Pronto nos pondremos en contacto.</span></p>
                                </div>
                              </div>
                            </div>
                        </div>
                </div>
              </section> <!-- End Mensaje Enviado  -->
            <!-- Bottom Arrow -->
            <a href="index.html" class="home-button scroll uppercase semibold">
              Volver
            </a>
          </div><!-- End Home Texts -->
<?php } else { ?>
          <div class="home-details">
            <!-- Your Logo -->
            <section id="contact" class="section tacto no-enviado">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 center">
                              <div class="col-md-12 envio-check">
                                <i class="fa fa-check-square fa-5x"></i>
                              </div>
                              <div class="col-md-12">
                                <div class="margin20">
                                  <p><span>Su mensaje no pudo ser enviado.</span></p>
                                  <p><span>Por favor, intente nuevamente.</span></p>
                                </div>
                              </div>
                            </div>
                        </div>
                </div>
              </section>
            <!-- Bottom Arrow -->
            <a href="index.html" class="home-button scroll uppercase semibold">
              Volver
            </a>
          </div><!-- End Home Texts -->
<?php } ?>
        </div><!-- End Home Details -->
      </li>
    </ul>
  </section><!-- End Home Section -->

  <!-- JS Files -->
  <script type="text/javascript" src="js/modernizr.js"></script>
  <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.appear.js"></script>
  <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
  <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
  <script type="text/javascript" src="js/jquery.superslides.js"></script>
  <script type="text/javascript" src="js/jquery.flexslider.js"></script>
  <!--<script type="text/javascript" src="js/jquery.mb.YTPlayer.js"></script>-->
  <script type="text/javascript" src="js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="js/snap.svg-min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/jquery.form.min.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/page_contact_advanced.js"></script>
   <!-- End JS Files -->
</body>
</html>