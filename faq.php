<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_set_cookie_params(0);
session_start();


if(isset($_SESSION['firsttime']))
unset($_SESSION['firsttime']);
?>
<html lang="en">
  <head>
  <script src="validation.js"></script>
 
	<meta charset="utf-8">
    <title>Posh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/docs.css" rel="stylesheet">

    <style type="text/css">
		body {
			padding-top: 40px;
		}


	#container
	{
		padding:auto;
		margin:auto;
		width:700px; 
		overflow:auto;
		
		}


    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	
	</head>

	<body>
	
		
        <div class="container" style="width: auto; padding: 20px 0px 0px 0px;">
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav">
					
					<li class="active"><a href="#"><i class="icon-chevron-right"></i>FAQs</a></li>
					<li ><a href="index.php"><i class="icon-chevron-right"></i>Login</a></li>

                   </ul>
			</div>
        	<div class="span9">
			<h1>FAQs</h1          
         	<p><b>User Login:</b>

<p><i>In order to make a transaction, a user must have an account on the website with a valid username
and a password. The homepage will feature an option named “Signup/register”, clicking on
which will direct you to a page where all the user information will be asked and finally the user
profile will be created by clicking on the “Sign In” button (only after filling the mandatory
fields) at the bottom of the page.
If user is already registered, he/she only has to provide the user id and password to access his/her
profile.

<p><b>Forgot Password:</b>

<p><i>In case a user want to login but forgets his/her login password, the homepage features the option
to recover the password using the “Forgot Password” option.
Clicking on the “forgot password” option takes you to the page where user is asked to provide
the student id.
A mail will be sent to the student’s webmail ID.
The mail would contain the old password using which he/she could log in to the site.



<p><b>How to put up a product on the website for sale/rent/swap?</b>

<p><i>After signing into the account the user can upload the details of the commodity he/she wishes to
trade in the following steps:

Select a Category to which the product belongs, for eg: Electronics, Sports and etc.
The name of the commodity.
Upload the current picture of the product (optional).
The user has to manually fill in all the details of the original product.
Mention warranty period and/or the Expiry date.
Mention if damaged or about any other previous damages.
If you wish to trade the item to cash or any other product, mention the price range you
wish to trade for.
After all the details are filled simply click on the Add To Inventory button.

<p><b>How to search for a particular product?</b>

<p><i>First select a category to which the product may belong.
Type the name of the product. Since the product search is based on tag, loose specification
of the product name will do, for eg. If you are searching for a Samsung Galaxy a Samsung in
the search field will be able to display Samsung Galaxy.

<p><b>How to make an offer?</b>

<p><i>If you find a suitable product on the website to send an offer to the owner you simply have to
click the Make Offer button.
If the item was on sale then you can pay the owner through a wired transfer.
If the owner puts the item in the swap section then you can send in your offer list to the
owner when you click the Make Offer button.

<p><b>How to add to the wish list?</b>

<p><i>1. Items in a wish list should be initially categorized.
2. A suitable tag name for the item must be mentioned.
3. At any time there shouldn’t be more than 10 items in a wish list and this wish list is
attached to every item you put up for swap.
4. To remove an item from the wish list then click on the item and then click the button
remove from Wish List.



<p><b>How to remove an item from the inventory and how to edit item
details?</b>

<p><i>To remove an item click on the item and then click on Remove from Inventory button.
To change the item details click on the item and then click on Edit Details button. This will
take you to the editable details page of the item/service.

<p><b>How to view the offers made for a item?</b>

<p><i>Every time an offer is made the owner gets a notification. The owner gets the details of
the user making the offer and the offer list.
How to update a service offer?
In the category drop down list select offer service.
Fill the corresponding details: Instructor Name, service offered, Contact details and brief
description of the service.
After all the details are filled in their respective fields press Save Details button.

<p><b>User Rating:</b>

<p><i>Depending on the quality of the transaction process and the delivered item after completing the
transaction, user is asked to rate other user. Select “On-Going Transactions Tab”. Select the
“concerned transaction”.
• Clicking on “complete transaction” will direct you to page where user rates the opposite
user based on multiple criteria such as the speed of the transaction, quality of the product
etc.
• After rating on each criterion, click “submit”.
In case, if the transaction is incomplete
• Click on “Report Incomplete transaction”.
• Fill in the details of the complaint and click “submit”.
• Note: In case the issue is finally resolved, both users must report a completed
transaction. If the transaction is not reported by any user for a long time, he/she
would be automatically rated low.



<p><b>Delete Item once deal is done:</b>

<p><i>Once the deal is made between buyer and seller, any one of them could update that deal is made
by clicking on option deal done. Then system would ask for confirmation from both (buyer and
seller) whether deal is made or not, once confirmed from both systems would automatically
delete the item from the list.

Note: If deal is done but users haven’t updated it system after some time system would sent
a notification regarding deal done or not (If this continues to happen it would affect their user
rating).
         
        
         
                    	
                    
            </div>     
        </div> 
            
             
       <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>      
           
        </body>
        </html>
        
        