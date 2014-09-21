<?php render('_header', array('title' => $title)) ?>
        <script>
                $( document ).ready(function() {
                    <?php 
                        
                        if (isset($logout)){
                            echo "localStorage.setItem('idusers','');";
                        }
                    ?>
                        
                    var idusers = localStorage.getItem("idusers");
                    if (idusers!='undefined'){
                        $.mobile.loading('show');
                        $.post("<?php echo "" . $GLOBALS['serverRoot'] . "includes/ajax/login.php"; ?>",
                            {   idusers: idusers
                            }, 
                            successLogin
                        );
                    }
                });
                
                function successLogin(data, status){
                    if (status === 'success') {
                        if (data !== "") {                                
                            var objResult = jQuery.parseJSON(data);
                            if (objResult.status==='ok'){
                                localStorage.setItem("idusers", objResult.idusers);
                                localStorage.setItem("username", objResult.username);
                                window.location.assign("<?php echo "" . $GLOBALS['serverRoot'] . "index.php?page=home";?>");
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
                }                    
            </script>
<div id="h1content">
    <h1 class="centered">Welcome to the Places</h1>   
</div>

<p id="usernamewelcome"></p>
<a href="#logindialog" id="loginlink" data-rel="popup" data-transition="slide" class="ui-btn  ui-corner-all ui-icon-user ui-btn-icon-left">Login</a>              
<a href="#register" id="registerlink" data-rel="popup" data-transition="slide" class="ui-btn  ui-corner-all ui-icon-edit ui-btn-icon-left">Register</a>    
<div id="status">
</div>
<div data-role="popup" id="logindialog" class="ui-content" style="min-width:250px;">
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
    <form method="post" action="#">
        <div>
            <h3>Login information</h3>
            <label for="usrnm" class="ui-hidden-accessible">Username:</label>
            <input type="text" name="user" id="usrnm" placeholder="Username">
            <label for="pswd" class="ui-hidden-accessible">Password:</label>
            <input type="password" name="passw" id="pswd" placeholder="Password">
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-user ui-btn-icon-left" data-rel="back" id="loginbutton">Login</a>
            <script type="text/javascript">
                $("#loginbutton").on('click', function() {
                    // setter
                    $.mobile.loading('show');
                    $.post("<?php echo "" . $GLOBALS['serverRoot'] . "includes/ajax/login.php"; ?>",
                            {
                                username: $("#usrnm").val(),
                                password: $("#pswd").val()
                            },
                            successLogin
                    );
                });
            </script>   

        </div>
    </form>
</div> 
<div data-role="popup" id="register" class="ui-content" style="min-width:250px;">
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
    <form method="post" action="#">
        <div>
            <h3>Registration</h3>
            <label for="usrnmreg" class="ui-hidden-accessible">Username:</label>
            <input type="text" name="username" id="usrnmreg" placeholder="Username">
            <label for="pswdreg" class="ui-hidden-accessible">Password:</label>
            <input type="password" name="password" id="pswdreg" placeholder="Password">
            <label for="firstnamereg" class="ui-hidden-accessible">Username:</label>
            <input type="text" name="firstname" id="firstnamereg" placeholder="First Name">
            <label for="lastnamereg" class="ui-hidden-accessible">Username:</label>
            <input type="text" name="lastname" id="lastnamereg" placeholder="Last Name">
            <label for="emailreg" class="ui-hidden-accessible">Password:</label>
            <input type="email" name="email" id="emailreg" placeholder="Email">

            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-user ui-btn-icon-left" data-rel="back" id="registerbutton">Register</a>
            <script type="text/javascript">
                $("#registerbutton").on('click', function() {
                    // setter
                    $.mobile.loading('show');
                    $.post("<?php echo "" . $GLOBALS['serverRoot'] . "includes/ajax/register.php"; ?>",
                        {
                            username: $("#usrnmreg").val(),
                            password: $("#pswdreg").val(),
                            email: $("#emailreg").val(),
                            firstname: $("#firstnamereg").val(),
                            lastname: $("#lastnamereg").val(),
                        },
                        successLogin
                    );
                });
            </script>                       
        </div>
    </form>
</div>     
<?php
render('_footer')?>