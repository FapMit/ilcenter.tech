<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$formNum = $_POST['formNum'];
$from = $_POST['from'];
$textAbout = $_POST['textAbout'];
$nameILC = $_POST['user-nameILC'];
$phoneILC = $_POST['user-phoneILC'];
$emailILC = $_POST['user-emailILC'];
$name = $_POST['user-name'];
$phone = $_POST['user-phone'];
$time = $_POST['user-time'];
$message = $_POST['messages'];
$radio = $_POST['when-to-call'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'info@ilcenter.tech'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Hhgj5567fd4ErW2'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('info@ilcenter.tech'); // от кого будет уходить письмо?
$mail->addAddress('info@ilcenter.tech');     // Кому будет уходить письмо
$mail->addAddress('marketing@ilcenter.tech');               // Name is optional
$mail->addAddress('sait@ilcenter.tech');
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта ILC';
if($formNum == 0){
    $mail->Body    = 'Пользователь оставил заявку<br> <b>Тема заявки: ' .$from. '</b><br>Имя пользователя:  ' .$nameILC. '<br>Номер телефона: ' .$phoneILC. '<br>Почта: ' .$emailILC;

}else if($formNum == 3){
    $mail->Body    = 'Пользователь оставил заявку<br> <b>Тема заявки: ' .$from. '</b><br>Имя пользователя:  ' .$name. '<br>Номер телефона: ' .$phone. '<br>Комментарий: ' .$message;
}else if($formNum == 4){
    if($radio == 1){
        $mail->Body    = 'Пользователь оставил заявку<br> <b>Тема заявки: ' .$from. '</b><br>Имя пользователя:  ' .$name. '<br>Номер телефона: ' .$phone. '<br><b>Пользователь выбрал категорию:</b>  ' .$textAbout. '<br><b>Позвонить сейчас</b>';
    } else{
        $mail->Body    = 'Пользователь оставил заявку<br> <b>Тема заявки: ' .$from. '</b><br>Имя пользователя:  ' .$name. '<br>Номер телефона: ' .$phone. '<br><b>Пользователь выбрал категорию:</b>  ' .$textAbout. '<br><b>Позвонить в:</b> ' .$time;

    }
}
else{
    if($radio == 1){
        $mail->Body    = 'Пользователь оставил заявку<br> <b>Тема заявки: ' .$from. '</b><br>Имя пользователя:  ' .$name. '<br>Номер телефона: ' .$phone. '<br><b>Позвонить сейчас</b> ';
    }
    else{
        $mail->Body    = 'Пользователь оставил заявку<br> <b>Тема заявки: ' .$from. '</b><br>Имя пользователя:  ' .$name. '<br>Номер телефона: ' .$phone. '<br><b>Позвонить в:</b> ' .$time;

    }

}
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {

    header('location: index.html');
}
?>
