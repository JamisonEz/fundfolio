

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fundfolio</title>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

    <!--&lt;!&ndash; Latest compiled and minified CSS &ndash;&gt;-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

    <!--&lt;!&ndash; Optional theme &ndash;&gt;-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

    <!--&lt;!&ndash; Latest compiled and minified JavaScript &ndash;&gt;-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

    <!-- Compiled and minified CSS -->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index-medium.css" media="screen and (max-width: 1360px)">
	
	
	<?php
	
	$cat_id = -1;
		// Include Functions
		include("functions.php");	
		$db = new DBController();
		
		
/* 		if( isset( $_POST['facebook'])){
			echo " facebook ";
		
		} else  */if( isset( $_POST['reg_sub'])){

			if( $_POST['btn_action'] == "register" ){
			$image_name = "";
		
			if( !empty( $_FILES["upload_img"]["name"] )){

			
				$image_name = $_FILES["upload_img"]["name"];
				
				
				$target_dir = "profile_uploads/";
				$target_file = $target_dir . basename($_FILES["upload_img"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				//if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["upload_img"]["tmp_name"]);
					if($check !== false) {
						//echo "File is an image - " . $check["mime"] . ".";
										
						$uploadOk = 1;
						
					} else {
						
						$image_name ="";
						//echo "File is not an image.";
						$uploadOk = 0;
					}
					
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						//echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["upload_img"]["tmp_name"], $target_file)) {
							//echo "The file ". basename( $_FILES["upload_img"]["name"]). " has been uploaded.";
						} else {
							$image_name ="";
							echo "Sorry, there was an error uploading your file.";
						}
					}
				//}
			}
			}
			$res = 0 ;
			if( $_POST['btn_action'] == "register" && isset ( $_POST['lemail'] ) && isset ( $_POST['lpassword'] ) ){
			   $res = $db -> userRegister (  $_POST['lemail'] , $_POST['lpassword'] , $_POST['name'] ,$_POST['location'], $image_name );
			   if( $res == 1){
					//echo "Sucsess";
					header("Location: http://localhost/yfcreative/Fundfolio/homescreen.php");
							die();
			   }
				else  if( $res == 2){
					//echo "User already exist";
					
					echo "<script>
						alert('User already exist');
						
						</script>";
				}
				else{
					//echo "Error";
					echo "<script>
						alert('Error');
						
						</script>";
				}
			}
		   else{
			 $res = $db -> login (  $_POST['lemail'] , $_POST['lpassword'] );
			 
			 if($res){
				 
				 header("Location: http://localhost/yfcreative/Fundfolio/homescreen.php");
							die();
				// echo "Login Successfully";
			 }
			 else
				 //echo "Your email or password or wrong";
			 echo "<script>
						alert('Your email or password or wrong');
						
						</script>";
		   }
			
			
			//unset($_POST);
			
			
		}
		
		
		if($db -> CheckLogin()){
						
						header("Location: http://localhost/yfcreative/Fundfolio/homescreen.php");
							die();
			
		}
		
		if( isset( $_REQUEST [ 'action_logout' ] )){

				 $db -> LogOut();
		}
		
		if( isset ( $_REQUEST['cat_id'] ) ){
			
			//echo
			$cat_id =$_REQUEST['cat_id'];
			$campaign_list = $db -> getCampaign(  $_REQUEST['cat_id'] );
		}
		else{
			
			//echo " not set " ;
			$campaign_list = $db -> getCampaign(-1);
		}
		
		//print_r(  $campaign_list );
		
	?>

