<?php
    session_start();

    if (empty($_SESSION['login']) || empty($_SESSION['idGroup']))
    {
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin main page auth | Database-project</title>
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
        <div id="content">

            <div id="adminAuth">

                <form id="adminAuthForm" action="handler.php" method="post">

                    <table>
                        <tr>
                            <td>Login:</td> <td><input type="text" name="authLogin" required="1" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td><td><input type="password" name="authPassword" required="1" /> <br /></td>
                        </tr>
                    </table>

                        <input type="submit" />

                </form>

            </div>

        </div>
    </div>

</body>

</html>
<?php
    }
    
    else
    {
        if ($_SESSION['idGroup'] == 1)
        {
            header ("Location: http://localhost/task-3-db/admin/main.php");
            exit();
        }
        else
        {
            $_SESSION['error'] = 'You not administration group';
            header ("Location: http://localhost/task-3-db/index.php");
            exit();
        }
    }
?>