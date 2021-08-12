<?php
include "../config.php";


    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn,$sql);
    //$row = mysqli_fetch_array($result);
$data = array();
if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
   /*echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      $_SESSION['email']      = $row['email'];
		$_SESSION['firstname']  = $row['firstname'];
		$_SESSION['lastname']   = $row['lastname'];
		echo $_SESSION['firstname'] . " " . $_SESSION['lastname']. " " . $_SESSION['email'];*/
		$return_arr = array('firstname'=>$row['firstname'],'lastname'=>$row['lastname'] ,
            'email'=>$row['email']);
        array_push($data, $return_arr);
        }

        echo json_encode(array('success' => true,'data'=>$data));
        
      }
      else
      {
               echo json_encode(array('success' => true,'data'=>'status code 400'));
      }
?>