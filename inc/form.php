<?php


$firstName = $_POST['firstName'];
$lastName =  $_POST['lastName'];
$email =     $_POST['email'];

$errors = [
     'firstNameError' => '' ,
     'lastNameError' => '' ,
     'emailError' => '' ,

];

if(isset($_POST['submit'])){


//تحقق الاسم الاول
if(empty($firstName)){
    $errors['firstNameError'] = 'please enter First name';

}

//تحقق الاسم الاخير
if(empty($lastName)){
    $errors['lasttNameError'] = 'please enter last name ';

 }

 //تحقق الايميل
 if(empty($email)){
    $errors['emailNameError'] = 'please enter email';  
 }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['emailError'] = 'please enter a valid email';

 } 

 //تحقق لا يوجد اخطاء
 if(!array_filter($errors)){
    
    $firstName =     mysqli_real_escape_string($conn , $_POST['firstName']); 
    $lastName =      mysqli_real_escape_string($conn , $_POST['lastName']);
    $email =         mysqli_real_escape_string($conn , $_POST['email']);

        
     $sql = "INSERT INTO users(firstName , lastName , email) 
      VALUES('$firstName' , '$lastName' , '$email')";

if(mysqli_query($conn , $sql)){
    header('location:  '. $_SERVER['PHP_SELF'] );
    }else{
        echo 'Error:' . mysqli_error($conn);
    }

 }

}

