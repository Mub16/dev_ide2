<html>

<head>
    <title>
        web
    </title>
</head>

<body>
    <p align="right">
        <a href='create.php'>Create</a>
    </p>
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
        require_once("Set_Document/local/local_functions.php");
        writeline_table();
        ?>
    </table>
</body>

</html>