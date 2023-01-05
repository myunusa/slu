<?php
    session_start();

    // initializing variables
    $token = "";
    $errors = array();  

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

    // Verify users with link
    if (isset($_POST['verify_users'])) {
        // receive all input values from the form
       $token = mysqli_real_escape_string($db, $_POST['token']);

       $student_query = "SELECT * FROM student_signup WHERE token='$token'";
       $student_result = mysqli_query($db, $student_query);
       $fetch_student = mysqli_fetch_assoc($student_result);
       $student_rows=mysqli_num_rows($student_result);

       $staff_query = "SELECT * FROM staff_signup WHERE token='$token'";
       $staff_result = mysqli_query($db, $staff_query);
       $fetch_staff = mysqli_fetch_assoc($staff_result);
       $staff_rows=mysqli_num_rows($staff_result);

       if (empty($token)) { array_push($errors, "Enter verification code sent to your email"); }
       elseif (count($errors) == 0) {
           if ($student_rows > 0 ) {
            $updatequery ="UPDATE staff_signup SET verify='Verified' WHERE token='$token'";
                if(mysqli_query($db, $updatequery)){
                    $student_query = "SELECT * FROM student_signup WHERE token='$token'";
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
                    $username=$fetch_student['student_id'];

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
                    $_SESSION['success'] = "Dear $student_fullname, Your account verified successfullly!";
                    header("location:../users/student_dashboard.php");
                }
            }
            elseif ($staff_rows > 0) {
                $updatequery ="UPDATE staff_signup SET verify='Verified' WHERE token='$token'";
                if(mysqli_query($db, $updatequery)){
                    $staff_query = "SELECT * FROM staff_signup WHERE token='$token'";
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
                    $_SESSION['success'] = "Dear $staff_fullname, Your account verified successfullly!";
                    header("location:../users/staff_dashboard.php");
                }
            }else{array_push($errors, "Invalid verification code, Check verification code sent to your email");}   
        }
    }

    // Verify users with token
    if (isset($_GET['token'])){
        $token = $_GET['token'];
        
        $student_query = "SELECT * FROM student_signup WHERE token='$token'";
        $student_result = mysqli_query($db, $student_query);
        $fetch_student = mysqli_fetch_assoc($student_result);
        $student_rows=mysqli_num_rows($student_result);
 
        $staff_query = "SELECT * FROM staff_signup WHERE token='$token'";
        $staff_result = mysqli_query($db, $staff_query);
        $fetch_staff = mysqli_fetch_assoc($staff_result);
        $staff_rows=mysqli_num_rows($staff_result);

        if ($student_rows > 0 ) {
            $updatequery ="UPDATE staff_signup SET verify='Verified' WHERE token='$token'";
            if(mysqli_query($db, $updatequery)){
                $student_query = "SELECT * FROM student_signup WHERE token='$token'";
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
                $username=$fetch_student['student_id'];

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
                $_SESSION['success'] = "Dear $student_fullname, Your account verified successfullly!";
                header("location:../users/student_dashboard.php");
            }
        }
        elseif ($staff_rows > 0) {
            $updatequery ="UPDATE staff_signup SET verify='Verified' WHERE token='$token'";
            if(mysqli_query($db, $updatequery)){
                $staff_query = "SELECT * FROM staff_signup WHERE token='$token'";
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
                header("location:../users/staff_dashboard.php");
            }
        }else{
            $_SESSION['error'] = "Invalid verification link!, Check verification code sent to your email";
            header("location:../users/verify_users.php");
        }
    }

  // END OF PAGE!!!!!! 
?>