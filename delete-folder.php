<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/gallery.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Zmazanie priečinka</title>

<body onload = time();>

    <?php require_once "./header.php" ?>
    <?php require_once 'libs/users.php' ?>
    <?php require_once 'libs/db.php'; ?>

    <?php  

        if($_SESSION['usertype'] != "admin"){
            header("location: index.php");
        }
        
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $record1 = mysqli_query($db, "SELECT * FROM gallery_folders WHERE id=$id");
            $n = mysqli_fetch_array($record1);
            $folder = $n['folder'];
        }
    
    ?>  
    
    <input type="hidden" value="<?php echo $id; ?>">

    <span class="popuptext" id="myPopup">Naozaj chceš zmazať priečinok <?php echo $folder; ?>?
        <br>
        <a href="delete-folder.php?confirm=<?php echo $id; ?>" class="confirm">Áno</a>
        <span onclick="cancel()" class="cancel">Nie</span>
    </span>

    <?php  
        if (isset($_GET['confirm'])) {
            $id = $_GET['confirm'];

            $record1 = mysqli_query($db, "SELECT * FROM gallery_folders WHERE id=$id");
            $n1 = mysqli_fetch_array($record1);
            $thumbnail = $n1['thumbnail'];
            $path1 = 'gallery-images/'.$thumbnail;
            unlink($path1);

            $record2 = mysqli_query($db, "SELECT * FROM gallery_images WHERE folder_id=$id");           
            while($n2 = mysqli_fetch_array($record2)){
                $img1 = $n2['img'];
                $path2 = 'gallery-images/'.$img1;
                unlink($path2);
            }            

            mysqli_query($db, "DELETE FROM gallery_folders WHERE id=$id");
            mysqli_query($db, "DELETE FROM gallery_folders WHERE parent=$id");
            mysqli_query($db, "DELETE FROM gallery_images WHERE folder_id=$id");
            mysqli_query($db, "DELETE FROM gallery_images WHERE folder_id not in (SELECT id FROM gallery_folders)");
            header('location: gallery.php');
        }
    ?>

    <?php require_once "gallery.php"; ?>

</body>
</html>
