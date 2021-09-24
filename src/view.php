<?php

require_once "singleton.php";
require_once "controller.php";
/**class view extends singleton
{
    public static function render($root = new router)
    {
        extract($vars);
        require_once "views/".$template.'.php';
    }
}
 */
?>
    <html>

    <head>
        <title>
            web
        </title>
    </head>

    <body>
        <form action="">
            <p align="right"><button name="create" value="users">Create</button></p>
        </form>
        <table align="center" border="1">
            <tr>
                <?php user::writeline(); ?>
            </tr>
            <?php
            writeline_table();
            ?>
        </table>
    </body>

    </html>