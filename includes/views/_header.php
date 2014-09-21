<!DOCTYPE html> 
<html> 
    <head> 
        <title><?php echo formatTitle($title) ?></title> 

        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
<!--        <link rel="stylesheet" href="<?php echo $GLOBALS['serverRoot']; ?>includes/themes/theplaces.css" />
        <link rel="stylesheet" href="<?php echo $GLOBALS['serverRoot']; ?>includes/themes/jquery.mobile.icons.min.css" />-->
        <link rel="stylesheet" href="<?php echo $GLOBALS['serverRoot']; ?>includes/js/jquery.mobile-1.4.3.min.css" />
        <link rel="stylesheet" href="<?php echo $GLOBALS['serverRoot']; ?>includes/js/jquery.mobile.structure-1.4.3.min.css" />
        <link rel="stylesheet" href="<?php echo $GLOBALS['serverRoot']; ?>assets/css/styles.css" />
        <script src="<?php echo $GLOBALS['serverRoot']; ?>includes/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo $GLOBALS['serverRoot']; ?>includes/js/jquery.mobile-1.4.3.min.js"></script>               
    </head> 
    <body> 
        
        <div data-role="page" id="mainpage" data-theme="b">
            <div data-role="popup" id="popupDialog" style="max-width:400px;">
                <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                <div role="main" class="ui-content">
                    <p id='messagepopup'>No result</p>
                </div>
            </div> 
            <?php
            if (isset($_SESSION['UID'])) {
                ?>
                <div data-role="header" data-position="fixed" data-fullscreen="true">
                    <h1>The Places</h1>
                    <a href="index.php?page=home" data-icon="back" data-iconpos="notext" data-transition="fade" data-role="back">Back</a>
                    <a href="#nav-panel" data-icon="bullets" data-iconpos="notext">Navigation</a>
                </div>
                <?php
            }
            ?>            
            <div data-role="panel" data-position="left" data-position-fixed="false" data-display="reveal" id="nav-panel">

                <ul data-role="listview" style="margin-top:-16px;" class="nav-search">
                    <li data-icon="delete" style="background-color:#111;">
                        <a href="#" data-rel="close">Close menu</a>
                    </li>
                    <li data-role="list-divider"></li>

                    <li data-icon="home">
                        <a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=home" data-transition="slide">Home</a>

                    </li>
                    <li data-icon="search">
                        <a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=places" data-transition="slide">Places</a>
                    </li>                   
                    <li data-icon="bullets">
                        <a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=friends" data-transition="slide">Friends</a>
                    </li> 
                    <li data-role="list-divider"></li>
                    <li data-icon="user">
                        <a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=myprofile" data-transition="slide">My Profile</a>
                    </li>                   
                    <li>
                        <a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=logout" data-transition="slide">Logout</a>
                    </li>      

                </ul>

                <!-- panel content goes here -->
            </div>

            <div data-role="content" id="content">