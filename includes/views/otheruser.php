<?php render('_header', array('title' => $title)) ?>

    <?php $userObj = $otheruser[0]; ?>
<ul data-role="listview" data-inset="true">
    <li>
        <img src="<?php echo "" . $GLOBALS['serverRoot'] ?>assets/img/users/<?php echo $userObj->idusers ?>.jpg">
        <h2><?php echo $userObj->firstName . " " . $userObj->lastName ?></h2>
        <p>First Name: <?php echo $userObj->firstName; ?></p><p>Last Name: <?php echo $userObj->lastName; ?></p>
        <input type="hidden" value="<?php echo $userObj->idusers; ?>" name="idusers" id="idusers"/>
        <input type="hidden" value="<?php echo $areWeFriend; ?>" name="action" id="action"/>
    </li>
</ul>  
<a href="#" data-dom-cache="false" class="ui-btn ui-mini ui-corner-all ui-shadow ui-btn-inline ui-icon-user ui-btn-icon-left" id="becomefriend"><?php echo (($areWeFriend==1) ? "Remove Friendship" : "Become Friend"); ?></a>
<script type="text/javascript">
    $("#becomefriend").on('click', function() {
        // setter
        $.mobile.loading('show');
        $.post("<?php echo "" . $GLOBALS['serverRoot'] . "includes/ajax/removefriend.php"; ?>",
                {
                    idusers: $("#idusers").val(),
                    action: $("#action").val()
                },
        function(data, status) {
            if (status === 'success') {
                if (data !== "") {
                    var objResult = jQuery.parseJSON(data);
                    if (objResult.status === 'ok') {
                        if ($("#becomefriend").text() === "Become Friend"){
                            $("#becomefriend").text("Remove Friendship");
                            $("#action").val("1");
                        }
                        else {
                            $("#becomefriend").text("Become Friend");
                            $("#action").val("0");
                        }
                    }
                    else {
                        $("#messagepopup").html(objResult.message);
                        $("#popupDialog").popup("open");
                    }
                }
            } else {
                alert("There is a problem with internet connection");
            }
            $.mobile.loading('hide');
        });
    });
</script>                       

<?php render('_footer')?>