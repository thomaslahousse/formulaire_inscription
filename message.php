<?php
include_once("define.php");
require_once("pdo.php");
echo "bonjour " .($_POST['pseudo'])." bienvenue dans la zone de chat <br/>";
 ?>
 <!DOCTYPE html>
  <html>
      <head>
      <title> zone de message </title>
	  <link rel="stylesheet" href="css.css" />
	  <meta charset="utf-8">
      </head>
      <body id="imagebleu">
		<div id="center">
			  <div id="messages">
				  <!-- les messages du tchat -->
			  </div>
			  <form method="POST" action="">
				  <p> Message : </p>
				  <div><textarea type="text" name="pseudo" id="pseudo" placeholder="pseudo"></textarea></div>
          <div><textarea type="text" name="message" id="message" placeholder="message"></textarea></div>
				  <div><input type="submit" name="mssg" value="Envoyez le message"/></div>
			  </form>

		</div>
      </body>
	  <!-- https://www.youtube.com/watch?v=eDz0nmQM3xw -->
  </html>
