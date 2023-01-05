<?php 
  session_start();
  $errors = array();   

  $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

  // LIST OF STAFF UNUSED TICKET
  $unused="0";
  $staff_id= $_SESSION['username'];
  $ticket_status="Not used";
  $staff_query = "SELECT * FROM staff_booking WHERE staff_id ='$staff_id' AND ticket_status ='$ticket_status' order by depart_date desc";
  $staff_result = mysqli_query($db, $staff_query);
  $fetch_staff= mysqli_fetch_all($staff_result,MYSQLI_ASSOC);

  // LIST OF STAFF TICKET
  $used="0";
  $staff_id= $_SESSION['username'];
  $staff_query = "SELECT * FROM staff_booking WHERE staff_id ='$staff_id' order by depart_date desc";
  $staff_result = mysqli_query($db, $staff_query);
  $fetch_staffs= mysqli_fetch_all($staff_result,MYSQLI_ASSOC);

  // LIST OF STUDENT UNUSED TICKET
  $unused="0";
  $regno= $_SESSION['username'];
  $ticket_status="Not used";
  $student_query = "SELECT * FROM student_booking WHERE regno ='$regno' AND (ticket_status1 ='$ticket_status' OR ticket_status2 ='$ticket_status')";
  $student_result = mysqli_query($db, $student_query);
  $fetch_student= mysqli_fetch_all($student_result,MYSQLI_ASSOC);
   
  // LIST OF STUDENT TICKET
  $used="0";
  $regno= $_SESSION['username'];
  $ticket_status="Used";
  $student_query = "SELECT * FROM student_booking WHERE regno ='$regno' order by depart_date desc";
  $student_result = mysqli_query($db, $student_query);
  $fetch_student= mysqli_fetch_all($student_result,MYSQLI_ASSOC);


  // To view more booking detals for staff
  if (isset($_GET['staff_booking'])) {
    $booking_id=$_GET['staff_booking'];

    $booking_query = "SELECT * FROM staff_booking WHERE booking_id ='$booking_id'";
    $booking_result = mysqli_query($db, $booking_query);
    $fetch_booking = mysqli_fetch_assoc($booking_result);
    $booking_rows=mysqli_num_rows($booking_result);

    if ($booking_rows > 0) {
        $staff_id= $fetch_booking['staff_id'];
        $department= $fetch_booking['department'];
        $staff_email= $fetch_booking['email'];
        $staff_phone= $fetch_booking['phone'];
        $booking_id= $fetch_booking['booking_id'];
        $depart_from= $fetch_booking['depart_from'];
        $arrive_to= $fetch_booking['arrive_to'];
        $depart_date= $fetch_booking['depart_date'];
        $arrive_date= $fetch_booking['arrive_date'];
        $No_of_students= $fetch_booking['No_of_students'];
        $address= $fetch_booking['address'];
        $amount= $fetch_booking['amount'];
        $payment_status= $fetch_booking['payment_status'];
        $ticket_status= $fetch_booking['ticket_status'];
        $booked_by= $fetch_booking['booked_by'];
        $issued_date= $fetch_booking['issued_date'];

        $_SESSION['staff_id'] = $staff_id;
        $_SESSION['department'] = $department;
        $_SESSION['staff_email'] = $staff_email;
        $_SESSION['staff_phone'] = $staff_phone;
        $_SESSION['booking_id'] = $booking_id;
        $_SESSION['depart_from'] = $depart_from;
        $_SESSION['arrive_to'] = $arrive_to;
        $_SESSION['depart_date'] = $depart_date;
        $_SESSION['arrive_date'] = $arrive_date;
        $_SESSION['No_of_students'] = $No_of_students;
        $_SESSION['address'] = $address;
        $_SESSION['amount'] = $amount;
        $_SESSION['payment_status'] = $payment_status;
        $_SESSION['ticket_status'] = $ticket_status;
        $_SESSION['booked_by'] = $booked_by;
        $_SESSION['issued_date'] = $issued_date;
        header('location: ../booking/staff_managed.php');
    }
  }

  // To view more booking detals for student
  if (isset($_GET['student_booking'])) {
    $booking_id=$_GET['student_booking'];
    $regno= $_SESSION['regno'];
    
    $booking_query = "SELECT * FROM student_booking WHERE booking_id ='$booking_id'";
    $booking_result = mysqli_query($db, $booking_query);
    $fetch_booking = mysqli_fetch_assoc($booking_result);
    $booking_rows=mysqli_num_rows($booking_result);

    if ($booking_rows > 0) {
        $regno= $fetch_booking['regno'];
        $student_email= $fetch_booking['email'];
        $student_phone= $fetch_booking['phone'];
        $booking_id= $fetch_booking['booking_id'];
        $depart_from= $fetch_booking['depart_from'];
        $arrive_to= $fetch_booking['arrive_to'];
        $depart_date= $fetch_booking['depart_date'];
        $depart_time= $fetch_booking['depart_time'];
        $depart_seat= $fetch_booking['depart_seat'];
        $depart_checkin= $fetch_booking['depart_checkin'];
        $ticket_status1= $fetch_booking['ticket_status1'];
        $arrive_date= $fetch_booking['arrive_date'];
        $arrive_time= $fetch_booking['arrive_time'];
        $arrive_seat= $fetch_booking['arrive_seat'];
        $arrive_checkin= $fetch_booking['arrive_checkin'];
        $ticket_status2= $fetch_booking['ticket_status2'];
        $ticket_type= $fetch_booking['ticket_type'];
        $student_amount= $fetch_booking['amount'];
        $booked_by= $fetch_booking['booked_by'];
        $issued_date= $fetch_booking['issued_date'];

        $_SESSION['regno'] = $regno;
        $_SESSION['student_email'] = $student_email;
        $_SESSION['student_phone'] = $student_phone;
        $_SESSION['booking_id'] = $booking_id;
        $_SESSION['depart_from'] = $depart_from;
        $_SESSION['arrive_to'] = $arrive_to;
        $_SESSION['depart_date'] = $depart_date;
        $_SESSION['depart_time'] = $depart_time;
        $_SESSION['depart_seat'] = $depart_seat;
        $_SESSION['depart_checkin'] = $depart_checkin;
        $_SESSION['ticket_status1'] = $ticket_status1;
        $_SESSION['arrive_date'] = $arrive_date;
        $_SESSION['arrive_time'] = $arrive_time;
        $_SESSION['arrive_seat'] = $arrive_seat;
        $_SESSION['arrive_checkin'] = $arrive_checkin;
        $_SESSION['ticket_status2'] = $ticket_status2;
        $_SESSION['ticket_type'] = $ticket_type;
        $_SESSION['student_amount'] = $student_amount;
        $_SESSION['payment_status'] = $payment_status;
        $_SESSION['ticket_status'] = $ticket_status;
        $_SESSION['booked_by'] = $booked_by;
        $_SESSION['issued_date'] = $issued_date;
        header('location: ../booking/student_managed.php');
    }
  }
  // TO CHECK IN

  // DEPARTURE CHECK IN
  if (isset($_POST['depart_checkin'])){
    $timezone=date_default_timezone_set('Africa/Lagos');
    $now_date =strtotime('now');
    $Date= date("Y-m-d", $now_date);
    $now_time =strtotime('now');
    $times= date("H:i", $now_time);
    $Hour= date("H", $now_time);
    $min= date("i", $now_time);
    $Hours= ($Hour + 2);
    $Time= $Hours.":" .$min;

    $booking_id= $_SESSION['booking_id'];
    $depart_from= $_SESSION['depart_from'];
    $arrive_to= $_SESSION['arrive_to'];
    $depart_date=$_SESSION['depart_date'];
    $depart_time=$_SESSION['depart_time'];
    
    // $booking_query = "SELECT * FROM student_booking WHERE booking_id ='$booking_id' LIMIT 1";
    // $booking_result = mysqli_query($db, $booking_query);
    // $fetch_booking = mysqli_fetch_assoc($booking_result);
    // $booking_rows=mysqli_num_rows($booking_result);
    
    // if($user > 0 ){
      //   $user_depart_from=$user['depart_from'];
      //   $user_arrive_to=$user['arrive_to'];
      //   $user_depart_date=$user['depart_date'];
      //   $user_depart_time=$user['depart_time'];
      //   $user_arrive_date=$user['arrive_date'];
      //   $user_arrive_time=$user['arrive_time'];
      if( $depart_date > $Date || ($depart_date == $Date && $depart_time >= $Time)){
        $depart_checkin= "Checked in";
        $updatequery ="UPDATE student_booking SET depart_checkin ='$depart_checkin' WHERE booking_id='$booking_id'";
        if(mysqli_query($db, $updatequery)){
          $_SESSION['depart_checkin'] = $depart_checkin;
          $_SESSION['success'] = "Your have succussful Checked In $depart_from - $arrive_to" ;
        }else{array_push($errors, "Not checked in");}
    }else{array_push($errors, "Check In close");}	
  }	
  
  // ARRIVAL CHECK IN
  if (isset($_GET['arrive_checkin'])) {

    $booking_id=$_GET['arrive_checkin'];
    $depart_from=$_SESSION['depart_from'];
    $arrive_to=$_SESSION['arrive_to'];
    $arrive_date=$_SESSION['arrive_date'];
    $arrive_time=$_SESSION['arrive_time'];

    if ( $arrive_date > $Date || ($arrive_date == $Date && $arrive_time >= $Time)){
      $arrive_checkin= "Checked in";
      $updatequery ="UPDATE student_booking SET arrive_checkin ='$arrive_checkin' WHERE booking_id='$booking_id'";
      if(mysqli_query($db, $updatequery)){
        $_SESSION['arrive_checkin'] = $arrive_checkin;
        $_SESSION['success'] = "Your have succussful Checked In $arrive_to - $depart_from" ;
        header('location: ../booking/student_managed.php');
      }else{$_SESSION['errors'] = "Not checked in"; header('location: ../booking/student_managed.php');}
    }else{ $_SESSION['errors'] = "Check In close"; header('location: ../booking/student_managed.php');}	
  }	
?> 