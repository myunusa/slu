<?php
  $timezone=date_default_timezone_set('Africa/Lagos');
  $now_date =strtotime('now');
  $Date= date("Y-m-d", $now_date);
  
  $admin_query ="SELECT * FROM admin_signup";
  $admin_result=mysqli_query($db, $admin_query);
  $admin_row=mysqli_num_rows($admin_result);

  $buk_student_query ="SELECT * FROM buk_student";
  $buk_student_result=mysqli_query($db, $buk_student_query);
  $buk_student_row=mysqli_num_rows($buk_student_result);

  $buk_staff_query ="SELECT * FROM buk_staff";
  $buk_staff_result=mysqli_query($db, $buk_staff_query);
  $buk_staff_row=mysqli_num_rows($buk_staff_result);

  $student_signup_query ="SELECT * FROM student_signup";
  $student_signup_result=mysqli_query($db, $student_signup_query);
  $student_signup_row=mysqli_num_rows($student_signup_result);

  $staff_signup_query ="SELECT * FROM staff_signup";
  $staff_signup_result=mysqli_query($db, $staff_signup_query);
  $staff_signup_row=mysqli_num_rows($staff_signup_result);

  $staff_booking_query ="SELECT * FROM staff_booking WHERE depart_date ='$Date' OR arrive_date ='$Date' ";
  $staff_booking_result=mysqli_query($db, $staff_booking_query);
  $staff_booking_row=mysqli_num_rows($staff_booking_result);

  $old_site="Old Site";
  $new_site="New Site";
  $check_In ="Checked In";
  $ticket_status=1;

  $old_site_query = "SELECT * FROM student_booking WHERE 
  (depart_from ='$old_site' OR arrive_to ='$old_site') AND (depart_date ='$Date' OR arrive_date ='$Date') ";
  $old_site_result=mysqli_query($db, $old_site_query);
  $old_site_row=mysqli_num_rows($old_site_result);

  $new_site_query = "SELECT * FROM student_booking WHERE 
  (depart_from ='$new_site' OR arrive_to ='$new_site') AND (depart_date ='$Date' OR arrive_date ='$Date') ";
  $new_site_result=mysqli_query($db, $new_site_query);
  $new_site_row=mysqli_num_rows($new_site_result);

  $staff_checkin_query ="SELECT * FROM staff_booking WHERE depart_date ='$Date' AND ticket_status='$ticket_status' ";
  $staff_checkin_result=mysqli_query($db, $staff_checkin_query);
  $staff_checkin_row=mysqli_num_rows($staff_checkin_result);

  $old_checkin_query = "SELECT * FROM student_booking WHERE 
  (depart_from ='$old_site' OR arrive_to ='$old_site') AND (depart_date ='$Date' OR arrive_date ='$Date') AND (depart_checkin='$check_In' OR arrive_checkin='$check_In')";
  $old_checkin_result=mysqli_query($db, $old_checkin_query);
  $old_checkin_row=mysqli_num_rows($old_checkin_result);

  $new_checkin_query = "SELECT * FROM student_booking WHERE 
  (depart_from ='$new_site' OR arrive_to ='$new_site') AND (depart_date ='$Date' OR arrive_date ='$Date') AND (depart_checkin='$check_In' OR arrive_checkin='$check_In')";
  $new_checkin_result=mysqli_query($db, $new_checkin_query);
  $new_checkin_row=mysqli_num_rows($new_checkin_result);

  // ... 

?>