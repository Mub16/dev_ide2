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
    $json = file_get_contents('Documents/_file_derect.json');
    $jsonArra = json_decode($json, true);
    $start = count($jsonArra);
    for ($step = 0; $step < $start; $step++) {
        $json0 = file_get_contents("Documents/$jsonArra[$step].json");
        $jsonArra0 = json_decode($json0, true);
        $organization = $jsonArra0[0];
        $contacts = $jsonArra0[1];
        $dateStart = $jsonArra0[2];
        $dateOut = $jsonArra0[3];
        $Items = $jsonArra0[4];
        $Accaunt = $jsonArra0[5];
        $INN = $jsonArra0[6];
        $Sertificate = $jsonArra0[7];
        echo ("
            <tr>
              <td> $organization </td>
              <td> $contacts </td>
              <td> $dateStart </td>
              <td> $dateOut </td>
              <td> $Items </td>
              <td> $Accaunt </td>
              <td> $INN </td>
              <td> $Sertificate </td>
              <td><form name='bd_edi' method='post' action='update.php'><button name = 'Edit' value='$step'>Edit</button></form>
                  <form name='bd_del' method='post' action='delete.php'><button name = 'Delete' value='$step'>Delete</button></form></td>
            </tr>
            ");
    }
}
function reset_users_json($json)
{
    file_put_contents("Documents/_file_derect.json", $json, JSON_FORCE_OBJECT);
    header("Location: index.php");
    exit;
}
