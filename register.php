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
<title>Registrácia</title>
<body>
 
<?php require_once 'libs/users.php';
    if(isset($_SESSION['usertype'])){
        header("location: index.php");
    }
?>

<div id="register_form">
    <a onclick="goBack()" class="close"><img src="images/close.png" alt="close form"></a>                    
                 
    <form action="register.php" method="post">
    <?php require_once 'libs/errors.php' ?>
        <fieldset>Registrácia</fieldset>
        <input type="text" name="username" placeholder="Prihlasovacie meno" value="<?php echo $username; ?>">        
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">        
        <input type="password" name="password_1" id="r_pswd" placeholder="Heslo">        
        <input type="password" name="password_2" id="re_pswd" placeholder="Potvrď heslo">                                                          
        <input type="checkbox" onclick="showRegisterPassword()">    
        <label>Zobraz heslo</label> 
        <br>               
        <button class="submit" style=""  name="reg_user">Registrovať</button>
        <p style="font-size:1.1rem">Máte už účet? <a href="login.php" style="font-weight:bold;">Prihláste sa</a></p>
    </form>
</div>

</body>
</html>