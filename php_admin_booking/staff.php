<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

  // initializing variables
    $timezone=date_default_timezone_set('Africa/Lagos');
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

    $depart_date="";
    $arrive_date="";
    $No_of_students="";
    $address="";
    $selector="";
    $staff_id="";
    $e_card="";
    $booking_id="";
    $file="";
    $payment_status="";
    $errors = array();   

  // STAFF NEW BOOKING
  if (isset($_POST['staff_booking'])) {
    // receive all input values from the form
    $staff_id = mysqli_real_escape_string($db, $_POST['staff_id']);
    $depart_from = mysqli_real_escape_string($db, $_POST['depart_from']);
    $arrive_to = mysqli_real_escape_string($db, $_POST['arrive_to']);
    $depart_date = $_POST['depart_date'];
    $arrive_date = $_POST['arrive_date'];
    $No_of_students = mysqli_real_escape_string($db, $_POST['No_of_students']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    $depart_query = "SELECT * FROM staff_booking WHERE depart_date ='$depart_date'";
    $depart_result = mysqli_query($db, $depart_query);
    $fetch_depart = mysqli_fetch_assoc($depart_result);
    $depart_rows=mysqli_num_rows($depart_result);

    $arrive_query = "SELECT * FROM staff_booking WHERE arrive_date ='$arrive_date'";
    $arrive_result = mysqli_query($db, $arrive_query);
    $fetch_arrive = mysqli_fetch_assoc($arrive_result);
    $arrive_rows=mysqli_num_rows($arrive_result);

    $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id' LIMIT 1";
    $staff_result = mysqli_query($db, $staff_query);
    $fetch_staff = mysqli_fetch_assoc($staff_result);
    $staff_rows=mysqli_num_rows($staff_result);
    
      
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($staff_id)) { array_push($errors, "Enter Staff Id"); }
    elseif ($staff_rows <1) {array_push($errors, "Invalid Staff Id");}
    elseif ($depart_from=="From") { array_push($errors, "Depart From"); }
    elseif ($arrive_to=="To") { array_push($errors, "Arrive To"); }
    elseif (empty($depart_date)) { array_push($errors, "Select departure date"); }
    elseif (empty($arrive_date)) { array_push($errors, "Select return date"); }
    elseif (empty($No_of_students)) { array_push($errors, "Select No of students"); }
    elseif (empty($address)) { array_push($errors, "Enter Address"); }
    elseif ( $depart_date < $Date){array_push($errors,"Invalid departure date");}
    elseif ( $arrive_date < $Date){array_push($errors,"Invalid return date");}
    elseif ( $arrive_date < $depart_date){array_push($errors,"Pick return date ahead of departure date");}
    elseif ( $depart_date == $Sunday){array_push($errors,"You can't make Booking on sundays");}
    elseif ( $arrive_date == $Sunday){ array_push($errors,"You can't make Booking on sundays");}
    elseif ( $depart_date == $Sunday){array_push($errors,"You can't make Booking on sundays");}
    elseif ($depart_rows >= 1){array_push($errors,'The departure date you picked is fully booked');}
    elseif ($arrive_rows >= 1){array_push($errors,'The return date you picked is fully booked');}
    elseif ($arrive_to=="Kano"){$amount=$No_of_students * 500;}
    elseif ($arrive_to=="North West"){($amount=$No_of_students * 2000);}
    elseif ($arrive_to=="North East"){($amount=$No_of_students * 3000);}
    elseif ($arrive_to=="North Central"){($amount=$No_of_students * 8000);}
    elseif ($arrive_to=="South East"){($amount=$No_of_students * 10000);}
    elseif ($arrive_to=="South South"){($amount=$No_of_students * 10000);}
    elseif ($arrive_to=="South West"){($amount=$No_of_students * 10000);}
    if(count($errors) == 0){
      if ($staff_rows > 0) {
        $staff_fullname= $fetch_staff['fullname'];
        $staff_image= $fetch_staff['image'];
        $department= $fetch_staff['department'];
        $staff_email= $fetch_staff['email'];
        $staff_phone= $fetch_staff['phone'];
        $No_of_students=$No_of_students." students";
        $booking_id= "BBRE/".rand(100,999);

        $_SESSION['staff_id'] = $staff_id;
        $_SESSION['staff_fullname'] = $staff_fullname;
        $_SESSION['staff_image'] = $staff_image;
        $_SESSION['department'] = $department;
        $_SESSION['staff_email'] = $staff_email;
        $_SESSION['staff_phone'] = $staff_phone;
        $_SESSION['booking_id'] = $booking_id;
        $_SESSION['booking_id'] = $booking_id;
        $_SESSION['depart_from'] = $depart_from;
        $_SESSION['arrive_to'] = $arrive_to;
        $_SESSION['depart_date'] = $depart_date;
        $_SESSION['arrive_date'] = $arrive_date;
        $_SESSION['No_of_students'] = $No_of_students;
        $_SESSION['address'] = $address;
        $_SESSION['amount'] = $amount;
        header('location: ../admin_booking/staff_payment.php');
      }
    }     
  }
  //  

  //  payment section
  if (isset($_POST['book_now'])) {
    // receive all input values From the form
    $staff_id= $_SESSION['staff_id'];
    $e_card = mysqli_real_escape_string($db, $_POST['e_card']);

    
    $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id' AND e_card='$e_card' LIMIT 1";
    $staff_result = mysqli_query($db, $staff_query);
    $fetch_staff = mysqli_fetch_assoc($staff_result);
    $staff_rows=mysqli_num_rows($staff_result);
    $amount =$_SESSION['amount'];
    
    if (empty($e_card)) { array_push($errors, "Enter your E-Card Numbers"); }
    elseif($staff_rows > 0){
      $e_unit =$fetch_staff['e_unit'];
      $e_unit = ($e_unit + $amount);
    }else{ array_push($errors, "Incorrect E-card Number");}

    if (count($errors) == 0){
      $updatequery ="UPDATE staff_signup SET e_unit ='$e_unit' WHERE staff_id='$staff_id' AND e_card='$e_card'";
      if(mysqli_query($db, $updatequery)){
        $admin= $_SESSION['admin'];
        $staff_id= $_SESSION['staff_id'];
        $department= $_SESSION['department'];
        $staff_email= $_SESSION['staff_email'];
        $staff_phone= $_SESSION['staff_phone'];
        $booking_id= $_SESSION['booking_id'];
        $depart_from= $_SESSION['depart_from'];
        $arrive_to= $_SESSION['arrive_to'];
        $depart_date= $_SESSION['depart_date'];
        $arrive_date= $_SESSION['arrive_date'];
        $No_of_students= $_SESSION['No_of_students'];
        $address= $_SESSION['address'];
        $amount= $_SESSION['amount'];
        $payment_status="Not paid";
        $ticket_status="Not used";
        
        $query = "INSERT INTO staff_booking (staff_id, department, email, phone, booking_id , depart_from, arrive_to, depart_date, arrive_date, No_of_students, address, amount, payment_status, ticket_status, booked_by, issued_date) 
          VALUES('$staff_id', '$department', '$staff_email', '$staff_phone', '$booking_id', '$depart_from', '$arrive_to', '$depart_date', '$arrive_date','$No_of_students','$address', '$amount', '$payment_status', '$ticket_status', '$admin', '$date_time')";
        if(mysqli_query($db, $query)){
          // $staff_fullname= $_SESSION['staff_fullname'];;
          // $receiver = $staff_email;
          // $subject = "Booking Notice";
          // $sender = "From:myunusahja2@gmail.com";
          // $body = 'Dear '.$staff_fullname.' thanks for your booking, your booking id is '.$booking_id.',
          // You can lognin to your account to make payment of '.$amount.' or visit any of our counter to make the payment';
          // if(mail($receiver, $subject, $body, $sender)){
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
            $_SESSION['booked_by'] = $admin;
            $_SESSION['issued_date'] = $date_time;
            $_SESSION['success'] = "Booking succussful";
            header('location: ../admin_booking/staff_managed.php');
          // }else{array_push($errors, "message not sent to email");}
        }else{array_push($errors, "not booked"); }
      }
    }
  }

  if (isset($_POST['make_payment'])) {
    $booking_id = mysqli_real_escape_string($db, $_POST['booking_id']);

    $booking_query = "SELECT * FROM staff_booking WHERE booking_id ='$booking_id'";
    $booking_result = mysqli_query($db, $booking_query);
    $fetch_booking = mysqli_fetch_assoc($booking_result);
    $booking_rows=mysqli_num_rows($booking_result);
    $payment_status= $fetch_booking['payment_status'];

    if (empty($booking_id)) { array_push($errors, "Enter Booking Id"); }
    elseif ($payment_status =="Paid") { array_push($errors, "Booking Already Paid"); }
    elseif (count($errors) == 0){
      $staff_id= $fetch_booking['staff_id'];
      $staff_email= $fetch_booking['email'];
      $depart_from= $fetch_booking['depart_from'];
      $arrive_to= $fetch_booking['arrive_to'];
      $depart_date= $fetch_booking['depart_date'];
      $arrive_date= $fetch_booking['arrive_date'];
      $No_of_students= $fetch_booking['No_of_students'];
      $amount= $fetch_booking['amount'];

      $_SESSION['booking_id'] = $booking_id;
      $_SESSION['staff_id'] = $staff_id;
      $_SESSION['depart_from'] = $depart_from;
      $_SESSION['arrive_to'] = $arrive_to;
      $_SESSION['depart_date'] = $depart_date;
      $_SESSION['arrive_date'] = $arrive_date;
      $_SESSION['No_of_students'] = $No_of_students;
      $_SESSION['amount'] = $amount;
      header('location: ../admin_booking/pay_now.php');
    }else{array_push($errors, "Invalid Booking Id"); }
  }

  if (isset($_POST['pay_now'])) {
    $staff_id= $_SESSION['staff_id'];
    $booking_id =$_SESSION['booking_id'];
    $amount =$_SESSION['amount'];
    
    $staff_query = "SELECT * FROM staff_signup WHERE staff_id='$staff_id' LIMIT 1";
    $staff_result = mysqli_query($db, $staff_query);
    $fetch_staff = mysqli_fetch_assoc($staff_result);
    $staff_rows=mysqli_num_rows($staff_result);
    
    $booking_query = "SELECT * FROM staff_booking WHERE booking_id ='$booking_id'";
    $booking_result = mysqli_query($db, $booking_query);
    $fetch_booking = mysqli_fetch_assoc($booking_result);
    $booking_rows=mysqli_num_rows($booking_result);
    $payment_status= "Paid";
    
    if($staff_rows > 0){
      $e_unit1 =$fetch_staff['e_unit'];
      $e_unit = ($e_unit1 - $amount);
      $updatequery ="UPDATE staff_signup SET e_unit ='$e_unit' WHERE staff_id='$staff_id'";
      if(mysqli_query($db, $updatequery)){
        $updatequery ="UPDATE staff_booking SET payment_status ='$payment_status' WHERE booking_id='$booking_id'";
        if(mysqli_query($db, $updatequery)){
          $_SESSION['payment_status'] = $payment_status;
          $_SESSION['success'] = "Payment of succussful";
          header('location: ../admin_panel/dashboard.php');
        }else{array_push($errors, "Payment not Successful!"); }
      }else{array_push($errors, "Payment not Successful!"); }
    }else{array_push($errors, "No Staff Id found"); }
  }
  // 

  // UPDATE BOOKING
  if (isset($_POST['update_booking'])) {
    // receive all input values from the form
    $depart_date = $_POST['depart_date'];
    $arrive_date = $_POST['arrive_date'];
    $booking_id= $_SESSION['booking_id']; 

    $depart_query = "SELECT * FROM staff_booking WHERE depart_date ='$depart_date'";
    $depart_result = mysqli_query($db, $depart_query);
    $fetch_depart = mysqli_fetch_assoc($depart_result);
    $depart_rows=mysqli_num_rows($depart_result);

    $arrive_query = "SELECT * FROM staff_booking WHERE arrive_date ='$arrive_date'";
    $arrive_result = mysqli_query($db, $arrive_query);
    $fetch_arrive = mysqli_fetch_assoc($arrive_result);
    $arrive_rows=mysqli_num_rows($arrive_result);
  
    // form validation: ensure that the form is correctly filled ...
    if (empty($depart_date)) { array_push($errors, "Select departure date"); }
    elseif (empty($arrive_date)) { array_push($errors, "Select return date"); }
    elseif ( $depart_date < $Date){array_push($errors,"Invalid date of departure");}
    elseif ( $arrive_date < $Date){array_push($errors,"Invalid date of return");}
    elseif ( $arrive_date < $depart_date){array_push($errors,"Pick return date ahead of departure date");}
    elseif ( $depart_date == $Sunday){array_push($errors,"You can't make Booking on sundays");}
    elseif ( $arrive_date == $Sunday){ array_push($errors,"You can't make Booking on sundays");}
    elseif ($depart_rows >=2){array_push($errors,'The departure date you picked is fully booked');}
    elseif ($arrive_rows >= 2){array_push($errors,'The return date you picked is fully booked');}
    
      
    if(count($errors) == 0){     
      $update_query ="UPDATE staff_booking SET depart_date ='$depart_date', arrive_date ='$arrive_date' WHERE booking_id='$booking_id'";
      if(mysqli_query($db, $update_query)){
        // $staff_fullname= $_SESSION['staff_fullname'];;
        // $receiver = $staff_email;
        // $subject = "Update Booking Notice";
        // $sender = "From:myunusahja2@gmail.com";
        // $body = 'Dear '.$staff_fullname.', your booking with booking Id '.$booking_id.',
        // was successfully updated. You can lognin to your account to chick in your booking before 2 hours to the trip';
        // You can lognin to your account and manage booking to see more detail on the booking.Thanks';
        // if(mail($receiver, $subject, $body, $sender)){
        $_SESSION['depart_date'] = $depart_date;
        $_SESSION['arrive_date'] = $arrive_date;
        $_SESSION['success'] = "Booking succussfuly Updated";
        header('location: ../admin_booking/staff_managed.php');
        // }else{array_push($errors, "message not sent to email");}
      }
    }     
  }
  
  // END OF PAGE!!!!!!
?>