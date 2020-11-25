<?php


$body = file_get_contents('php://input'); 
$arr = json_decode($body, true); 

$fp = fopen("test.txt", "w+");

fwrite($fp, $body);
 
include_once ('telegramgclass.php');   

$tg = new tg('1374822182:AAEyF-wQYLN6Q61U2DSMT1LaiiRSNijeoPc');

$chat_id = $arr['message']['chat']['id'];
$userTgId = $arr['message']['from']['id'];
$text = $arr['message']['text'];
$coord1 = $arr['message']['location']['latitude'];
$coord2 = $arr['message']['location']['longitude'];


$tg->send($chat_id, "Нас не догонят!", "DEL");


$arInfo["inline_keyboard"][0][0]["callback_data"] = 1;
$arInfo["inline_keyboard"][0][0]["text"] = "Кнопка 1";
$arInfo["inline_keyboard"][1][0]["callback_data"] = 2;
$arInfo["inline_keyboard"][1][0]["text"] = "Кнопка 2";
$tg->send($chat_id, "Примеры кнопок",$arInfo);
