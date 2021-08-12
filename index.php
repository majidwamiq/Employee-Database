<?php
ob_start();
session_start();
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	  <style>
  	.error{
    	color: red;
        font-style: italic;
    }
  </style>
</head>
<body class="body">
 <div class="center">
 	<div class="container">
	  <form id="registration" method="post">
			<div class="row">
				<div class="col-sm-3">
					<h2 class="text_center">Log in</h2>
					<hr class="mb-3">
					<label for="email"><b>Email</b></label>
					<input class="form-control" id="email" type="text" name="email" required>
					<br>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-info" type="submit" id="login" name="create" value="Login">
                         <div style="margin-left: 50%; , margin-top: 0;, ">
					 	  <a href="signup.php" class="button">Sign-Up</a>
					   <br>
					   <br>
					 	  <a href="signup.php" class="button">Forgot Password</a>
					    </div> 
				</div>
			</div>
		</form>
  </div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="register.js"></script>

<script type="text/javascript">
	// Variable to hold request
var request;

// Bind to the submit event of our form
$("#registration").submit(function(event){
       var email = $("#email").val();
        var password = $("#password").val();
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
   if(email != '' && password!=''){
            $.ajax({
                url: 'api/login_api.php',
                type: 'post',
                data: serializedData,
                dataType: 'JSON',
                success: function(response){
                    //myobj = JSON.parse(response);
                   //console.log(response.success); 
           console.log(response.success);
           if (response.success==true) {
            <?php
            $_SESSION['login']= true ;
            ?>
            response.success==false;
            window.location = "home.php";
           }
           else
           {
           console.log(response.success);
           alert("API Response = false");
           }
 }
            });
        }

  
    });
</script>
</body>
</html>