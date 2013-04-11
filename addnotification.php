<!DOCTYPE html>
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['loginfailed'] = 1;
	header("location:../index.php");
}	

require_once 'dbconnect.php';

if($_GET['type']=='madeoffer'){
	$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
	$offerdetails = $offerdetails[0];
	$item = DB::query("SELECT * from inventory where itemid=%i",$offerdetails['sellingitem']);
	$item = $item[0];
	$message = 'User <b>'.$offerdetails['buyer'].'</b> has made an offer for your item <b>'.$item['itemname'].'</b>';
	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offerdetails['seller']
));
	header("location:manageoffers/listoffersbyme.php");
}

if($_GET['type']=='editoffer'){
	$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
	$offerdetails = $offerdetails[0];
	$item = DB::query("SELECT * from inventory where itemid=%i",$offerdetails['sellingitem']);
	$item = $item[0];
	$message = 'User <b>'.$offerdetails['buyer'].'</b> has edited an offer for your item <b>'.$item['itemname'].'</b>';
	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offerdetails['seller']
));
	header("location:manageoffers/listoffersbyme.php");
}

if($_GET['type']=='retractoffer'){
	$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
	$offerdetails = $offerdetails[0];
	$item = DB::query("SELECT * from inventory where itemid=%i",$offerdetails['sellingitem']);
	$item = $item[0];
	$message = 'User <b>'.$offerdetails['buyer'].'</b> has retracted an offer for your item <b>'.$item['itemname'].'</b>';
	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offerdetails['seller']
));
	DB::delete('offerdetails', "offerid=%i", $_GET['offerid']);
	header("location:manageoffers/listoffersbyme.php");
}

if($_GET['type']=='acceptoffer'){
	$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
	$offerdetails = $offerdetails[0];
	$item = DB::query("SELECT * from inventory where itemid=%i",$offerdetails['sellingitem']);
	$item = $item[0];
	$user = DB::query("SELECT * from users where username=%s",$offerdetails['seller']);
	$user = $user[0];
	$message = 'Congratulations! User <b>'.$offerdetails['seller'].'</b> has accepted your offer for the item <b>'.$item['itemname'].'</b>.<br>You can find your new transaction in the Offers and Transactions tab.';
	$message = $message.'<br>Seller username: '.$user['username'];
	$message = $message.'<br>Seller name: '.$user['firstname'].' '.$user['lastname'];
	$message = $message.'<br>Room number: '.$user['wing'].' '.$user['roomno'];
	$message = $message.'<br>Email: '.$user['email'];	
	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offerdetails['buyer']
));
	$user = DB::query("SELECT * from users where username=%s",$offerdetails['buyer']);
	$user = $user[0];
	$message = 'Congratulations! You have entered a transaction with <b>'.$offerdetails['seller'].'</b> for the item <b>'.$item['itemname'].'</b>.<br>You can find your new transaction in the Offers and Transactions tab.';
	$message = $message.'<br>Buyer username: '.$user['username'];
	$message = $message.'<br>Buyer name: '.$user['firstname'].' '.$user['lastname'];
	$message = $message.'<br>Room number: '.$user['wing'].' '.$user['roomno'];
	$message = $message.'<br>Email: '.$user['email'];	
	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offerdetails['seller']
));
	//header("location:viewnotifications.php");
	header("location:viewnotifications.php");
}

if($_GET['type']=='rejectoffer'){
	$offerdetails = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
	$offerdetails = $offerdetails[0];
	$item = DB::query("SELECT * from inventory where itemid=%i",$offerdetails['sellingitem']);
	$item = $item[0];
	$message = 'Sorry! User <b>'.$offerdetails['seller'].'</b> has rejected your offer for the item <b>'.$item['itemname'].'</b>.<br>You can find your new transaction in the Offers and Transactions tab.';
	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offerdetails['buyer']
));
	DB::delete('offerdetails', "offerid=%i", $_GET['offerid']);
	header("location:manageoffers/listoffersforme.php");
}

if($_GET['type']=='edititem'){
	$wishlists = DB::query("SELECT * from wishlist where itemid=%i",$_GET['itemid']);
	$item = DB::query("SELECT * from inventory where itemid=%i",$_GET['itemid']);
	$item = $item[0];	
	foreach ($wishlists as $wishlist) {
	$message = 'Wishlist item edited! User <b>'.$item['owner'].'</b> has edited the item <b>'.$item['itemname'].'</b>.<br>You can find the item using the search feature.';
	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $wishlist['username']
));

	}
	
	header("location:inventory/viewitems.php");
}

if($_GET['type']=='transaction'){
	$transaction = DB::query("SELECT * from transaction where transactionid=%i",$_GET['offerid']);
	$transaction = $transaction[0];
	$offer = DB::query("SELECT * from offerdetails where offerid=%i",$_GET['offerid']);
	$offer = $offer[0];
	
	if($transaction['status']=='buyerreportedcompleted')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>User <b>'.$offer['buyer'].'</b> has reported the transaction as completed';

	if($transaction['status']=='sellerreportedcompleted')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>User <b>'.$offer['seller'].'</b> has reported the transaction as completed';

	if($transaction['status']=='totalcompleted')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>Both users have reported the transaction as completed';

	if($transaction['status']=='totalincomplete')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>Both users have reported the transaction as incomplete';

	if($transaction['status']=='buyerreportedincomplete')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>User <b>'.$offer['buyer'].'</b> has reported the transaction as unsuccessful';

	if($transaction['status']=='sellerreportedincomplete')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>User <b>'.$offer['seller'].'</b> has reported the transaction as unsuccessful';

	if($transaction['status']=='bisc')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>User <b>'.$offer['buyer'].'</b> has reported the transaction as unsuccessful. <br>User <b>'.$offer['seller'].'</b> has reported the transaction as completed';

	if($transaction['status']=='bcsi')
	$message = 'Transaction status update!<br>Transaction between <b>'.$offer['buyer'].' and '.$offer['seller'].'</b><br>User <b>'.$offer['seller'].'</b> has reported the transaction as unsuccessful. <br>User <b>'.$offer['buyer'].'</b> has reported the transaction as completed';


	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offer['buyer']
));

	DB::insert('notifications', array(
  'notificationdetails' => $message,
  'username' => $offer['seller']
));

	
	
	header("location:transactions/viewongoing.php");
}
	
?>