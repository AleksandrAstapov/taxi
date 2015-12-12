<?php

$server = filter_input(INPUT_SERVER,'SERVER_NAME');
$port = filter_input(INPUT_SERVER,'SERVER_PORT');
$name = 'Александр';
$to  = 'aleksandrastapov87@gmail.com';
$subject = 'Подтверждение регистрации';
$message = "<html>"
    . "<head>"
    . "<title>Подтверждение регистрации</title>"
    . "</head>"
    . "<body>"
    . "<p>Здравствуйте</p>"
    . "<p>Этот почтовый адрес был указан при регистрации на сайте $server</p>"
    . "<p>Для подтверждения регистрации перейдите по ссылке ниже. Если вы получили письмо по ошибке, проигнорируйте его.</p>"
    . "<p><a href=\"http://$server:$port/index.php?"
            . "action=confirm&"
            . "user=Aleksandr&"
            . "key=" . md5('zxcvbnm')
            . "\">Подтверждение регистрации</a></p>"
    . "</body>"
    . "</html>"; 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= "To: $name <$to>" . "\r\n";

echo $message;


if (mail($to, $subject, $message, $headers)){
  echo 'Письмо было отправлено';
} else {
  echo 'Что-то пошло не так';
}