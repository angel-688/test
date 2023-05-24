<?php
$name = $_POST['user_name'];
$token = "5674676719:AAEKyLdE2JadnPQH5lyamYgo46OhJWOjR_4";
$chat_id = "-968208666";
$arr = array('Имя пользователя:' => $name);

$txt = '';
foreach ($arr as $key => $value) { 
	 $txt .= "<b>".$key."</b> ".$value."\n";
}

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text=($txt)","r");

if ($sendToTelegram) {
	 echo '<h1 class="success">Спасибо за отправку вашего сообщения!</h1>';
	 return true;
}
?>

