<?php
    session_start();

    $timezone=date_default_timezone_set('Africa/Lagos');
    $Date_Time =strtotime('now');
    $date_time= date("Y-m-d H:i", $Date_Time);
        
    // initializing variables
    $radio_option = "";
    $fullname = "";
    $phone = "";
    $email = "";
    $regno = "";
    $jambno = "";
    $staff_id = "";
    $department = "";
    $subject = "";
    $message = "";
    $password= "";
    $reset_password="";
    $errors = array();  

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

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
        $department=strtolower($department);
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
        if (count($errors) > 0) {$selector="true";}
        elseif (empty($radio_option)) { array_push($errors, "Are you student or staff"); }
        elseif($radio_option == "student"){
            if (empty($regno)) { array_push($errors, "Enter Registration number"); }
            elseif (empty($jambno)) { array_push($errors, "Enter Jamb number"); }
            elseif($buk_student_rows ==0){array_push($errors, "You are not Student or contact ICT");}
            elseif($student_rows > 0){array_push($errors, "You have already Signup ");}
        }
        elseif($radio_option == "staff"){
            if (empty($staff_id)) { array_push($errors, "Enter Staff Id"); }
            elseif($buk_staff_rows ==0){array_push($errors, "You are not Staff or contact ICT");}
            elseif($staff_rows > 0){array_push($errors, "You have already Signup ");}
            elseif (empty($department)) { array_push($errors, "Select Department"); }
        }
        elseif (empty($email)) { array_push($errors, "Enter Email"); }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
        elseif (empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
        elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
        elseif (empty($password)) { array_push($errors, "Enter Password"); }
        elseif (empty($password_1)) { array_push($errors, "Confirm Password"); }
        elseif(strlen($password) < 6){array_push($errors, "Password must be atleast 6!"); }
        elseif ($password != $password_1) {array_push($errors, "The two passwords do not match"); }
        elseif (!in_array($fileActualExt, $allowed)){
            array_push($errors, "Upload image of (jpg, jpeg or png)type only!");
        }
        elseif(in_array($fileActualExt, $allowed)){
            $fileNewName = $regno.".".$fileActualExt;
            if($radio_option == "student"){
                $fileDestination ='../vendors/images/profile/student/'.$fileNewName;
            }
            if($radio_option == "staff"){
                $fileDestination ='../vendors/images/profile/staff/'.$fileNewName;
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            if($radio_option == "student"){
                $token = "EVC-".rand(0,9).uniqid(true);
                $reset_password="RP-".rand(1000,9999);
                $verify= "Verified";
                $e_card= 5399 .rand(100000000000,999999999999);
                $e_unit= 50;
                $student_fullname = mysqli_real_escape_string($db, $fetch_student['fullname']);
                $query = "INSERT INTO student_signup (fullname, regno, jambno , email, phone, token, verify, e_card, e_unit, image, password, reset_password) 
                VALUES('$student_fullname', '$regno', '$jambno', '$email', '$phone', '$token', '$verify', '$e_card', '$e_unit', '$fileNewName', '$password', '$reset_password')";
                if(mysqli_query($db, $query)){
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $student_query = "SELECT * FROM student_signup WHERE regno='$regno' AND jambno='$jambno' LIMIT 1";
                    $student_result = mysqli_query($db, $student_query);
                    $fetch_student = mysqli_fetch_assoc($student_result);
                    $student_rows=mysqli_num_rows($student_result);

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
                    $username=$fetch_student['regno'];
                    $student_fullname=strtoupper($student_fullname);
                    
                    // $receiver = $email;
                    // $subject = "Buk Bus Reservation Email Verification";
                    // $sender = "From: myunusahja2@gmail.com";
                    // $body = 'Hi '.$student_fullname.', with Registration Number: '.$regno.'.
                    //   Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account
                    //    <a href=" http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';

                    // if(mail($receiver, $subject, $body, $sender)){
                    //  $student_fullname=strtolower($student_fullname);
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
                        $_SESSION['success'] = "Dear $student_fullname welcome, you are now logged in ";
                        header('location: ../users/student_dashboard.php');
                    // }else{array_push($errors, "message not sent to email");}
                }
            }
            elseif($radio_option == "staff"){
                $token = "EVC-".rand(0,9).uniqid(true);
                $reset_password="RP-".rand(1000,9999);
                $verify= "Verified";
                $e_card= 5299 .rand(100000000000,999999999999);
                $e_unit= 0;
                $staff_fullname = mysqli_real_escape_string($db, $fetch_staff['fullname']);                                       
                $query = "INSERT INTO staff_signup (fullname, staff_id, department , email, phone, token, verify, e_card, e_unit, image, password, reset_password) 
                VALUES('$staff_fullname', '$staff_id', '$department', '$email', '$phone', '$token', '$verify', '$e_card', '$e_unit', '$fileNewName', '$password', '$reset_password')";
                if(mysqli_query($db, $query)){
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id' LIMIT 1";
                    $staff_result = mysqli_query($db, $staff_query);
                    $fetch_staff = mysqli_fetch_assoc($staff_result);
                    $staff_rows=mysqli_num_rows($staff_result);

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
                    $username=$fetch_staff['staff_id'];
                    $staff_fullname=strtoupper($staff_fullname);
                    // $receiver = $email;
                    // $subject = "Buk Bus Reservation Email Verification";
                    // $sender = "From: myunusahja2@gmail.com";
                    // $body = 'Hi '.$staff_fullname.', with staff Id: '.$staff_id.'.
                    //   Your Verification code is '.$token.',Click on the link below to verify your Buk Bus Reservation account
                    //    <a href=" http://localhost/Buk_bus_reservation/php_users/verify_users.php?token='.$token.'">Verify Account</a>';
                    // if(mail($receiver, $subject, $body, $sender)){
                 
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
                        $_SESSION['success'] = "Dear $staff_fullname welcome, you are now logged in ";
                        header('location: ../users/staff_dashboard.php');
                    // }else{array_push($errors, "message not sent to email");}
                }
            }
        }
    }
    // ....

    // NEW Contact Us
    if (isset($_POST['submit_contact_us'])) {
        // receive all input values from the form
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $subject = mysqli_real_escape_string($db, $_POST['subject']);
        $message = mysqli_real_escape_string($db, $_POST['message']);
        $message = mysqli_real_escape_string($db, $_POST['message']);
        
        // form validation: ensure that the form is correctly filled ...
        if (empty($fullname)) { array_push($errors, "Enter your name"); }
        elseif(strlen($fullname)<2){ array_push($errors, "Name is too short!"); }
        elseif (empty($phone) || !is_numeric($phone)) { array_push($errors, "Enter phone number(e.g 08064405746)"); }
        elseif($phone < 7000000000 || $phone > 9199999999){array_push($errors, "Invalid Number (e.g 08064405746)");}
        elseif (empty($email)) { array_push($errors, "Enter Email"); }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ array_push($errors, "Enter Valid Email"); }
        elseif (empty($subject)) { array_push($errors, "Write Subject"); }
        elseif (empty($message)) { array_push($errors, "Write Message"); }
        
        elseif (count($errors) == 0){
            $acknowledge="Not acknowledged";
            $fullname=strtolower($fullname); 
            $email=strtoupper($email);
            $subject=strtoupper($subject);
            $receiver =  "myunusahja2@gmail.com";
            $from = "FROM: $email";
            $body = "$subject \r\n Send by: $fullname , Phone number: $phone \r\n $message";
            $sender = "From: $email";            
            $email=strtolower($email);
            $subject=strtolower($subject);
            $query = "INSERT INTO contact_us (fullname, phone, email, subject, message, date_time, acknowledge) 
                VALUES('$fullname', '$phone', '$email', '$subject', '$message', '$date_time', '$acknowledge')";
            if(mysqli_query($db, $query)){
                // if(mail($receiver, $from, $body, $sender)){
                    $_SESSION['success'] = "Dear $fullname, your message sent scuccessful!";
                    $fullname = "";
                    $phone = "";
                    $email = "";
                    $subject = "";
                    $message = "";
                    $errors = array();
                // }else{array_push($errors, "message not sent to email");}
            }
        }
    }

  // END OF PAGE!!!!!! 
?>