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
<title>Úprava súradníc na mape</title>
<body onload = time();>
    
    <?php require_once "./header.php" ?>  
    <?php require_once 'libs/users.php' ?> 
    <?php require_once 'libs/db.php';

        if($_SESSION['usertype'] != "admin"){
            header("location: index.php");
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $map = $_POST['map'];
        
            mysqli_query($db, "UPDATE map SET map='$map' WHERE id=$id");
            header('location: contact.php');
        }
?>
 
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM map WHERE id=$id");

		$n = mysqli_fetch_array($record);
        $map = $n['map'];
	}
?>
<div class="content">
    <div class="edit-map">
        <div class="instructions">
            <h2>Postup pre vloženie mapy</h2>
            <ol>
                <li><a href="https://google-map-generator.com/" target="_blank">Kliknúť na odkaz</a></li>
                <li>Zvoliť adresu v tvare: ulica, PSČ mesto</li>
                <li>Kliknuť na GET HTML-Code</li>
                <li>Skopírovať kód a vložiť ho do formulára</li>
                <li>Kliknúť na tlačidlo Uložiť</li>
            </ol>
        </div>
    
        <form method="post" action="edit-map.php">	
            <fieldset>Vloženie mapy</fieldset>                
            <textarea name="map" rows="11" required placeholder="Sem vlož vygenerovaný kód pre zobrazenie mapy"></textarea>               
            <button class="submit" name="update">Uložiť mapu</button>
                
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>     
        
    </div>
   
</div>
   
<?php require_once "./footer.php" ?>   

</body>
</html>
