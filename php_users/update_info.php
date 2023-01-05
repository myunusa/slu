<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

  // initializing variables
   $email= "";
   $phone= "";
   $password= "";
   $fullname= "";
   $regno= "";
   $jambno= "";
   $errors = array();

   // Update Email
   if (isset($_POST['student_update_email'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $email_1 = mysqli_real_escape_string($db, $_POST['email_1']);
    $email=strtolower($email);
    $email_1=strtolower($email_1);
    $regno=$_SESSION['regno'];
    

    // FORM VALIDATION !!
      if (empty($email)) { array_push($errors, "Enter Email"); }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
      elseif (empty($email_1)) { array_push($errors, "Re-enter Email"); }
      elseif ($email != $email_1) {array_push($errors, "The two Email do not match"); }
     
    if(count($errors) == 0) {
      $token = "EVC-".rand(0,9).uniqid(true);      
      $updatequery ="UPDATE student_signup SET email ='$email', token ='$token' WHERE regno='$regno'";
      if(mysqli_query($db, $updatequery)){
        //   $fullname=$_SESSION['student_fullname'];
        //   $fullname=strtoupper($fullname);
        // $receiver = $email;
        // $subject = "Buk Bus Reservation Email Verification";
        // $sender = "From: myunusahja2@gmail.com";
        // $body = 'Hi '.$fullname.', with Registration Number: '.$regno.'.
        //   Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account
        //    <a href=" http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';

        // if(mail($receiver, $subject, $body, $sender)){
          $fullname=strtolower($fullname);
          $_SESSION['student_email'] = $email;
          $_SESSION['success'] = "Dear $fullname your email successfully changed!";
          header('location: ../users/student_dashboard.php');
        // }else{array_push($errors, "message not sent to email");}
      }else{ array_push($errors, "Email not changed!"); }
    }
  }
  // ... 
    
  // Update Existing  student information
  if (isset($_POST['student_update'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $file = $_FILES['file'];
    $fileName =$_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize= $_FILES['file']['size'];
    $fileError =$_FILES['file']['error'];
    $fileTpye= $_FILES['file']['type'];
    $fileExt =explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));
    $allowed= array('jpg', 'jpeg', 'png', 'jfif');
    $email=strtolower($email);
    $student_fullname= $_SESSION['student_fullname']; 
    $regno= $_SESSION['regno']; 
    $student_email= $_SESSION['student_email']; 
    $token=$_SESSION['student_token'];

    if (empty($email)) { array_push($errors, "Enter Email"); }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
    elseif (empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
    elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
    elseif (empty($password)) { array_push($errors, "Enter Password"); }
    elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
    elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
    elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
    elseif (!$fileActualExt){$image = $_SESSION['student_image'];}
    elseif (!in_array($fileActualExt, $allowed)){array_push($errors, "Upload image of (jpg, jpeg or png)type only!");}
    elseif(in_array($fileActualExt, $allowed)){
        $image = $regno.".".$fileActualExt;
        $fileDestination ='../vendors/images/profile/student/'.$image;
    }
    if (count($errors) == 0){
      // if($email == $student_email){
        $update_query ="UPDATE student_signup SET email ='$email', phone ='$phone',image ='$image',password ='$password' WHERE regno='$regno'";
        if(mysqli_query($db, $update_query)){
          move_uploaded_file($fileTmpName, $fileDestination);
          $_SESSION['student_email'] = $email;
          $_SESSION['student_phone'] = $phone;
          $_SESSION['student_image'] = $image;
          $_SESSION['success'] = "$student_fullname information was successfully updated.";
          header('location: ../users/student_dashboard.php');
        }else{array_push($errors, "Information not Updated!!!");}
      // }
      // elseif($email != $student_email){
      //       $verify= "Unverified";
      //       $token = "EVC-".rand(0,9).uniqid(true);
      //       $student_fullname=strtoupper($student_fullname);
      //       $receiver = $email;
      //       $subject = "Buk Bus Reservation Email Verification";
      //       $sender = "From: myunusahja2@gmail.com";
      // $body = 'Hi '.$student_fullname.', with Registration Number: '.$regno.'.
      //   Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account
      //    <a href=" http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';

      //       if(mail($receiver, $subject, $body, $sender)){
      //          $update_query ="UPDATE student_signup SET email ='$email', token ='$token', phone ='$phone', verify ='$verify', 
      //                 image ='$image',password ='$password' WHERE regno='$regno'";
      //          if(mysqli_query($db, $update_query)){
      //           $student_fullname=strtolower($student_fullname);
      //            move_uploaded_file($fileTmpName, $fileDestination);
                    // $_SESSION['student_email'] = $email;
                    //     $_SESSION['student_phone'] = $phone;
                    //     $_SESSION['student_image'] = $image;
                    //     $_SESSION['success'] = "$student_fullname information was successfully updated.";
                    //     header('location: ../users/student_dashboard.php');
                    //   }else{array_push($errors, "Information not Updated!!!");}
                // }else{array_push($errors, "message not sent to email");}
    }
  }
  //
    
      
  // Update Existing  staff information
  if (isset($_POST['staff_update'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $file = $_FILES['file'];
    $fileName =$_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize= $_FILES['file']['size'];
    $fileError =$_FILES['file']['error'];
    $fileTpye= $_FILES['file']['type'];
    $fileExt =explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));
    $allowed= array('jpg', 'jpeg', 'png', 'jfif');
    $email=strtolower($email);
    $staff_fullname= $_SESSION['staff_fullname']; 
    $staff_id= $_SESSION['staff_id']; 
    $staff_email= $_SESSION['staff_email']; 
    $token=$_SESSION['staff_token'];

    if (empty($email)) { array_push($errors, "Enter Email"); }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
    elseif (empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
    elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
    elseif (empty($password)) { array_push($errors, "Enter Password"); }
    elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
    elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
    elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
    elseif (!$fileActualExt){$image = $_SESSION['staff_image'];}
    elseif (!in_array($fileActualExt, $allowed)){array_push($errors, "Upload image of (jpg, jpeg or png)type only!");}
    elseif(in_array($fileActualExt, $allowed)){
        $image = $staff_id.".".$fileActualExt;
        $fileDestination ='../vendors/images/profile/staff/'.$image;
    }
     
    if (count($errors) == 0){
      // if($email == $staff_email){
        $update_query ="UPDATE staff_signup SET email ='$email', phone ='$phone',image ='$image',password ='$password' WHERE staff_id='$staff_id'";
        if(mysqli_query($db, $update_query)){
          move_uploaded_file($fileTmpName, $fileDestination);
          $_SESSION['staff_email'] = $email;
          $_SESSION['staff_phone'] = $phone;
          $_SESSION['staff_image'] = $image;
          $_SESSION['success'] = "$staff_fullname information was successfully updated.";
          header('location: ../users/staff_dashboard.php');
        }else{array_push($errors, "Information not Updated!!!");}
      // }
      // elseif($email != $staff_email){
      //       $verify= "Unverified";
      //       $staff_fullname=strtoupper($staff_fullname);
      //       $token = "EVC-".rand(0,9).uniqid(true);
      //       $receiver = $email;
      //       $subject = "Buk Bus Reservation Email Verification";
      //       $sender = "From: myunusahja2@gmail.com";
      // $body = 'Hi '.$staff_fullname.', with Staff Id: '.$staff_id.'.
      //   Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account
      //    <a href=" http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';

      //       if(mail($receiver, $subject, $body, $sender)){
      //          $update_query ="UPDATE staff_signup SET email ='$email', token ='$token', phone ='$phone', verify ='$verify', 
      //                 image ='$image',password ='$password' WHERE staff_id='$staff_id'";
      //          if(mysqli_query($db, $update_query)){
      //           $staff_fullname=strtolower($staff_fullname);
      //            move_uploaded_file($fileTmpName, $fileDestination);
                    // $_SESSION['staff_email'] = $email;
                    //     $_SESSION['staff_phone'] = $phone;
                    //     $_SESSION['staff_image'] = $image;
                    //     $_SESSION['success'] = "$staff_fullname information was successfully updated.";
                    //     header('location: ../users/staff_dashboard.php');
                    //   }else{array_push($errors, "Information not Updated!!!");}
    }
  }
  //

  // Update Existing  staff information
  if (isset($_POST['staff'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $file = $_FILES['file'];
    $fileName =$_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize= $_FILES['file']['size'];
    $fileError =$_FILES['file']['error'];
    $fileTpye= $_FILES['file']['type'];
    $fileExt =explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));
    $allowed= array('jpg', 'jpeg', 'png', 'jfif');
    $email=strtolower($email);
    $staff_fullname= $_SESSION['staff_fullname']; 
    $staff_id= $_SESSION['staff_id']; 
    $staff_email= $_SESSION['staff_email']; 

    if (empty($email)) { array_push($errors, "Enter Email"); }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
    elseif (empty($phone)) { array_push($errors, "Enter phone number(+234)"); }
    elseif (empty($password)) { array_push($errors, "Enter Password"); }
    elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
    elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
    if (!$fileActualExt){
      $image = $_SESSION['staff_image'];
    }else{
      if (!$allowed){
        array_push($errors, "Upload image of (jpg, jpeg or png)type only!");
      }
      elseif($fileError == 0){
        $image = $staff_id.".".$fileActualExt;
        $fileDestination ='../vendors/images/profile/staff/'.$image;
      }else{array_push($errors, "You cannot upload image of this type");}
    }
      
    if (count($errors) == 0){
      // if($email == $staff_email){
        $update_query ="UPDATE staff_signup SET email ='$email', phone ='$phone',image ='$image',password ='$password' WHERE staff_id='$staff_id'";
        if(mysqli_query($db, $update_query)){
          move_uploaded_file($fileTmpName, $fileDestination);
          $_SESSION['success'] = "$staff_fullname information was successfully updated.";
          header('location: ../users/staff_dashboard.php');
        }else{array_push($errors, "Information not Updated!!!");}                            
      // }
      // elseif($email != $staff_email){
      //   $verify= "Unverified";
      //   $token = "EVC-".rand(0,9).uniqid(true);
      //       $receiver = $email;
      //       $subject = "Buk Bus Reservation Email Verification";
      //       $sender = "From: myunusahja2@gmail.com";
      // $body = 'Hi '.$staff_fullname.', with Staff Id: '.$staff_id.'.
      //   Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account
      //    <a href=" http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';

      //       if(mail($receiver, $subject, $body, $sender)){
      //          $update_query ="UPDATE staff_signup SET email ='$email', token ='$token', phone ='$phone', verify ='$verify', token ='$token', 
      //                 image ='$image',password ='$password' WHERE staff_id='$staff_id'";
      //          if(mysqli_query($db, $update_query)){
      //            move_uploaded_file($fileTmpName, $fileDestination);
      //            $_SESSION['success'] = "$staff_fullname information was successfully updated.";
      //            header('location: .../users/staff_dashboard.php');
      //         }else{array_push($errors, "Information not Updated!!!");}
              // }else{array_push($errors, "message not sent to email");}
    }
  } 

?>