</head>
<body>
    <div>
        <!--background-image: url('images/background.png'); background-size: 100% auto; background-repeat: no-repeat; height: 1200px-->
        <div id="main_content" style="position: relative; display: inline-block; overflow: hidden; width: 100%;">

            <img id="background_img" src="images/background.png" style="position: absolute; pointer-events: none; z-index: -1; width: 100%;">

            <!--Top menu-->
            <header class="row" style="margin: 0; display: flex">

                <img class="col s3" src="images/logo.png" style="width: 10%; height: 100%; margin: 40px">

                <div class="input-field col s4 offset-s1 line" style="margin-top: 40px;">
                    <input id="donate_amount" type="text" maxlength="50">
                    <label for="donate_amount" style="color: white; font-size: 90%">$ HOW MUCH DO YOU WANT TO RAISE?</label>
                </div>
                <div class="col s1" style="margin-top: 55px; margin-left: -50px">
                    <i style="color: white">USD</i>
                </div>
				<?php  if( !$db -> CheckLogin() ) { ?>
                <div id="login_btn" class="col s1 offset-s1 waves-effect" style="visibility: visible; margin-top: 45px; text-align: center; height: 35px; line-height: 35px">
                    <img id="login_img" src="images/login.png" style="width: 48px; height: 12px">
                </div>

                <div class="col s1" style="margin-top: 45px; margin-left: 40px; padding: 0; height: 35px">
                    <button id="register_btn" class="button btn_contribute">REGISTER</button>
                </div>
				<?php } else {  ?>

				<div id="user_lable" class="col s1 offset-s1 waves-effect" style="visibility: visible; margin-top: 45px; text-align: center; height: 35px; line-height: 35px">
				<?php 
				/* if(  $db ->  UserType() == 0){
					echo $db ->  UserEmail() ;
				}
				else if(  $db ->  UserType() == 1 ) */ {
					echo $db ->  UserName() ;
				}
				
				?>
				
				
				
				
                </div>
				
				
				<div class="col s1" style="margin-top: 45px; margin-left: 40px; padding: 0; height: 35px">
                    <a href="?action_logout=logout" class="button">LogOut </a>
                </div>
				


				
				<?php
				
				
				}  ?>

                <!--Register screen-->
                <!--<div id="register_screen" class="row" style="width: 30%; position: absolute; left: 70%; visibility: hidden; background-color: white; margin-bottom: 0px">-->
                    <!--<div class="row">-->
                        <!--<div class="col s6" style="background-color: #E0DFDE; height: 100px; text-align: center; vertical-align: middle; line-height: 80px; font-weight: bold">-->
                            <!--<a id="login" style="color: white;">LOG IN</a>-->
                        <!--</div>-->
                        <!--<div class="col s6" style="background-color: white; height: 100px; text-align: center; vertical-align: middle; line-height: 80px; font-weight: bold">-->
                            <!--<a id="register" style="color: black;">REGISTER</a>-->
                        <!--</div>-->
                    <!--</div>-->

                    <!--<div style="margin-left: 5%; margin-top: 3%">-->
                        <!--<h6 style="color: #E0DFDE; font-size: xx-large">Welcome to Fundfolio</h6>-->
                    <!--</div>-->

                    <!--<div class="row" style="margin-top: 10px; margin-bottom: 0px">-->
                        <!--<form class="col s12" method="post" style="padding: 0">-->
                            <!--<div class="row" style="margin-left: 5%">-->
                                <!--<div class="input-field col s12">-->
                                    <!--<input placeholder="Email" type="email" id="email" class="validate">-->
                                    <!--<label for="email" data-error="Wrong" data-success="Correct" style="font-weight: bolder; color: black;">SHARE YOUR EMAIL</label>-->
                                    <!--&lt;!&ndash;<label for="name">Username</label>&ndash;&gt;-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="row" style="margin-left: 5%">-->
                                <!--<div class="input-field col s12">-->
                                    <!--&lt;!&ndash;<label for="password">Password</label>&ndash;&gt;-->
                                    <!--<input placeholder="Password" id="password" type="password" class="validate">-->
                                    <!--<label for="password" style="font-weight: bolder; color: black;">CREATE A PASSWORD</label>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="row" style="margin-bottom: 30px">-->
                                <!--<div class="col s6 offset-s1">-->
                                    <!--<img src="images/upload.png" height="50">-->
                                <!--</div>-->
                                <!--<div class="col s4 offset-s1">-->
                                    <!--<a class="waves-effect waves-light btn-large orange">FINISHED</a>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<input type="image" src="images/facebook.png" alt="Submit" width="100%">-->
                            <!--<input type="image" src="images/google.png" alt="Submit" width="100%" style="margin-top: -6px; margin-bottom: -6px">-->
                        <!--</form>-->
                    <!--</div>-->
                <!--</div>-->

                <!--Login screen-->
                <div id="login_screen" class="row" style="width: 30%; position: absolute; left: 70%; height: auto; visibility: hidden; background-color: white; margin-bottom: 0px">
                    <div class="row">
                        <div id="llogin"  class="col s6" style="background-color: white; height: 100px; text-align: center; vertical-align: middle; line-height: 80px; font-weight: bold">
                            <a style="color: black;">LOG IN</a>
                        </div>
                        <div id="lregister" class="col s6" style="background-color: #E0DFDE; height: 100px; text-align: center; vertical-align: middle; line-height: 80px; font-weight: bold">
                            <a style="color: white;">REGISTER</a>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px; margin-bottom: 0px">
                        <form class="col s12" method="post" name = "register" id = "register" action = "" enctype="multipart/form-data" style="padding: 0; margin-top: 20px">
						
							<input type = "hidden" " id = "btn_action" name = "btn_action"  value = "" />
							
							
							<div  id = "lname" class="row" style="margin-left: 5%">
                                <div class="input-field col s12">
                                    <!--<label for="password">Password</label>-->
                                    <input placeholder="Name" name="name" id="name" type ="text" class="validate">
                                    <label id="name_lbl" for="name" style="font-weight: bolder; color: black;">Full Name</label>
                                </div>
                            </div>
						
                            <div class="row" style="margin-left: 5%">
                                <div class="input-field col s12">
                                    <input placeholder="Email" type="email" name = "lemail"  id="lemail" class="validate">
                                    <label id="email_lbl" for="lemail" data-error="Wrong" data-success="Correct" style="font-weight: bolder; color: black;">EMAIL</label>
                                    <!--<label for="name">Username</label>-->
                                </div>
                            </div>
                            
							
							
							
							
							<div class="row" style="margin-left: 5%">
                                <div class="input-field col s12">
                                    <!--<label for="password">Password</label>-->
                                    <input placeholder="Password" name="lpassword" id="lpassword" type="password" class="validate">
                                    <label id="password_lbl" for="lpassword" style="font-weight: bolder; color: black;">PASSWORD</label>
                                </div>
                            </div>
							
							<div id = "llocation" class="row" style="margin-left: 5%">
                                <div class="input-field col s12">
                                    <!--<label for="password">Password</label>-->
                                    <input placeholder="Ex. Indianapolis, United States" name="location" id="location" type="text" class="validate">
                                    <label id="location_lbl" for="location" style="font-weight: bolder; color: black;">Location</label>
                                </div>
                            </div>
							
							
							
                            <div class="row" style="margin-bottom: 30px">
                                <div class="col s6 offset-s1" style="height: 50px; line-height: 50px; text-align: left; margin: 0 auto">
                                    <!--img id="upload_img" src="images/upload.png" height="50" width="100%" style="visibility: hidden;"-->
									 <input type="file" name ="upload_img" id="upload_img" src="images/upload.png" height="50" width="100%" style="visibility: hidden;">
                                    <a id="forget_pass" style="color: orange; font-weight: bold;">Forgot password?</a>
                                    <!--position: absolute; left: 35px-->
                                </div>
                                <div class="col s4 offset-s1" style="padding: 0; margin: 0 auto">
                                    <!-- <a class="waves-effect waves-light btn-large orange">FINISHED</a> -->
									<input type = "Submit" id ="reg_sub" name ="reg_sub" class="waves-effect waves-light btn-large orange" value ="FINISHED" />
									
                                </div>
                            </div>
							</form>
                            <a href="fb/fbconfig.php"><input type="image" onclick="showModalPopupUpdate();return false;" name = "facebook" src="images/facebook.png" alt="Submit" width="100%;"></a>
                            <input type="image" src="images/google.png" alt="Submit" width="100%" style="margin-top: -6px; margin-bottom: -6px">
                        
                    </div>
                </div>
            </header>

            <!--Tag on image-->
            <div id="tag_img" class="row" style="margin-top: 20%; margin-left: 90px;margin-bottom: 0;">
                <div class="col s12" style="margin-bottom: 40px;">
                    <img src="images/tag.png" style="width: 40%">
                </div>
                <div class="col s12">
                    <a class="waves-effect waves-ripple btn-large white" style="color: black">GET STARTED</a>
                </div>
            </div>
        </div>

        <div class="row" style="position: relative; margin-bottom: 0">

            <!--Horizontal Navigation Bar-->
            <nav id="site">
                <div class="nav-wrapper">
                    <ul id="nav-mobile" class="left hide-on-med-and-down" style="width: 100%">
                        <!--<div class="col s1 offset-s2">-->
                        <li  <?php  if ( $cat_id == -1 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=-1">OVERVIEW</a></li>
                        <!--</div>-->
                        <!--<div class="col s1">-->
                        <li  <?php  if ( $cat_id == 1 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=1">Business</a></li>
                        <!--</div>-->
                        <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 2 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=2">Travel</a></li>
                        <!--</div>-->
                        <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 3 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=3">Sports</a></li>
                        <!--</div>-->
                        <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 4 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=4">Health</a></li>
                        <!--</div>-->
                        <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 5 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=5">Philanthropy</a></li>
                        <!--</div>-->
                        <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 6 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=6">Arts</a></li>
                        <!--</div>-->
						  <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 7 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=7">Journalism</a></li>
                        <!--</div>-->
						  <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 8 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=8">Pets & Animals</a></li>
                        <!--</div>-->
						  <!--<div class="col s1">-->
                        <li <?php  if ( $cat_id == 9 ) { ?> class="active" <?php  } ?> ><a href="?cat_id=9">Education</a></li>
                        <!--</div>-->
                    </ul>
                </div>
            </nav>

            <a class="btn btn-lg btn-success" id="big-sexy" onclick="togglenav()"><i class="material-icons">menu</i></a>

            <div id="site-menu">
                <!--<a class="btn btn-lg btn-success" onclick="togglenav()" style="color: pink; font-size: 20px;"><i class="fa fa-times"></i></a>-->
                <ul>
                    <li class="active"><a href="?cat_id =-1">OVERVIEW</a></li>
                    <li><a href="?cat_id =1">Business</a></li>
                    <li><a href="?cat_id =2">Travel</a></li>
                    <li><a href="?cat_id =3">Sports</a></li>
                    <li><a href="?cat_id =4">Health</a></li>
                    <li><a href="?cat_id =5">Philanthropy</a></li>
                    <li><a href="?cat_id =6">Arts</a></li>
					<li><a href="?cat_id =7">Journalism</a></li>
                    <li><a href="?cat_id =8">Pets & Animals</a></li>
					<li><a href="?cat_id =9">Education</a></li>


                </ul>
            </div>

        </div>

        <div style="margin-bottom: 100px;">
            <div class="row">

                <!--Side Navigation Bar-->
                <div class="col s2" style="width: 375px">
                    <div id="sidenavbar" style="margin-top: 50px; margin-left: 20px; background-color: #F9F9F9">
                        <ul style="margin-left: 20px">
                            <li>
                                <label style="color: #545557; font-weight: bold; font-size: medium">TRENDING NOW</label>
                            </li>
                            <li class="active">
                                <img src="images/star.png" style="width: 20px; height: 20px;">
                                <a>Popular</a>
                            </li>
                            <li>
                                <img src="images/staff.png" style="width: 20px; height: 20px;">
                                <a>Staff Picks</a>
                            </li>
                            <li>
                                <img src="images/eye.png" style="width: 20px; height: 13px;">
                                <a>Almost there</a>
                            </li>
                            <li>
                                <img src="images/heart.png" style="width: 20px; height: 22px;">
                                <a>Monthly Charity</a>
                            </li>
                            <li>
                                <img src="images/location.png" style="width: 20px; height: 25px;">
                                <a>Near Me</a>
                            </li>
                        </ul>
                    </div>

                    <!--Search by location button-->
                    <div class="row" style="margin-top: 0px; margin-left: 20px;">
                        <button id="search_btn">
                            <div style="float: left; margin-left: 20px; font-size: large">Search By Location</div>
                            <img src="images/downarrow.png"; style="float: right; width: 23px; height: 13px; margin-top: 5px; margin-right: 20px">
                        </button>
                    </div>

                    <!--Tag-->
                    <div class="row col s2">
                        <img src="images/tag1.png" style="width: 250px; height: 40px; margin-left: 40px; margin-top: 20px;">
                    </div>
                </div>
				
				
				<?php 
				
				$date = date('Y-m-d H:i:s');
				
				//$len = count($campaign_list);
				foreach( $campaign_list as $campaign ){
					
					
					
				 $startTimeStamp = strtotime( $campaign['c_date']);
				 $endTimeStamp = strtotime( $date );

				 $timeDiff = abs($endTimeStamp - $startTimeStamp);

				 $numberDays = $timeDiff/86400;  // 86400 seconds in one day

				// and you might want to convert to integer
				 $numberDays = intval($numberDays);
				 $numberDays = $campaign['days'] - $numberDays ; 
				 if( $numberDays < 0 )
					 $numberDays = 0;
				 if( $campaign['amount'] != 0 )
				 $percent = ( $campaign['total_amount']/$campaign['amount'] ) * 100;
				 else {
					 
				 }
				 //determinate
				 //echo "   ". $numberDays;
					
				?>
				 <!--Campaign Content -->
                <div class="col s3" style="margin-left: 0px; margin-top: 50px">
                    <a href="#">
                        <div class="card" style="">
                            <!--img src="images/campaign1.png" alt="Avatar" style="width:100%"-->
							<img src="campaign_uploads/<?php echo $campaign['campaignimage'];  ?>" alt="Avatar" style="width:100%">
                            <div class="container1">
                                <h5><b><?php  echo $campaign['campaignname']; ?></b></h5>
                                <p><?php  echo $campaign['description']; ?></p>
                                <div class="row">
                                    <img class="col s2" src="images/location.png" style="padding: 0; height: 30px; width: 20px;">
                                    <h5 class="col s9"><?php  echo $campaign['company_location']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="progress">
                        <div class="determinate" style="width: <?php echo $percent; ?>%"></div>
                    </div>
                    <div class="row campaign_details" style="background-color: #F9F9F9; color: #76777B">
                        <div class="col s4">
                            <h4><?php  echo $campaign['total_doner']; ?> of <?php  echo $campaign['total_backers']; ?></h4>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h4> <?php  echo $campaign['amount']; ?> </h4>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h4> <?php  echo /* $campaign['days'] */$numberDays; ?> days</h4>
                            <p>open folio</p>
                        </div>
                    </div>
                </div>
				
				<?php } ?>
				
				<!--end campaign -->
				
				

                <!--Campaign Content 1-->
				
				<!--
                <div class="col s3" style="margin-left: 0px; margin-top: 50px">
                    <a href="#">
                        <div class="card" style="">
                            <img src="images/campaign1.png" alt="Avatar" style="width:100%">
                            <div class="container1">
                                <h5><b>Mission trip to Africa</b></h5>
                                <p>Vut perspiciatis unde omnis iste natus error sit voluptatem acc</p>
                                <div class="row">
                                    <img class="col s2" src="images/location.png" style="padding: 0; height: 30px; width: 20px;">
                                    <h5 class="col s9">Indianapolis, IN</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="progress">
                        <div class="determinate" style="width: 30%"></div>
                    </div>
                    <div class="row campaign_details" style="background-color: #F9F9F9; color: #76777B">
                        <div class="col s4">
                            <h4>16 of 24</h4>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h4>$300</h4>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h4>14 days</h4>
                            <p>open folio</p>
                        </div>
                    </div>
                </div>
				
				-->

                <!--Campaign Content 2-->
				<!--
                <div class="col s3" style="margin-left: 0px; margin-top: 50px">
                    <a href="#">
                        <div class="card">
                            <img src="images/campaign2.png" alt="Avatar" style="width:100%">
                            <div class="container1">
                                <h5><b>Race for Recovery</b></h5>
                                <p>Vut perspiciatis unde omnis iste natus error sit voluptatem acc</p>
                                <div class="row">
                                    <img class="col s2" src="images/location.png" style="padding: 0; height: 30px; width: 20px;">
                                    <h5 class="col s9">Chicago, IL</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="progress">
                        <div class="determinate" style="width: 50%"></div>
                    </div>
                    <div class="row campaign_details" style="background-color: #F9F9F9; color: #76777B">
                        <div class="col s4">
                            <h4>42 of 24</h4>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h4>$1000</h4>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h4>8 days</h4>
                            <p>open folio</p>
                        </div>
                    </div>
                </div>
				-->
                <!--Campaign Content 3-->
				
				<!--
                <div class="col s3" style="margin-left: 0px; margin-top: 50px">
                    <a href="#">
                        <div class="card">
                            <img src="images/campaign3.png" alt="Avatar" style="width:100%">
                            <div class="container1">
                                <h5><b>Avon steps</b></h5>
                                <p>Vut perspiciatis unde omnis iste natus error sit voluptatem acc</p>
                                <div class="row">
                                    <img class="col s2" src="images/location.png" style="padding: 0; height: 30px; width: 20px;">
                                    <h5 class="col s9">West Avon, IN</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="progress">
                        <div class="determinate" style="width: 80%"></div>
                    </div>
                    <div class="row campaign_details" style="background-color: #F9F9F9; color: #76777B">
                        <div class="col s4">
                            <h4>31 of 24</h4>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h4>$800</h4>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h4>3 days</h4>
                            <p>open folio</p>
                        </div>
                    </div>
                </div>
				 
				 -->
            </div>
        </div>


        <!--Footer-->
        <footer class="page-footer" style="background-color: #F9F9F9">
            <div class="container">
                <div id="footer_links" class="row">
                    <div class="col s1">
                        <a href="#">About</a>
                    </div>
                    <div class="col s1">
                        <a>Jobs</a>
                    </div>
                    <div class="col s1">
                        <a>Press</a>
                    </div>
                    <div class="col s1">
                        <a>Help Center</a>
                    </div>
                    <div class="col s1">
                        <a>Get Started</a>
                    </div>
                    <div class="col s1">
                        <a>Handbook</a>
                    </div>
                    <div class="col s2" style="margin-left: 5%">
                        <input type="text" placeholder="Email Address" style="background-color: white; padding-left: 15px; border: 0;height: 40px; width: 300px; ">
                    </div>
                    <div class="col s2">
                        <button style="background-color: #4276E2; width: 150px; height: 40px; color: white; font-size: large; border-radius: 2px; padding: 0; border: 0; margin-left: 30px">Stay Connected</button>
                    </div>
                </div>
                <div id="footer_copyright" class="row">
                    <div class="col s3" style="color: #BABABA; padding: 0">
                        © 2016 Fundfolio Crowdfunding Company
                    </div>
                    <div class="col s1">
                        <a>Privacy</a>
                    </div>
                    <div class="col s1">
                        <a>Terms</a>
                    </div>
                    <div class="col s2">
                        <a>Safety and Use</a>
                    </div>
                    <div class="col s1 offset-l1" style="width: 50px">
                        <img src="images/hand1.png" style="width: 25px; height: 29px">
                    </div>
                    <div class="col s1" style="width: 50px">
                        <img src="images/twitter1.png" style="width: 27px; height: 25px">
                    </div>
                    <div class="col s1" style="width: 50px">
                        <img src="images/facebook1.png" style="width: 12px; height: 25px">
                    </div>
                    <div class="col s1" style="width: 50px">
                        <img src="images/instagram1.png" style="width: 25px; height: 25px">
                    </div>
                    <div class="col s1" style="width: 50px">
                        <img src="images/youtube1.png" style="width: 27px; height: 25px">
                    </div>
                    <div class="col s1" style="width: 70px">
                        <button class='dropdown-button btn' href='#' data-activates='dropdown1' style="background-color: transparent; color: #F9F9F9">
                            <a style="float: left">English</a>
                            <img src="images/downarrow.png"; style="float: right; width: 23px; height: 13px; margin-top: 5px; margin-right: 10px">
                        </button>
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="#!">English</a></li>
                            <li><a href="#!">Spanish</a></li>
                            <li class="divider"></li>
                            <li><a href="#!">German</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCgwupCCqrpms0vsY6k4ijoVEeGgNZQnZs&language=en-AU"></script>
        <script>
            var autocomplete = new google.maps.places.Autocomplete($("#location")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>
		
    <script type="text/javascript">
        var btn = document.getElementById("login_btn");
        var login = document.getElementById("login_screen");
        var llogin_btn = document.getElementById("llogin");
        var llogin_btn1 = llogin_btn.getElementsByTagName("a")[0];
        var lregister_btn = document.getElementById("lregister");
        var lregister_btn1 = lregister_btn.getElementsByTagName("a")[0];
        var email_input = document.getElementById("lemail");
        var email_label = document.getElementById("email_lbl");
        var pass_input = document.getElementById("lpassword");
        var pass_label = document.getElementById("password_lbl");
        var img = document.getElementById("upload_img");
        var forget = document.getElementById("forget_pass");
        var register_btn = document.getElementById("register_btn");
		var lname = document.getElementById("lname");
        var llocation = document.getElementById("llocation");

		

        register_btn.onclick = function() {
            login.style.visibility = "visible"
            btn.style.visibility = "hidden";
            llogin_btn.style.backgroundColor = "#E0DFDE";
            llogin_btn1.style.color = "white";
            lregister_btn.style.backgroundColor = "white";
            lregister_btn1.style.color = "black";
            email_input.placeholder = "Email";
            email_label.innerHTML = "SHARE YOUR EMAIL";
            pass_input.placeholder = "Password";
            pass_label.innerHTML = "CREATE A PASSWORD";
            img.style.visibility = "visible";
            forget.style.visibility = "hidden";
			
			lname.style.visibility = "visible"
			llocation.style.visibility = "visible"
        };

        btn.onclick = function() {
            btn.style.visibility = "hidden";
            login.style.visibility = "visible";
            llogin_btn.style.backgroundColor = "white";
            llogin_btn1.style.color = "black";
            lregister_btn.style.backgroundColor = "#E0DFDE";
            lregister_btn1.style.color = "white";
            email_input.placeholder = "Email";
            email_label.innerHTML = "EMAIL";
            pass_input.placeholder = "Password";
            pass_label.innerHTML = "PASSWORD";
            img.style.visibility = "hidden";
            forget.style.visibility = "visible";
			
			lname.style.visibility = "hidden"
			llocation.style.visibility = "hidden"
        };

        llogin_btn.onclick = function() {
            btn.style.visibility = "hidden";
            llogin_btn.style.backgroundColor = "white";
            llogin_btn1.style.color = "black";
            lregister_btn.style.backgroundColor = "#E0DFDE";
            lregister_btn1.style.color = "white";
            email_input.placeholder = "Email";
            email_label.innerHTML = "EMAIL";
            pass_input.placeholder = "Password";
            pass_label.innerHTML = "PASSWORD";
            img.style.visibility = "hidden";
            forget.style.visibility = "visible";
			
			lname.style.visibility = "hidden"
			llocation.style.visibility = "hidden"
        };

        lregister_btn.onclick = function() {
            login.style.visibility = "visible"
            btn.style.visibility = "hidden";
            llogin_btn.style.backgroundColor = "#E0DFDE";
            llogin_btn1.style.color = "white";
            lregister_btn.style.backgroundColor = "white";
            lregister_btn1.style.color = "black";
            email_input.placeholder = "Email";
            email_label.innerHTML = "SHARE YOUR EMAIL";
            pass_input.placeholder = "Password";
            pass_label.innerHTML = "CREATE A PASSWORD";
            img.style.visibility = "visible";
            forget.style.visibility = "hidden";
			
			lname.style.visibility = "visible"
			llocation.style.visibility = "visible"
        };
    </script>

    <script>
        $(function () {

            $('html').click(function () {
                $('#login_screen').hide();
                $('#login_btn').css('visibility', 'visible');
            });

            $('#login_screen').click(function (event) {
                event.stopPropagation();
            });

            $('#login_btn').click(function (event) {
                event.stopPropagation();
                $('#login_screen').show();
                $('#login_btn').css('visibility', 'hidden');
                $('#forget_pass').show();
                $('#upload_img').hide();
				$('#btn_action').val("login");
            });

            $('#register_btn').click(function (event) {
                event.stopPropagation();
                $('#login_screen').show();
                $('#login_btn').css('visibility', 'hidden');
                $('#forget_pass').hide();
                $('#upload_img').show();
				$('#btn_action').val("register");
				
            });

            $('#lregister').click(function (event) {
                event.stopPropagation();
                $('#login_screen').show();
								
                $('#login_btn').css('visibility', 'hidden');
                $('#forget_pass').hide();
                $('#upload_img').show();
				$('#btn_action').val("register");
            });

            $('#llogin').click(function (event) {
                event.stopPropagation();
                $('#login_screen').show();
                $('#login_btn').css('visibility', 'hidden');
                $('#forget_pass').show();
                $('#upload_img').hide();
				
				$('#btn_action').val("login");
            });

            // media query event handler
            if (matchMedia) {
                var mq = window.matchMedia("screen and (max-width: 1360px)");
                mq.addListener(WidthChange);
                WidthChange(mq);
            }

            // media query change
            function WidthChange(mq) {
                if (mq.matches) {
                    $('#site').hide();
                    $('#site-menu').show();
                    $('#big-sexy').show();
                } else {
                    $('#site').show();
                    $('#big-sexy').hide();
                    $('#site-menu').hide();
                }
            }
        });

        function togglenav() {
//            alert('here');
            var toggle = $('#site-menu');
            var toggle_btn = $('#big-sexy');
            toggle.toggleClass('open');
        }
		
		

		
		
		
    </script>
    <script type="text/javascript">

        setInterval( function() {

//        var imageSrc = document
//            .getElementById('main_content')
//            .style
//            .backgroundImage
//            .replace(/url\((['"])?(.*?)\1\)/gi, '$2')
//            .split(',')[0];
//
//        // I just broke it up on newlines for readability
//
//        var image = new Image();
//        image.src = imageSrc;

        var tag_img = document.getElementById('tag_img');
        var img = document.getElementById('background_img');
//        alert(height);
        var main = document.getElementById("main_content");
        var width = img.width;
        var height = (width*63)/100;
        var tmp = height*0.30;
        height = height.toString() + "px";
        main.style.height = height;
        img.style.height = height;
        tag_img.style.marginTop = tmp.toString() + "px";
//        alert(main.style.height);
        }, 1000);
    </script>
</body>
</html>