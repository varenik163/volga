<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST["id_form"] == 'order_call' ){
        $message = 'Заказ подписки: <strong>' . $_POST["name"] . '</strong><br />' . $_POST["phone"]
        .  '<br />' .  $_POST["mail"];
    }
    $to = $_POST["email"]; //'Ma3oBblu@gmail.com';
    $subject = 'Заказ подписки:';
    $subject = "=?utf-8?b?". base64_encode($subject) ."?=";
    // Для отправки HTML-письма должен быть установлен заголовок Content-type
    $headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= 'From: ' . 'no-reply' . '<' . 'admin@dsts.biz' . '>' . "\r\n";
    if (mail($to, $subject, $message, $headers))
    {echo 'Спасибо, уважаемый Клиент!<br />Мы Вам перезвоним.<br />Ожидайте, пожалуйста, звонка';}
    else
    {echo "Письмо не ушло";}
}
?>
