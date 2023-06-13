<?php
$content = '';
foreach ($_POST as $key => $value) {
	if($value){
		$content .= "<b>$key</b>: <i>$value</i>\n";
	}
}
if(trim($content)){
	$content = "<b>Message from Site:</b>\n".$content;
	$apiToken = "6176426089:AAE_61c0QuYbW7PkgL2ctET-EaWwJmovqdE";
	$data =[
		'chat_id' => '@someTest',
		'text' => $content,
		'parse_mode' => 'HTML'
	];
	$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data));
}
?>