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

$ardata = array('file_id' => $arr['message']['photo'][0]['file_id']);
$zz = $tg->getPhoto($ardata);
$filename = "/myimages/tg".strtotime(date("y-m-d H:i:s")).".jpg"; //Путь и название картинки, которую вы сохраняете
$tg->savePhoto($zz["result"]["file_path"],$filename);

$tg->send($chat_id, "Нас не догонят!", "DEL");
