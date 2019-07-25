<!--CONTACT PAGE CHAT BOT -->


<!-- note: the only bug I have come across is that the page always auto-scrolls from the top of the page, 
rather than from where the most recent input -->



<html>

<head>

<title>Chatbox</title>

<link href="https://fonts.googleapis.com/css?family=Bungee+Hairline|Bungee+Inline|Bungee+Outline|Bungee+Shade&display=swap" rel="stylesheet">

<style>



body{
	font-family: 'Bungee Outline', cursive;
	font-family: 'Bungee Inline', cursive;
	font-family: 'Bungee Shade', cursive;
	font-family: 'Bungee Hairline', cursive;
	font-size: 30px
}

.square{
	height: 50px;
	width: 50px;
	background-color: #FFD2F1;
}

.square2{
	height: 50px;
	width: 50px;
	background-color: #FFFE7D;
}



</style>



<!-- link for scrolling thing-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>



<body style = "margin:150px;padding:20px">



<!-- scrolling thing -->
<script>
setTimeout(function(){
	jQuery("html,body").animate({
    	scrollTop: jQuery("body").find(">*:last-child").offset().top
	}, 1500);
	e.preventDefault();
},100);
</script>



<!-- chat bot msg function -->
<?php
function botoutput($message){
	?>
	<div class="square"></div>
	<?php echo "<p style = 'font-family:Bungee Hairline; border:1px; border-style:solid; background-color:#F3F3F3; border-color:#D8D8D8; padding:1em; width:500px;'>$message</p><br>";
}



#time msg was "sent" function
function mtime(){	
	?>
	<div align ="right">
		<?php echo "<p style = font-size:15px; /p>".date("H:i");?>
	</div>
	<?php
}



#actual program 



#first bot msg
botoutput("Hey! I'm Nikki. Let's not be strangers, what's your name?"); ?>


<!-- repeating user's name -->
<div align="right">
	<?php
	$name = $_GET["name"];?>
	<div class="square2"></div>
	<?php echo "<br>".$name;


# name input box
	if(null==$name) : ?>
			<form action="index.php" method="GET"> 
				<input type="text" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="name"/>
			</form>
			<p style="font-family:Bungee Shade; font-size:15px;">- Press Enter to send message -</p>
	<?php endif?>
</div>



<!-- bot reply 2 -->
<?php if(isset($name)): 
	mtime() ; ?>
	<div class="square"></div>
	<?php echo "<p style = 'font-family:Bungee Hairline; border:3px; border-style:solid; background-color:#F3F3F3; border-color:#E7E7E7; padding: 1em; width:500px;'>Thanks, ".$name."<br>What's the best email address for you?</p><br>";
endif;



# email input box
$email = $_GET["email"];
if(isset($name) AND null==($email)) : ?>
	<div align="right">
		<div class="square2"></div>
		<br>
		<form action="index.php" method="GET"> 
			<input type="text" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="email"/>
			<input type="hidden" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="name" value="<?php echo $_GET['name']; ?>"/>
		</form>
	<p style="font-family:Bungee Shade; font-size:15px;">- Press Enter to send message -</p>
	</div>
<?php endif;



#repeating email back to user
if(isset($email)) :?>
	<div align="right">
		<div class="square2"></div>
		<?php echo "<br>".$email;
		mtime()?>
	</div>

<!-- bot reply 3 -->
	<?php botoutput("Don't worry, we won't share it! Tell us, how can we help you today?");
endif;



#how can we help? buttons
if(null!==($email)) : ?>
	<div align = "center"><br>
		<form method="post">
		
		<!--project enquiry button-->
		<input type="submit" style= "font-family: Bungee Hairline; background-color:#F4F5FF; padding:1.5em; font-size:25px;" name="project" value="I want to start a project"/>
		<!--join the den button -->
		<input type="submit" style= "font-family: Bungee Hairline; background-color:#F4F5FF; padding:1.5em; font-size:25px;" name="join" value=" I want to join the Den "/><br>
		<!--enquiry button-->
		<br><input type="submit" style= "font-family: Bungee Hairline; background-color:#F4F5FF; padding:1.5em; font-size:25px;" name="enquiry" id="lost"value="I have a general enquiry"/>
		</form><br>
	</div>
<?php endif;



