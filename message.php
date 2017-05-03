<?php
session_start();
include_once("define.php");
require_once("pdo.php");
$pseudo = $_POST['pseudo'];
echo "bonjour " . $pseudo ." bienvenue dans la zone de chat <br/>";
//SELECT COUNT(pseudo) AS FROM WHERE
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
       <div><textarea type="text" name="message" id="message" placeholder="message"></textarea></div>
       <div><input type="submit" name="mssg" value="Envoyez le message"/></div>
     </form>
   </div>

   <?php
   echo $pseudo . "message ". $message;
   ?>
 </body>
 <!-- https://www.youtube.com/watch?v=eDz0nmQM3xw -->
 </html>
