<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/contact.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Zmena adresy a úprava kontaktných údajov</title>
<body onload = time();>
    
    <?php require_once "./header.php" ?>  
    <?php require_once 'libs/users.php' ?> 
    <?php 
        require_once 'libs/db.php';	
 
        if($_SESSION['usertype'] != "admin"){
            header("location: index.php");
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $address = $_POST['address'];
            $mayor = $_POST['mayor'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            mysqli_query($db, "UPDATE contact SET address='$address', mayor='$mayor', phone='$phone', email='$email' WHERE id=$id");
            header('location: contact.php');
        }
?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM contact WHERE id=$id");

        $n = mysqli_fetch_array($record);
        $address = $n['address'];
        $mayor = $n['mayor'];
        $phone = $n['phone'];
        $email = $n['email'];
	}
?>
<div class="content">
<form method="post" action="change-info.php">		        
    <label>Adresa</label>
    <input type="text" name="address" value="<?= $address ?>" required>
    <label>Starosta</label>
    <input type="text" name="mayor" value="<?= $mayor ?>" required>
    <label>Telefón</label>
    <input type="text" name="phone" value="<?= $phone ?>" required>
    <label>Email</label>
    <input type="text" name="email" value="<?= $email ?>" required>
    <button class="submit" name="update">Upraviť údaje</button>
        
    <input type="hidden" name="id" value="<?php echo $id; ?>">
</form> 
</div>

<?php require_once "./footer.php" ?>   

</body>
</html>
