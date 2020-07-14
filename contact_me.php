<?php

    // Dados recebidos do formulário
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $phone1 = $_POST['phone1'];
    $subject = $_POST['subject'];
    $mensagem = $_POST['message'];
    
    // inclusão da framework no código
    require_once '../lib/swift_required.php';
    
    // definir a autenticação via SMTP
    // mail.dominios.pt -> deverá trocar pelo endereço de e-mail do seu domínio
    // webmaster@dominio.tld -> deverá trocar pelo seu endereço de e-mail
    // password_caixa_email -> deverá preencher com a password da respectiva caixa
    $transport = Swift_SmtpTransport::newInstance('mail.24cork.com', 25)
    ->setUsername('info@24cork.com')
    ->setPassword('*****')
    ;
    $mailer = Swift_Mailer::newInstance($transport);
     
     // Corpo da mensagem
        $body = "Nome: ".$nome;
        $body.= "\n";
        $body.= "Número: ".$phone1;
        $body.= "\n\nMensagem: ";
        $body.= nl2br($mensagem);
     
    // Criar o cabeçalho, assim como a mensagem
    $message = Swift_Message::newInstance($subject)
    ->setFrom(array($email => $email))
    ->setTo(array('info@24cork.com'))
    ->setBody($body)
    ;
    // Efectuar o envio
    $result = $mailer->send($message);

?>
