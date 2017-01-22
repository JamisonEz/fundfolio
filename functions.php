<?php


class DBController {
	
	
	
	
	private $host = "localhost"; //database location
	private $user = "root"; //database username
	
	private $password = "";
	private $database = "ahartwel_fundfolio";
	
	private  $conn;
	
	var $rand_key;
	//global $link;
	
	function __construct() {
		 $this->conn = $this->connectDB();
		if(!empty( $this->conn)) {
			$this->selectDB( $this->conn);
		}
		$this->rand_key = '0iQx5oBk66oVZep';
	}
	
	function connectDB() {
		$this->conn = mysqli_connect($this->host,$this->user,$this->password);
		if ( $this->conn->connect_error) {
			die("Connection failed: " .  $this->conn->connect_error);
		}

		return $this->conn;
	}
	
	function selectDB($conn) {
		$db_selected = mysqli_select_db($this->conn,$this->database);
		
		if (!$db_selected) {
			die ('Can\'t use foo : ' . mysqli_error(  $this->conn ));
		}
	}




	// functions.php
	function check_txnid($tnxid){
		//global $link;
		//return true;
		$valid_txnid = true;
		//get result set
		$sql = mysql_query("SELECT * FROM `payments` WHERE txnid = '$tnxid'", $conn);
		if ($row = mysql_fetch_array($sql)) {
			$valid_txnid = false;
		}
		return $valid_txnid;
	}

	function check_price($price, $id){
		$valid_price = false;
		//you could use the below to check whether the correct price has been paid for the product
		
		/*
		$sql = mysql_query("SELECT amount FROM `products` WHERE id = '$id'");
		if (mysql_num_rows($sql) != 0) {
			while ($row = mysql_fetch_array($sql)) {
				$num = (float)$row['amount'];
				if($num == $price){
					$valid_price = true;
				}
			}
		}
		return $valid_price;
		*/
		return true;
	}

