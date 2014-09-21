<?php render('_header', array('title' => $title)) ?>
<?php $userObj = $user[0]; ?>
<ul data-role="listview" data-inset="true">
    <li>
        <a href="#editimagepopup" data-rel="popup"  id="editbuttonimage" >
            <img src="<?php echo getUserImagePath($userObj->idusers) ?>" id="userimage">

            <h2><?php echo $userObj->firstName . " " . $userObj->lastName ?></h2>
        </a>
    </li>
</ul>
<div data-role="popup" id="editimagepopup">
    <div data-role="header">
        <h3>File Selection and preview</h3>
    </div>
    <div data-role="content">
        <button id="chooseFile">Choose file</button>
        <button class="ui-disabled" id="updateimagebutton">Upload picture</button>
        <label id="progress"></label>
        <div class="hiddenfile">
            <form id="form1" enctype="multipart/form-data" method="post" action="Upload_file.php">
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" capture="camera" />
            </form>
<!--            <input type="file"  data-clear-btn="false" name="image" accept="image/*" capture>-->
        </div>
        <div id="preview"> 
            <img class="arrow-img rotate2" src="<?php echo getUserImagePath($userObj->idusers) ?>" id="preview-img"/>
            <script>
                var globRotation = 0;
                $('.arrow-img').on('vmousedown', function() {
//                    alert("click");
                    if (globRotation === 0) {
                        $('.arrow-img').toggleClass('rotate');
                        $('.arrow-img').toggleClass('rotate2');
                        globRotation = 90;
                    }
                    else if (globRotation === 90) {
                        $('.arrow-img').toggleClass('rotate');
                        $('.arrow-img').toggleClass('rotate3');
                        globRotation = 180;
                    }
                    else if (globRotation === 180) {
                        $('.arrow-img').toggleClass('rotate3');
                        $('.arrow-img').toggleClass('rotate4');
                        globRotation = 270;
                    }
                    else if (globRotation === 270) {
                        $('.arrow-img').toggleClass('rotate4');
                        $('.arrow-img').toggleClass('rotate2');
                        globRotation = 0;
                    }
                });
            </script>
        </div>
        <ul id="info" data-role="listview" data-inset="true">
        </ul>
    </div>
</div>
<form method="post" action="#">
    <div data-role="fieldcontain">
        <label for="user">Username:</label>
        <input type="text" name="username" id="usrnmreg" disabled="true" placeholder="Username" value='<?php echo $userObj->username; ?>'>
        <label for="passw">Password:</label>
        <input type="password" name="password" class="editableform" id="pswdreg" disabled="true" placeholder="Password" value='<?php echo $userObj->password; ?>'>
        <label for="firstnamereg">First Name:</label>
        <input type="text" name="firstname" class="editableform" id="firstnamereg" disabled="true" placeholder="First Name" value='<?php echo $userObj->firstName; ?>'>
        <label for="lastnamereg">Last Name:</label>
        <input type="text" name="lastname" class="editableform" id="lastnamereg" disabled="true" placeholder="Last Name" value='<?php echo $userObj->lastName; ?>'>
        <label for="emailreg">Email:</label>
        <input type="email" name="email" class="editableform" id="emailreg" disabled="true" placeholder="Email" value='<?php echo $userObj->email; ?>'>
    </div>
    <a href="#" class="ui-btn ui-mini ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-left" id="editbutton">Edit</a>
    <a href="#" class="ui-btn ui-mini ui-corner-all ui-shadow ui-btn-inline ui-icon-user ui-btn-icon-left ui-disabled" id="updatebutton" >Update</a>
    <script>
        $('#editbutton').on("click", function() {
            $('.editableform').textinput('enable');
            $('#updatebutton').removeClass("ui-disabled");
        });
        $('#updatebutton').on("click", function() {
            // setter
            $.mobile.loading('show');
            $.post("<?php echo "" . $GLOBALS['serverRoot'] . "includes/ajax/updateuser.php"; ?>",
                    {
                        username: $("#usrnmreg").val(),
                        password: $("#pswdreg").val(),
                        email: $("#emailreg").val(),
                        firstname: $("#firstnamereg").val(),
                        lastname: $("#lastnamereg").val(),
                    },
                    function(data, status) {
                        if (status === 'success') {
                            if (data !== "") {
                                var objResult = jQuery.parseJSON(data);
                                if (objResult.status === 'ok') {
                                    window.location.assign("<?php echo "" . $GLOBALS['serverRoot']; ?>index.php?page=myprofile");
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

</form>

<script type="text/javascript">

    function fileSelected() {

        var count = document.getElementById('fileToUpload').files.length;
//        document.getElementById('details').innerHTML = "";
        for (var index = 0; index < count; index++)
        {
            var file = document.getElementById('fileToUpload').files[index];
            var fileSize = 0;
            if (file.size > 1024 * 1024)
                fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
            else
                fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
//            document.getElementById('details').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;
//            document.getElementById('details').innerHTML += '<p>';
        }

    }

    function uploadFile() {

        var fd = new FormData();
        var count = document.getElementById('fileToUpload').files.length;
        for (var index = 0; index < count; index++)
        {
            var file = document.getElementById('fileToUpload').files[index];
            fd.append('myFile', file);
        }
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", uploadProgress, false);
        xhr.addEventListener("load", uploadComplete, false);
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        xhr.open("POST", "<?php echo "" . $GLOBALS['serverRoot'] . "includes/ajax/savetofile.php"; ?>");
        xhr.send(fd);
    }

    function uploadProgress(evt) {
        if (evt.lengthComputable) {
            var percentComplete = Math.round(evt.loaded * 100 / evt.total);
            document.getElementById('progress').innerHTML = "uploading progress " + percentComplete.toString() + '%';
        }
        else {
            document.getElementById('progress').innerHTML = 'unable to compute';
        }
    }

    function uploadComplete(evt) {
        /* This event is raised when the server send back a response */
        alert(evt.target.responseText);
        var objResult = jQuery.parseJSON(evt.target.responseText);
        if (objResult.status === 'ok') {
            window.location.assign("<?php echo "" . $GLOBALS['serverRoot']; ?>index.php?page=myprofile");
        }
        else {
            $("#messagepopup").html(objResult.message);
            $("#popupDialog").popup("open");
        }
    }

    function uploadFailed(evt) {
        alert("There was an error attempting to upload the file.");
    }

    function uploadCanceled(evt) {
        alert("The upload has been canceled by the user or the browser dropped the connection.");
    }
</script>


<script>

    $("#chooseFile").click(function(e) {
        e.preventDefault();
        $("input[type=file]").trigger("click");
    });
    $("input[type=file]").change(function() {
        var file = $("input[type=file]")[0].files[0];
        displayAsImage3(file);
        $("#updateimagebutton").removeClass("ui-disabled");
        fileSelected();
    });

    $("#updateimagebutton").click(function(e) {
        uploadFile();
    });

    function displayAsImage3(file) {
        if (typeof FileReader !== "undefined") {
            var reader;
            var img = document.getElementById("preview-img");
            reader = new FileReader();
            reader.onload = (function(theImg) {
                return function(evt) {
                    theImg.src = evt.target.result;
                };
            }(img));
            reader.readAsDataURL(file);
        }
    }

</script>

<?php
render('_footer')?>