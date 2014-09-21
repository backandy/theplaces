<li>
    <a href="?page=otherusers&idusers=<?php echo $friend->idfriend ?>"  data-transition="slide">
        <img src="<?php echo "" . $GLOBALS['serverRoot'] ?>assets/img/users/<?php echo $friend->idfriend ?>.jpg">
        <h2><?php echo $friend->firstName . " " . $friend->lastName ?></h2>
        <p>First Name: <?php echo $friend->firstName; ?>  Last Name: <?php echo $friend->lastName; ?></p>
    </a>
</li>
