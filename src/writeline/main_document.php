<html>

<head>
    <title>
        web
    </title>
</head>

<body>
   <form action=""><p align="right"><button name = "create" value="document">Create</button></p></form>
    <table align="center" border="1">
        <tr>
            <th>Организация</th>
            <th>Контакты</th>
            <th>Дата начала</th>
            <th>Дата Конца</th>
            <th>Предмет</th>
            <th>Сумма</th>
            <th>ИНН</th>
            <th>Сертификат</th>
        </tr>
        <?php
        require_once("fnction/local_functions.php");
        writeline_table();
        ?>
    </table>
</body>

</html>