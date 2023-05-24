<?php
$name = $_POST['user_name'];
/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

/*собираем сообщение*/
function orderSendTelegram($message) {

    /*токен который выдаётся при регистрации бота */
    $token = "5674676719:AAEKyLdE2JadnPQH5lyamYgo46OhJWOjR_4";
    /*идентификатор группы*/
    $chat_id = "-968208666";

    /*делаем запрос*/
    parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");

}
$textMessage .= '<b> User name: </b>'.$name.'/n';
$textMessage .= urldecode($textMessage);
orderSendTelegram($textMessage);
?>