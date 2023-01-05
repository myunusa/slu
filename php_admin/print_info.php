<?php
  session_start();
  
  $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

  // To print Admin Info
  if (isset($_GET['print_admin'])) {
    $id=$_GET['print_admin'];

    $admin_query = "SELECT * FROM admin_signup WHERE id='$id'";
    $admin_result = mysqli_query($db, $admin_query);
    $fetch_admin = mysqli_fetch_assoc($admin_result);
    $admin_rows=mysqli_num_rows($admin_result);
    if ($admin_rows >0) {
      $image=$fetch_admin['image'];
      $fullname=$fetch_admin['fullname'];
      $fullname=strtoupper($fullname);
      $user_name=$fetch_admin['user_name'];
      $phone=$fetch_admin['phone'];
      $email=$fetch_admin['email'];
      $password=$fetch_admin['password'];

      $_SESSION['image'] = $image;
      $_SESSION['fullname'] = $fullname;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['phone'] = $phone;
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      header('location: ../admin_panel/print_admin_info.php');
    }
  }
  
   // To print Buk Student Info
   if (isset($_GET['print_buk_student'])) {
    $regno=$_GET['print_buk_student'];

    $buk_student_query = "SELECT * FROM buk_student WHERE regno='$regno'";
    $buk_student_result = mysqli_query($db, $buk_student_query);
    $fetch_buk_student = mysqli_fetch_assoc($buk_student_result);
    $buk_student_rows=mysqli_num_rows($buk_student_result);
    if ($buk_student_rows >0) {
      $buk_student_fullname=$fetch_buk_student['fullname'];
      $buk_student_fullname=strtoupper($buk_student_fullname);
      $buk_regno=$fetch_buk_student['regno'];
      $buk_regno=strtoupper($buk_regno);
      $buk_jambno=$fetch_buk_student['jambno'];
      $buk_jambno=strtoupper($buk_jambno);

      $_SESSION['buk_student_fullname'] = $buk_student_fullname;
      $_SESSION['buk_regno'] = $buk_regno;
      $_SESSION['buk_jambno'] = $buk_jambno;
      header('location: ../admin_panel/print_buk_student.php');
    }
  }
  
   // To print Buk Staff Info
   if (isset($_GET['print_buk_staff'])) {
    $staff_id=$_GET['print_buk_staff'];

    $buk_staff_query = "SELECT * FROM buk_staff WHERE staff_id='$staff_id'";
    $buk_staff_result = mysqli_query($db, $buk_staff_query);
    $fetch_buk_staff = mysqli_fetch_assoc($buk_staff_result);
    $buk_staff_rows=mysqli_num_rows($buk_staff_result);
    if ($buk_staff_rows >0) {
      $buk_staff_fullname=$fetch_buk_staff['fullname'];
      $buk_staff_fullname=strtoupper($buk_staff_fullname);
      $buk_staff_id=$fetch_buk_staff['staff_id'];
      $buk_staff_id=strtoupper($buk_staff_id);
      $buk_department=$fetch_buk_staff['department'];
      $buk_department=strtoupper($buk_department);

      $_SESSION['buk_staff_fullname'] = $buk_staff_fullname;
      $_SESSION['buk_staff_id'] = $buk_staff_id;
      $_SESSION['buk_department'] = $buk_department;
      header('location: ../admin_panel/print_buk_staff.php');
    }
  }

  // To print student Info
  if (isset($_GET['print_student'])) {
    $regno=$_GET['print_student'];

    $student_query = "SELECT * FROM student_signup WHERE regno='$regno'";
    $student_result = mysqli_query($db, $student_query);
    $fetch_student = mysqli_fetch_assoc($student_result);
    $student_rows=mysqli_num_rows($student_result);
    if ($student_rows >0) {
      $student_image=$fetch_student['image'];
      $student_fullname=$fetch_student['fullname'];
      $student_fullname=strtoupper($student_fullname);
      $regno=$fetch_student['regno'];
      $regno=strtoupper($regno);
      $jambno=$fetch_student['jambno'];
      $jambno=strtoupper($jambno);
      $student_email=$fetch_student['email'];
      $student_phone=$fetch_student['phone'];
      $student_e_unit=$fetch_student['e_unit'];
      $student_e_card=$fetch_student['e_card'];
      $student_token=$fetch_student['token'];
      $student_password=$fetch_student['password'];
      $student_verify=$fetch_student['verify'];

      $_SESSION['student_image'] = $student_image;
      $_SESSION['student_fullname'] = $student_fullname;
      $_SESSION['regno'] = $regno;
      $_SESSION['jambno'] = $jambno;
      $_SESSION['student_email'] = $student_email;
      $_SESSION['student_phone'] = $student_phone;
      $_SESSION['student_e_card'] = $student_e_card;
      $_SESSION['student_e_unit'] = $student_e_unit;
      $_SESSION['student_token'] = $student_token;
      $_SESSION['student_verify'] = $student_verify;
      $_SESSION['student_password'] = $student_password;
      header('location: ../admin_panel/print_student_info.php');
    }
  }
  
  // To print staff Info
  if (isset($_GET['print_staff'])) {
    $staff_id=$_GET['print_staff'];

    $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id'";
    $staff_result = mysqli_query($db, $staff_query);
    $fetch_staff = mysqli_fetch_assoc($staff_result);
    $staff_rows=mysqli_num_rows($staff_result);
    if ($staff_rows >0) {
      $staff_image=$fetch_staff['image'];
      $staff_fullname=$fetch_staff['fullname'];
      $staff_fullname=strtoupper($staff_fullname);
      $staff_id=$fetch_staff['staff_id'];
      $staff_id=strtoupper($staff_id);
      $department=$fetch_staff['department'];
      $department=strtoupper($department);
      $staff_email=$fetch_staff['email'];
      $staff_phone=$fetch_staff['phone'];
      $staff_e_unit=$fetch_staff['e_unit'];
      $staff_e_card=$fetch_staff['e_card'];
      $staff_token=$fetch_staff['token'];
      $staff_password=$fetch_staff['password'];
      $staff_verify=$fetch_staff['verify'];

      $_SESSION['staff_image'] = $staff_image;
      $_SESSION['staff_fullname'] = $staff_fullname;
      $_SESSION['staff_id'] = $staff_id;
      $_SESSION['department'] = $department;
      $_SESSION['staff_email'] = $staff_email;
      $_SESSION['staff_phone'] = $staff_phone;
      $_SESSION['staff_e_card'] = $staff_e_card;
      $_SESSION['staff_e_unit'] = $staff_e_unit;
      $_SESSION['staff_token'] = $staff_token;
      $_SESSION['staff_verify'] = $staff_verify;
      $_SESSION['staff_password'] = $staff_password;
      header('location: ../admin_panel/print_staff_info.php');
    }
  }
    // To Acknowledge Contact Us
    if (isset($_GET['acknowledge'])) {
      $id=$_GET['acknowledge'];
      $query = "SELECT * FROM contact_us WHERE id='$id'";
      $result = mysqli_query($db, $query);
      $user= mysqli_fetch_assoc($result);
      $fullname=$user['fullname'];
      $email=$user['email'];
  
      if (mysqli_num_rows($result) > 0){
        $acknowledge=1;
        $query ="UPDATE contact_us SET acknowledge ='$acknowledge' WHERE id='$id'";
        if(mysqli_query($db, $query)){
          // $subject="Acknowledged";
          // $receiver =$email;
          // $subject = $subject;
          // $body = $message;
          // $sender = "From: myunusahja2@gmail.com";
          // if(mail($receiver, $subject, $body, $sender)){
          $_SESSION['success'] = "You have successfully Acknowledged $fullname message!";
          header('location: ../admin_panel/contact_us.php');
        // }
        }
      }
    }
?>