<?php
error_reporting(E_ALL ^ E_NOTICE);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require(get_template_directory() . '/phpmailer/src/Exception.php');
require(get_template_directory() . '/phpmailer/src/PHPMailer.php');
require(get_template_directory() . '/phpmailer/src/SMTP.php');

date_default_timezone_set('America/Sao_Paulo');

$fields = [];
$cookies_field = [];

$ads = (isset($_COOKIE["_ao5_track_mensagem"])) ? $_COOKIE["_ao5_track_mensagem"] : '';

$fields['Nome']             = (isset($_POST['nome'])) ? $_POST['nome'] : '' ;
$fields["Email"]            = (isset($_POST['email'])) ? $_POST['email'] : '' ;
$fields["Telefone"]            = (isset($_POST['telefone'])) ? $_POST['telefone'] : '' ;

$fields["Mensagem"]         = (isset($_POST['mensagem'])) ? $_POST['mensagem'] : '' ;
$fields["Pagina"]           = (isset($_POST['pagina'])) ? $_POST['pagina'] : '' ;

$fields['url'] 	            = (isset($_POST["url"])) ? $_POST["url"] : "Sem url";

$anexo                      = (isset($_FILES["anexo"])) ? $_FILES["anexo"] : false ;
$assunto                    = (isset($_POST['assunto'])) ? $_POST['assunto'] : "[Bix Construção] - Site" ;
$time                       = function_exists('microtime') ? microtime(true) : time();
$time                       = number_format($time, 4, '.', '');
$data                       = date('d/m/Y');

//captura cookie
$cookies_field['Rede'] 	            = (isset($_COOKIE["_ao5_track_rede_(ads)"])) ? $_COOKIE["_ao5_track_rede_(ads)"]  : '';
$cookies_field['Palavra chave'] 	= (isset($_COOKIE["_ao5_track_palavra_(ads)"])) ? $_COOKIE["_ao5_track_palavra_(ads)"]  : '';
$cookies_field['Dampanha'] 			= (isset($_COOKIE["_ao5_track_campanha_(ads)"])) ? $_COOKIE["_ao5_track_campanha_(ads)"] : '';
$cookies_field['Danal'] 			= (isset($_COOKIE["_ao5_track_canal_(ads)"])) ? $_COOKIE["_ao5_track_canal_(ads)"] : '';
$cookies_field['Dosicao'] 			= (isset($_COOKIE["_ao5_track_posicao_(ads))"])) ? $_COOKIE["_ao5_track_posicao_(ads))"] : '';
$cookies_field['Docalizacao'] 		= (isset($_COOKIE["_ao5_track_localizacao_(ads)"])) ? $_COOKIE["_ao5_track_localizacao_(ads)"] : '';
$cookies_field['Device'] 			= (isset($_COOKIE["_ao5_track_dispositivo_(ads)"])) ? $_COOKIE["_ao5_track_dispositivo_(ads)"] : '';

$cookies_field['Origem'] 			= (isset($_COOKIE["_ao5_track_origem"])) ? $_COOKIE["_ao5_track_origem"]  : '';
$cookies_field['Midia'] 			= (isset($_COOKIE["_ao5_track_midia"])) ? $_COOKIE["_ao5_track_midia"]  : '';
$cookies_field['Campanha'] 			= (isset($_COOKIE["_ao5_track_campanha"])) ? $_COOKIE["_ao5_track_campanha"]  : '';
$cookies_field['Conteudo'] 			= (isset($_COOKIE["_ao5_track_conteudo"])) ? $_COOKIE["_ao5_track_conteudo"]  : '';
$cookies_field['Termo'] 			= (isset($_COOKIE["_ao5_track_termo"])) ? $_COOKIE["_ao5_track_termo"]  : '';
$cookies_field['local'] 			= (isset($_COOKIE["_ao5_track_local"])) ? $_COOKIE["_ao5_track_local"]  : '';
$cookies_field['Dispositivo'] 		= (isset($_COOKIE["_ao5_track_dispositivo"])) ? $_COOKIE["_ao5_track_dispositivo"]  : '';

$siglaDispositivo = $cookies_field['Dispositivo'];

if($siglaDispositivo == "C" || $siglaDispositivo == "c"){
    $cookies_field['Dispositivo'] = "Computador";
}else if($siglaDispositivo == "M" || $siglaDispositivo == "m"){
    $cookies_field['Dispositivo'] = "Mobile";
}else if($siglaDispositivo == "T" || $siglaDispositivo == "t"){
    $cookies_field['Dispositivo'] = "Tablet";
}else{
    $cookies_field['Dispositivo'] = "";
}

if (!empty($fields['Nome']) && !empty($fields["Email"])) :

    $mensagemenvia = '
    <table width="553" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#fff" bordercolor="#bcbcbc">
            <tr>
                <td align="left" valign="top" style="padding: 25px">
                    <table width="490" border="0" align="center" cellpadding="0" cellspacing="0">
                        ';
        foreach ($fields as $name => $value) {
            if(!empty($value)){
                $mensagemenvia .= "
                    <tr>
                        <td align='left' valign='top'><font face='Verdana, Geneva, sans-serif' color='#333333' style='font-size:17px'>
                                <strong style='color:#666'>$name: </strong>$value<br /><br />
                        </td>
                    </tr>";
            }
        }
        $mensagemenvia .= '
                <tr>
                    <td align="left" valign="top"><font face="Verdana, Geneva, sans-serif" color="#333333" style="font-size:17px"><strong style="color:#666">Ads:</strong><br />
                    </td>
                </tr>';
        foreach ($cookies_field as $name => $value) {
            if(!empty($value)){
                $mensagemenvia .= "
                    <tr>
                        <td align='left' valign='top'><font face='Verdana, Geneva, sans-serif' color='#333333' style='font-size:17px'>
                                <strong style='color:#666'>$name: </strong>$value<br /><br />
                        </td>
                    </tr>";
            }
        }
        $mensagemenvia .= '
                </table>
            </td>
        </tr>
    </table>';
    
    // require 'phpmailer-old/PHPMailerAutoload.php';
    try{
        $mail = new PHPMailer(true);

        $mail->addAddress( "contato@email.com.br", "Nome_empresa - Site"); 
        
        $mail->AddBCC("atendimento@ao5.com.br", "Nome_empresa - Site");
        // $mail->AddBCC("anderson@ao5.com.br", "Nome_empresa - Site");

        
        // $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->CharSet      = 'UTF-8';                       
        $mail->Port         = 587;
        $mail->Host         = 'email-ssl.com.br';             
        $mail->SMTPAuth     = true;                         
        $mail->Username     = 'contato@email.com.br';
        $mail->Password     = 'Password'; 
        $mail->SMTPSecure   = 'tls';

        $mail->setFrom('contato@email.com.br', 'Nome_empresa - Contato do Site');
        $mail->isHTML(true);

        $mail->Subject = $assunto;

        $mail->Body    = $mensagemenvia;

        if(!empty($anexo['name'][0])) {
            $mail->AddAttachment($anexo['tmp_name'][0], $anexo['name'][0]);
        }

        if($fields['Nome'] != '' and $_POST["yts-hiddencaptcha"] != ''){
            $mail->send();
            $verificaEnvio = 1;
            // require_once(get_template_directory()  . '/includes/grava-db.php');
            require_once(get_template_directory()  . '/includes/database-form.php');
            // echo "eviado";
        }else {
            $verificaEnvio = 0;
            // echo "nao eviado";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

endif;
?>