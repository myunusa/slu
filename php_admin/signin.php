<?php
     if (isset($_SESSION['admin'])) {
        session_destroy();
        unset($_SESSION['admin']);
    }else{session_start();}
    // initializing variables
    $admin= "";
    $password= "";
    $password_1= "";
    $reset_password="";
    $errors = array();      

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');
                
    // ADMIN LOGIN
    if (isset($_POST['signin'])) {
         // receive all input values from the form
        $admin = mysqli_real_escape_string($db, $_POST['admin']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $admin=strtolower($admin);

        if (empty($admin)) { array_push($errors, "Enter Username or Email"); }
        elseif (empty($password)) { array_push($errors, "Enter Password"); }

        // Finally, register admin if there are no errors in the form
        elseif (count($errors) == 0) {
            // IF USERNAME OR EMAIL EXIST!!
            $query = "SELECT * FROM admin_signup WHERE (user_name='$admin' OR email='$admin') AND password='$password' LIMIT 1";
            $result = mysqli_query($db, $query);
            $fetch_admin = mysqli_fetch_assoc($result);
            $rows=mysqli_num_rows($result);
            if ($rows > 0) {
                $image=$fetch_admin['image'];
                $type=$fetch_admin['type'];
                $fullname=$fetch_admin['fullname'];
                $user_name=$fetch_admin['user_name'];
                $phone=$fetch_admin['phone'];
                $email=$fetch_admin['email'];
                $password=$fetch_admin['password'];

                $_SESSION['image'] = $image;
                $_SESSION['type'] = $type;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['phone'] = $phone;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['admin'] = $admin;
                $_SESSION['success'] = "Dear $fullname welcome back";
                header('location: ../admin_panel/dashboard.php');                
            }else {array_push($errors, "Invalid Username/Email or password!");}
        }
    }

    // FORGOT PASSWORD   
    if (isset($_POST['forgot_password'])) {
        $admin = mysqli_real_escape_string($db, $_POST['admin']);
        $admin=strtolower($admin);

        if (empty($admin)) { array_push($errors, "Enter Username or Email"); }
        elseif (count($errors) == 0) {
            // IF USERNAME OR EMAIL EXIST!!
            $query = "SELECT * FROM admin_signup WHERE (user_name='$admin' OR email='$admin') LIMIT 1";
            $result = mysqli_query($db, $query);
            $fetch_admin = mysqli_fetch_assoc($result);
            $rows=mysqli_num_rows($result);

            if ($rows > 0) {
                $reset_password= $fetch_admin['reset_password'];
                $fullname=$fetch_admin['fullname'];
                $user_name=$fetch_admin['user_name'];
                $email=$fetch_admin['email'];

                // $receiver = $email;
                // $subject = "RESET PASSWORD";
                // $sender = "From: myunusahja2@gmail.com";
                // $body = 'Hi '.$fullname.', with User Name: '.$user_name.'.
                //   Your Reset Password code is '.$reset_password.'';

                // if(mail($receiver, $subject, $body, $sender)){
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['success'] = "Dear  $user_name an email was sent to your email!";
                    header('location: ../register/admin_reset.php');
                // }else{array_push($errors, "message not sent to email");}
            }else {array_push($errors, "Invalid Usnaame or Email!");}
        }
    }

    // REST PASSWORD   
    if (isset($_POST['password_reset'])) {
        // receive all input values from the form
        $reset_password = mysqli_real_escape_string($db, $_POST['reset_password']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $user_name = $_SESSION['user_name'];

        $query = "SELECT * FROM admin_signup WHERE user_name='$user_name' AND reset_password='$reset_password'";
        $result = mysqli_query($db, $query);
        $fetch_admin = mysqli_fetch_assoc($result);
        $rows=mysqli_num_rows($result);

        if (empty($reset_password)) { array_push($errors, "Enter code sent to your email"); }
        elseif (empty($password)) { array_push($errors, "Enter Password"); }
        elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
        elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
        elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
        elseif (count($errors) == 0) {
            if ($rows > 0) {
                $reset_password="RP-".rand(1000,9999);
                $update_query ="UPDATE admin_signup SET reset_password ='$reset_password',password ='$password' WHERE user_name='$user_name'";
                if(mysqli_query($db, $update_query)){
                    $message="Dear $user_name your Password was successfully reset!";
                    $_SESSION['$user_name'] = $user_name;
                    $_SESSION['message'] = $message;
                    header('location: ../register/admin_signin.php');
                }
            }else {array_push($errors, "Invalid Reset Password Code!");}
        }
    }
?>