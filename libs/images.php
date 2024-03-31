<?php

require_once "libs/db.php";

$msg = "";
 
if (isset($_POST['add-image'])) {
  // získanie vstupných hodnôt z formulára
  $description = $_POST['description'];
  $f = $_POST['folder_id'];
 
  $id = $_GET['folder'];

  $img = $_FILES["gallery-images"]["name"];
  $tempname = $_FILES["gallery-images"]["tmp_name"];    
  
  $folder = "gallery-images/".$img;

  $query = "INSERT INTO gallery_images (description, img, folder_id) VALUES('$description', '$img', '$f')";
  mysqli_query($db, $query);
  header("location: gallery-folder.php?folder=".$id);

  if (move_uploaded_file($tempname, $folder))  {
    $msg = "Obrázok sa podarilo nahrať";
  }
  else{
    $msg = "Nepodarilo sa nahrať obrázok";
  }
}

?>