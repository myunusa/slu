<?php 
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'buk_transport_bus');

    // VIEWING MORE DETAILS STARTED !!//

        // LIST OF ADMINS
        $sn="0";
        $admin_query="SELECT * FROM admin_signup";
        $admin_result = mysqli_query($db, $admin_query);
        $fetch_admin= mysqli_fetch_all($admin_result,MYSQLI_ASSOC);
        
        // LIST OF BUK STUDENTS
        $sn="0";
        $buk_student_query="SELECT * FROM buk_student";
        $buk_student_result = mysqli_query($db, $buk_student_query);
        $fetch_buk_student= mysqli_fetch_all($buk_student_result,MYSQLI_ASSOC);

        // LIST OF BUK STAFFS
        $sn="0";
        $buk_staff_query="SELECT * FROM buk_staff";
        $buk_staff_result = mysqli_query($db, $buk_staff_query);
        $fetch_buk_staff= mysqli_fetch_all($buk_staff_result,MYSQLI_ASSOC);

        // LIST OF SIGNUP STUDENTS
        $sn="0";
        $student_query="SELECT * FROM student_signup";
        $student_result = mysqli_query($db, $student_query);
        $fetch_signup_student= mysqli_fetch_all($student_result,MYSQLI_ASSOC);
 
        // LIST OF SIGNUP STAFFS
        $sn="0";
        $staff_query="SELECT * FROM staff_signup";
        $staff_result = mysqli_query($db, $staff_query);
        $fetch_signup_staff= mysqli_fetch_all($staff_result,MYSQLI_ASSOC);

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
        
        // LIST OF UNACKNOWLEDGED CONTACT US
        $Unacknowledge_id="0";
        $acknowledge="Not acknowledged";
        $sql="SELECT * FROM contact_us WHERE acknowledge='$acknowledge' order by date_time desc";
        $result = mysqli_query($db, $sql);
        $user= mysqli_fetch_all($result,MYSQLI_ASSOC);

        // LIST OF ACKNOWLEDGED CONTACT US
        $Acknowledge_id="0";
        $sql="SELECT * FROM contact_us order by date_time desc";
        $result = mysqli_query($db, $sql);
        $users= mysqli_fetch_all($result,MYSQLI_ASSOC);

    // VIEWING TABLES ENDED !!//


    // VIEWING MORE DETAILS STARTED !!//

        // To view more detals for Admin
        if (isset($_GET['admin'])) {
            $id=$_GET['admin'];

            $admin_query = "SELECT * FROM admin_signup WHERE id='$id'";
            $admin_result = mysqli_query($db, $admin_query);
            $fetch_admin = mysqli_fetch_assoc($admin_result);
            $admin_rows=mysqli_num_rows($admin_result);
            if ($admin_rows >0) {
            $image=$fetch_admin['image'];
            $fullname=$fetch_admin['fullname'];
            // $fullname=strtoupper($fullname);
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
            header('location: ../admin_panel/update_admin.php');
            }
        }

        // To view more detals for Student
        if (isset($_GET['student'])) {
            $regno=$_GET['student'];

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
            header('location: ../admin_panel/update_student.php');
            }
        }
        
        // To view more detals for Staff
        if (isset($_GET['staff'])) {
            $staff_id=$_GET['staff'];

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
            header('location: ../admin_panel/update_staff.php');
            }
        }
    
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
                    $_SESSION['staff_image'] = $staff_image;
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
                    header('location: ../admin_booking/staff_managed.php');
                }
            }
        }

         // To view more booking detals for staff
         if (isset($_GET['student_booking'])) {
            $booking_id=$_GET['student_booking'];

            $booking_query = "SELECT * FROM student_booking WHERE booking_id ='$booking_id'";
            $booking_result = mysqli_query($db, $booking_query);
            $fetch_booking = mysqli_fetch_assoc($booking_result);
            $booking_rows=mysqli_num_rows($booking_result);

            if ($booking_rows > 0) {
                $student_id= $fetch_booking['student_id'];

                $student_query = "SELECT * FROM student_signup WHERE student_id='$student_id' LIMIT 1";
                $student_result = mysqli_query($db, $student_query);
                $fetch_student = mysqli_fetch_assoc($student_result);
                $student_rows=mysqli_num_rows($student_result);
                if ($student_rows > 0) {
                    $student_fullname= $fetch_student['fullname'];
                    $student_image= $fetch_student['image'];                
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
                    $_SESSION['student_fullname'] = $student_fullname;
                    $_SESSION['student_image'] = $student_image;
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
                    header('location: ../admin_booking/student_managed.php');
                }
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
            $acknowledge="Acknowledged";
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
    // VIEWING MORE DETAILS ENDED !!//

?>