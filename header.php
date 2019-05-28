<?php
    if( session_status() == 1 )
        session_start();
    
    // grab page name 
    $pageName = explode("/",$_SERVER["PHP_SELF"]);
    $rightSideNav ="";
    if( $pageName[count($pageName)-1] == "user.php" ){
        $rightSideNav = '<div id="rightNav"> 
                            <span id="notification">
                            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                                <g class="style-scope yt-icon">
                                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" class="style-scope yt-icon">
                                    </path>
                                </g>
                            </svg>
                            </span>
                            <a href="signout.php" style="text-decoration:none;">
                            <span id="signout" title="Click to Logout" style="display:inline-block;border-radius:none;width: 162px;height:100%;line-height:45px;color: wheat;text-align: center;margin-left: 10px;border-left: 2px solid white;">
                                Signout
                            </span>
                            </a>
                        </div>
                        ';

    } else if( $pageName[count($pageName)-1] == "login.php") {


    } else if( isset($_SESSION["username"]) &&  $pageName[count($pageName)-1] == "index.php" ) {
        $rightSideNav = '   <div id="rightNav"> 
                                <span id="notification">
                                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                                    <g class="style-scope yt-icon">
                                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" class="style-scope yt-icon">
                                        </path>
                                    </g>
                                </svg>
                                </span>
                                <a href="user.php">
                                    <span id="profile" title="Click to go to Profile Page">                        
                                    </span>
                                </a>
                            </div>
                        ';
    } else if( !isset($_SESSION["username"]) &&  $pageName[count($pageName)-1] == "index.php" ) {
        $rightSideNav = "";
    } else if( isset($_SESSION["username"]) &&  $pageName[count($pageName)-1] == "post.php" ) {
        $rightSideNav = '   <div id="rightNav"> 
                                <span id="notification">
                                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                                    <g class="style-scope yt-icon">
                                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" class="style-scope yt-icon">
                                        </path>
                                    </g>
                                </svg>
                                </span>
                                <a href="user.php">
                                    <span id="profile" title="Click to go to Profile Page">                        
                                    </span>
                                </a>
                            </div>
                        ';
    } else if( !isset($_SESSION["username"]) &&  $pageName[count($pageName)-1] == "post.php" ) {
        $rightSideNav = "";
    } else if( isset($_SESSION["username"]) &&  $pageName[count($pageName)-1] == "createnewpost.php" ) {
        $rightSideNav = '   <div id="rightNav"> 
                                <span id="notification">
                                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                                    <g class="style-scope yt-icon">
                                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" class="style-scope yt-icon">
                                        </path>
                                    </g>
                                </svg>
                                </span>
                                <a href="user.php">
                                    <span id="profile" title="Click to go to Profile Page">                        
                                    </span>
                                </a>
                            </div>
                        ';
    } else if( isset($_SESSION["username"]) &&  $pageName[count($pageName)-1] == "editpost.php" ) {
        $rightSideNav = '   <div id="rightNav"> 
                                <span id="notification">
                                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                                    <g class="style-scope yt-icon">
                                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" class="style-scope yt-icon">
                                        </path>
                                    </g>
                                </svg>
                                </span>
                                <a href="user.php">
                                    <span id="profile" title="Click to go to Profile Page">                        
                                    </span>
                                </a>
                            </div>
                        ';
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php         
        $pageName = explode("/",$_SERVER["PHP_SELF"]);
        if( $pageName[count($pageName)-1] == "dashboard.php" ) {     
            echo '<link rel="stylesheet" href="css/dashboard.css" />';
        } else if( $pageName[count($pageName)-1] == "login.php" ){
            echo '<link rel="stylesheet" href="css/login.css" />';
        } else if( $pageName[count($pageName)-1] == "createnewpost.php" ){
            echo '<link rel="stylesheet" href="css/createnewpost.css" />';
        } else if( $pageName[count($pageName)-1] == "editpost.php" ){
            echo '<link rel="stylesheet" href="css/editpost.css" />';
        } else if( $pageName[count($pageName)-1] == "signup.php" ){
            echo '<link rel="stylesheet" href="css/login.css" />';
        } else {
            echo '<link rel="stylesheet" href="css/index.css" />';
        }
    ?>
    <title>Blue Blogger</title>
</head>
<body>
    <header id="header">
        <div id="headerPoster"></div>
        <div id="navbar">
            <?php
                if( isset($_SESSION["username"]) && $pageName[count($pageName)-1] == "index.php"){
                        echo "<a href='dashboard.php' title='Dashboard Page'>Dashboard</a>";
                }  else if( !isset($_SESSION["username"]) && $pageName[count($pageName)-1] == "index.php") {                  
                        echo "<a href='login.php'>Login</a>";

                }  else if( $pageName[count($pageName)-1] == "login.php") {                  
                        echo "<a href='index.php'>Home</a>";

                }  else if( $pageName[count($pageName)-1] == "user.php" ) {                  
                        echo "<a href='dashboard.php'>Dashboard</a>";
                }  else if( $pageName[count($pageName)-1] == "dashboard.php" ) {                  
                        echo "<a href='user.php'>Profile</a>";
                }  else if( isset($_SESSION["username"]) && $pageName[count($pageName)-1] == "post.php" ) {                  
                    echo "<a href='user.php'>Profile</a>";
                }  else if( !isset($_SESSION["username"]) && $pageName[count($pageName)-1] == "post.php" ) {                  
                    echo "<a href='login.php'>Login</a>";
                }   else if( isset($_SESSION["username"]) && $pageName[count($pageName)-1] == "createnewpost.php" ) {                  
                    echo "<a href='dashboard.php'>Dashboard</a>";
                }   else if( !isset($_SESSION["username"]) && $pageName[count($pageName)-1] == "createnewpost.php" ) {                  
                    echo "<a href='dashboard.php'>Dashboard</a>";
                }   else if( !isset($_SESSION["username"]) && $pageName[count($pageName)-1] == "signup.php" ) {                  
                    echo "<a href='index.php'>Home</a>";
                }  
            ?>
            <span id="homelink" onclick="window.location='index.php'"></span>
            <?php
                echo $rightSideNav;
            ?>
        </div>
    </header>

    