<?php
  session_start();

  $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

  // To Delete Admin
  if (isset($_GET['delete_admin'])) {
    $id=$_GET['delete_admin'];
    $query = "SELECT * FROM admin_signup WHERE id='$id'";
    $result = mysqli_query($db, $query);
    $user= mysqli_fetch_assoc($result);
    $fullname=$user['fullname'];

    if (mysqli_num_rows($result) > 0){
      $query = "DELETE FROM admin_signup WHERE id='$id'";
      if(mysqli_query($db, $query)){
        $_SESSION['success'] = "You have successfully deleted $fullname as Admin!";
        header('location: ../admin_panel/admin.php');
      }
    }
  }

  // To Delete Buk Student
  if (isset($_GET['delete_buk_student'])) {
    $regno=$_GET['delete_buk_student'];
    $query = "SELECT * FROM buk_student WHERE regno='$regno'";
    $result = mysqli_query($db, $query);
    $user= mysqli_fetch_assoc($result);
    $regno=$user['regno'];

    if (mysqli_num_rows($result) > 0){
      $query = "DELETE FROM buk_student WHERE regno='$regno'";
      if(mysqli_query($db, $query)){
        $signup_query = "DELETE * FROM student_signup WHERE regno='$regno'";
        if(mysqli_query($db, $signup_query)){
          $_SESSION['success'] = "You have successfully deleted $regno";
          header('location: ../admin_panel/buk_student.php');
        }
      }
    }
  }
  // To Delete Buk staff
  if (isset($_GET['delete_buk_staff'])) {
    $staff_id=$_GET['delete_buk_staff'];
    $query = "SELECT * FROM buk_staff WHERE staff_id='$staff_id'";
    $result = mysqli_query($db, $query);
    $user= mysqli_fetch_assoc($result);
    $staff_id=$user['staff_id'];

    if (mysqli_num_rows($result) > 0){
      $query = "DELETE FROM buk_staff WHERE staff_id='$staff_id'";
      if(mysqli_query($db, $query)){
        $signup_query = "DELETE * FROM staff_signup WHERE staff_id='$staff_id'";
        if(mysqli_query($db, $signup_query)){
          $_SESSION['success'] = "You have successfully deleted $staff_id";
          header('location: ../admin_panel/buk_staff.php');
        }
      }
    }
  }
  
  // To Delete signup student
  if (isset($_GET['delete_student'])) {
    $regno=$_GET['delete_student'];
    $query = "SELECT * FROM student_signup WHERE regno='$regno'";
    $result = mysqli_query($db, $query);
    $user= mysqli_fetch_assoc($result);
    $regno=$user['regno'];
    if (mysqli_num_rows($result) > 0){
      $query = "DELETE FROM student_signup WHERE regno='$regno'";
      if(mysqli_query($db, $query)){
          $_SESSION['success'] = "You have successfully deleted $regno";
          header('location: ../admin_panel/signup_student.php');
      }
    }
  }

  // To Delete signup staff
  if (isset($_GET['delete_staff'])) {
    $staff_id=$_GET['delete_staff'];
    $query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id'";
    $result = mysqli_query($db, $query);
    $user= mysqli_fetch_assoc($result);
    $staff_id=$user['staff_id'];
    if (mysqli_num_rows($result) > 0){
      $query = "DELETE FROM staff_signup WHERE staff_id='$staff_id'";
      if(mysqli_query($db, $query)){
          $_SESSION['success'] = "You have successfully deleted $staff_id";
          header('location: ../admin_panel/signup_staff.php');
      }
    }
  }


  // To Delete staff Booking
  if (isset($_GET['staff_booking'])) {
    $booking_id=$_GET['staff_booking'];
    $query = "SELECT * FROM staff_booking WHERE booking_id='$booking_id'";
    $result = mysqli_query($db, $query);
    $fetch_booking= mysqli_fetch_assoc($result);
    $staff_id=$fetch_booking['staff_id'];
    $payment_status=$fetch_booking['payment_status'];
    $amount=$fetch_booking['amount'];

    $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id'";
    $staff_result = mysqli_query($db, $staff_query);
    $fetch_staff = mysqli_fetch_assoc($staff_result);
    $staff_rows=mysqli_num_rows($staff_result);
    
    if($staff_rows > 0 && $payment_status !="Paid" ){
      $e_unit1 =$fetch_staff['e_unit'];
      $e_unit = ($e_unit1 - $amount);
      $updatequery ="UPDATE staff_signup SET e_unit ='$e_unit' WHERE staff_id='$staff_id'";
      if(mysqli_query($db, $updatequery)){
        $query = "DELETE FROM staff_booking WHERE booking_id='$booking_id'";
        if(mysqli_query($db, $query)){
          $_SESSION['success'] = "You have successfully deleted $booking_id";
          header('location: ../admin_booking/staff_manage.php');
        }
      }
    }
  }

   // To Delete student Booking
   if (isset($_GET['student_booking'])) {
    $booking_id=$_GET['student_booking'];
    $query = "SELECT * FROM student_booking WHERE booking_id='$booking_id'";
    $result = mysqli_query($db, $query);
    $fetch_booking= mysqli_fetch_assoc($result);
    $booking_rows=mysqli_num_rows($result);
    
    if($booking_rows > 0){
      $query = "DELETE FROM student_booking WHERE booking_id='$booking_id'";
      if(mysqli_query($db, $query)){
        $_SESSION['success'] = "You have successfully deleted $booking_id";
        header('location: ../admin_booking/student_manage.php');
      }
    }
  }

    // To Delete Contact Us
    if (isset($_GET['delete_contact'])) {
      $id=$_GET['delete_contact'];
      $query = "SELECT * FROM contact_us WHERE id='$id'";
      $result = mysqli_query($db, $query);
      $user= mysqli_fetch_assoc($result);
      $fullname=$user['fullname'];
  
      if (mysqli_num_rows($result) > 0){
        $query = "DELETE FROM contact_us WHERE id='$id'";
        if(mysqli_query($db, $query)){
          $_SESSION['success'] = "You have successfully deleted $fullname message!";
          header('location: ../admin_panel/contact_us.php');
        }
      }
    }
  
?>