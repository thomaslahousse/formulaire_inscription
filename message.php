<?php
session_start();
include_once("define.php");
require_once("pdo.php");
//$pseudo = $_POST['pseudo'];
$pseudo = $_SESSION['pseudo'];
?>

<!DOCTYPE html>
<html>
<head>
  <title> zone de message </title>
  <link rel="stylesheet" href="css.css" />
  <meta charset="utf-8">
</head>
<body id="backgroundmessage">
  <p id="echo_pseudo">
    <?php
  echo "bonjour '" . $pseudo ."' bienvenue dans la zone de chat <br/>";
  ?>
  </p>
  <div id="center">
    <form method="POST" action="">
      <p> Message : </p>
      <div><textarea type="text" name="message" id="message" placeholder="message"></textarea></div>
      <div><input type="submit" name="mssg" value="Envoyez le message"/></div>
    </form>
    <div id="conversation">
      <p id="message_envoi">
      <?php
      //$req = $PDO ->prepare("SELECT message FROM chat WHERE pseudo='$pseudo' ORDER BY id DESC");
      $req = $PDO ->prepare("SELECT pseudo, message FROM chat ORDER BY id DESC");
      $req ->execute();
      $req2 = $req ->fetchall();
      foreach($req2 as $data)
      //echo "$pseudo : $data->message<br>";
      echo "$data->pseudo : $data->message<br>";
      //echo $data->lastname . " " . $data->firstname . " " . $data->email;
      ?>
    </p>
    </div>
  </div>

</body>
</html>
