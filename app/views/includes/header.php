<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title>My Hobby</title>
    <meta name="author" content="Karol Wiśniewski" />
    <script src="https://kit.fontawesome.com/5705e39749.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo MAINURL; ?>/css/index.css" />
    <link rel="stylesheet" href="/css/articles.css"  />
    <link rel="stylesheet" href="/css/about.css" />
    <link rel="stylesheet" href="/css/modal.css" />
    <link rel="stylesheet" href="/css/register.css" />
    <link rel="stylesheet" href="/css/button.css" />
    <link rel="stylesheet" href="/css/profile.css" />

<style>
.search-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width:100% ; 
    margin:20px 0 ; 
}


</style>
 

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="logo">
                <img src="../../../public/images/Premier_League_Logo.svg.png" alt="" />
            </div>
        </header>

        <?php include("computerNav.php"); ?>
        <?php include("mobileNav.php"); ?>