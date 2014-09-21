<?php
render('_header', array('title' => $title));
$userObj = $placedetails[0];
?>


    <ul data-role="listview" data-inset="true">
        <li>
            <img src="<?php echo getPlaceImagePath($place->idplaces)?>">
            <h2><?php echo $userObj->name; ?></h2>
            <p><?php echo $userObj->address; ?></p>
        </li>
        <input type="hidden" value="<?php echo $userObj->idplaces; ?>" name="idplaces" id="idplaces"/>
        <input type="hidden" value="<?php echo $doIFollow; ?>" name="action" id="action"/>
        <li><?php echo $userObj->description; ?></li>
    </ul>


<a href="#" data-dom-cache="false" class="ui-btn ui-mini ui-corner-all ui-shadow ui-btn-inline ui-icon-user ui-btn-icon-left" id="becomefollower"><?php echo (($doIFollow==1) ? "Unfollow" : "Follow"); ?></a>
<script type="text/javascript">
    $("#becomefollower").on('click', function() {
        // setter
        $.mobile.loading('show');
        $.post("<?php echo "" . $GLOBALS['serverRoot'] . "includes/ajax/follow.php"; ?>",
                {
                    idplaces: $("#idplaces").val(),
                    action: $("#action").val()
                },
        function(data, status) {
            if (status === 'success') {
                if (data !== "") {
                    var objResult = jQuery.parseJSON(data);
                    if (objResult.status === 'ok') {
                        if ($("#becomefollower").text() === "Follow"){
                            $("#becomefollower").text("Unfollow");
                            $("#action").val("0");
                        }
                        else {
                            $("#becomefollower").text("Follow");
                            $("#action").val("1");
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

<h3>List of Followers</h3>

    <ul id="listOfFollowers" data-autodividers="true" data-role="listview" data-inset="true" data-filter="true">
        <?php render($followers, array("doIFollow" => $doIFollow)); ?>
    </ul>

<?php
render('_footer')?>