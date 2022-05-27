<?php
require 'php/PHPMailerAutoload.php';
$Nombre = $_POST['nombre'];
$Email = $_POST['email'];
$Telefono = $_POST['cell'];
$Mensaje = $_POST['mensaje'];

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.elvencedorca.com.ve';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'info@elvencedorca.com.ve';                 // SMTP username
$mail->Password = 'in2015123456';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'info@elvencedorca.com.ve';
$mail->FromName = 'El Vencedor C.A.';
/*$mail->addAddress($Email, $RazonSocial); */    // Add a recipient
/*$mail->addAddress('ventas@ascensoresvertigo.com', 'ascensoresvertigo.com');*/
/*$mail->addReplyTo('antogallardo.51@gmail.com', 'Antonio Gallardo');*/
// $mail->addAddress('info@elvencedorca.com.ve', 'Contacto WEB');
$mail->addAddress('info@elvencedorca.com.ve', 'Contacto WEB');
  // Optional name
$mail->isHTML(true);                                 // Set email format to HTML
$mail->Subject = 'Solicitud de '.strtoupper($Nombre).' en elvencedorca.com.ve';
$mail->Body    = '<style type="text/css">
                    a {color: #666;}
                    a:hover {color: #333;}
                    p {padding: 0; margin: 0;}
                    .body {width: 650px; background: #4D867B; margin: 0 auto;}
                    .ReadMsgBody {width: 100%;} .ExternalClass{width: 100%;} /* Centres the newsletter within Hotmail */
                    .copy{color:#222;}
                    .mensaje{text-transform: uppercase; margin-top: 20px;}
                  </style>
                  <body style="background: #4D867B; padding: 0; margin: 0;">

                    <!-- Compatibility with OutItGoes.com Header -->
                    <table style="margin:0 auto; background: #FFAF00; width: 100%">
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
                                            Solicitud de contacto desde <strong>www.elvencedorca.com.ve</strong>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Top Grey Bar End -->

                                 <!-- Featured Story -->
                                <table border="0" cellpadding="0" cellspacing="0" width="648" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em">
                                      <tr>
                                        <td style="padding: 20px 0 20px 20px">
                                           <img src="http://www.elvencedorca.com.ve/images/logo-solo.png" alt="Feature" />
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
                          <td class="copy">El Vencedor C.A. &copy; 2015 J-40388822-1</td>
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
      <title>El Vencedor</title>
      <meta charset="utf-8">
      <meta name="description" content="Nuestro gran compromiso es cumplir con todas las áreas, petrolera, eléctrica, industrial, metalúrgica, construcción, y donde se requiera la seguridad personal. Consolidándonos así como el líder del mercado en calzados e implementos de seguridad industrial en general.">
      <link rel="shortcut icon" href="images/favicon.ico">
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/producto.css">

      <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>

    <body id="home">
        <!-- nav -->
      <div class="navbar-fixed"> 
        <nav class="yellow accent-4">
          <div class="nav-wrapper container">
            <a href="#home" class="brand-logo left"><!-- <img src="images/logo/logo.png"> -->EL VENCEDOR</a>
            
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="#empresa">EMPRESA</a></li>
              <li><a href="producto.html">PRODUCTOS</a></li>
              <li><a href="#certificado">CERTIFICADO</a></li>
              <li><a href="#contacto">CONTACTO</a></li>
            </ul>
                <!-- mobile -->
              <ul id="slide-out" class="side-nav mobile">
                <li><a href="#empresa">EMPRESA</a></li>
                <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">PRODUCTOS<i class="fa fa-caret-down right"></i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li class="no-padding"><ul class="collapsible"><li>
                            <a class="collapsible-header">Protección de Manos<i class="fa fa-caret-down right"></i></a>
                            <div class="collapsible-body"><ul>
                              <li><a href="productos/proteccion-de-manos/garnaza-vaqueta.html">Guantes de Garnaza y Vaqueta</a></li>
                              <li><a href="productos/proteccion-de-manos/caucho-natural.html">Guantes de Caucho Natural</a></li>
                              <li><a href="productos/proteccion-de-manos/pvc.html">Guantes de P.V.C.</a></li>
                              <li><a href="productos/proteccion-de-manos/neopreno.html">Guantes de Neopreno</a></li>
                              <li><a href="productos/proteccion-de-manos/tejidos.html">Guantes de Tejidos</a></li>
                              <li><a href="productos/proteccion-de-manos/multiuso.html">Guantes de Multiuso</a></li>
                              <li><a href="productos/proteccion-de-manos.html">Todos</a></li>
                            </ul></div>
                          </li></ul></li>
                          <li class="no-padding"><ul class="collapsible"><li>
                            <a class="collapsible-header">Protección Ocular<i class="fa fa-caret-down right"></i></a>
                            <div class="collapsible-body"><ul>
                              <li><a href="productos/proteccion-ocular/seguridad.html">Lentes de Seguridad</a></li>
                              <li><a href="productos/proteccion-ocular.html">Todos</a></li>
                            </ul></div>
                          </li></ul></li>
                          <li class="no-padding"><ul class="collapsible"><li>
                            <a class="collapsible-header">Protección Facial<i class="fa fa-caret-down right"></i></a>
                            <div class="collapsible-body"><ul>
                              <li><a href="productos/proteccion-facial/soldadura.html">Protección para Soldadura</a></li>
                              <li><a href="productos/proteccion-facial.html">Todos</a></li>
                            </ul></div>
                          </li></ul></li>
                          <li class="no-padding"><ul class="collapsible"><li>
                            <a class="collapsible-header">Protección para la Cabeza<i class="fa fa-caret-down right"></i></a>
                            <div class="collapsible-body"><ul>
                              <li><a href="productos/proteccion-para-la-cabeza/gorra.html">Tipo Gorra</a></li>
                              <li><a href="productos/proteccion-para-la-cabeza.html">Todos</a></li>
                            </ul></div>
                          </li></ul></li>
                          <li class="no-padding"><ul class="collapsible"><li>
                            <a class="collapsible-header">Protección Respiratoria<i class="fa fa-caret-down right"></i></a>
                            <div class="collapsible-body"><ul>
                              <li><a href="productos/proteccion-respiratoria/desechables.html">Máscaras Desechables</a></li>
                              <li><a href="productos/proteccion-respiratoria/filtros.html">Máscaras Reusables de Filtros</a></li>
                              <li><a href="productos/proteccion-respiratoria.html">Todos</a></li>
                            </ul></div>
                          </li></ul></li>
                          <li><a href="productos/proteccion-corporal.html">Protección Corporal</a></li>
                          <li><a href="productos/proteccion-de-emergencias.html">Protección de Emergencias</a></li>
                          <li><a href="producto.html">Todos</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
                <li><a href="#certificado">CERTIFICADO</a></li>
                <li><a href="#contacto">CONTACTO</a></li>
              </ul>
              <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                <!-- mobile -->
          </div>
        </nav>
      </div> <!-- nav -->

        <!-- Enviado -->
    <?php if ($enviado == 0) { ?>
      <section id="enviado">
        <div class="top bottom">
          <div class="container">
            <div class="row">
              <div class="col s12 center">
                <div class="col s12 img-rem envio-check">
                  <i class="fa fa-check-square fa-5x"></i>
                </div>
                <div class="col s12">
                  <div class="b-grey envio">
                    <p><span class="black-text">Mensaje Enviado!
                    </span></p>
                    <p><span class="black-text">Pronto nos pondremos en contacto.
                    </span></p>
                  </div>
                  <a href="index.html#contacto" class="btn waves-effect waves-yellow grey darken-1 col offset-m5 m2 offset-s2 s8">
                  Volver
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        <!-- No-Enviado -->
    <?php } else { ?>
      <section id="no-enviado">
        <div class="top bottom">
          <div class="container">
            <div class="row">
              <div class="col s12 center">
                <div class="col s12 img-rem envio-check">
                  <i class="fa fa-check-square fa-5x"></i>
                </div>
                <div class="col s12">
                  <div class="b-grey envio">
                    <p><span class="black-text">Su mensaje no pudo ser enviado.
                    </span></p>
                  </div>
                  <a href="index.html#contacto" class="btn waves-effect waves-yellow grey darken-1 col offset-m5 m2 offset-s2 s8">
                  Volver
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php } ?>

      <a href="#0" class="cd-top waves-effect waves-yellow">Top</a>

        <!-- Footer -->
      <footer class="page-footer grey darken-4 envio-footer">
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col s12">
                <div class="col s12 m6 l6">
                  <p class="bottom">El Vencedor © 2015 J-40388822-1</p>
                </div>
                <div class="col s12 m6 l6">
                  <p class="grey-text text-lighten-4">Sitio Web Realizado por: <a target="_blank" class="grey-text" href="http://www.addsolucionescreativas.com" title="ADD Soluciones Creativas">addsolucionescreativas.com</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
        <!-- Fin Footer -->

      <!-- JavaScript -->
      <script type="text/javascript" src="js/libs/jquery.min.js"></script>
      <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
      <script type="text/javascript" src="js/velocity.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>
  </html>