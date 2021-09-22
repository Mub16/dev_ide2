<?php
$fileID = htmlspecialchars($_POST["Edit"]);
$json = file_get_contents('Set_Document/Documents/_file_derect.json');
$jsonArra = json_decode($json, true);
$sep = $jsonArra[$fileID];
$json0 = file_get_contents("Set_Document/Documents/$sep.json");
$jsonArra0 = json_decode($json0, true);
//$URL = ($jsonArra0[$step]);
$organization = $jsonArra0[0];
$contacts = $jsonArra0[1];
$dateStart = $jsonArra0[2];
$dateOut = $jsonArra0[3];
$Items = $jsonArra0[4];
$Accaunt = $jsonArra0[5];
$INN = $jsonArra0[6];
$Sertificate = $jsonArra0[7];
?>
<html>

<head>
    <title>
        web-updata
    </title>
</head>

<body>
    <table align="center" border=1>
        <tr>
            <td>
                <form name="create" method="post" action="Set_Document/update_save.php">
                    <p>
                        <hr><b>Организация:</b>
                        <input type="text" required size="40" name="организация" value="<? echo $organization ?>">
                        <hr><b>Контракт:</b>
                        <input type="text" required size="40" name="контакты" value="<? echo $contacts ?>">
                        <hr><b>Срок договора:</b>
                        <input type="date" required size="40" name="date0" value="<? echo $dateStart ?>">
                        <input type="date" required size="40" name="date1" value="<? echo $dateOut ?>">
                        <hr><b>Предмет Договора:</b>
                        <input type="text" required size="40" name="предмет" value="<? echo $Items ?>">
                        <hr><b>Сумма Договора:</b>
                        <input type="text" required size="40" name="сумма" value="<? echo $Accaunt ?>">
                        <hr><b>Реквезиты:</b>
                        <input type="text" required size="40" name="адрес" value="<? echo $Accaunt ?>">
                        <input type="text" required size="40" name="ИНН" value="<? echo $INN ?>">
                        <input type="text" required size="40" name="сертификат" value="<? echo $Sertificate ?>">
                        <hr>
                        <center><button name='Edit' value='<?php echo $sep ?>'>Edit</button></center>
                    </p>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>