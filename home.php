<?php
session_start();
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
}
else
{
	header('location:login.html');
    //echo "SESSION not set";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body/>
<div>
	
	 <nav class="navbar navbar-expand-md navbar-light bg-info">
	    <a class="navbar-brand">
            <img src="img/logo.jpg" height="33" alt="Majid-logo">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
           <div class="navbar-nav">
               <h5 class="nav-item nav-link avtive" style="font-size: 20px;">
               	</h5>
			<h5 class="nav-item nav-link avtive" style="font-size: 20px;"></h5>
           </div>
           <div class="navbar-nav">
           	<button type="button" class="btn btn-warning"><a href="logout.php" class="nav-item nav-link">Logout</a></button> 
           </div>
        </div>
    </nav>
<div>
	<h1 class="h">
			<?php
				echo "Welcome";
			?>
    </h1>
	</div>
	<h2 class="h2" style="margin-left: 10px;">Total User On Your Page</h2>

	<div id="userTable">
		<tbody></tbody>
	</div>
	<div class="table" style="margin-left: 10px;">
	<table id="userTable" >
      <thead>
        <tr>
            <th>First-Name</th>
			<th>Last-Name</th>
			<th>Email</th>
        </tr>
      </thead>
      <tbody></tbody>
  </table>
	</div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
        	alert("Login successfully");
            $.ajax({
                url: "api/homepage_api.php",
                type: "POST",
                 success: function(response){
                 	myobj = JSON.parse(response);
                    ///var len = response.da.length;
                   //console.log(myobj.data[0].email); 
 $.each(myobj.data, function(i) {
  	//alert(response[i].firstname);
                        var tr_str = "<tr>" +
                    //"<td align='center'>" + (i+1) + "</td>" +
                    "<td align='center'>" + myobj.data[i].firstname + "</td>" +
                    "<td align='center'>" + myobj.data[i].lastname + "</td>" +
                    "<td align='center'>" + myobj.data[i].email + "</td>" +
                    "</tr>";

                $("#userTable tbody").append(tr_str);
                    });
               }
            });

  });
</script>
</body>
</html>