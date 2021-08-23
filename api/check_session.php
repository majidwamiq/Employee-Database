<?php
include "../config.php";
session_start();
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
$data = array();
if ($result->num_rows > 0) {

      $_SESSION['login']  = $row['firstname'];
      //echo $_SESSION['firstname'];
      echo json_encode(array('success' => true,'data'=>$_SESSION['firstname']));
        
      }
      else
      {
               echo json_encode(array('success' => false,'data'=>'status code 400'));
      }
?>