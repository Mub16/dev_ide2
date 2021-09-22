<?php
require_once("local/local_functions.php");
$organization = htmlspecialchars($_POST['организация']);
$contacts = htmlspecialchars($_POST['контакты']);
$dateStart = htmlspecialchars($_POST['date0']);
$dateOut = htmlspecialchars($_POST['date1']);
$Items = htmlspecialchars($_POST['предмет']);
$Accaunt = htmlspecialchars($_POST['сумма']);
$INN = htmlspecialchars($_POST['ИНН']);
$Sertificate = htmlspecialchars($_POST['сертификат']);
$data = $_POST;
if (isset($data['registers'])) {
    if ($dateStart > $dateOut) {
        echo ("Некоректная дата");
    } else {
        $jsonArra[] = $organization;
        $jsonArra[] = $contacts;
        $jsonArra[] = $dateStart;
        $jsonArra[] = $dateOut;
        $jsonArra[] = $Items;
        $jsonArra[] = $Accaunt;
        $jsonArra[] = $INN;
        $jsonArra[] = $Sertificate;
        $id = rand(0, 999999999999999999);
        $json = json_encode($jsonArra);
        file_put_contents("Documents/$id.json", $json, JSON_FORCE_OBJECT);
        unset($jsonArra, $json);
        $json = file_get_contents('Documents/_file_derect.json');
        $jsonArra = json_decode($json, true);
        $jsonArra[] = $id;
        $json = json_encode($jsonArra);
        reset_users_json($json);
    }
}
?>
<html>

<head>
    <title>
        web-create
    </title>
</head>

<body>
    <table align="center" border=1>
        <tr>
            <td>
                <form name="create" method="post" action="create.php">
                    <p>
                        <hr><b>Организация:</b>
                        <input type="text" required size="40" name="организация">
                        <hr><b>Контракт:</b>
                        <input type="text" required size="40" name="контакты">
                        <hr><b>Срок договора:</b>
                        <input type="date" required size="40" name="date0" value="">
                        <input type="date" required size="40" name="date1">
                        <hr><b>Предмет Договора:</b>
                        <input type="text" required size="40" name="предмет">
                        <hr><b>Сумма Договора:</b>
                        <input type="text" required size="40" name="сумма">
                        <hr><b>Реквезиты:</b>
                        <input type="text" required size="40" name="адрес" value="Адресс">
                        <input type="text" required size="40" name="ИНН" value="ИНН">
                        <input type="text" required size="40" name="сертификат" value="сетификат">
                        <hr>
                        <center><button name="registers">Create</button></center>
                    </p>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>