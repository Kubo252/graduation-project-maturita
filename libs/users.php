<?php
session_start();
  
require_once "libs/db.php";

// registrácia užívateľa
if (isset($_POST['reg_user'])) {
  // získanie vstupných hodnôt z formulára
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  // overenie, či je formulár správne vyplnený
  // pridaním array_push() do poľa $errors sa budú ukladadať chyby
  if (empty($username)) { array_push($errors, "Prihlasovacie meno je nutné vyplniť"); }
  if (empty($email)) { array_push($errors, "Email je nutné vyplniť"); }
  if (empty($password_1)) { array_push($errors, "Heslo je nutné vyplniť"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Zadané heslá sa nezhodujú");
  }

  // skontroluje, či užívateľ s rovnakým mailom/usernamom už náhodou neexistuje
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // ak existuje
    if ($user['username'] === $username) {
      array_push($errors, "Používateľ s týmto prihlasovacím menom už existuje<br>Zvoľte si prosím iné prihlasovacie meno");
    } 

    if ($user['email'] === $email) {
      array_push($errors, "Používateľ s týmto prihlasovacím e-mailom už existuje<br>Zvoľte si prosím iný prihlasovací e-mail");
    }
  }

  // registruj používateľa ak vo formulári nie sú žiadne chyby
  if (count($errors) == 0) {
  	$query = "INSERT INTO users (username, email, password, usertype) 
  			  VALUES('$username', '$email', '$password_1', 'user')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Teraz si prihlásený";
  	header('location: index.php');
  }

  mysqli_close($db);
}
 
// prihlásenie
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if (empty($username)) {
        array_push($errors, "Prihlasovacie meno je nutné vyplniť");
    }
    if (empty($password)) {
        array_push($errors, "Heslo je nutné vyplniť");
    }

    if (count($errors) == 0) {   
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
      $results = mysqli_query($db, $query);
  
      if (mysqli_num_rows($results) == 1) { // ak nájde užívateľa
        // zistí či je prihlásený bežný používateľ alebo admin
        $logged_in_user = mysqli_fetch_assoc($results);

        if ($logged_in_user['usertype'] == 'admin') {  
          $_SESSION['user'] = $logged_in_user;
          $_SESSION['username'] = $username;
          $_SESSION['usertype'] = "admin";
          echo $logged_in_user['usertype'];
          header('location: index.php');		  
        }
        
        else{
          $_SESSION['user'] = $logged_in_user;
          $_SESSION['username'] = $username;
          $_SESSION['usertype'] = "user";
          header('location: index.php');
        }
      }
      else {
        array_push($errors, "Zadal si zlé používateľské meno alebo heslo");
      }
    }
    mysqli_close($db);
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}

?>