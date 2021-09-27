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
                <form name="create" method="post" action="create/user">
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
                        <center><button name="registers">Create</button></center>
                    </p>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>