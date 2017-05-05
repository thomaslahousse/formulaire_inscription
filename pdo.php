<?php

try {
  //$PDO = new PDO('mysql:host=localhost;dbname=formulaire_inscription;charset=utf8', 'root', '270395thomas'); //windows, wampserveur

  $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB, MYSQL_USER, MYSQL_PASSWD);
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
  $e->getMessage();
}


if(isset($_POST["form1"])){
  if($_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["pseudo"] != ""){
    $pseudo = $_POST['pseudo'];
    $req2 = $PDO->prepare("SELECT * FROM users WHERE pseudo ='$pseudo'");
    $req2->execute();
    $rows = $req2->rowCount();
    if($rows == 0){
      $req = $PDO->prepare("INSERT INTO users (nom, prenom, pseudo) VALUES(:nom, :prenom, :pseudo)");
      $req->bindValue(':nom', $_POST["nom"]);
      $req->bindValue(':prenom', $_POST["prenom"]);
      $req->bindValue(':pseudo', $_POST["pseudo"]);
        if ($req->execute()) {
          echo "votre formulaire a été rempli, tu peux entrer avec le pseudo";
        }else {
          echo "rempli le formulaire";
        }
    }else{
    echo "pseudo deja pris";
    }
  }else {
    echo "remplis tous les champs";
  }
}
else{
  // echo "tu dois surement etre deja inscrit !";
}
if(isset($_POST["form2"])){
	if($_POST["pseudo"] != ""){

    $pseudo = $_POST['pseudo'];
    $req = $PDO->query("SELECT * FROM users WHERE pseudo ='$pseudo'");
    $rows = $req->rowCount();
    if ($rows == 1){
      //$req2 = $PDO->query("SELECT nom, prenom FROM users WHERE pseudo = '$pseudo'");
      $req2 = $PDO->prepare("SELECT nom, prenom FROM users WHERE pseudo = '$pseudo'");
      $req2->execute();
      $answer = $req2->fetch();
      session_start();
      $_SESSION['pseudo'] = $_POST['pseudo'];
        //https://www.youtube.com/watch?v=98EF8yA6bfA&t=364s
      Header('Location: message.php');
    }else {
      echo "tu n'es pas inscrit, tu dois t'inscrire d'abord, Mr(Mme) ~".$pseudo;
      }
    }
    else {
      echo "tu dois t'inscrire";
    }
  }



if(isset($_POST["mssg"])){
	if($_POST["message"] != "") {
		$req = $PDO->prepare('INSERT INTO chat (message) VALUES(:message)');
    $req->bindValue(':message', $_POST["message"]);
    if ($req->execute()) {
      echo "le message a bien été envoyé <br/>";
      $message = $_POST['message'];
    }else {
      echo "blabla";
    }

    // $req2 = $PDO->prepare('SELECT count * FROM chat WHERE pseudo');
    // $message2 = $req2->fetch();

	}
}







 ?>
