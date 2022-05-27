<?php
require 'php/PHPMailerAutoload.php';
$Nombre = $_POST['name'];
$Email = $_POST['email'];
$Telefono = $_POST['phone'];
$Mensaje = $_POST['message'];

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->CharSet = 'UTF-8';
$mail->Host = 'mail.gabrielacaputo.com.ve';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'info@gabrielacaputo.com.ve';                 // SMTP username
$mail->Password = 'Moda.049010';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'info@gabrielacaputo.com.ve';
$mail->FromName = 'Gabriela Caputo Diseño C.A.';
/*$mail->addAddress($Email, $RazonSocial); */    // Add a recipient
/*$mail->addAddress('ventas@ascensoresvertigo.com', 'ascensoresvertigo.com');*/
/*$mail->addReplyTo('antogallardo.51@gmail.com', 'Antonio Gallardo');*/
// $mail->addAddress('info@elvencedorca.com.ve', 'Contacto WEB');
$mail->addAddress('info@gabrielacaputo.com.ve', 'Contacto WEB');
  // Optional name
$mail->isHTML(true);                                 // Set email format to HTML
$mail->Subject = 'Solicitud de '.strtoupper($Nombre).' en gabrielacaputo.com.ve';
$mail->Body    = '<style type="text/css">
                    a {color: #666;}
                    a:hover {color: #333;}
                    p {padding: 0; margin: 0;}
                    .body {width: 650px; background: #4D867B; margin: 0 auto;}
                    .ReadMsgBody {width: 100%;} .ExternalClass{width: 100%;} /* Centres the newsletter within Hotmail */
                    .copy{color:#222;}
                    .mensaje{margin-top: 20px;}
                  </style>
                  <body style="background: #222; padding: 0; margin: 0;">

                    <!-- Compatibility with OutItGoes.com Header -->
                    <table style="margin:0 auto; background: #FBF9EC; width: 100%">
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
                                            Solicitud de contacto desde <strong>www.gabrielacaputo.com.ve</strong>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Top Grey Bar End -->

                                 <!-- Featured Story -->
                                <table border="0" cellpadding="0" cellspacing="0" width="648" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em">
                                      <tr>
                                        <td style="padding: 20px 0 20px 20px">
                                           <img src="http://www.gabrielacaputo.com.ve/images/logo.png" alt="Feature" />
                                        </td>
                                        <td style="padding: 20px">
                                          <span style="color: #222; font-size: 27px; font-weight: 700; letter-spacing: -1px">Solicitud de '.strtoupper($Nombre).'</span><br />
                                          <p class="mensaje">

                                            Telefono: <strong>'.$Telefono.'</strong><br />
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
                    <table width="650" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #666; padding: 10px;" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em">
                      <tr>
                          <td class="copy">Gabriela Caputo Diseño C.A. &copy; 2015 J-29399619-8</td>
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
      <title>Gabriela Caputo</title>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="images/icon/favicon.png">
      <!-- CSS Global -->
      <!-- <link href='http://fonts.googleapis.com/css?family=Lato:400,700|Kaushan+Script|Montserrat' rel='stylesheet' type='text/css'> -->
      <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="plugins/skyforms/css/sky-forms.css">
      <!-- Menu -->
      <link rel="stylesheet" href="css/menu1.css">
      <!-- CSS -->
      <link rel="stylesheet" href="css/style.css">
  </head> 

  <body id="home" class="envio">
      <!--=== Header ===-->    
      <div class="header">
          <div class="container">
              <!-- Logo -->
              <a class="logo" href="index.html">
                  <img src="images/logo.png" alt="Logo">
              </a><!-- End Logo -->
              <!-- mobile display -->
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="fa fa-bars"></span>
              </button><!-- End Toggle -->
          </div><!--/end container-->
          <!-- Collect the nav -->
          <div class="collapse navbar-collapse navbar-responsive-collapse">
              <div class="container">
                  <ul class="nav navbar-nav">
                      <li><a href="accesorio.html">ACCESORIOS</a></li>
                      <li><a href="tiara.html">TIARAS</a></li>
                      <li><a href="complemento.html">COMPLEMENTOS</a></li>
                      <li><a href="bio.html">BIO</a></li>
                      <li class="active"><a href="contacto.html">CONTACTO</a></li>
                  </ul>
              </div> <!--/end container-->
          </div> <!--/navbar-collapse-->
      </div> <!--=== End Header ===-->
<?php if ($enviado == 0) { ?>
      <!--=== Enviado ===-->
      <section id="enviado" class="margin50">
          <div>
            <div class="container">
              <div class="row">
                <div class="col s12 center">
                  <div class="col s12 img-rem envio-check">
                    <i class="fa fa-check-square fa-5x"></i>
                  </div>
                  <div class="col s12">
                    <div class="margin20">
                      <p><span class="black-text">Mensaje Enviado!
                      </span></p>
                      <p><span class="black-text">Pronto nos pondremos en contacto.
                      </span></p>
                    </div>
                    <a href="contacto.html" class="btn col-md-4 col-md-offset-4">
                    Volver
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
      <!--=== Fin Enviado ===-->
<?php } else { ?>
      <!--=== No-Enviado ===-->
      <section id="no-enviado" class="margin50">
          <div>
            <div class="container">
              <div class="row">
                <div class="col s12 center">
                  <div class="col s12 img-rem envio-check">
                    <i class="fa fa-check-square fa-5x"></i>
                  </div>
                  <div class="col s12">
                    <div class="margin20">
                      <p><span class="black-text">Su mensaje no pudo ser enviado.
                      </span></p>
                      <p><span class="black-text">Por favor, intente nuevamente.
                      </span></p>
                    </div>
                    <a href="contacto.html" class="btn col-md-4 col-md-offset-4">
                    Volver
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
      <!--=== Fin No-Enviado ===-->
<?php } ?>
      <!--=== Footer ===-->
      <div class="footer-v1">
          <!-- <div class="footer">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <ul class="pull-left breadcrumb">
                              <li><a href="index.html">Inicio</a></li>
                              <li><a href="accesorio.html">Accesorios</a></li>
                              <li><a href="tiara.html">Tiaras</a></li>
                              <li><a href="complemento.html">Complementos</a></li>
                              <li><a href="bio.html">Biografía</a></li>
                              <li class="active">Contacto</li>
                          </ul>
                      </div>
                  </div>
              </div> 
          </div> --> <!--/footer-->

          <div class="copyright">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8">                     
                          <p> Rif J-29399619-8 &copy; Gabriela Caputo Diseño C.A. Todos los derechos reservados. | Diseñado por <a href="http://www.addsolucionescreativas.com" title="ADD Soluciones Creativas">addsolucionescreativas.com</a></p>
                      </div>
                      <div class="col-md-4"> <!-- Social Links -->
                          <ul class="footer-socials list-inline">
                              <li>
                                  <a href="https://www.facebook.com/maria.g.scazzi" target="_blank" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                      <i class="fa fa-facebook"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="https://twitter.com/caputogabriela" target="_blank" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                      <i class="fa fa-twitter"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="https://www.instagram.com/gabriela_caputo/" target="_blank" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                                      <i class="fa fa-instagram"></i>
                                  </a>
                              </li>
                          </ul>
                      </div><!-- Fin Social Links -->
                  </div>
              </div> 
          </div><!--/copyright-->
      </div><!--=== Fin Footer ===-->
  <!-- JS Global -->
  <script type="text/javascript" src="plugins/modernizr/modernizr.js"></script>
  <script type="text/javascript" src="plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="plugins/jquery/jquery-migrate.min.js"></script>
  <script type="text/javascript" src="plugins/jquery/jquery.mobile.min.js"></script>
  <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="plugins/masonry/jquery.masonry.min.js"></script>
  <script type="text/javascript" src="plugins/back-to-top.js"></script>
  <script type="text/javascript" src="plugins/skyforms/js/jquery.form.min.js"></script>
  <script type="text/javascript" src="plugins/skyforms/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/page_contact_advanced.js"></script>
  <!-- JS -->
  <script type="text/javascript" src="js/main.js"></script>
  </body>
  </html>