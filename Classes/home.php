<?php

require_once("session.php");
require_once("classes/connecter.php");



$auth_user = new USER();
$SystemUser=Null;

$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if ($userRow['user_level']=='1')
{
	$SystemUser=Owner::getInstance();
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css"  />
	<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>


	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php">Home</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="home.php">Home</a></li>
					<li><a href="profile.php">Profile</a></li>
					<?php

					if ($userRow['user_level']=='2') { ?>
						<li><a href="sign-up.php">Add user</a></li>
						<?php } ?>
						<?php

						if ($userRow['user_level']=='2') { ?>
							<li><a href="addStudent.php">Add Student</a></li>
							<?php } ?>

							<?php

							if ($userRow['user_level']=='3') { ?>
								<li><a href="addStudent.php">Add Student</a></li>
								<?php } ?>
								<?php

								if ($userRow['user_level']=='1') { ?>
									<li><a href="acceptUser.php">Accept User</a></li>
									<li><a href="freeCard.php">Offer Free Card</a></li>
									<li ><a href="selectHall.php">Book A Hall</a></li>
									<li><a href="deleteStudent.php">Remove Student</a></li>
									<div class="dropdown">
										<button class="dropbtn">Other Options</button>
										<div class="dropdown-content">
											<a href="userTable.php">view/remove users</a>
											<a href="overolReport.php">get Overoll report</a>

										</div>
									</div>
									<?php } ?>
									<?php

									if ($userRow['user_level']=='4') { ?>

										<li><a href="freeCard.php">Offer Free Card</a></li>
										<li ><a href="selectHall.php">Book A Hall</a></li>
										<li><a href="deleteStudent.php">Remove Student</a></li>
										<?php } ?>

										<?php
										if ($userRow['user_level']=='2') { ?>
											<li><a href="addClass.php">Add Class</a></li>
											<?php } ?>

										</ul>
										
										<ul class="nav navbar-nav navbar-right">

											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
													<ul class="dropdown-menu">
														<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
														<li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
													</ul>
												</li>
												<li><a href="changePass.php">Change Password</a></li>
											</ul>
										</div><!--/.nav-collapse -->
									</div>
								</nav>
							</div>


							<div class="clearfix"></div>

							<div class="container-fluid" style="margin-top:80px;">

								<div class="container">

									<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
									<hr />

									<h1>
										<a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp;
										<a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a></h1>
										<hr />

										<p class="h4">Notifications Here</p>
										<br></br>


										<?php

										if ($userRow['user_level']=='1') {
											if($SystemUser->hasNewUsers()){?>
												<p><font color=#ff0000>New Users Added : </font><a href="acceptUser.php">Checkout Now</a></p>

												<?php
											}}?>




											<?php

											if ($userRow['user_level']=='2') { ?>

												<p>content for user2</p>


												<?php } ?>

												<p class="blockquote-reverse" style="margin-top:200px;">


												</div>

											</div>




											<script src="bootstrap/js/bootstrap.min.js"></script>


										</body>
										</html>
