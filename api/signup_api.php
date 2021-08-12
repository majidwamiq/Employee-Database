<?php
include "../config.php";
 if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['lastname']))
 {
           
            $email   = $_POST['email']; 
            //echo $email;
            $password    = $_POST['password']; 
            //echo $password;
             $lastname    = $_POST['lastname']; 
             //echo $lastname;
            
            if (isset($_POST['firstname'])) {
             $firstname   = $_POST['firstname']; 
             //echo $firstname;
            }
            /*if (isset($_POST['lastname'])) {
             $lastname    = $_POST['lastname']; //echo $lastname;
            }*/ 
    $data = array();
        if($email!='' && $password!='' &&$lastname!='' &&$firstname!=''){
                     
    $sql = "SELECT * FROM user WHERE email = '$email ' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if ($result->num_rows > 0) {
     /*   $return_arr = array('firstname'=>$row['firstname'],'lastname'=>$row['lastname'] ,
            'email'=>$row['email']);
        array_push($data, $return_arr);*/
        echo json_encode(array('success' =>true,'data'=>'User Exist'));
    }
    else
    {
                     $insert= "INSERT INTO user (firstname, lastname, email, password)
                     VALUES ('$firstname', '$lastname', '$email', '$password')";
                    // mysqli_query($conn, $insert);
                     $result1=mysqli_query($conn, $insert);
                     if ($result1==true) {
                       echo json_encode(array("success"=>true,'data'=>'status code 200'));
                     } 
                     else {
                        echo json_encode(array("success"=>false,'data'=>'status code 201'));
                     }
                     mysqli_close($conn);
        }
    }
         else
            {
                echo json_encode(array('success' => false,'data'=>'status code 202'));

            }
 }
else
    {
        echo json_encode(array('success' => false,'data'=>'status code 400'));

    }
?>