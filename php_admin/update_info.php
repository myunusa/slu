<?php
   session_start();
    $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');
   // initializing variables
   $image="";
   $phone= "";
   $password= "";
   $old_password= "";
   $email= "";
   $phone= "";
   $password= "";
   $fullname= "";
   $regno= "";
   $jambno= "";
   $errors = array();

   // Change Admin Password
   if (isset($_POST['change_password'])) {
    // receive all input values from the form
    $old_password = mysqli_real_escape_string($db, $_POST['old_password']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $old_password=strtolower($old_password);
    $password=strtolower($password);
    $password_1=strtolower($password_1);
    $user_name=$_SESSION['user_name'];

    // IF Current Passworld is correct!!
    $password_query = "SELECT * FROM admin_signup WHERE user_name='$user_name'AND password='$old_password' LIMIT 1";
    $password_result = mysqli_query($db, $password_query);
    $fetch_password = mysqli_fetch_assoc($password_result);
    $password_rows=mysqli_num_rows($password_result);

    // FORM VALIDATION !!
    if (empty($old_password)) { array_push($errors, "Enter Current Password"); }
    elseif (empty($password)) { array_push($errors, "Enter Password"); }
    elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
    elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
    elseif ($password != $password_1) {array_push($errors, "The two new passwords do not match"); }

    elseif($password_rows > 0 && count($errors) == 0) {
      $updatequery ="UPDATE admin_signup SET password ='$password' WHERE user_name='$user_name'";
      if(mysqli_query($db, $updatequery)){
        $image=$fetch_password['image'];
        $type=$fetch_password['type'];
        $fullname=$fetch_password['fullname'];
        $user_name=$fetch_password['user_name'];
        $phone=$fetch_password['phone'];
        $email=$fetch_password['email'];
        $password=$fetch_password['password'];
        $admin=$_SESSION['admin'];

        $_SESSION['image'] = $image;
        $_SESSION['type'] = $type;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['admin'] = $admin;
        $_SESSION['success'] = "Dear $fullname, your passworld successfully change!";
        header('location: ../admin_panel/dashboard.php');        
      }
    }else{ array_push($errors, "Invalid Current Passworld"); }
  }

  // ... 
    
  // Update Existing Admin information
  if (isset($_POST['admin_update'])) {
    // receive all input values from the form
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
    $password=strtolower($password);
    $password_1=strtolower($password_1);
    $user_name= $_SESSION['user_name']; 
    
    // IF USERNAME EXIST!!
    $user_name_query = "SELECT * FROM admin_signup WHERE user_name='$user_name' LIMIT 1";
    $user_name_result = mysqli_query($db, $user_name_query);
    $fetch_user_name = mysqli_fetch_assoc($user_name_result);
    $user_name_rows=mysqli_num_rows($user_name_result);

    if (empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
    elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
    elseif (empty($password)) { array_push($errors, "Enter Password"); }
    elseif (empty($password_1)) { array_push($errors, "Re-enter Password"); }
    elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
    elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
    elseif (!$fileActualExt){$image = $_SESSION['image'];}
    elseif(!$allowed){array_push($errors, "Upload image of (jpg, jpeg or png)type only!");}
    elseif(in_array($fileActualExt, $allowed)){
      if($fileError == 0){
        $image = $user_name.".".$fileActualExt;
        $fileDestination ='../vendors/images/profile/admin/'.$image;
      }else{array_push($errors, "You cannot upload image of this type");}
    }
    if (count($errors) == 0){
      $email = $_SESSION['email'];
      $fullname = $_SESSION['fullname'];      
      $update_query ="UPDATE admin_signup SET phone ='$phone', password ='$password',image ='$image' WHERE user_name='$user_name'";
      if(mysqli_query($db, $update_query)){
        move_uploaded_file($fileTmpName, $fileDestination);
        // $receiver = $email;
        // $subject = "BBR ADMIN INFO. UPDATE";
        // $sender = "From:myunusahja2@gmail.com";
        // $body = 'Hi '.$fullname.', Your information updated';
        // if(mail($receiver, $subject, $body, $sender)){
        $_SESSION['success'] = "$fullname information was successfully updated.";
        header('location: ../admin_panel/admin.php');
        // }
      }else{array_push($errors, "Information not Updated!!!");}
    }
  }
  // ... 
    
  // Update Existing  student information
  if (isset($_POST['student'])) {
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

    if (empty($email)) { array_push($errors, "Enter Email"); }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
    elseif(empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
    elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
    elseif (empty($phone)) { array_push($errors, "Enter phone number(+234)"); }
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
          $_SESSION['success'] = "$student_fullname information was successfully updated.";
          header('location: ../admin_panel/signup_student.php');
        }else{array_push($errors, "Information not Updated!!!");}
      // }
      // elseif($email != $student_email){
      //  $verify= "Unverified";
      //  $token = "EVC-".rand(0,9).uniqid(true);
      //  $update_query ="UPDATE student_signup SET email ='$email', phone ='$phone', verify ='$verify', token ='$token', 
      //                 image ='$image',password ='$password' WHERE regno='$regno'";
      //  if(mysqli_query($db, $update_query)){
      //    move_uploaded_file($fileTmpName, $fileDestination);
      //    $receiver = $email;
      //    $subject = "Buk Bus Reservation Email Verification";
      //    $sender = "From: myunusahja2@gmail.com";
      //    $body = 'Hi '.$student_fullname.', with Registration Number: '.$regno.'. \r\n Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account \r\n <a href="http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';
      //    if(mail($receiver, $subject, $body, $sender)){
      //      $_SESSION['success'] = "$student_fullname information was successfully updated.";
      //      header('location: ../admin_panel/signup_student.php');
      //    }        
      //   }else{array_push($errors, "Information not Updated!!!");}
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
          $_SESSION['success'] = "$staff_fullname information was successfully updated.";
          header('location: ../admin_panel/signup_staff.php');
        }else{array_push($errors, "Information not Updated!!!");}
      // }
      // elseif($email != $staff_email){
      //   $verify= "Unverified";
      //   $token = "EVC-".rand(0,9).uniqid(true);
      //   $update_query ="UPDATE staff_signup SET email ='$email', phone ='$phone', verify ='$verify', token ='$token', 
      //                 image ='$image',password ='$password' WHERE staff_id='$staff_id'";
      //   if(mysqli_query($db, $update_query)){
      //    move_uploaded_file($fileTmpName, $fileDestination);
      //    $receiver = $email;
      //    $subject = "Buk Bus Reservation Email Verification";
      //    $sender = "From:myunusahja2@gmail.com";
      //    $body = 'Hi '.$staff_fullname.', with Staff Id: '.$staff_id.'. \r\n Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account \r\n <a href="http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';
      //    if(mail($receiver, $subject, $body, $sender)){
      //      $_SESSION['success'] = "$staff_fullname information was successfully updated.";
      //      header('location: ../admin_panel/signup_staff.php');
      //     }        
      //    }else{array_push($errors, "Information not Updated!!!");}
    }
  } 

?>