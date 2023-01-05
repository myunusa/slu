<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

  // initializing variables
    $timezone=date_default_timezone_set('Africa/Lagos');
    $now_date =strtotime('now');
    $Date= date("Y-m-d", $now_date);
    $now_time =strtotime('now');
    $Time= date("H:i", $now_time);
    $Date_Time =strtotime('now');
    $date_time= date("Y-m-d H:i", $Date_Time);
    $week_end =strtotime('sunday');
    $Sunday= date("Y-m-d", $week_end);
    $last_day =strtotime('+6 day');
    $Lastday= date("Y-m-d", $last_day);
    $Hour= date("H", $now_time);
    $min= date("i", $now_time);
    $Hours= ($Hour + 2);
    $Times= $Hours.":" .$min;

    $regno="";
    $depart_date="";
    $arrive_date="";
    $depart_time="";
    $arrive_time="";
    $selector="";
    $file="";
    $booking_id="";
    $depart_seat=1;
    $depart_checkin="Not checkin";
    $ticket_status1="Not used";
    $arrive_time="Null";
    $arrive_seat=0;
    $arrive_checkin="Null";
    $ticket_status2="Null";
    $ticket_type="One way";
    $student_amount=50;
    $radio_option="One way";
    $errors = array();   

   
  // STUDENT NEW BOOKING
  if (isset($_POST['student_booking'])) {
    // receive all input values from the form
    $regno = mysqli_real_escape_string($db, $_POST['regno']);
    $depart_from = mysqli_real_escape_string($db, $_POST['depart_from']);
    $arrive_to = mysqli_real_escape_string($db, $_POST['arrive_to']);
    $depart_date = $_POST['depart_date'];
    $arrive_date = $_POST['arrive_date'];
    $depart_time = mysqli_real_escape_string($db, $_POST['depart_time']);
    $arrive_time = mysqli_real_escape_string($db, $_POST['arrive_time']);
    $radio_option = mysqli_real_escape_string($db, $_POST['radio_option']);
    $regno=strtoupper($regno);

    $depart_query = "SELECT * FROM student_booking WHERE (depart_date ='$depart_date' AND
      depart_time ='$depart_time') OR (arrive_date ='$depart_date' AND arrive_time ='$depart_time') order by depart_seat desc";
    $depart_result = mysqli_query($db, $depart_query);
    $fetch_depart = mysqli_fetch_assoc($depart_result);
    $depart_rows=mysqli_num_rows($depart_result);
    if($fetch_depart){
      $seat= $fetch_depart['depart_seat'];
      $depart_seat=$seat +1;
    }

    $arrive_query ="SELECT * FROM student_booking WHERE (depart_date ='$arrive_date' AND
      depart_time ='$arrive_time') OR (arrive_date ='$arrive_date' AND arrive_time ='$arrive_time') order by arrive_seat desc";
    $arrive_result = mysqli_query($db, $arrive_query);
    $fetch_arrive = mysqli_fetch_assoc($arrive_result);
    $arrive_rows=mysqli_num_rows($arrive_result);
     
    $student_query = "SELECT * FROM student_signup WHERE regno='$regno' LIMIT 1";
    $student_result = mysqli_query($db, $student_query);
    $fetch_student = mysqli_fetch_assoc($student_result);
    $student_rows=mysqli_num_rows($student_result);
    
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($regno)) { array_push($errors, "Enter Registration Number"); }
    elseif ($student_rows <1) {array_push($errors, "Invalid Registration Number");}
    elseif ($depart_from=="From") { array_push($errors, "Depart From"); }
    elseif ($arrive_to=="To") { array_push($errors, "Arrive To"); }
    elseif ( $depart_from == $arrive_to){array_push($errors,"You can't pick thesame route!");}
    elseif (empty($depart_date)) { array_push($errors, "Select departure date"); }
    elseif ($depart_time=="Time") { array_push($errors, "Select departure time"); }
    elseif ( $depart_date < $Date){array_push($errors,"Invalid departure dat");}
    elseif ( $depart_date <= $Date && $depart_time <= $Time){array_push($errors,"Invalid departure time");}
    elseif ( $depart_date > $Lastday){array_push($errors,"You can only Booking within the week");}
    elseif ( $depart_date == $Sunday){array_push($errors,"You can't make Booking on sundays");}
    elseif ($depart_rows >=10){array_push($errors,'The departure date and time you picked is fully booked');}
    elseif ($radio_option == "Return"){
      if (empty($arrive_date)) { array_push($errors, "Select return date"); }
      elseif ($arrive_time=="Time") { array_push($errors, "Select return time"); }
      elseif ( $arrive_date < $Date){array_push($errors,"Invalid Return date");}
      elseif ( $arrive_date <= $Date && $arrive_time <= $Time){array_push($errors,"Invalid Return time");}
      elseif ( $arrive_date < $depart_date){array_push($errors,"Pick return date ahead of departure date");}
      elseif ( $arrive_date == $Sunday){ array_push($errors,"You can't make Booking on sundays");}
      elseif ($arrive_rows >= 10){array_push($errors,'The arrival date and time you picked is fully booked');}
      $arrive_seat=1;
      $arrive_checkin="Not checkin";
      $ticket_status2="Not used";
      $ticket_type="Return";
      $student_amount=100;
      if($fetch_arrive){
        $seat= $fetch_arrive['arrive_seat'];
        $arrive_seat=$seat +1;
      }
    }

    if(count($errors) == 0 && $student_rows >0){
      $student_fullname= $fetch_student['fullname'];
      $jambno= $fetch_student['jambno'];
      $student_email= $fetch_student['email'];
      $student_phone= $fetch_student['phone'];
      $student_image= $fetch_student['image'];
            
      $booking_id= "BBR/".rand(100,999); 
      $_SESSION['student_fullname'] = $student_fullname;
      $_SESSION['jambno'] = $jambno;
      $_SESSION['student_email'] = $student_email;
      $_SESSION['student_phone'] = $student_phone;
      $_SESSION['student_image'] = $student_image;
      $_SESSION['booking_id'] = $booking_id;
      $_SESSION['depart_from'] = $depart_from;
      $_SESSION['arrive_to'] = $arrive_to;
      $_SESSION['depart_date'] = $depart_date;
      $_SESSION['depart_time'] = $depart_time;
      $_SESSION['arrive_date'] = $arrive_date;
      $_SESSION['arrive_time'] = $arrive_time;
      $_SESSION['depart_seat'] = $depart_seat;
      $_SESSION['arrive_seat'] = $arrive_seat;
      $_SESSION['depart_checkin'] = $depart_checkin;
      $_SESSION['arrive_checkin'] = $arrive_checkin;
      $_SESSION['ticket_status1'] = $ticket_status1;
      $_SESSION['ticket_status2'] = $ticket_status2;
      $_SESSION['ticket_type'] = $ticket_type;
      $_SESSION['student_amount'] = $student_amount;
      header('location: ../admin_booking/student_payment.php');
    }
  }
  //  

  //  payment section
  if (isset($_POST['payment'])) {
    // receive all input values From the form
    $regno = $_SESSION['regno'];
    $e_card = mysqli_real_escape_string($db, $_POST['e_card']);

    
    $student_query = "SELECT * FROM student_signup WHERE regno='$regno' AND e_card='$e_card' LIMIT 1";
    $student_result = mysqli_query($db, $student_query);
    $fetch_student = mysqli_fetch_assoc($student_result);
    $student_rows=mysqli_num_rows($student_result);
    $student_amount =$_SESSION['student_amount'];
    
    
    if (empty($e_card)) { array_push($errors, "Enter your E-Card Numbers"); }
    elseif($student_rows > 0){
      $e_unit =$fetch_student['e_unit'];
      if($e_unit < $student_amount){array_push($errors, "Insufficint Account Balance");}
      else{$e_unit = ($e_unit - $student_amount);}
    }else{ array_push($errors, "Incorrect E-card Number");}

    if (count($errors) == 0){
      $updatequery ="UPDATE student_signup SET e_unit ='$e_unit' WHERE regno='$regno' AND e_card='$e_card'";
      if(mysqli_query($db, $updatequery)){
        $admin= $_SESSION['admin'];
        $student_fullname= $_SESSION['student_fullname'];
        $jambno= $_SESSION['jambno'];
        $student_image= $_SESSION['student_image'];
        $regno= $_SESSION['regno'];
        $student_email= $_SESSION['student_email'];
        $student_phone= $_SESSION['student_phone'];
        $booking_id= $_SESSION['booking_id'];
        $depart_from= $_SESSION['depart_from'];
        $arrive_to= $_SESSION['arrive_to'];
        $depart_date= $_SESSION['depart_date'];
        $depart_time= $_SESSION['depart_time'];
        $depart_seat= $_SESSION['depart_seat'];
        $depart_checkin= $_SESSION['depart_checkin'];
        $ticket_status1= $_SESSION['ticket_status1'];
        $arrive_date= $_SESSION['arrive_date'];
        $arrive_time= $_SESSION['arrive_time'];
        $arrive_seat= $_SESSION['arrive_seat'];
        $arrive_checkin= $_SESSION['arrive_checkin'];
        $ticket_status2= $_SESSION['ticket_status2'];
        $ticket_type= $_SESSION['ticket_type'];
        $student_amount= $_SESSION['student_amount'];
        
        $query = "INSERT INTO student_booking (regno, email, phone, booking_id , depart_from, arrive_to, depart_date,
          depart_time, depart_seat, depart_checkin, ticket_status1, arrive_date, arrive_time, arrive_seat, arrive_checkin,
          ticket_status2, ticket_type, amount, booked_by, issued_date) VALUES('$regno', '$student_email',
          '$student_phone', '$booking_id', '$depart_from', '$arrive_to', '$depart_date', '$depart_time', '$depart_seat', '$depart_checkin',
          '$ticket_status1', '$arrive_date', '$arrive_time', '$arrive_seat', '$arrive_checkin', '$ticket_status2',
          '$ticket_type','$student_amount','$regno','$date_time')";

        if(mysqli_query($db, $query)){
          // $student_fullname= $_SESSION['student_fullname'];;
          // $receiver = $student_email;
          // $subject = "Booking Notice";
          // $sender = "From:myunusahja2@gmail.com";
          // $body = 'Dear '.$student_fullname.' thanks for your booking, your booking id is '.$booking_id.',
          // You can lognin to your account to chick in your booking before 2 hours to the trip';
          // if(mail($receiver, $subject, $body, $sender)){
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
            $_SESSION['booked_by'] = $admin;
            $_SESSION['issued_date'] = $date_time;
            $_SESSION['success'] = "Your booking was succussful";
            header('location: ../admin_booking/student_managed.php');
            // }else{array_push($errors, "message not sent to email");}
        }else{array_push($errors, "not booked"); }
      }
    }
  }

  // UPDATE BOOKING
  if (isset($_POST['update_booking'])) {
    // receive all input values from the form
    $depart_from = mysqli_real_escape_string($db, $_POST['depart_from']);
    $arrive_to = mysqli_real_escape_string($db, $_POST['arrive_to']);
    $radio_option = mysqli_real_escape_string($db, $_POST['radio_option']);
    $regno= $_SESSION['regno'];
    
    if($_SESSION['ticket_status1'] == "Not used"){
      $depart_checkin= "Not checkin";
      $depart_seat= 1;
      $depart_date = $_POST['depart_date'];
      $depart_time = mysqli_real_escape_string($db, $_POST['depart_time']);
    }
    if($_SESSION['ticket_status2'] == "Not used"){
      $arrive_checkin="Not checkin";
      $arrive_seat= 1;
      $arrive_date = $_POST['arrive_date'];
      $arrive_time = mysqli_real_escape_string($db, $_POST['arrive_time']);
    }
    $ticket_type=$_SESSION['ticket_type'];
    $booking_id= $_SESSION['booking_id']; 
    

    $depart_query = "SELECT * FROM student_booking WHERE (depart_date ='$depart_date' AND
      depart_time ='$depart_time') OR (arrive_date ='$depart_date' AND arrive_time ='$depart_time') order by depart_seat desc";
    $depart_result = mysqli_query($db, $depart_query);
    $fetch_depart = mysqli_fetch_assoc($depart_result);
    $depart_rows=mysqli_num_rows($depart_result);
    
    $arrive_query ="SELECT * FROM student_booking WHERE (depart_date ='$arrive_date' AND
      depart_time ='$arrive_time') OR (arrive_date ='$arrive_date' AND arrive_time ='$arrive_time') order by arrive_seat desc";
    $arrive_result = mysqli_query($db, $arrive_query);
    $fetch_arrive = mysqli_fetch_assoc($arrive_result);
    $arrive_rows=mysqli_num_rows($arrive_result);

    // form validation: ensure that the form is correctly filled ...
    if (count($errors) > 0) {$selector = "true";}
    elseif (empty($depart_from)) { array_push($errors, "Depart From"); }
    elseif (empty($arrive_to)) { array_push($errors, "Arrive To"); }
    elseif ( $depart_from == $arrive_to){array_push($errors,"You can't pick thesame route!");}
    elseif($_SESSION['ticket_status1'] == "Not used"){
      if (empty($depart_date)) { array_push($errors, "Select departure date"); }
      elseif (empty($depart_time)) { array_push($errors, "Select departure time"); }
      elseif ( $depart_date < $Date){array_push($errors,"Invalid departure dat");}
      elseif ( $depart_date <= $Date && $depart_time <= $Time){array_push($errors,"Invalid departure time");}
      elseif ( $depart_date > $Lastday){array_push($errors,"You can only Booking within the week");}
      elseif ( $depart_date == $Sunday){array_push($errors,"You can't make Booking on sundays");}
      elseif ($depart_rows >=10){array_push($errors,'The departure date and time you picked is fully booked');}
      if($fetch_depart){
        $seat= $fetch_depart['depart_seat'];
        $depart_seat=$seat +1;
      }
    }
    elseif ($radio_option == "Return"){
      if($_SESSION['ticket_status2'] == "Not used"){
        if (empty($arrive_date)) { array_push($errors, "Select return date"); }
        elseif (empty($arrive_time)) { array_push($errors, "Select return time"); }
        elseif ( $arrive_date < $Date){array_push($errors,"Invalid Return date");}
        elseif ( $arrive_date <= $Date && $arrive_time <= $Time){array_push($errors,"Invalid Return time");}
        elseif ( $arrive_date < $depart_date){array_push($errors,"Pick return date ahead of departure date");}
        elseif ( $arrive_date == $Sunday){ array_push($errors,"You can't make Booking on sundays");}
        elseif ($arrive_rows >= 10){array_push($errors,'The arrival date and time you picked is fully booked');}
        $arrive_seat=1;
        $arrive_checkin="Not checkin";
        $ticket_status2="Not used";
        $ticket_type="Return";
        $student_amount=100;
        if($fetch_arrive){
          $seat= $fetch_arrive['arrive_seat'];
          $arrive_seat=$seat +1;
        }
      }
    }
      
    if(count($errors) == 0){      
      if($_SESSION['ticket_status1'] == "Not used" && $_SESSION['ticket_status2'] == "Not used"){
        $updatequery ="UPDATE student_booking SET depart_from ='$depart_from', arrive_to ='$arrive_to', depart_date ='$depart_date', 
        depart_time ='$depart_time', depart_seat ='$depart_seat', depart_checkin ='$depart_checkin', arrive_date ='$arrive_date', arrive_time ='$arrive_time', 
          arrive_seat ='$arrive_seat', arrive_checkin ='$arrive_checkin' WHERE booking_id='$booking_id'";
          $update=mysqli_query($db, $updatequery);
      }
      elseif($_SESSION['ticket_status1'] == "Not used"){
        $updatequery ="UPDATE student_booking SET depart_from ='$depart_from', arrive_to ='$arrive_to', depart_date ='$depart_date', 
        depart_time ='$depart_time', depart_seat ='$depart_seat', depart_checkin ='$depart_checkin' WHERE booking_id='$booking_id'";
        $update=mysqli_query($db, $updatequery);
      }
      elseif($_SESSION['ticket_status2'] == "Not used"){
        $updatequery ="UPDATE student_booking SETSET depart_from ='$depart_from', arrive_to ='$arrive_to',arrive_date ='$arrive_date', arrive_time ='$arrive_time', 
        arrive_seat ='$arrive_seat', arrive_checkin ='$arrive_checkin' WHERE booking_id='$booking_id'";
        $update=mysqli_query($db, $updatequery);
      }

      if($update){
        $booking_query = "SELECT * FROM student_booking WHERE booking_id = '$booking_id' LIMIT 1";
        $booking_result = mysqli_query($db, $booking_query);
        $fetch_booking = mysqli_fetch_assoc($booking_result);
        $booking_rows=mysqli_num_rows($booking_result);
        // $student_fullname= $_SESSION['student_fullname'];
        // $student_email= $_SESSION['student_email'];
        // $receiver = $student_email;
        // $subject = "Booking Notice";
        // $sender = "From:myunusahja2@gmail.com";
        // $body = 'Dear '.$student_fullname.' you have successful update '.$booking_id.' booking,
        // You can lognin to your account to chick in your booking before 2 hours to the trip';
        // if(mail($receiver, $subject, $body, $sender)){
          $booking_id=$fetch_booking['booking_id'];
          $depart_from=$fetch_booking['depart_from'];
          $arrive_to=$fetch_booking['arrive_to'];
          $depart_date=$fetch_booking['depart_date'];
          $depart_time=$fetch_booking['depart_time'];
          $arrive_date= $fetch_booking['arrive_date'];
          $arrive_time= $fetch_booking['arrive_time'];
          $depart_seat= $fetch_booking['depart_seat'];
          $arrive_seat= $fetch_booking['arrive_seat'];
          $depart_checkin= $fetch_booking['depart_checkin'];
          $arrive_checkin= $fetch_booking['arrive_checkin'];
          
          $_SESSION['booking_id'] = $booking_id;
          $_SESSION['depart_from'] = $depart_from;
          $_SESSION['arrive_to'] = $arrive_to;
          $_SESSION['depart_date'] = $depart_date;
          $_SESSION['depart_time'] = $depart_time;
          $_SESSION['arrive_date'] = $arrive_date;
          $_SESSION['arrive_time'] = $arrive_time;
          $_SESSION['depart_seat'] = $depart_seat;
          $_SESSION['arrive_seat'] = $arrive_seat;
          $_SESSION['depart_checkin'] = $depart_checkin;
          $_SESSION['arrive_checkin'] = $arrive_checkin;
          $_SESSION['success'] = "Your booking was succussful Updated";
          header('location: ../admin_booking/student_managed.php');
        // }else{array_push($errors, "message not sent to email");}
      }else{array_push($errors, "Bookng not update");}
    }     
  }

   
  // TO CHECK IN

  // DEPARTURE CHECK IN
  if (isset($_POST['depart_checkin'])){
    $booking_id= $_SESSION['booking_id'];
    $depart_from= $_SESSION['depart_from'];
    $arrive_to= $_SESSION['arrive_to'];
    $depart_date=$_SESSION['depart_date'];
    $depart_time=$_SESSION['depart_time'];
    if( $depart_date > $Date || ($depart_date == $Date && $depart_time >= $Times)){
      $depart_checkin= "Checked In";
      $updatequery ="UPDATE student_booking SET depart_checkin ='$depart_checkin' WHERE booking_id='$booking_id'";
      if(mysqli_query($db, $updatequery)){
        $_SESSION['depart_checkin'] = $depart_checkin;
        $_SESSION['success'] = "Your have succussful Checked In $depart_from - $arrive_to" ;
      }else{array_push($errors, "Not checked in");}
    }else{array_push($errors, "Check In close");}	
  }

  // ARRIVAL CHECK IN
  if (isset($_POST['arrive_checkin'])){
    $booking_id= $_SESSION['booking_id'];
    $depart_from= $_SESSION['depart_from'];
    $arrive_to= $_SESSION['arrive_to'];
    $arrive_date=$_SESSION['arrive_date'];
    $arrive_time=$_SESSION['arrive_time'];
    if ( $arrive_date > $Date || ($arrive_date == $Date && $arrive_time >= $Times)){
      $arrive_checkin= "Checked In";
      $updatequery ="UPDATE student_booking SET arrive_checkin ='$arrive_checkin' WHERE booking_id='$booking_id'";
      if(mysqli_query($db, $updatequery)){
        $_SESSION['arrive_checkin'] = $arrive_checkin;
        $_SESSION['success'] = "Your have succussful Checked In $arrive_to - $depart_from" ;
      }else{array_push($errors, "Not checked in");}
    }else{array_push($errors, "Check In close");}	
  }

  // END OF PAGE!!!!!! 
?>