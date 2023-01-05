<?php
    if (isset($_SESSION['username'])) {
        session_destroy();
        unset($_SESSION['username']);
        session_start();
    }else{session_start();}

    // initializing variables
    $username= "";
    $password= "";
    $email= "";
    $reset_password="";
    $token="";
    $errors = array();  

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');
    
    // STUDENT AND STAFF LOGIN
    if (isset($_POST['user_signin'])) {
        // receive all input values from the form
       $username = mysqli_real_escape_string($db, $_POST['username']);
       $password = mysqli_real_escape_string($db, $_POST['password']);
       $username=strtoupper($username);

       if (empty($username)) { array_push($errors, "Enter Reg. No./Jamb No. or Staff Id"); }
       elseif (empty($password)) { array_push($errors, "Enter Password"); }

       // Finally, register admin if there are no errors in the form
       if (count($errors) == 0) {
           // IF STUDENT OR STAFF EXIST!!
           $student_query = "SELECT * FROM student_signup WHERE regno='$username' OR jambno='$username' AND password='$password' LIMIT 1";
           $student_result = mysqli_query($db, $student_query);
           $fetch_student = mysqli_fetch_assoc($student_result);
           $student_rows=mysqli_num_rows($student_result);

           $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$username' AND password='$password' LIMIT 1";
           $staff_result = mysqli_query($db, $staff_query);
           $fetch_staff = mysqli_fetch_assoc($staff_result);
           $staff_rows=mysqli_num_rows($staff_result);

           if ($student_rows == 1) {
            $student_fullname=$fetch_student['fullname'];
            $regno=$fetch_student['regno'];
            $jambno=$fetch_student['jambno'];
            $student_email=$fetch_student['email'];
            $student_phone=$fetch_student['phone'];
            $student_token= $fetch_student['token'];
            $student_verify= $fetch_student['verify'];
            $student_e_card=$fetch_student['e_card'];
            $student_e_unit=$fetch_student['e_unit'];
            $student_image=$fetch_student['image'];
            $student_password=$fetch_student['password'];

            $_SESSION['student_fullname'] = $student_fullname;
            $_SESSION['regno'] = $regno;
            $_SESSION['jambno'] = $jambno;
            $_SESSION['student_email'] = $student_email;
            $_SESSION['student_phone'] = $student_phone;
            $_SESSION['student_verify'] = $student_verify;
            $_SESSION['student_token'] = $student_token;
            $_SESSION['student_e_card'] = $student_e_card;
            $_SESSION['student_e_unit'] = $student_e_unit;
            $_SESSION['student_image'] = $student_image;
            $_SESSION['student_password'] = $student_password;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Dear $student_fullname welcome back";
               header('location: ../users/student_dashboard.php');
           }
           elseif ($staff_rows == 1) {
            $staff_fullname=$fetch_staff['fullname'];
            $staff_id=$fetch_staff['staff_id'];
            $department=$fetch_staff['department'];
            $staff_email=$fetch_staff['email'];
            $staff_phone=$fetch_staff['phone'];
            $staff_token= $fetch_staff['token'];
            $staff_verify= $fetch_staff['verify'];
            $staff_e_card=$fetch_staff['e_card'];
            $staff_e_unit=$fetch_staff['e_unit'];
            $staff_image=$fetch_staff['image'];
            $staff_password=$fetch_staff['password'];

            $_SESSION['staff_fullname'] = $staff_fullname;
            $_SESSION['staff_id'] = $staff_id;
            $_SESSION['department'] = $department;
            $_SESSION['staff_email'] = $staff_email;
            $_SESSION['staff_phone'] = $staff_phone;
            $_SESSION['staff_verify'] = $staff_verify;
            $_SESSION['staff_token'] = $staff_token;
            $_SESSION['staff_e_card'] = $staff_e_card;
            $_SESSION['staff_e_unit'] = $staff_e_unit;
            $_SESSION['staff_image'] = $staff_image;
            $_SESSION['staff_password'] = $staff_password;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Dear $staff_fullname welcome back";
            header('location: ../users/staff_dashboard.php');
           }
           else {array_push($errors, "Invalid Reg. No./Jamb No. or Staff Id and password!");}
        }
   }


    // FORGOT PASSWORD   
    if (isset($_POST['forgot_password'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $username=strtoupper($username);
        $email=strtolower($email);

        $student_query = "SELECT * FROM student_signup WHERE regno='$username' AND email='$email' LIMIT 1";
        $student_result = mysqli_query($db, $student_query);
        $fetch_student = mysqli_fetch_assoc($student_result);
        $student_rows=mysqli_num_rows($student_result);

        $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$username' AND email='$email' LIMIT 1";
        $staff_result = mysqli_query($db, $staff_query);
        $fetch_staff = mysqli_fetch_assoc($staff_result);
        $staff_rows=mysqli_num_rows($staff_result);

        if (empty($username)) { array_push($errors, "Enter Reg. No. or Staff Id"); }
        elseif (empty($email)) { array_push($errors, "Enter Email"); }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
        
        elseif (count($errors) == 0) {
            if ($student_rows > 0 ) {
                $reset_password= $fetch_student['reset_password'];
                $regno=$fetch_student['regno'];
                $fullname=$fetch_student['fullname'];

                // $receiver = $email;
                // $subject = "RESET PASSWORD";
                // $sender = "From: myunusahja2@gmail.com";
                // $body = 'Hi '.$fullname.', with Registration Number: '.$regno.'.
                //   Your Reset Password code is '.$reset_password.'';

                // if(mail($receiver, $subject, $body, $sender)){
                    $_SESSION['regno'] = $regno;
                    $_SESSION['success'] = "Dear  $regno an email was sent to your email!";
                    header('location: ../register/reset_password.php');
                // }else{array_push($errors, "message not sent to email");}
            }
            elseif ($staff_rows > 0 ) {
                $reset_password= $fetch_staff['reset_password'];
                $staff_id=$fetch_staff['staff_id'];
                $fullname=$fetch_staff['fullname'];

                // $receiver = $email;
                // $subject = "RESET PASSWORD";
                // $sender = "From: myunusahja2@gmail.com";
                // $body = 'Hi '.$fullname.', with Stafff Id: '.$staff_id.'.
                //   Your Reset Password code is '.$reset_password.'';

                // if(mail($receiver, $subject, $body, $sender)){
                    $_SESSION['staff_id'] = $staff_id;
                    $_SESSION['success'] = "Dear  $staff_id an email was sent to your email!";
                    header('location: ../register/reset_password.php');
                // }else{array_push($errors, "message not sent to email");}
            }else {array_push($errors, "Invalid Reg. No. or Staff Id and Email!");}
        }
    }

    // REST PASSWORD   
    if (isset($_POST['password_reset'])) {
        // receive all input values from the form
        $reset_password = mysqli_real_escape_string($db, $_POST['reset_password']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

        $student_query = "SELECT * FROM student_signup WHERE reset_password='$reset_password'";
        $student_result = mysqli_query($db, $student_query);
        $fetch_student = mysqli_fetch_assoc($student_result);
        $student_rows=mysqli_num_rows($student_result);

        $staff_query = "SELECT * FROM staff_signup WHERE reset_password='$reset_password'";
        $staff_result = mysqli_query($db, $staff_query);
        $fetch_staff = mysqli_fetch_assoc($staff_result);
        $staff_rows=mysqli_num_rows($staff_result);

        if (empty($reset_password)) { array_push($errors, "Enter code sent to your email"); }
        elseif (empty($password)) { array_push($errors, "Enter Password"); }
        elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
        elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
        elseif (count($errors) == 0) {
            if ($student_rows > 0 ) {
                $reset_password="RP-".rand(1000,9999);
                $regno=$fetch_student['regno'];

                $update_query ="UPDATE student_signup SET reset_password ='$reset_password',password ='$password' WHERE regno='$regno'";
                if(mysqli_query($db, $update_query)){
                    $regno=$fetch_student['regno'];
                    $message="Dear  $regno your Password was successfully reset!";
                    $_SESSION['regno'] = $regno;
                    $_SESSION['message'] = $message;
                    header('location: ../register/user_signin.php');
                }
            }
            elseif ($staff_rows > 0 ) {
                $reset_password="RP-".rand(1000,9999);
                $staff_id=$fetch_staff['staff_id'];

                $update_query ="UPDATE staff_signup SET reset_password ='$reset_password',password ='$password' WHERE staff_id='$staff_id'";
                if(mysqli_query($db, $update_query)){
                    $staff_id=$fetch_staff['staff_id'];
                    $message="Dear  $staff_id your Password was successfully reset!";
                    $_SESSION['staff_id'] = $staff_id;
                    $_SESSION['message'] = $message;
                    header('location: ../register/user_signin.php');
                }
            }else {array_push($errors, "Invalid Reset Password Code!");}
        }
    }
?>