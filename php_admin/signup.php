<?php
    session_start();
    // initializing variables
    $image="";
    $fullname = "";
    $user_name= "";
    $phone= "";
    $email = "";
    $password= "";
    $radio_option = "";
    $fullname = "";
    $phone= "";
    $email= "";
    $password= "";
    $regno = "";
    $jambno = "";
    $staff_id = "";
    $errors = array();  

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

    // ADMIN REGISTRATION
    if (isset($_POST['signup'])) {
        // receive all input values from the form
        $type = mysqli_real_escape_string($db, $_POST['type']);
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
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
        $fullname=strtolower($fullname);
        $email=strtolower($email);
        $user_name=strtolower($user_name);
        
        // IF USERNAME OR EMAIL EXIST!!
         $admin_query = "SELECT * FROM admin_signup WHERE user_name='$user_name' OR email='$email' LIMIT 1";
         $admin_result = mysqli_query($db, $admin_query);
         $fetch_admin = mysqli_fetch_assoc($admin_result);
         $admin_rows=mysqli_num_rows($admin_result);
         
        // FORM VALIDATION !!
        if($fetch_admin){
            if($fetch_admin['user_name'] == $user_name){
                array_push($errors, "Username already exists");
            }
            elseif($fetch_admin['email'] == $email){
                array_push($errors, "Email already exists");
            }
        }
        elseif ($type=="Type") { array_push($errors, "Select Admin type"); }
        elseif (empty($fullname)) { array_push($errors, "Enter fullname"); }
        elseif (empty($user_name)) { array_push($errors, "Enter Username"); }
        elseif(strlen($user_name)<6){ array_push($errors, "Username must be atleast 6 characters!"); }
        elseif (empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
        elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
        elseif (empty($email)) { array_push($errors, "Enter Email"); }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
        elseif (empty($password)) { array_push($errors, "Enter Password"); }
        elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
        elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
        elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
        elseif (!in_array($fileActualExt, $allowed)){
            array_push($errors, "Upload image of (jpg, jpeg or png)type only!");
        }
        elseif(in_array($fileActualExt, $allowed)){
            if($fileError == 0){
                $fileNewName = "$user_name".".".$fileActualExt;
                $fileDestination ='../vendors/images/profile/admin/'.$fileNewName;
            }else{array_push($errors, "You cannot upload image of this type");}
        }

        // Finally, register admin if there are no errors in the form
        if (count($errors) == 0) {
            $reset_password="RP-".rand(1000,9999);
            $query = "INSERT INTO admin_signup (type, fullname, user_name, phone, email, password, image, reset_password) 
                    VALUES('$type', '$fullname', '$user_name', '$phone', '$email', '$password', '$fileNewName','$reset_password')";
            if(mysqli_query($db, $query)){
                $fullname=strtoupper($fullname);
                move_uploaded_file($fileTmpName, $fileDestination);
                // $receiver = $email;
                // $subject = "BBR ADMIN ACCOUNT SIGNUP";
                // $sender = "From:myunusahja2@gmail.com";
                // $body = 'Hi '.$fullname.', Your Username is: '.$user_name.', and your password is: '.$password.', click on the link below to signin/login. \r\n http://localhost/Buk_bus_reservation/register/signin.php';
                // if(mail($receiver, $subject, $body, $sender)){
                $fullname=strtolower($fullname);
                $_SESSION['success'] = "You have successfully register $fullname with Username: $user_name ";
                $fullname = "";
                $user_name = "";
                $phone = "";
                $email = "";
                $password = "";
                $password_1 = "";
                $errors = array();
            }
        }
    }
    // ......
    
    // REGISTER NEW STUDENT/STAFF
    if (isset($_POST['register_user'])) {
        // receive all input values from the form
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $regno = mysqli_real_escape_string($db, $_POST['regno']);
        $jambno = mysqli_real_escape_string($db, $_POST['jambno']);
        $staff_id = mysqli_real_escape_string($db, $_POST['staff_id']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $radio_option = mysqli_real_escape_string($db, $_POST['radio_option']); 
        $fullname=strtolower($fullname); 
        $regno=strtoupper($regno); 
        $jambno=strtoupper($jambno);
        $staff_id=strtoupper($staff_id);
        
        //check the buk student database if regno or jambno already exist
        $student_query = "SELECT * FROM buk_student WHERE regno='$regno' OR jambno='$jambno' LIMIT 1";
        $student_result = mysqli_query($db, $student_query);
        $fetch_student = mysqli_fetch_assoc($student_result);
        $student_rows=mysqli_num_rows($student_result);

        //check the buk staff database if staff_id  already exist
        $staff_query = "SELECT * FROM buk_staff WHERE staff_id='$staff_id' LIMIT 1";
        $staff_result = mysqli_query($db, $staff_query);
        $fetch_staff = mysqli_fetch_assoc($staff_result);
        $staff_rows=mysqli_num_rows($staff_result);

        // form validation: ensure that the form is correctly filled ...
        if (empty($radio_option)) { array_push($errors, "Are you student or staff"); }
        elseif (empty($fullname)) { array_push($errors, "Enter your name"); }
        elseif($radio_option == "student"){
            if($fetch_student){
                if($fetch_student['regno'] == $regno){array_push($errors, "Registration number already exist");}
                elseif($fetch_student['jambno'] == $jambno){array_push($errors, "Jamb number already exist");}
            }
            elseif (empty($regno)) { array_push($errors, "Enter Registration number"); }
            elseif (empty($jambno)) { array_push($errors, "Enter Jamb number"); }
        }
        elseif($radio_option == "staff"){
            if($fetch_staff){
                if($fetch_staff['staff_id'] == $staff_id){array_push($errors, "staff_id already exist");}
            }
            elseif ($department=="Department") { array_push($errors, "Select Department"); }
            elseif (empty($staff_id)) { array_push($errors, "Enter Staff Id"); }
        }
        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            if($radio_option == "student"){
                $student_query = "INSERT INTO buk_student (fullname, regno, jambno) 
                    VALUES('$fullname', '$regno', '$jambno')";
                if(mysqli_query($db, $student_query)){
                    $_SESSION['success'] = "You have successfully register $fullname";
                    $fullname = "";
                    $regno = "";
                    $jambno = "";
                    $errors = array();
                }
            }
            elseif($radio_option == "staff"){
                $staff_query = "INSERT INTO buk_staff (fullname, staff_id, department) 
                    VALUES('$fullname', '$staff_id', '$department')";
                if(mysqli_query($db, $staff_query)){
                    $_SESSION['success'] = "You have successfully register $fullname";
                    $fullname = "";
                    $staff_id = "";
                    $department = "";
                    $errors = array();
                }
            }
        }
    }
    
    // SIGNUP NEW STUDENT/STAFF
    if (isset($_POST['signup_user'])) {
        // receive all input values from the form
        $regno = mysqli_real_escape_string($db, $_POST['regno']);
        $jambno = mysqli_real_escape_string($db, $_POST['jambno']);
        $staff_id = mysqli_real_escape_string($db, $_POST['staff_id']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $radio_option = mysqli_real_escape_string($db, $_POST['radio_option']); 
        $file = $_FILES['file'];
        $fileName =$_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize= $_FILES['file']['size'];
        $fileError =$_FILES['file']['error'];
        $fileTpye= $_FILES['file']['type'];
        $fileExt =explode('.', $fileName);
        $fileActualExt= strtolower(end($fileExt));
        $allowed= array('jpg', 'jpeg', 'png', 'jfif');
        $regno=strtoupper($regno); 
        $jambno=strtoupper($jambno);
        $staff_id=strtoupper($staff_id);
        $email=strtolower($email);
        
        //check the buk student database if regno or jambno already exist
        $buk_student_query = "SELECT * FROM buk_student WHERE regno='$regno' AND jambno='$jambno' LIMIT 1";
        $buk_student_result = mysqli_query($db, $buk_student_query);
        $fetch_buk_student = mysqli_fetch_assoc($buk_student_result);
        $buk_student_rows=mysqli_num_rows($buk_student_result);

        //check the buk staff database if staff_id  already exist
        $buk_staff_query = "SELECT * FROM buk_staff WHERE staff_id='$staff_id' LIMIT 1";
        $buk_staff_result = mysqli_query($db, $buk_staff_query);
        $fetch_buk_staff = mysqli_fetch_assoc($buk_staff_result);
        $buk_staff_rows=mysqli_num_rows($buk_staff_result);

        //check the student Signup database if regno or jambno already exist
        $student_query = "SELECT * FROM student_signup WHERE regno='$regno' AND jambno='$jambno' LIMIT 1";
        $student_result = mysqli_query($db, $student_query);
        $fetch_student = mysqli_fetch_assoc($student_result);
        $student_rows=mysqli_num_rows($student_result);

        //check the staff Signup database if staff_id  already exist
        $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id' LIMIT 1";
        $staff_result = mysqli_query($db, $staff_query);
        $fetch_staff = mysqli_fetch_assoc($staff_result);
        $staff_rows=mysqli_num_rows($staff_result);

        // form validation: ensure that the form is correctly filled ...
        if (empty($radio_option)) { array_push($errors, "Are you student or staff"); }
        elseif($radio_option == "student" && empty($regno) ){
            if(empty($regno) ){array_push($errors, "Enter Registration number");}
            elseif(empty($jambno)) { array_push($errors, "Enter Jamb number"); }
            elseif($buk_student_rows ==0){array_push($errors, "You are not Student or contact ICT");}
            elseif($student_rows > 0){array_push($errors, "You have already Signup ");}
        }
        elseif($radio_option == "staff"){
            if($department=="Department") { array_push($errors, "Select Department"); }
            elseif(empty($staff_id)){array_push($errors, "Enter Staff Id"); }
            elseif($radio_option == "staff" && $buk_staff_rows ==0){array_push($errors, "You are not Staff or contact ICT");}
            elseif($staff_rows > 0){array_push($errors, "You have already Signup ");}
        }
        elseif (empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
        elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
        elseif (empty($email)) { array_push($errors, "Enter Email"); }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
        elseif (empty($password)) { array_push($errors, "Enter Password"); }
        elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
        elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
        elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
        elseif (!in_array($fileActualExt, $allowed)){array_push($errors, "Upload image of (jpg, jpeg or png)type only!");}
        elseif(in_array($fileActualExt, $allowed)){
            if($radio_option == "student"){
                $fileNewName = $regno.".".$fileActualExt;
                $fileDestination ='../vendors/images/profile/student/'.$fileNewName;
            }
            if($radio_option == "staff"){
                $fileNewName = $staff_id.".".$fileActualExt;
                $fileDestination ='../vendors/images/profile/staff/'.$fileNewName;
            }
        }
        if (count($errors) == 0) {
            if($radio_option == "student"){
                $token = "EVC-".rand(0,9).uniqid(true);
                $reset_password="RP-".rand(1000,9999);
                $verify= "Verified";
                $e_card= 5399 .rand(100000000000,999999999999);
                $e_unit= 50;
                $fullname = mysqli_real_escape_string($db, $fetch_buk_student['fullname']);
                $query = "INSERT INTO student_signup (fullname, regno, jambno , email, phone, token, verify, e_card, e_unit, image, password, reset_password) 
                VALUES('$fullname', '$regno', '$jambno', '$email', '$phone', '$token', '$verify', '$e_card', '$e_unit', '$fileNewName', '$password', '$reset_password')";
                if(mysqli_query($db, $query)){
                    $fullname=strtoupper($fullname);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // $receiver = $email;
                    // $subject = "Buk Bus Reservation Email Verification";
                    // $sender = "From: myunusahja2@gmail.com";
                    // $body = 'Hi '.$fullname.', with Registration Number: '.$regno.'. \r\n Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account \r\n <a href="http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';
                    // if(mail($receiver, $subject, $body, $sender)){
                    $fullname=strtolower($fullname);
                    $_SESSION['success'] = "You have successfully Signup $fullname";
                    $regno = "";
                    $jambno = "";
                    $email = "";
                    $phone = "";
                    $password = "";
                    $password_1 = "";
                    $errors = array();
                    // }
                }
            }
            elseif($radio_option == "staff"){
                $token = "EVC-".rand(0,9).uniqid(true);
                $reset_password="RP-".rand(1000,9999);
                $verify= "Verified";
                $e_card= 5299 .rand(100000000000,999999999999);
                $e_unit= 0;
                $fullname = mysqli_real_escape_string($db, $fetch_buk_staff['fullname']);
                $query = "INSERT INTO staff_signup (fullname, staff_id, department , email, phone, token, verify, e_card, e_unit, image, password, reset_password) 
                VALUES('$fullname', '$staff_id', '$department', '$email', '$phone', '$token', '$verify', '$e_card', '$e_unit', '$fileNewName', '$password', '$reset_password')";
                if(mysqli_query($db, $query)){
                    $fullname=strtoupper($fullname);
                    move_uploaded_file($fileTmpName, $fileDestination);
                // $receiver = $email;
                // $subject = "Buk Bus Reservation Email Verification";
                // $sender = "From: myunusahja2@gmail.com";
                // $body = 'Hi '.$fullname.', with staff Id: '.$staff_id.'. \r\n Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account \r\n <a href=" http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';

                // if(mail($receiver, $subject, $body, $sender)){
                    $fullname=strtolower($fullname);
                    $_SESSION['success'] = "You have successfully Signup $fullname";
                    $staff_id = "";
                    $department = "";
                    $email = "";
                    $phone = "";
                    $password = "";
                    $password_1 = "";
                    $errors = array();
                    // }
                }
            }
        }
    }
    // ....
?>