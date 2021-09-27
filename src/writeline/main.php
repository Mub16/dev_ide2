<html>

<head>
    <title>
        web
    </title>
</head>

<body>
        <form method="post" action="user/create"><p align="right"><button>Create</button></p></form>
    <table align="center" border="1">
        <tr>
        <th>Login</th>
                <th>Name</th>
                <th>Last name</th>
                <th>Bilden</th>
                <th>Active</th>
                <th></th>
        </tr>
        <?php
        require_once("fnction/global_functions.php");
        writeline_table();
        ?>
    </table>
</body>

</html>