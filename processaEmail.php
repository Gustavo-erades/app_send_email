<?php 
    include_once("Mensagem.php");
    include_once("./libs/PHPMailer/Exception.php");
    include_once("./libs/PHPMailer/OAuth.php");
    include_once("./libs/PHPMailer/PHPMailer.php");
    include_once("./libs/PHPMailer/POP3.php");
    include_once("./libs/PHPMailer/SMTP.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mensagem= new Mensagem();
    $mensagem->__set('para',$_POST["para"]);
    $mensagem->__set('assunto',$_POST["assunto"]);
    $mensagem->__set('mensagem',$_POST["mensagem"]);
    
    if(!$mensagem->mensagemValida()){
        header("Location:index.php?erro=1");
    }

    $status=array('statusOperacao'=>null,'statusDescricao'=>null);


    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'eradesvilarinho@gmail.com';                     //SMTP username
        $mail->Password   = 'mfud weaw simj himz';                               //SMTP password
        $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('eradesvilarinho@gmail.com', 'Remetente');
        $mail->addAddress($mensagem->__get('para'), 'Destinatario');     //Add a recipient   //Name is optional
        /*
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        */
        //Attachments
        /*
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        */

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = 'Para o acesso total ao texto dessa mensagem, precisa-se de um Client  com suporte para tags HTML.';

        $mail->send();
        $status['statusOperacao']="Sucesso!";
        $status['statusDescricao']="E-mail enviado com sucesso!";
    } catch (Exception $e) {
        $status['statusOperacao']="Erro!";
        $status['statusDescricao']="A mensagem não pode ser enviada. Detalhes do erro: {$mail->ErrorInfo}";
    }
?>
<html>
    <head>
        <meta charset="utf-8" />
    	<title>App Mail Send</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <?php  if($status['statusOperacao']=='Sucesso!'){
                    ?>
                    <h3 class="display-4 text-success">
                        <?=$status['statusOperacao']?>
                    </h3>
                    <p>
                        <?=$status['statusDescricao']?>
                    </p>
                    <a href="index.php" class="btn btn-success btn-lg">Voltar</a>
                    <?php } else{?>  
                    <h3 class="display-4 text-danger">
                        <?=$status['statusOperacao']?>
                    </h3>
                    <p>
                        <?=$status['statusDescricao']?>
                    </p>
                    <a href="index.php" class="btn btn-danger btn-lg">Voltar</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </body>
</html>