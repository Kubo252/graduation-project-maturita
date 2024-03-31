<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Prihlásenie</title>
<body>
  
<?php require_once 'libs/users.php';
    if(isset($_SESSION['usertype'])){
        header("location: index.php");
    }
?>

<div id="sign_form">
    <a onclick="goBack()" class="close"><img src="images/close.png" alt="close form"></a>                
    <form action="login.php" method="post" class="login-form">
    <?php require_once 'libs/errors.php' ?>
        <fieldset class="login">Prihlásenie</fieldset>
        <input type="text" name="username" placeholder="Prihlasovacie meno" value="<?php echo $username; ?>">         
        <input type="password" name="password" id="l_pswd" placeholder="Heslo">                                                          
        <input type="checkbox" onclick="showLoginPassword()">    
        <label>Zobraz heslo</label> 
        <br>
        <button class="submit" name="login_user">Prihlásiť</button>
        <p style="font-size:1.1rem">Nemáte ešte účet? <a href="register.php" style="font-weight:bold;">Zaregistrujte sa</a></p>
        </form>
</div> 
</body>
</html>