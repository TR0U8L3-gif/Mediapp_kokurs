<?php
    session_start();
    
    if(!isset($_SESSION['logged'])){
        header('Location: index.php');
        exit();
	}
	else{

        $name = $_SESSION['name'];
        $surname = $_SESSION['surname'];
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
		$admin = $_SESSION['admin'];
	}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Konkurs</title>
	<meta name="description" content="Projekt na konkurs" />
	<meta name="keywords" content="Projekt na konkurs" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/user.css" />
	
</head>

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>

<script type="text/javascript"> 
var error_login = false; 
var logged = false; 
</script>
<?php
	if(isset($_SESSION['logged'])&&$_SESSION['logged']=="true"){
		echo '<script type="text/javascript">
		logged = true;
		</script>';	
	}
?>

	<div id="container">
	
		<div id="menu" class="menu">
			<div id="button_menu" type="button" role="button" onclick="change_menu_button()">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
			</div>
			<div id="logo_name">
			Mediapp ⚕
			</div>
			<div id="login" >
            
            <p title="Logout" style="margin:0px;"><a  href="logout.php">
			<img src="img/home.png" class="login_icon">
            </a></p>
			</div>
		</div>
		
		<nav id="mySidenav" class="sidenav">
			
			<a href="#User">User info</a>
			<a href="#Fell">How you feel?</a>
			<?php
				if(isset($admin)&&$admin>0){
					echo 
					'<a href="#Disease" class="big">Add a new <br>disease to assistant</a>',
					'<a href="#Article" class="big">Add a new<br>blog article</a>',
					'<a href="#Admin" class="big">Add/ remove an<br>administrator</a>';	
				}
			?>
			<a href="#footer">Contact</a>
		</nav>
        
	    <nav id="mySidelog" class="sidelog">
		</nav>

	    <div id="content">	
            <div id="User" class="test">
            <?php
            echo "<p>".$_SESSION['name']." ".$_SESSION['surname']."</p>";
            echo "<p>e-mail: ".$_SESSION['email']."</p>";
            if($_SESSION['admin']>0){
            echo "<p>You are the administrator of this website</p>";
            }
            ?>
			</div>

			<div id="Feel" class="test">
			</div>
			
			<div id="Disease" class="test">
				<h1>Add disease to the assistant's memory</h1>
					<form action="add_disease.php" method="post"> 
						<div class="disease">
						<p>You can add a new disease to the database of our medical assistant. Remember that the form should be understandable to everyone and the maximum length of your speech: cannot exceed 280 characters</p>
						<div id="disease_info">
							<?php
								if(isset($_SESSION['error_disease'])){
									echo $_SESSION['error_disease'];
									unset($_SESSION['error_disease']);;
								}	 
							?>
						</div>
						<textarea class="disease" id="disease_name" type="text" name="name" placeholder="Disease name" onkeyup="illnes_isset()" maxlength="280"  required></textarea> <br>
						<textarea class="disease" id="disease_description" type="text" name="description" placeholder="Disease description" maxlength="280" required></textarea>  <br>
						<textarea class="disease" id="disease_symptoms" type="text" name="symptoms" placeholder="Disease symptoms" maxlength="280"  required></textarea>  <br>
						<textarea class="disease" id="disease_tips" type="text" name="tips" placeholder="Disease tips" maxlength="280"  required></textarea> <br>
						<input id="disease_btn" type="submit" value="Add new disease to assistant" class="submit login"/>
						</div>
					</form>
			</div>
			<div id="Article" class="test">
				<h1>Add new article to blog</h1>
					<form action="add_article.php" method="post"> 
						<div class="disease">
						<p>You can add an article speech to your health upgrade blog. Remember that you are writing it in html! eg new line = &lt;br&gt; bold = &lt;b&gt; text &lt;/b&gt;; bullet points = &lt;ul&gt; &lt;li&gt; some text &lt;/li&gt; &lt;/ul&gt;</p>
						<div id="article_info">
							<?php
								if(isset($_SESSION['error_article'])){
									echo $_SESSION['error_article'];
									unset($_SESSION['error_article']);;
								}	 
							?>
						</div>
						<textarea class="disease" id="title" type="text" name="title" placeholder="Article title"  required></textarea> <br>
						<textarea class="disease" id="introduction" type="text" name="introduction" placeholder="Article introduction" required></textarea>  <br>
						<textarea class="disease" id="expansion" type="text" name="expansion" placeholder="Article expansion"  required></textarea>  <br>
						<input id="article_btn" type="submit" value="Add new article" class="submit login"/>
						</div>
					</form>
			</div>
			<div id="Admin" class="test">
				<div class="admin">
					<h1>Add admin</h1>
						<form action="add_admin.php" method="post"> 
							<div class="row">
								<p>You can add a new administrator to help manage the site, but be careful who you assign this function to</p>
									<?php
									if(isset($_SESSION['error_add_a'])){
										echo $_SESSION['error_add_a'];
										unset($_SESSION['error_add_a']);;
									}	 
									?>
								<input class="login" type="text" name="newAdmin" placeholder="New admin" required /> <br>
								<input class="login" type="password" name="password" placeholder="Your password" autocomplete="on" required /> <br>		
								<input type="submit" value="Add new admin" class="submit login"/>
							</div>
						</form>
				</div>
				<div class="admin">
					<h1>Remove admin</h1>
						<form action="remove_admin.php" method="post"> 
							<div class="row">
								<p>Did not fulfill its role? Think about this decision three times, but unfortunately sometimes you have to ...</p>
									<?php
									if(isset($_SESSION['error_remove_a'])){
										echo $_SESSION['error_remove_a'];
										unset($_SESSION['error_remove_a']);;
									}	 
									?>
								<input class="login" type="text" name="newAdmin" placeholder="Ex-admin" required /> <br>
								<input class="login" type="password" name="password" placeholder="Your password" autocomplete="on" required /> <br>		
								<input type="submit" value="Remove admin" class="submit login"/>
							</div>
						</form>
					<div class="margin"></div>
				</div>
			</div>


		</div>
        
		
	   
		
		<div id="footer">
			<div>
			e-mail: mediappbot@gmail.com
			<br>
			phone nr: 7769 687 365
			<br><br>
			In case of a serious situation, please call the nearest clinic
			<br>
			&copy;Mediapp 2020
			</div>
		</div>
	
	</div>
	<script src="js/code.js"></script>
	<script src="js/assistant.js"></script>
	<?php
	if(isset($admin)&&$admin>0){
	echo '<script src="js/admin.js"></script>';
	}
	?>
</body>
</html>
