<form action="newemail.php" method="post" enctype="multipart/form-data">

 <h2>Your Contact Info</h2>
  <p>Your First Name* <br />
    <input type="text" name="firstName" id="firstName" required />
  </p>
  <p>Your Last Name* <br />
    <input type="text" name="lastName" id="lastName" required />
  </p>
  <p>Your Email* <br />
    <input type="email" name="email" id="email" required />
  </p>
  <p>Upload Your logo<br />
    <input type="file" name="uploaded_file" id="uploaded_file"> 
  </p>
  <input type="submit" name="submit" />
 </form>
<?php
if(isset($_POST['submit'])) {
 $emailAddress = 'amit.dubale10@gmail.com';
 require "PHPMailerAutoload.php";
$msg = 'First Name:'.$_POST['firstName'].'<br /> Last name:'.$_POST['lastName'].'<br /> Email:'.$_POST['email'].'<br />';
move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $_FILES["uploaded_file"]["name"]);
  $mail = new PHPMailer();
  $mail->IsMail();

  $mail->AddReplyTo($_POST['email'], $_POST['firstName']);
  $mail->AddAddress($emailAddress);
  $mail->SetFrom($_POST['email'], $_POST['lastName']);
  $mail->Subject = "Subject";
  $mail->MsgHTML($msg);
  $mail->AddAttachment( $_FILES["uploaded_file"]["name"]);
  $mail->Send();

  echo'<script> window.location="newemail.php"; </script> ';
  echo "Success";
}
  ?>