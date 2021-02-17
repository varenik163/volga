<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST["id_form"] == 'order_call_page_help' ){
        $message = 'Заказ звонка на номер: <strong>' . $_POST["phone"] . '</strong><br />' ;
    }
    $to = $_POST["email"];
    $subject = 'Заявка на звонок';
    $subject = "=?utf-8?b?". base64_encode($subject) ."?=";
    // Для отправки HTML-письма должен быть установлен заголовок Content-type
    $headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= 'From: ' . 'no-reply' . '<' . 'admin@volga.biz' . '>' . "\r\n";
    if (mail($to, $subject, $message, $headers))
    {echo 'Спасибо, уважаемый Клиент!<br />Мы Вам перезвоним.<br />Ожидайте, пожалуйста, звонка';}
    else
    {echo "Письмо не ушло";}
}
?>
