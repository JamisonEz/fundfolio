

<?php
	
		$cat_id = -1;
		// Include Functions
		include("functions.php");	
		$db = new DBController();
		
		
		if(! $db -> CheckLogin()){
			 header("Location: http://localhost/yfcreative/Fundfolio/index.php");
							die();
			
		}
		
		
		
		 if( isset( $_REQUEST [ 'action_logout' ] )){

				 $db -> LogOut();
				  header("Location: http://localhost/yfcreative/Fundfolio/index.php");
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
		



?>
<html lang="en">
<head>
    <title>Fundfolio</title>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

    <!-- Compiled and minified CSS -->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="homescreen.css">
    <!--media="screen and (min-width: 1740px)"-->
    <link rel="stylesheet" href="homescreen-medium.css" media="screen and (max-width: 1360px)">
</head>
<body>
    <div>

        <!--Top menu-->
        <header class="row" style="margin: 0">
            <div class="col s3" style="margin-top: 40px; margin-bottom: 20px; margin-left: 70px">
                <img src="images/logo1.png" style="width: 70%;">
            </div>
            <div class="row col s3" style="float: right; margin-top: 40px; height: 50px; line-height: 50px; text-align: center">
			
			
			
				
			
                <div class="col" style="text-align: center;" >
                    <!--<img src="images/background.png" style="border-radius: 50%; height: 50px; width: 50px"-->
					 <a href="?action_logout=logout" class="button">LogOut </a> 
					 <img src="profile_uploads/<?php echo $db -> UserImage() ; ?>" style="border-radius: 50%; height: 50px; width: 50px">
					
                </div>
                <div class="col" style="text-align: center;">
                    WELCOME, <b><?php 
				/* if(  $db ->  UserType() == 0){
					echo $db ->  UserEmail() ;
				}
				else if(  $db ->  UserType() == 1 ) */ {
					echo $db ->  UserName() ;
				}
				
				?></b>
                </div>
            </div>
        </header>

        <div id="main_content">

            <div class="row" style="margin-left: 50px">
                <!--<a href="#">-->
                    <div id="card1" class="col s7" style="position: relative">
                        <!--<div style="font-size: 6vh; font-weight: bolder; color: white; position: absolute; top: 40%; left: 35%">-->
                            <!--Launch a Folio-->
                        <!--</div>-->
                        <img src="images/card1.png" style="height: 100%; width: 100%" onClick="document.location.href='hTML/'" >
                    </div>
                <!--</a>-->

                <!--<a href="#">-->
                    <div id="card2" class="col s4">
                        <!--<div style="margin-top: 20%; position: relative">-->
                            <!--<div class="row" style="font-size: 35px; font-weight: bolder; color: white; height: 25px; margin: 0 auto">-->
                                <!--1,042-->
                            <!--</div>-->
                            <!--<div class="row" style="font-size: 35px; font-weight: bolder; color: white;height: 30px;margin-top: 5%">-->
                                <!--Community Points-->
                            <!--</div>-->
                            <!--<div style="font-size: 35px; font-weight: bolder; color: white; text-align: left; position: absolute; left: 20%">-->
                                <!--<div class="row" style="margin-top: 30%; margin-bottom: 0; position: relative">-->
                                    <!--<div class="col s1" style="width: 15px; height: 15px; background-color: white; padding: 0; position: absolute; top: 30%"></div>-->
                                    <!--<div class="col s11" style="margin-left: 40px; padding: 0;">Donate to a folio</div>-->
                                <!--</div>-->
                                <!--<div class="row" style="margin-bottom: 0; position: relative">-->
                                    <!--<div class="col s1" style="width: 15px; height: 15px; background-color: white; padding: 0; position: absolute; top: 30%"></div>-->
                                    <!--<div class="col s11" style="margin-left: 40px; padding: 0">Share on Social</div>-->
                                <!--</div>-->
                                <!--<div class="row" style="margin-top: 0; position: relative">-->
                                    <!--<div class="col s1" style="width: 15px; height: 15px; background-color: white; padding: 0; position: absolute; top: 30%"></div>-->
                                    <!--<div class="col s11" style="margin-left: 40px; padding: 0">Like a Campaign</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <img src="images/card2.png" style="height: 100%; width: 100%">
                    </div>
                <!--</a>-->
            </div>
            <div class="row" style="margin-top: 40px; margin-left: 50px; margin-bottom: 0px">
                <div id="myDiv" class="row col s7" style="padding: 0; margin-bottom: 0px;">
                    <!--<a href="#">-->
                        <div id="card3" class="col s5" style="position: relative">
                            <!--<div style="font-size: 35px; font-weight: bolder; color: white; top: 40%; position: absolute; left: 15%">-->
                                <!--<div class="row" style="margin-bottom: 0px">-->
                                    <!--<div class="col s2" style="text-align: right; padding: 0px">-->
                                        <!--$80-->
                                    <!--</div>-->
                                    <!--<div class="col s9 offset-s1" style="padding: 0">-->
                                        <!--Total Donated-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="row">-->
                                    <!--<div class="col s2" style="text-align: right; padding: 0px">-->
                                        <!--4-->
                                    <!--</div>-->
                                    <!--<div class="col s9 offset-s1" style="padding: 0">-->
                                        <!--Folios Backed-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                            <img src="images/card3.png" style="width: 100%; height: 100%">
                        </div>
                    <!--</a>-->
                    <!--<a href="#">-->
                        <div id="card4" class="col s5">
                            <!--<div style="color: white; font-weight: bolder; font-size: 35px; position: absolute; top: 45%; left: 30%">-->
                                <!--My Fundfolio-->
                            <!--</div>-->
                            <img src="images/card4.png" style="height: 100%; width: 100%">
                        </div>
                    <!--</a>-->
                </div>
                <!--<a href="#">-->
                    <div id="card5" class="col s4">
                        <!--<div style="color: white; font-weight: bolder; font-size: 35px; position: absolute; top: 45%; left: 35%">-->
                            <!--Help Center-->
                        <!--</div>-->
                        <img src="images/card5.png" style="height: 100%; width: 100%">
                    </div>
                <!--</a>-->
            </div>
        </div>

        <div id="backed_panel">
            <div class="red-x big-x close" style="float: right; margin: 30px">&#10006;</div>
        </div>

        <div id="fundfolio_panel">
            <div class="red-x big-x close" style="float: right; margin: 30px">&#10006;</div>
        </div>

        <div id="help_center_panel">
            <div class="red-x big-x close" style="float: right; margin: 30px">&#10006;</div>
            <div style="color: white; text-align: center; font-size: 60px; font-weight: bolder; margin-top: 100px">
                Welcome to your FolioDesk
            </div>
            <div style="color: white; text-align: center; font-size: xx-large;">
                The effortless helpdesk support for fundfolio
            </div>
            <div class="row" style="margin-bottom: 0">
                <div class="col s6 offset-s2" style="margin-top: 50px;">
                    <input type="text" placeholder="How do we help?" style="border: 0; padding-left: 50px; padding-right: 0px; font-size: x-large; background-color: white; height: 80px">
                </div>
                <div class="col s2" style="margin-top: 50px;">
                    <button  style="color: white;width: 100%; height: 80px; background-color: rgb(73,140,101); font-size: x-large; border: 0px">Send</button>
                </div>
            </div>
            <div class="row">
                <div class="col offset-s2" style="color: white; font-size: large;">
                    <p style="margin: 0">Trending searches: collecting payments, social sharing</p>
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
				
				
				  <!--Campaign Content 1-->
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
                            <h5><?php  echo $campaign['total_doner']; ?> of <?php  echo $campaign['total_backers']; ?></h5>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h5> <?php  echo $campaign['amount']; ?> </h5>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h5> <?php  echo /* $campaign['days'] */$numberDays; ?> days</h5>
                            <p>open folio</p>
                        </div>
                    </div>
                </div>
				
				<?php } ?>
		

                <!--Campaign Content 1-->
               <!-- <div class="col s3" style="margin-left: 0px; margin-top: 50px">
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
                            <h5>16 of 24</h5>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h5>$300</h5>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h5>14 days</h5>
                            <p>open folio</p>
                        </div>
                    </div>
                </div> -->

                <!--Campaign Content 2-->
                <!--<div class="col s3" style="margin-left: 0px; margin-top: 50px">
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
                            <h5>42 of 24</h5>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h5>$1000</h5>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h5>8 days</h5>
                            <p>open folio</p>
                        </div>
                    </div>
                </div> -- >

                <!--Campaign Content 3-->
              <!--  <div class="col s3" style="margin-left: 0px; margin-top: 50px">
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
                            <h5>31 of 24</h5>
                            <p>Backers</p>
                        </div>
                        <div class="col s4">
                            <h5>$800</h5>
                            <p>Goal</p>
                        </div>
                        <div class="col s4">
                            <h5>3 days</h5>
                            <p>open folio</p>
                        </div>
                    </div>
                </div> -- >
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

    <script type="text/javascript">
        $(function () {
            $('#main_content').show();
//            $('#main_content').fadeIn(1000);
            $('#backed_panel').hide();
            $('#fundfolio_panel').hide();
            $('#help_center_panel').hide();

            var h = $('#main_content').height();

            setInterval( function() {
                var w = $('#myDiv').width();
                w = (w - 50) / 2;
//                alert(w);
                w = Math.floor(w);
                $('#card3').width(w);
                $('#card4').width(w);

                var card1 = $('#card1');
                w = card1.width();
                card1.height(w*66/100);

                var card2 = $('#card2');
                w = card2.width();
                card2.height(w*1.13);

                var card3 = $('#card3');
                w = card3.width();
                card3.height(w*0.58);

                var card4 = $('#card4');
                w = card4.width();
                card4.height(w*0.58);

                var card5 = $('#card5');
                w = card5.width();
                card5.height(w*0.5033);

//                $('#backed_panel').width(w);
                $('#backed_panel').height(h);

//                $('#fundfolio_panel').width(w);
                $('#fundfolio_panel').height(h);

//                $('#helpcenter_panel').width(w);
                $('#help_center_panel').height(h);

            }, 500);

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

            $('#card5').click(function () {
                h = $('#main_content').height();
                $('#main_content').hide();
                $('#backed_panel').hide();
                $('#fundfolio_panel').hide();
//                $('#help_center_panel').show();
                $('#help_center_panel').fadeIn(1000);
                window.scrollTo(0, 0);
            });

            $('#card4').click(function () {
                h = $('#main_content').height();
                $('#main_content').hide();
                $('#backed_panel').hide();
//                $('#fundfolio_panel').show();
                $('#fundfolio_panel').fadeIn(1000);
                $('#help_center_panel').hide();
                window.scrollTo(0, 0);
            });

            $('#card3').click(function () {
                h = $('#main_content').height();
                $('#main_content').hide();
//                $('#backed_panel').show();
                $('#backed_panel').fadeIn(1000);
                $('#fundfolio_panel').hide();
                $('#help_center_panel').hide();
                window.scrollTo(0, 0);
            });

            $('.close').click( function () {
//                $('#main_content').show();
                $('#main_content').fadeIn(1000);
                $('#backed_panel').hide();
                $('#fundfolio_panel').hide();
                $('#help_center_panel').hide();
            });

        });

        function togglenav() {
//            alert('here');
            var toggle = $('#site-menu');
            var toggle_btn = $('#big-sexy');
            toggle.toggleClass('open');
        }
    </script>

</body>
</html>