<?php
    session_start();

    if (!empty($_SESSION['login']) && ($_SESSION['idGroup'] == 1))

    {

        ?>
<!DOCTYPE HTML>
<html>

    <head>
        <title>Users page | Database-project</title>
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
                require_once("../kernel/User.class.php");

                $Users = new User();
                $usersList = $Users->getAllUser();

                echo "<table width=700 border='1'>";
                    echo "
                    <tr>
                        <td><b>Login</b></td>
                        <td><b>e-mail</b></td>
                        <td><b>First name</b></td>
                        <td><b>Last name</b></td>
                        <td><b>Data registration</b></td>
                        <td><b>Group</b></td>
                        <td><b>Delete</b></td>
                        <td><b>Edit</b></td>

                    </tr>";
                    $i = 0;
                    for($i; $i<count($usersList['login']); $i++)
                    echo "
                        <tr>
                            <td>{$usersList['login'][$i]}</td>
                            <td>{$usersList['email'][$i]}</td>
                            <td>{$usersList['first_name'][$i]}</td>
                            <td>{$usersList['last_name'][$i]}</td>
                            <td>{$usersList['data_registration'][$i]}</td>
                            <td>{$usersList['group_name'][$i]}</td>
                            <td><img class=\"img_del_user\" id={$usersList['login'][$i]} src=\"../images/cross.png\" /></td>
                            <td><img class=\"img_edit_user\" id={$usersList['login'][$i]}0 src=\"../images/edit.png\" /></td>

                        </tr>
                    ";
                echo "</table>";
            
            ?>

            <br>
            <button id="addUserButton">Add user</button>

            <div id="addUser" class="ui-widget ui-widget-content ui-corner-all" title="Add new user">

                <form id="addUserForm">

                    <table>

                        <tr>
                            <td>Login:</td>
                            <td><input id="fieldUserLogin" type="text" required='1'></td>
                        </tr>

                        <tr>
                            <td>Password:</td>
                            <td><input id="fieldUserPassword" type="password" required='1'></td>
                        </tr>

                        <tr>
                            <td>E-mail:</td>
                            <td><input id="fieldUserEmail" type="email" required='1'></td>
                        </tr>

                        <tr>
                            <td>First name:</td>
                            <td><input id="fieldUserFirstName" type="text" required='1'></td>
                        </tr>

                        <tr>
                            <td>Last name:</td>
                            <td><input id="fieldUserLastName" type="text" required='1'></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" id="addUserHidden" value="adminForm" required='1'></td>
                        </tr>

                    </table>
                    <button id="addUserSubmit">Add user</button>
                </form>
            </div>

            <div id="editUser" class="ui-widget ui-widget-content ui-corner-all" title="Edit user">

                <form id="editUserForm" method="post" action="handler.php">

                    <table>
                        <tr>
                            <td>New login:</td>
                            <td><input id="newLogin" type="text" name="newLogin"></td>
                        </tr>
                        <tr>
                            <td>New password:</td>
                            <td><input id="newPassword" type="password" name="newPassword"></td>
                        </tr>
                        <tr>
                            <td>New E-mail:</td>
                            <td><input id="newEmail" type="email" name="UserEmail"></td>
                        </tr>

                        <tr>
                            <td>First name:</td>
                            <td><input id="newFirstName" type="text" name="newFirstName"></td>
                        </tr>


                        <tr>
                            <td>Last name:</td>
                            <td><input id="newLastName" type="text" name="newLastName"></td>
                        </tr>

                        <tr>
                            <td>Group name:</td>
                            <td><input id="newGroupName" type="text"></td>
                        </tr>

                    </table>
                    <button id="editUserSubmit">Edit</button>
                </form>
            </div>

        </div>
        <div id="left-menu">
            <?php
            echo '<div id="helloMessage">Hello, '.$_SESSION['login']."<br></div>";
            echo "<button id=\"logout\">Выйти</button>";
            ?>
        </div>

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