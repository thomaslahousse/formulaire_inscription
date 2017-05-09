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
  $pseudo = $_POST['pseudo'];
  if($_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["pseudo"] != ""){
    if(strlen($pseudo) <= 20){
      $req = $PDO->prepare("SELECT * FROM users WHERE pseudo ='$pseudo'");
      $req->execute();
      $rows = $req->rowCount();
      if($rows == 0){
        $req2 = $PDO->prepare("INSERT INTO users (nom, prenom, pseudo) VALUES(:nom, :prenom, :pseudo)");
        $req2->bindValue(':nom', $_POST["nom"]);
        $req2->bindValue(':prenom', $_POST["prenom"]);
        $req2->bindValue(':pseudo', $_POST["pseudo"]);
        if ($req2->execute()) {
          echo "votre formulaire a été rempli, tu peux entrer avec le pseudo";
        }else {
          echo "rempli le formulaire";
        }
      }else{
        echo "pseudo deja pris";
      }
    }else {
      echo "ton pseudo ne doit pas faire plus de 20 caracrtères";
    }
  }else {
    echo "remplis tous les champs";
  }
}
else{
  echo "bienvenue sur le site";
}
if(isset($_POST["form2"])){
  if($_POST["pseudo"] != ""){

    $pseudo = $_POST['pseudo'];
    $req = $PDO->prepare("SELECT * FROM users WHERE pseudo ='$pseudo'");
    $req->execute();
    $rows = $req->rowCount();
    if ($rows == 1){
      /*$req2 = $PDO->prepare("SELECT nom, prenom FROM users WHERE pseudo = '$pseudo'");
      $req2->execute();
      $answer = $req2->fetch();*/
      session_start();
      $_SESSION['pseudo'] = $_POST['pseudo'];
      Header('Location: message.php');
    }else {
      echo "tu n'es pas inscrit, tu dois t'inscrire d'abord, Mr(Mme) ~ ".$pseudo;
    }
  }
  else {
    echo "tu dois t'inscrire";
  }
}

if(isset($_POST["mssg"])){
  if($_POST["message"] != "") {
    $req = $PDO->prepare('INSERT INTO chat (pseudo, message) VALUES(:pseudo, :message)');
    $req->bindValue(':message', $_POST["message"]);
    $req->bindValue(':pseudo', $_SESSION['pseudo']);
    if ($req->execute()) {
      echo "le message a bien été envoyé <br/>";
      $message = $_POST['message'];
    }else {
      echo "le message a mal été enregisté";
    }

  }
}

?>
