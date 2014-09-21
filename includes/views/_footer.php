</div>
<?php
if (isset($_SESSION['UID'])) {
?>
<div data-role="footer" id="pageFooter" data-position="fixed" data-fullscreen="true">    
    <div data-role="navbar">
        <ul>
            <li><a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=home" data-transition="slide" data-icon="home">Home</a>
            <li data-icon="search">
                <a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=places" data-transition="slide" data-icon="bullets">Places</a>
            </li>                   
            <li data-icon="bullets">
                <a href="<?php echo $GLOBALS['serverRoot']; ?>index.php?page=friends" data-transition="slide" data-icon="user">Friends</a>
            </li> 
        </ul>
    </div>
</div>
<?php
}
?>
</div>

</body>
</html>