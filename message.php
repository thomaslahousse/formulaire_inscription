<?php
session_start();
include_once("define.php");
require_once("pdo.php");
//$pseudo = $_POST['pseudo'];
$pseudo = $_SESSION['pseudo'];

echo "bonjour '" . $pseudo ."' bienvenue dans la zone de chat <br/>";
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
     <form method="POST" action="">
       <p> Message : </p>
       <div><textarea type="text" name="message" id="message" placeholder="message"></textarea></div>
       <div><input type="submit" name="mssg" value="Envoyez le message"/></div>
     </form>
     <div id="conversation">
       <?php
          $req = $PDO ->prepare("SELECT message FROM chat ORDER BY id DESC");
          $req ->execute();
          $req2 = $req ->fetchall();
          foreach($req2 as $data)
           echo "$pseudo : $data->message<br>";
        ?>
    </div>
   </div>


 </body>
 <!-- https://www.youtube.com/watch?v=eDz0nmQM3xw -->
 </html>