# ... If project button is clicked
if(array_key_exists('project',$_POST)) : 

		botoutput("Awesome! Tell us a bit about your project below and we'll get back to you ASAP.") ; ?>
	
	<!-- user project input box -->
	<div align = "right">
		<div class="box">
		<form action="index.php" method="GET"> 
		<input type="text" style ="height:250px; width:500px; border:3px; border-style:solid; border-color:#6491E6; padding: 1em;" name="projectinput"/>
		<input type="hidden" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="name" value="<?php echo $_GET['name']; ?>"/>
		<input type="hidden" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="email" value="<?php echo $_GET['email']; ?>"/>
		</div>
		<p style="font-family:Bungee Shade; font-size:15px;">- Press Enter to send message -</p>
	</div>


<?php # ... If join button is clicked
elseif(array_key_exists('join',$_POST)) : 

	botoutput("That's awesome! Please upload your CV below and write a message explaining why you want to join us.") ; ?>

	<!-- upload CV button -->
	<div align = "right">
		<input type="file" id="cv" hidden="hidden">
		<label for="cv">Upload CV</label>
	</div>
	<br>

	<!-- why they want to join input box-->
	<div align = "right">
		<div class="box">
		<form action="index.php" method="GET"> 
		<input type="text" style ="height:250px; width:500px; border:3px; border-style:solid; border-color:#6491E6; padding: 1em;" name="joininput"/>
		<input type="hidden" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="name" value="<?php echo $_GET['name']; ?>"/>
		<input type="hidden" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="email" value="<?php echo $_GET['email']; ?>"/>
		</div>
		<p style="font-family:Bungee Shade; font-size:15px;">- Press Enter to send message -</p>
	</div>


<?php # ... If enquiry button is clicked
elseif(array_key_exists('enquiry',$_POST)) : 
	
	botoutput("That's okay, we're here to help. Write your enquiry below and we'll get back to you ASAP.") ; ?>

	<!--enquiry input box -->
	<div align = "center">
		<div class="box">
		<form action="index.php" method="GET"> 
		<input type="text" style ="height:250px; width:500px; border:3px; border-style:solid; border-color:#6491E6; padding: 1em;" name="help"/>
		<input type="hidden" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="name" value="<?php echo $_GET['name']; ?>"/>
		<input type="hidden" style= "border:3px; border-style:solid; border-color:#6491E6; padding: 1em; width:500px;" name="email" value="<?php echo $_GET['email']; ?>"/>
		</div>
		<p style="font-family:Bungee Shade; font-size:15px;">- Press Enter to send message -</p>
	</div>

<?php endif;



#after they've entered their feedback
if(isset($_GET["joininput"]) OR isset($_GET["projectinput"]) OR isset($_GET["help"])): ?>

	<!-- repeating back user input -->
	<div align = "right">
		<div class="square2"></div>
		<br>
		<?php
			echo ($_GET["joininput"]);
			echo ($_GET["projectinput"]);
			echo ($_GET["help"]);
			mtime(); ?>		
	</div>

	<?php #subscribe to newsletter
	botoutput("Thanks! Now, before you head off, would you like to join our newsletter list?");?>
	
	<div align = "center"><br>
		<form method = "post">
			<input type="submit" style= "font-family: Bungee Hairline; background-color:#F4F5FF; padding: 1.5em; font-size:25px;" name="yes" value="Yes please"/>
			<input type="submit" style= "font-family: Bungee Hairline; background-color:#F4F5FF; padding: 1.5em; font-size:25px;" name="no" value="Maybe next time"/>
		</form>
	</div>

<?php endif;



# ... if they clicked yes
if(array_key_exists('yes',$_POST)) : ?>
	<!-- repeating yes & final bot msg -->
	<div align = "right">
		<div class="square2"></div>
		<br>
		<?php echo "Yes please"; 
		mtime(); ?>
	</div>
	<?php botoutput("Awesome! We look forward to talking soon! Have a nice day");

# ... if they clicked no
elseif(array_key_exists('no', $_POST)) : ?>
	<!-- repeating no & final bot msg -->
	<div align = "right">
		<div class="square2"></div>
		<br>
		<?php echo "Maybe next time"; 
		mtime(); ?>
	</div>
	<?php botoutput("No problem! We look forward to talking soon! Have a nice day");

endif; ?>




</body>


</html>