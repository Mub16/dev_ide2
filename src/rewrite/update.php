<?php
$fileID = htmlspecialchars($_POST["Edit"]);
$json = file_get_contents('Data/users/_file_derect.json');
$jsonArra = json_decode($json, true);
$sep = $jsonArra[$fileID];
$json0 = file_get_contents("Data/users/$jsonArra[$fileID].json");
$jsonArra0 = json_decode($json0, true);
//$URL = ($jsonArra0[$step]);
$userLogin = $jsonArra0[0];
$userName = $jsonArra0[1];
$userLastName = $jsonArra0[2];
$userDate = $jsonArra0[3];
$userActive = $jsonArra0[4];
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
                <form name="create" method="post" action="update_save.php">
                    <p><b>Login:</b>
                        <input type="text" required size="40" name="login" value='<?php echo $userLogin ?>'>
                        <hr><b>Name:</b>
                        <input type="text" required size="40" name="name" value='<?php echo $userName ?>'>
                        <hr><b>LastName:</b>
                        <input type="text" required size="40" name="lastname" value='<?php echo $userLastName ?>'>
                        <hr><b>Date:</b>
                        <input type="date" required size="40" name="date" value="<?php echo $userDate ?>">
                        <hr><input type="radio" name="chec" value="active"> Active
                        <hr>
                        <center><button name='Edit' value='<?php echo $sep ?>'>Edit</button></center>
                    </p>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>