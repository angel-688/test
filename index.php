<?php
if (isset($_POST['user_name'])) {
	$name = $_POST['user_name'];
	$token = "5674676719:AAEKyLdE2JadnPQH5lyamYgo46OhJWOjR_4";
	$chat_id = "-968208666";
	$arr = array('Имя пользователя:' => $name);

	$txt = '';
	foreach ($arr as $key => $value) { 
		$txt .= "<b>".$key."</b> ".$value."\n";
	}

	$telegramUrl = "https://api.telegram.org/bot{$token}/sendMessage";
	$data = array(
		'chat_id' => $chat_id,
		'parse_mode' => 'html',
		'text' => $txt
	);

	$options = array(
		'http' => array(
			'method' => 'POST',
			'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
			'content' => http_build_query($data)
		)
	);

	$context = stream_context_create($options);
	$result = file_get_contents($telegramUrl, false, $context);

	if ($result !== false) {
		echo '<h1 class="success">Спасибо за отправку вашего сообщения!</h1>';
		return true;
	} else {
		echo '<h1 class="error">Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.</h1>';
		// Здесь можно также записать информацию об ошибке в журнал или отправить уведомление администратору.
	}
}
?>

