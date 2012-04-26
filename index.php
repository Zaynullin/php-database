<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Main page | Database-project</title>
        <?php include_once('html-includes/cssandscript.html'); ?>
    </head>

    <body>

        <div id="main-header">
            <a href="index.php">
                <img src="images/header.png">
            </a>
        </div>
        <hr />

        <div id="main-content">
            <?php include_once('html-includes/user-menu.html'); ?>

            <div id="content">
                Database. Third task. web-site with support forum, gallery, social network
            </div>

            <div id="left-menu">
                <?php include("./admin/authform.php"); ?>
            </div>

        </div>

    </body>
</html>
<?php

?>