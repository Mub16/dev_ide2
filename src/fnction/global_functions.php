<?php
function test()
{
    for ($i = 0; $i < 5; $i++) {
        $hart[] = 1;
    }
    var_dump($hart);
}
function backMain()
{
    header("Refresh: 1;URL=update.php");
}
function user_udate()
{
    $userLogin = htmlspecialchars($_POST['login']);
    $userName = htmlspecialchars($_POST['name']);
    $userLastName = htmlspecialchars($_POST['lastname']);
    $userDate = htmlspecialchars($_POST['date']);
    $userActive = htmlspecialchars($_POST['chec']);
}
function writeline_table()
{
    $json = file_get_contents('Data/users/_file_derect.json');
    $jsonArra = json_decode($json, true);
    $start = count($jsonArra);
    for ($step = 0; $step < $start; $step++) {
        $json0 = file_get_contents("Data/users/$jsonArra[$step].json");
        $jsonArra0 = json_decode($json0, true);
        $userLogin = $jsonArra0[0];
        $userName = $jsonArra0[1];
        $userLastName = $jsonArra0[2];
        $userDate = $jsonArra0[3];
        $userActive = $jsonArra0[4];
        echo ("
            <tr>
              <td> $userLogin </td>
              <td> $userName </td>
              <td> $userLastName </td>
              <td> $userDate </td>
              <td> $userActive </td>
              <td><form name='bd_edi' method='post' action='users=update'><button name = 'Edit' value='$step'>Edit</button></form>
                  <form name='bd_del' method='post' action='users=delete'><button name = 'Delete' value='$step'>Delete</button></form></td>
            </tr>
            ");
    }
}
function reset_users_json($json)
{
    file_put_contents("Data/users/_file_derect.json", $json, JSON_FORCE_OBJECT);
    //header("Location: /?list=users");
    //exit;
}
function haders(){
    $create_users = "";
}
