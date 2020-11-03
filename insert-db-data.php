<?php
  // get database
  $connection = mysqli_connect("localhost", "root", "", "terence_liu");
  //Check if database connection was a success or not
  if(mysqli_connect_errno()) {
    // if fail, skip all php and print errors

    die("Database connect failed: " .
      mysqli_connect_error() .
      " (" . mysqli_connect_errno(). ")"
    );
  }
  $password = "123123";
  // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  //------------------------------------------------------------------6x TUTORS-------------------------------------------------------------------------------------
  //create Jimmy Tutor Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('jimmy_chu@gmail.com', 'Jimmy', 'Chu', $password, 'img/member/26/Jennifer_PFP.png')";
  $result1 = mysqli_query($connection, $query1);
  // if(!$result1){
  //   die("Database connect failed 1" .  mysqli_error($connection));
  // }
  // echo $result1;
  $query2 = "INSERT INTO tutor (tutor_id, balance, bio) VALUES(last_insert_id(), 00.00, 'This is the biography for Jimmy. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.')";
  $result2 = mysqli_query($connection, $query2);
  // if(!$result2){
  //   die("Database connect failed 2" .  mysqli_error($connection));
  // }
  // echo $result2;

  //create Theo Tutor Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('theo_tang@gmail.com', 'Theo', 'Tang', $password, '')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO tutor (tutor_id, balance, bio) VALUES(last_insert_id(), 10.99, 'This is the biography for Theo. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.')";
  $result2 = mysqli_query($connection, $query2);

  //create David Tutor Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('david_cao@gmail.com', 'David', 'Cao', $password, 'img/member/26/Jennifer_PFP.png')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO tutor (tutor_id, balance, bio) VALUES(last_insert_id(), 150.40, 'This is the biography for David. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.')";
  $result2 = mysqli_query($connection, $query2);

  //create Terence Tutor Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('terence_liu@gmail.com', 'Terence', 'Liu', $password, '')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO tutor (tutor_id, balance, bio) VALUES(last_insert_id(), 350.47, 'This is the biography for Terence. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.')";
  $result2 = mysqli_query($connection, $query2);

  //create Sean Tutor Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('sean_jeong@gmail.com', 'Sean', 'Jeong', $password, 'img/member/26/Jennifer_PFP.png')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO tutor (tutor_id, balance, bio) VALUES(last_insert_id(), 58.98, 'This is the biography for Sean. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.')";
  $result2 = mysqli_query($connection, $query2);

  //create Justin Tutor Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('justin_wang@gmail.com', 'Justin', 'Wang', $password, '')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO tutor (tutor_id, balance, bio) VALUES(last_insert_id(), 888.88, 'This is the biography for Justin. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.')";
  $result2 = mysqli_query($connection, $query2);

  //------------------------------------------------------------------6x STUDENTS-------------------------------------------------------------------------------------
  //create Tim Student Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('tim_tembo@gmail.com', 'Tim', 'Tembo', $password, 'img/member/26/Jennifer_PFP.png')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO student (student_id, cur_grade) VALUES(last_insert_id(), 5)";
  $result2 = mysqli_query($connection, $query2);

  //create Victor Student Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('victor_Hau@gmail.com', 'Victor', 'Hau', $password, '')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO student (student_id, cur_grade) VALUES(last_insert_id(), 8)";
  $result2 = mysqli_query($connection, $query2);

  //create Linsey Student Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('linsey_gong@gmail.com', 'Linsey', 'Gong', $password, 'img/member/26/Jennifer_PFP.png')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO student (student_id, cur_grade) VALUES(last_insert_id(), 4)";
  $result2 = mysqli_query($connection, $query2);

  //create Jone Student Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('jone_ko@gmail.com', 'Jone', 'Ko', $password, '')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO student (student_id, cur_grade) VALUES(last_insert_id(), 6)";
  $result2 = mysqli_query($connection, $query2);

  //create Samuel Student Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('samuel_fung@gmail.com', 'Samuel', 'Fung', $password, 'img/member/26/Jennifer_PFP.png')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO student (student_id, cur_grade) VALUES(last_insert_id(), 7)";
  $result2 = mysqli_query($connection, $query2);

  //create Allen Student Member
  $query1 = "INSERT INTO member (email, fname, lname, password, profile_address) VALUES ('allen_chen@gmail.com', 'Allen', 'Chen', $password, '')";
  $result1 = mysqli_query($connection, $query1);
  $query2 = "INSERT INTO student (student_id, cur_grade) VALUES(last_insert_id(), 12)";
  $result2 = mysqli_query($connection, $query2);

  mysqli_close($connection);
?>