	function userRegister ( $email , $paw ,$name , $location , $image ){

		$pwdmd5 = md5($paw);
		
		$query = "SELECT *
				FROM `register` 
				where email = '$email' 	";
				
		$result = mysqli_query( $this->conn, $query ) or die(mysqli_error($this->conn));
		if($result && mysqli_num_rows($result) > 0)
        {
			return "2";
		}
				
		$sql = mysqli_query(  $this->conn , "INSERT INTO `register`( `email` , `password` , `name`, `location` , `profilepic`) 
						VALUES ( 						
						'$email' ,					
						'$pwdmd5' ,	
						'$name' ,	
						'$location' ,							
						'$image'
						)");
						
						
				if($sql){
					
					
					if(!isset($_SESSION)){ session_start(); }
			
			$_SESSION[$this->GetLoginSessionVar()] = $email; 
			
					$responce = "1";
					
					$_SESSION['type'] =  0 ;
					$_SESSION['user_id'] =  mysqli_insert_id( $this->conn) ;
					$_SESSION['user_name']  = $name ;
					$_SESSION['user_email'] = $email;
					$_SESSION['user_image'] = $image;
				}
				else{

					$responce = "0";
				}
				return 	$responce;	
		
	}
	
	function registerFbUser ( $fbid , $fbfullname , $fimage ){

		//$pwdmd5 = md5($paw);
		
		
		
		
		
		
		$query = "SELECT *
				FROM `register` 
				where socialid = '$fbid' 	";
				
		$result = mysqli_query( $this->conn, $query ) or die(mysqli_error($this->conn));
		if($result && mysqli_num_rows($result) > 0)
        {
			//return "2";
			
			if(!isset($_SESSION)){ session_start(); }
			
				$_SESSION[$this->GetLoginSessionVar()] = $fbid;
			
					
				$row = mysqli_fetch_assoc($result);
				
					$_SESSION['type'] =  1 ;
					$_SESSION['user_id'] = $row['id'] ;
					$_SESSION['user_name']  = $fbfullname ;
					$_SESSION['user_email'] = "";
					$_SESSION['user_image'] = $fimage;
					
			
		}
				
		$sql = mysqli_query(  $this->conn , "INSERT INTO `register`( `socialid`, `name` , `profilepic`) 
						VALUES ( 						
						'$fbid' ,					
						'$fbfullname' ,						
						'$fimage'
						)");
						
						
				if($sql){
					$responce = "1";
					
					if(!isset($_SESSION)){ session_start(); }
			
					$_SESSION[$this->GetLoginSessionVar()] = $fbid;
			
					
				
				
					$_SESSION['type'] =  1 ;
					$_SESSION['user_id'] = mysqli_insert_id( $this->conn) ;
					$_SESSION['user_name']  = $fbfullname ;
					$_SESSION['user_email'] = "";
					$_SESSION['user_image'] = $fimage;
					
					
				}
				else{

					$responce = "0";
				}
				return 	$responce;	
		
	}
	
	function login ( $email , $paw  ){
		
		$pwdmd5 = md5($paw);
		$query = "SELECT *
				FROM `register` 
				where email = '$email' and password = '$pwdmd5' 
				";
				
		$result = mysqli_query( $this->conn, $query ) or die(mysqli_error($this->conn));
			
		if($result && mysqli_num_rows($result) > 0)
        {
			
			if(!isset($_SESSION)){ session_start(); }
			
			$_SESSION[$this->GetLoginSessionVar()] = $email;
		
				
			$row = mysqli_fetch_assoc($result);
			
			$_SESSION['type'] =  0 ;
			
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_name']  = $row['name'];
			$_SESSION['user_email'] = $row['email'];

			$_SESSION['user_image'] = $row['profilepic'];

			//$_SESSION['type_of_user'] = $row['type'];
		   
			
			
            return true;
        }
		else{
			return false;
		}
        
        

		
	}
	
	
	 function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
	
	
	function UserType()
    {
        return isset($_SESSION['type'])?$_SESSION['type']:'';
    }
	
	
	
	
	function UserUserID()
    {
		
        return isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
    }
		
	function UserEmail()
    {
        return isset($_SESSION['user_email'])?$_SESSION['user_email']:'';
    }
	
	
	function UserName()
    {
        return isset($_SESSION['user_name'])?$_SESSION['user_name']:'';
    }
	function UserImage()
    {
        return isset($_SESSION['user_image'])?$_SESSION['user_image']:'';
    }
	
	
	
	
	
	function LogOut()
    {
        session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
	
	function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
	
        return $retvar;
    }
    
	
	function  addCampaign (  $campaignname , $tag_line ,  $description ,  $campaignimage , $campaignvidio ,  $amount ,  $days ,  $total_backers ,  $isfunded ,  $categoryid ,$company_location , $quote_input , $link , $loginid ){
		
		 $query = "INSERT INTO `campaign` ( `campaignname`,`tag_line` ,`description`, `campaignimage`, `campaignvidio` , `amount`, `days`, `total_backers`, `isfunded`, `categoryid`, `company_location` , `quote_input` , `link` ,`latitude`, `longitude`, `loginid`, `u_date`) VALUES (
					'".$campaignname."' ,
					'".$tag_line."' ,
					'".$description."' ,
					'".$campaignimage."' ,
					'".$campaignvidio."' ,
					'".$amount."' ,
					'".$days."' ,
					'".$total_backers."' ,
					'".$isfunded."' ,
					'".$categoryid."' ,

					'".$company_location."' ,
					'".$quote_input."' ,
					'".$link."' ,
					'' ,
					'' ,
					'".$loginid."' ,
						
					'".date("Y-m-d H:i:s")."'
					)";
					
				
		
		$sql = mysqli_query( $this->conn , $query );
			return mysqli_insert_id( $this->conn);
	}
	

	function getCampaign( $cat_id ){
		
		
		
			$where  = " 1=1 ";
			if( isset( $cat_id ) && ( $cat_id != -1 ) ){
				$where  .="and c.categoryid=".$cat_id; 
			}
		
			$query = "SELECT c.* ,COUNT(g.campaignid) as total_doner , SUM(g.amount) as total_amount 
				FROM `campaign` as c
				LEFT JOIN  gifts as g  ON  g.campaignid = c.campaignid
				where $where
				
				GROUP by c.campaignid
				ORDER BY c.c_date DESC ";
				
			$sql = mysqli_query( $this->conn, $query ) or die(mysqli_error($this->conn));

			//$sql = mysqli_query( $this->conn, "SELECT * FROM `campaign` where $where") or die(mysqli_error($this->conn));
			
			$res = array();
			while($row = mysqli_fetch_assoc($sql)) {
			     $res[] = $row;
			}
			return $res;
			
		
	}
	
	function getTotalDonateAmount(){
	
		
		
			$sql = mysqli_query( $this->conn, "SELECT sum( payment_amount ) as total_amount FROM `payments`") or die(mysqli_error($this->conn));
			
			if (mysqli_num_rows($sql) > 0) 
				return mysqli_fetch_assoc( $sql);
			else
				return false;
			
		
	}
	
	function getTotalDonateCount(){
	
		
		
			$sql = mysqli_query( $this->conn ,"SELECT COUNT(id) as total_donate FROM `payments`");
			return mysqli_fetch_array($sql);
	
	}

	function updatePayments($data){
		//global $link;
		
		if (is_array($data)) {
			$sql = mysqli_query( $this->conn , "INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES (
					'".$data['txn_id']."' ,
					'".$data['payment_amount']."' ,
					'".$data['payment_status']."' ,
					'".$data['item_number']."' ,
					'".date("Y-m-d H:i:s")."'
					)");
			return mysqli_insert_id( $this->conn);
		}
	}
	//Get Payment list
	function getPaymentDetails(){
			$sql = mysqli_query( $this->conn ,"SELECT * FROM `payments`");
			$arr = array();
			while($row = mysqli_fetch_assoc($sql)) {
			     $arr[] = intval($row['payment_amount']);
			}
			return $arr;
	
	}	
}
