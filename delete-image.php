<?php

require_once "libs/db.php";

if($_SESSION['usertype'] != "admin"){
    header("location: index.php");
}

if (isset($_GET['delete'])) {
    $id_photo = $_GET["delete"];
    $id_folder = $_GET["folder"];

    $record = mysqli_query($db, "SELECT * FROM gallery_images WHERE id=$id_photo");
	$n = mysqli_fetch_array($record);
    $img = $n['img'];
    $path = 'gallery-images/'.$img;
    unlink($path);

    mysqli_query($db, "DELETE FROM gallery_images WHERE id=$id_photo");
    
    header("location: gallery-folder.php?folder=".$id_folder);
}

?> 