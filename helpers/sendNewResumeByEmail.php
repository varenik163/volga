<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $message = '<strong>' . $_POST["resume_form_name"] . '</strong> отправил(а) резюме<br /><p>'
        . $_POST["resume_form_text"] . '</p>';
    $to = $_POST["email"]; //'varenik163tlt@gmail.com';
    $subject = 'Новое резюме';
    $subject = "=?utf-8?b?". base64_encode($subject) ."?=";

    $boundary = "---";
    $base64encoded = 'base64 encoded mail';
    $from = "admin@dsts.biz";
    $filename= "resume.jpg";

    /**
     * Headers
     */
    $headers = 'From: ' . 'DSTS.BIZ' . '<' . 'admin@dsts.biz' . '>' . "\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
    $body = "--$boundary\n";

    /**
     * Attaching main message
     */
    $body .= "Content-type: text/html; charset='utf-8'\n";
    $body .= "Content-Transfer-Encoding: quoted-printablenn";
    $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
    $body .= $message."\n";
    $body .= "--$boundary\n";


    $allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt");

    $files = array();
    foreach ($_FILES as $name => $file) {
        $file_name = $file['name'];
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
        if(!in_array($ext,$allowedExtensions)) {
            die("File $file_name has the extensions $ext which is not allowed");
        }
        array_push($files,$file);
    }

    for ($x=0; $x<count($files); $x++) {
        $file = fopen($files[$x]['tmp_name'],"rb");
        $data = fread($file,filesize($files[$x]['tmp_name']));
        fclose($file);
        // var_dump($data);
        $data = chunk_split(base64_encode($data));
        $name = $files[$x]['name'];

        $body .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
            "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";

        /**
         * Attaching file
         */

        /*$body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($name)."?=\n";
        $body .= "Content-Transfer-Encoding: quoted-printable\n\n";
        $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($name)."?=\n\n";
        $body .= $data."\n";*/
        $body .= "--".$boundary ."--\n";
    }

    if (mail($to, $subject, $body, $headers))
    { echo 'Спасибо за отклик на вакансию!<br />Мы рассмотрим Ваше резюме в ближайшее время.'; }
    else
    { echo "Письмо не ушло"; }

}
?>
