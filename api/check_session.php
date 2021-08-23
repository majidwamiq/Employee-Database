<?php
include "../config.php";
session_start();
 if(isset($_POST['email'])&&isset($_POST['password']))
 {
    $email       = $_POST['email'];
 if(isset($_POST['password']))
{
    $password    = $_POST['password'];
}
$data = array();
if ($email!='' && $password!='') {
    // check entry
    $sql = "SELECT email password FROM user WHERE email = '$email ' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

        if($row > 0)
        {
        $return_arr = array('email'=>$email);
        $_SESSION['login']=$email;
        array_push($data, $return_arr);
        echo json_encode(array('success' =>true,'data'=>$data));
        }
        else
        {
            //echo "please enter vaalid email or password";
        echo json_encode(array('success' =>false,'data'=>'status code 204'));

        }
}
else
{
            echo json_encode(array('success' =>false,'data'=>'status code 400'));
}
    
}
else
    {
            echo json_encode(array('success' => false,'data'=>'status code 401'));
    }
?>