<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Zmena loga</title>
<style>
    body{
        overflow: hidden;
    }
</style>
<body onload = time();>
    
    <?php require_once "./header.php" ?>  
    <?php require_once 'libs/users.php' ?> 
    <?php require_once 'libs/db.php';

    if($_SESSION['usertype'] != "admin"){
        header("location: index.php");
    }

    if (isset($_POST['up'])) {
        $id = $_POST['id'];

        $logo = $_FILES["logo"]["name"];
        $tempname = $_FILES["logo"]["tmp_name"];    
        $folder = "logo/".$logo;
    
        mysqli_query($db, "UPDATE logo SET logo='$logo' WHERE id=$id");

        header('location: index.php');
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Obrázok sa podarilo nahrať";
        }
        else{
            $msg = "Nepodarilo sa nahrať obrázok";
        }
    }
?>

<?php 
	if (isset($_GET['change'])) {
		$id = $_GET['change'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM logo WHERE id=$id");

		$n = mysqli_fetch_array($record);
        $logo = $n['logo'];
	}
?>
<div class="content">
    <form method="post" action="change-logo.php" enctype="multipart/form-data">	        	
            <fieldset>Súčasné logo: <?php echo $logo; ?></fieldset>
            <fieldset>Nahraj logo s iným názvom súboru</fieldset>
            <input type="file" name="logo" value="" required>        
            <button class="submit" name="up">Zmeniť logo</button>
                
            <input type="hidden" name="id" value="<?php echo $id; ?>">        
    </form>
</div>
    
<?php require_once "./footer.php" ?>   

</body>
</html>
