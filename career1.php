<?php 
$page="career"; 
include 'module/header.php';
$emailAddress = 'amit.dubale10@gmail.com';
 require 'PHPMailerAutoload.php'; 
error_reporting(0);

if(isset($_REQUEST['career1']))
{	
	$name=stripslashes(trim(isset($_POST['name'])?$_POST['name']:''));
	$email=stripslashes(trim(isset($_POST['email'])?$_POST['email']:''));
	$contact=stripslashes(trim(isset($_POST['contact'])?$_POST['contact']:''));
	$postname=stripslashes(trim(isset($_POST['postname'])?$_POST['postname']:''));
	$addressoffices=stripslashes(trim(isset($_POST['addressoffices'])?$_POST['addressoffices']:''));

	if($name!=''){
		$emails="amit.dubale10@gmail.com";
		$to  = 'amit.dubale10@gmail.com'; // note the comma		

			// subject
			$subject = 'Aircloud Global Career From'.$name;

			// message
			$message = "<html><head><title>Aircloud Global </title></head><body><h3>Aircloud Global  Career</h3><table border='0'> <tr><td>Full Name : </td><td>".$name ."</td></tr><tr><td>Email : </td><td>".$email ."</td></tr> <tr><td>Contact No: </td><td>".$contact."</td></tr><tr><td>Position : </td><td>".$postname."</td></tr><tr><td>Message : </td><td>".$addressoffices."</td></tr> </html></body>";

			move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $_FILES["uploaded_file"]["name"]);
  $mail = new PHPMailer();
  $mail->IsMail();

			$mail->From = 'amit.dubale10@gmail.com';
			$mail->FromName = $name;
			$mail->addAddress('amit.dubale10@gmail.com', 'Aircloud Global Career');     // Add a recipient
			$mail->addCC('amit.dubale10@gmail.com', 'Aircloud Global Career');
			$mail->addCC($email);
			$mail->addCC($emails);
			$mail->addCC($to);
			$mail->AddAddress($emailAddress);
			$mail->AddAttachment( $_FILES["uploaded_file"]["name"]);
	$mail->Send();

			$mail->WordWrap = 150;                                 // Set word wrap to 50 characters
			//$mail->addAttachment($tmpName,$fileName);         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subject;
			$mail->Body    = $message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
		echo '<script>alert("Enquire Not Send Successfully ! Please Fill Proper Form.");</script>';	
		echo'<script>window.location="career1.php";</script>'; // redriect	
			} else {
			echo '<script>alert("Thank You. We will call you shortly.");</script>';	
				echo'<script>window.location="career1.php";</script>'; // redriect	
			}
		}
		else
		{
		//header('Location: index.php');
		echo '<script>alert("Enquire Not Send Successfully ! Please Fill Proper Form.");</script>';	
		echo'<script>window.location="career1.php";</script>'; // redriect	
	}
}
?>
		
<section class="content blog">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<div class="blog_single">
					<article class="post">
						<div class="post_content">
							<div class="post_meta">
								<h2><a href="#">Upload Your Profile</a></h2>
							</div>	
							<div class="row main">
							<div class="col-md-12">
								<div class="main-login main-center">
								<h5>Please send email with your profile  </h5>
								<form class="" action="career1.php" method="post"  id="reg_form" enctype="multipart/form-data">
									<div class="form-group">
										<label class="cols-sm-2 control-label"></label>
										<div class="cols-sm-10">
											<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user fa"></i></span>
											<input type="text" class="form-control" name="name" placeholder="Enter your Name" required/>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="cols-sm-2 control-label"></label>
										<div class="cols-sm-10">
											<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope fa" style="font-size:13px;"></i></span>
											<input type="text" class="form-control" name="email" placeholder="Enter your Email" required/>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="phoneno" class="cols-sm-2 control-label"></label>
										<div class="cols-sm-10">
											<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone"></i></i></span>
											<input type="text" class="form-control" name="contact" placeholder="Enter your Phone No" maxlength="10" pattern="^\d{10}$" required/>
											</div>
										</div>
									</div>
										
									<div class="form-group">
										<label for="phoneno" class="cols-sm-2 control-label"></label>
										<div class="cols-sm-10">
											<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-map-marker"	style="font-size:22px;"></i></span>
											<textarea type="text" name="addressoffices" class="form-control"  placeholder="Please Enter Your Address" required></textarea>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="post name" class="cols-sm-2 control-label"></label>
										<div class="cols-sm-10">
											<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" style="font-size:21px;"></i></span>
											<input type="text" class="form-control" name="postname" placeholder="Enter your position Name" required/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="confirm" class="cols-sm-2 control-label"></label>
										<div class="cols-sm-10">
											<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-folder-open"  style="font-size:15px;"></i></span>
											<input type="file" name="uploaded_file" id="uploaded_file" class="form-control" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf">
											</div>
										</div>
									</div>

									<div class="form-group">											
										<center><button type="submit" name="career1" class="btn btn-primary btn-lg" style="border: 1px solid rgba(0,0,0,0.1); box-shadow: inset 0 1px 0 rgba(255,255,255,0.7);">Submit  <i class="fa fa-arrow-circle-o-right"></i></button></center>	
									</div>
								</form>
								</div>
							</div>
							</div>
							<br/>
							</div>
					</article>
				</div>		
			</div>
			<div class="col-md-4">
				<img src="img/contatto.png">
			</div>
		
		</div>
	</div>
</section>
<!--end wrapper-->

<?php include 'module/footer_validator.php'; ?>
