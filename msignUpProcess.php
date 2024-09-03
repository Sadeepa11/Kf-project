<?php

require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$re_password=$_POST["rpw"];





if(empty($fname)){
    echo ("Please enter your First Name !!!");
}else if(strlen($fname) > 50){
    echo ("First Name must have less than 50 characters");
}else if(empty($lname)){
    echo ("Please enter your Last Name !!!");
}else if(strlen($lname) > 50){
    echo ("Last Name must have less than 50 characters");
}else if (empty($email)){
    echo ("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($password)){
    echo ("Please enter your Password !!!");
}else if($password!=$re_password){

    echo("Passwords are not match !!!");
    

}else{

$rs = Database::search("SELECT * FROM `merchant` WHERE `email`='".$email."'");
$n = $rs->num_rows;

if($n > 0){
    echo ("User with the same Email already exists.");
}else{
 

    Database::iud("INSERT INTO `merchant` (`fname`,`lname`,`email`,`pw`,`active_status_id`) VALUES ('".$fname."','".$lname."','".$email."','".$password."','1')");

    echo "success";

}
    
}

?>