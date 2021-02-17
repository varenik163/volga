<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $message = '<strong>' . $_POST["person_name"] . '</strong> оставил(а) новый отзыв.<br /><p>'
        . $_POST["review_text"]
        .'</p>'
        .'<p>Email: ' .  $_POST["review_email"] . '</p>'
        .'<p>Организация: ' .  $_POST["review_company"] . '</p>';
    $to = $_POST["email"];
    $subject = 'Новый отзыв';
    $subject = "=?utf-8?b?". base64_encode($subject) ."?=";
    // Для отправки HTML-письма должен быть установлен заголовок Content-type
    $headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= 'From: ' . 'no-reply' . '<' . 'admin@volga.biz' . '>' . "\r\n";
    if (mail($to, $subject, $message, $headers))
    {echo 'Спасибо, уважаемый Клиент!<br />Ваше мнение очень важно для нас.';}
    else
    {echo "Письмо не ушло";}
}
?>
