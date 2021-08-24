<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign-UP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
	<form id="registration" method="POST">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h2 class="text_center">Sign UP</h2>
					<hr class="mb-3">
					<label for="firstname"><b>First Name</b></label>
					<input class="form-control" id="firstname" type="text" name="firstname" required>
					<br>

					<label for="lastname"><b>Last Name</b></label>
					<input class="form-control" id="lastname"  type="text" name="lastname" required>
					<br>

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>
					<br>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<br>
					<hr class="mb-3">
					<input class="btn btn-info" type="submit" id="register" name="create" value="Sign Up">
                    <div style="margin-left: 5%; , margin-top: 0;, ">
                        <a href="login.html" class="button">Log-in</a>
                    </div>    
				</div>
			</div>
		</div>
	</form>
 </div>
 
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="register.js"></script>
 <script>

/*$(document).ready(function(){
$("#register").click(function(){
var firstname = $("#firstname").val();
var lastname = $("#lastname").val();   
var email = $("#email").val();
var password = $("#password").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'fname='+ firstname + '&lname='+ lastname+ '&email1='+ email + '&password1='+ password;
// AJAX Code To Submit Form.
            $.ajax({
                url: 'api/signup_api.php',
                type: 'post',
                data: serializedData,
                dataType: 'JSON',
                success: function(response){
                  //alert(response);
                }
            });

});
});
*/
$(document).ready(function() {
    $('#register').on('click', function() {
        $("#register").attr("disabled", "disabled");
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();   
        var email = $("#email").val();
        var password = $("#password").val();
        if(firstname!="" && lastname!="" && email!="" && password!=""){
            $.ajax({
                url: "api/signup_api.php",
                type: "POST",
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    password: password              
                },
                success: function(response){
                    //var response = JSON.parse(response);
                    console.log(response);
                    if(response.success==true){
                        alert("Data Inserted successfully");                 
                    }
                    else 
                        if(response.success==false){
                       alert("Error occured !");
                    }
                    
                }
            });
        }
        else{
            alert('Please fill all the field !');
        }
    });
});
</script>
</body>
</html>