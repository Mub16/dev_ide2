<html>

<head>
    <title>
        web
    </title>
</head>

<body>
    
    <?php
    echo '$_SERVER[REQUEST_URI]='; 
    echo($_SERVER['REQUEST_URI']); ?>
    <p align="right">
        <a href='create.php'>Create</a>
    </p>
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