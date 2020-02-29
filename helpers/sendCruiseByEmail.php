<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $message = '<strong>' . $_POST["resume_form_name"] . '</strong> оставил(а) заявку.<br />'
        .'<p>город: ' .  $_POST["resume_form_city"] . '</p>'
        .'<p>количество человек: ' .  $_POST["resume_form_peopleCount"] . '</p>'
        .'<p>период отдыха: ' .  $_POST["resume_form_period"] . '</p>'
        .'<p>бюджет: ' .  $_POST["resume_form_sum"] . '</p>'
        .'<p>уровень теплохода: ' .  $_POST["resume_form_level"] . '</p>'
        .'<p>другие пожелания: ' .  $_POST["resume_form_other"] . '</p>'
        .'<p>Email: ' .  $_POST["mail"] . '</p>'
        .'<p>Телефон: ' .  $_POST["phone"] . '</p>';
    $to = $_POST["email"]; //'Ma3oBblu@gmail.com';
    $subject = 'Новая заявка';
    $subject = "=?utf-8?b?". base64_encode($subject) ."?=";
    // Для отправки HTML-письма должен быть установлен заголовок Content-type
    $headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= 'From: ' . 'no-reply' . '<' . 'admin@dsts.biz' . '>' . "\r\n";
    if (mail($to, $subject, $message, $headers))
    {echo 'Спасибо, уважаемый Клиент!';}
    else
    {echo "Письмо не ушло";}
}
?>
