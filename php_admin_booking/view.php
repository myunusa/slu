<?php 
  session_start();
  $errors = array();   
  $booking_id="";

  $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

  // LIST OF STAFF UNUSED TICKETS
  $unused="0";
  $ticket_status="Not used";
  $staff_query = "SELECT * FROM staff_booking WHERE ticket_status ='$ticket_status' order by depart_date desc";
  $staff_result = mysqli_query($db, $staff_query);
  $fetch_staff= mysqli_fetch_all($staff_result,MYSQLI_ASSOC);
  
  // LIST OF STAFF TICKETS
  $used="0";
  $staff_query = "SELECT * FROM staff_booking order by depart_date desc";
  $staff_result = mysqli_query($db, $staff_query);
  $fetch_staffs= mysqli_fetch_all($staff_result,MYSQLI_ASSOC);

  // LIST OF STUDENT UNUSED TICKETS
  $unused="0";
  $ticket_status="Not used";
  $student_query = "SELECT * FROM student_booking WHERE (ticket_status1 ='$ticket_status' OR ticket_status2 ='$ticket_status')order by depart_date desc";
  $student_result = mysqli_query($db, $student_query);
  $fetch_student= mysqli_fetch_all($student_result,MYSQLI_ASSOC);

  // LIST OF STUDENT TICKETS
  $used="0";
  $student_query = "SELECT * FROM student_booking order by depart_date desc";
  $student_result = mysqli_query($db, $student_query);
  $fetch_students= mysqli_fetch_all($student_result,MYSQLI_ASSOC);

  // To view more booking detals for staff
  if (isset($_GET['staff_booking'])) {
    $booking_id=$_GET['staff_booking'];

    $booking_query = "SELECT * FROM staff_booking WHERE booking_id ='$booking_id'";
    $booking_result = mysqli_query($db, $booking_query);
    $fetch_booking = mysqli_fetch_assoc($booking_result);
    $booking_rows=mysqli_num_rows($booking_result);

    if ($booking_rows > 0) {

      $staff_id= $fetch_booking['staff_id'];

      $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id' LIMIT 1";
      $staff_result = mysqli_query($db, $staff_query);
      $fetch_staff = mysqli_fetch_assoc($staff_result);
      $staff_rows=mysqli_num_rows($staff_result);
      if ($staff_rows > 0) {
        $staff_fullname= $fetch_staff['fullname'];
        $staff_image= $fetch_staff['image'];
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

        $_SESSION['staff_fullname'] = $staff_fullname;
        $_SESSION['staff_id'] = $staff_id;
        $_SESSION['staff_image'] = $staff_image;
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
        header('location: ../admin_booking/staff_managed.php');
      }
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
        $_SESSION['address'] = $address;
        $_SESSION['student_amount'] = $student_amount;
        $_SESSION['payment_status'] = $payment_status;
        $_SESSION['ticket_status'] = $ticket_status;
        $_SESSION['booked_by'] = $booked_by;
        $_SESSION['issued_date'] = $issued_date;
        header('location: ../admin_booking/student_managed.php');
    }
  }

  // TO CHECK IN
  if (isset($_POST['check_in'])){

    $timezone=date_default_timezone_set('Africa/Lagos');
    $now_date =strtotime('now');
    $Date= date("Y-m-d", $now_date);
    $now_time =strtotime('now');
    $Time= date("H:i", $now_time);
    $Hour= date("H", $now_time);
    $min= date("i", $now_time);
    $Hours= ($Hour + 2);
    $Times= $Hours.":" .$min;

    $booking_id = mysqli_real_escape_string($db, $_POST['booking_id']);
    $booking_id=strtoupper($booking_id);

    $staff_query = "SELECT * FROM staff_booking WHERE booking_id ='$booking_id' LIMIT 1";
    $staff_result = mysqli_query($db, $staff_query);
    $fetch_staff = mysqli_fetch_assoc($staff_result);
    $staff_rows=mysqli_num_rows($staff_result);
    
    $student_query = "SELECT * FROM student_booking WHERE booking_id ='$booking_id' LIMIT 1";
    $student_result = mysqli_query($db, $student_query);
    $fetch_student = mysqli_fetch_assoc($student_result);
    $student_rows=mysqli_num_rows($student_result);
    
    if (empty($booking_id)) {array_push($errors, "Enter your Bookig Id"); }
    elseif($staff_rows > 0 ){
      $depart_from=$fetch_staff['depart_from'];
      $arrive_to=$fetch_staff['arrive_to'];
      $depart_date=$fetch_staff['depart_date'];
      $arrive_date=$fetch_staff['arrive_date'];
      $payment_status=$fetch_staff['payment_status'];
      $ticket_status=$fetch_staff['ticket_status'];

      if ($payment_status == "Not paid"){array_push($errors, "Ticket Not Paid!"); }
      elseif ($ticket_status == "Used"){array_push($errors, "Booking id already checked in!"); }
      elseif ($depart_date == $Date){
        $ticket_status= "Used";
        $updatequery ="UPDATE staff_booking SET ticket_status ='$ticket_status' WHERE booking_id='$booking_id'";
        if(mysqli_query($db, $updatequery)){
          $_SESSION['depart_from'] = $depart_from;
          $_SESSION['arrive_to'] = $arrive_to;
          $_SESSION['success'] = "Your have succussful Checked In $staff_depart_from - $staff_arrive_to" ;
        }
      }else{array_push($errors, "Not yet time to check in this booking");}
    }
    elseif($student_rows > 0 ){
      $depart_from=$fetch_student['depart_from'];
      $arrive_to=$fetch_student['arrive_to'];
      $depart_date=$fetch_student['depart_date'];
      $arrive_date=$fetch_student['arrive_date'];
      $depart_time=$fetch_student['depart_time'];
      $arrive_time=$fetch_student['arrive_time'];
      $depart_checkin=$fetch_student['depart_checkin'];
      $arrive_checkin=$fetch_student['arrive_checkin'];
      $ticket_status1=$fetch_student['ticket_status1'];
      $ticket_status2=$fetch_student['ticket_status2'];
      if ($depart_date == $Date && ($Times >= $depart_time && $Time < $depart_time)){
        if ($ticket_status1 == "Used"){array_push($errors, "Booking id already checked in!"); }
        else{

          $depart_checkin = "Checked In";
          $ticket_status = "Used";
          $updatequery ="UPDATE student_booking SET depart_checkin ='$depart_checkin', ticket_status1 ='$ticket_status' WHERE booking_id='$booking_id'";
          if(mysqli_query($db, $updatequery)){
            $_SESSION['depart_from'] = $depart_from;
            $_SESSION['arrive_to'] = $arrive_to;
            $_SESSION['success'] = "Your have succussful Checked In $depart_from - $arrive_to" ;
          }
        }
      }
      elseif ($arrive_date == $Date && ($Times >= $arrive_time && $Time < $arrive_time)){
        if ($ticket_status2 == "Used"){array_push($errors, "Booking id already checked in!"); }
        else{
          $arrive_checkin = "Checked In";
          $ticket_status = "Used";
          $updatequery ="UPDATE student_booking SET arrive_checkin ='$arrive_checkin', ticket_status2 ='$ticket_status' WHERE booking_id='$booking_id'";
          if(mysqli_query($db, $updatequery)){
            $_SESSION['arrive_to'] = $arrive_to;
            $_SESSION['depart_from'] = $depart_from;
            $_SESSION['success'] = "Your have succussful Checked In $arrive_to - $depart_from" ;
          }
        }
      }else{array_push($errors, "Not yet Time to check in this booking");}
    }else{array_push($errors, "No booking found!");}
  }
?> 