<?php
/**
 * Я вообще правильно сделала красивые ссылки или както нужно подругому но без ".htaccess"
 * Вроде правильно но если есть идееи мжешь по свойму сделать если есть идея.. 
 * Просто в теории так как делаю я.. не конечно я сюда могу запихать скрипт редактирования... чёт сразу не подумал
 * А вот ... ещё 404 ошибку както надо выводить и главную я покачто не понял как мне это сделать -_- от словаа вообще
 */
$main = htmlspecialchars($_POST['user']);
echo '$_SERVER[REQUEST_URI]=';
var_dump($_SERVER['REQUEST_URI']);
echo '<br>';

echo "<hr>";
// var_dump($_SERVER);
echo '$_SERVER[QUERY_STRING]=';
var_dump($_SERVER['QUERY_STRING']);
echo '<br>';

echo '$_GET=';
var_dump($main);
echo '<br>';

class single_toon
{
    public static function log()
    {
        $root = array(
            "/meny" => "index_main.php",
            "/?list=users" => "main.php",
            "/?create=users" => "create.php",
            "/meny/documents" => "/Set_Document/index.php",
            "/save" => "/save/index.php"
        );
        //Мне нужно сделать переход на редактирование. Но так что-бы всё работало..
        count($root);
        var_dump($root);
        foreach ($root as $key => $value) {
            if ($key == $_SERVER['REQUEST_URI']) {
                require $value;
            }
            else{
                require_once("index_main.php"); //Эта штука вызывается постоянно -_- хз как это исправить
            }
        }
    }
}
single_toon::log();