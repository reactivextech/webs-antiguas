<?php
require 'php/PHPMailerAutoload.php';
$Nombre = $_POST['name'];
$Email = $_POST['email'];
$Telefono = $_POST['phone'];
$Mensaje = $_POST['comment'];

// $header .= "charset=iso-8859-1 \r\n";

$mail = new PHPMailer;

$mail->isSMTP();                                     // Set mailer to use SMTP
$mail->CharSet = 'UTF-8';
$mail->Host = 'mail.diocesisdematurin.org.ve';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'info@diocesisdematurin.org.ve';                 // SMTP username
$mail->Password = 'dioce2016maturin';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'info@diocesisdematurin.org.ve';
$mail->FromName = 'Diócesis de Maturín';
/*$mail->addAddress($Email, $RazonSocial); */    // Add a recipient
$mail->addAddress('info@diocesisdematurin.org.ve', 'Contacto WEB');
// $mail->addReplyTo('prueba@dicesisdematurin.org.ve', 'Contacto Web');
// $mail->addReplyTo('prueba@dicesisdematurin.org.ve', 'Contacto Web');
  // Optional name
$mail->isHTML(true);                                 // Set email format to HTML
$mail->Subject = 'Solicitud de '.strtoupper($Nombre).' en diocesisdematurin.org.ve';
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
                    <table style="margin:0 auto; background: #4895D9; width: 100%">
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
                                            Solicitud de contacto desde <strong>www.diocesisdematurin.org.ve</strong>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Top Grey Bar End -->

                                 <!-- Featured Story -->
                                <table border="0" cellpadding="0" cellspacing="0" width="648" style="font-family: Arial, Helvetica, sans-serif; color: #666; font-size: 13px; line-height: 1.6em">
                                      <tr>
                                        <td style="padding: 20px 0 20px 20px">
                                           <img src="http://www.diocesisdematurin.org.ve/img/logo-dark.png" alt="Feature" />
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
                          <td class="copy">Diócesis de Maturín</td>
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