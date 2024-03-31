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
<title>Úprava časov úradných hodín</title>
<body onload = time();>
    
    <?php require_once "./header.php" ?>  
    <?php require_once 'libs/users.php' ?> 
    <?php require_once 'libs/db.php'; 
    
        if($_SESSION['usertype'] != "admin"){
            header("location: index.php");
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $time = $_POST['time'];
            $break = $_POST['break'];
            $time2 = $_POST['time2'];
        
            mysqli_query($db, "UPDATE office_hours SET time='$time', break='$break', time2='$time2' WHERE id=$id");
            header('location: contact.php');
        }

?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM office_hours WHERE id=$id");

        $n = mysqli_fetch_array($record);
        $day = $n['day'];
        $time = $n['time'];
        $break = $n['break'];
        $time2 = $n['time2'];
	}
?>
<div class="content">
<form method="post" action="edit-time.php">	
        <fieldset><?= $day ?></fieldset>
        <label>Čas</label>
        <input type="text" name="time" value="<?php echo $time; ?>">
        <label>Dezinfekčná prestávka</label>
        <input type="text" name="break" value="<?php echo $break; ?>">
        <label>Čas</label>
        <input type="text" name="time2" value="<?php echo $time2; ?>">
        <button class="submit" name="update">Upraviť časy</button>
            
        <input type="hidden" name="id" value="<?php echo $id; ?>">
</form> 
</div>

<?php require_once "./footer.php" ?>   

</body>
</html>
