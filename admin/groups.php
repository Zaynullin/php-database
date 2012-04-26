<?php
    session_start();

    if (!empty($_SESSION['login']) && ($_SESSION['idGroup'] == 1))

    {
?>
<!DOCTYPE HTML>
<html>

    <head>
            <title>Groups page | Database-project</title>
            <?php include "cssandscript.html"; ?>
    </head>

    <body>

    <div id="main-header">
        <a href="index.php">
            <img src="../images/header.png">
        </a>
    </div>

    <hr />

    <div id="main-content">

        <?php
            include "menu.html";
        ?>

        <div id="content">

            <?php

                require_once("../kernel/Group.class.php");

                $obj = new Group();
                $table = $obj->getAllGroups();

                echo "<table width=700 border='1'>";
                echo "

                <tr>
                    <td><b>Name</b></td>
                    <td><b>Description</b></td>
                    <td><b>Delete</b></td>
                    <td><b>Edit</b></td>
                </tr>";

                $i = 0;

                for($i; $i<count($table['name']); $i++)
                    echo "
                        <tr>
                            <td>{$table['name'][$i]}</td>
                            <td>{$table['description'][$i]}</td>
                            <td><img class=\"img_del\" id={$table['name'][$i]} src=\"../images/cross.png\" /></td>
                            <td><img class=\"img_edit\" id={$table['name'][$i]}0 src=\"../images/edit.png\" /></td>
                        </tr>
                    ";
                echo "</table>";

            ?>
            <br>
            <button id="addGroupButton">Add new group</button>

            <!--add New group -->

            <div id="addNewGroupForm" class="ui-widget ui-widget-content ui-corner-all" title="Add new group">

                        <form id="addGroup" method="post" action="handler.php">

                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input id="fieldGroupName" type="text" name="newGroupName"></td>
                            </tr>

                            <tr>
                                <td>Description:</td>
                                <td><input id="fieldGroupDescript" type="text" name="newGroupDescript"></td>
                            </tr>

                        </table>
                        <input type="submit" value="Add" id="addGroupSubmit">

                    </form>
            </div>

         <div id="editGroupForm" class="ui-widget ui-widget-content ui-corner-all" title="edit group">
                 <form id="editGroup" method="post" action="handler.php">

                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input id="GroupName" type="text" name="GroupName"></td>
                        </tr>

                        <tr>
                            <td>Description:</td>
                            <td><input id="GroupDescript" type="text" name="GroupDescript"></td>
                        </tr>

                    </table>
                    <button id="editGroupSubmit">Edit</button>
                </form>
            </div>

        </div>

    </div>

    <div id="left-menu">
        <?php
        echo '<div id="helloMessage">Hello, '.$_SESSION['login']."<br></div>";
        echo "<button id=\"logout\">Выйти</button>";
        ?>
    </div>

    </body>
</html>
    <?php
    }
    else
    {
        header ("Location: http://localhost/task-3-db/admin");
        exit();
    }
?>