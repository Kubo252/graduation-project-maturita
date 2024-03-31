<?php

require_once "libs/db.php";
 
$msg = "";

if (isset($_POST['add-folder'])) {
  // získanie vstupných hodnôt z formulára
  
  $title = $_POST['folder'];
  $parent = $_POST['id'];
  //mkdir("gallery-images/$title", 0777);

  $folder_check_query = "SELECT * FROM gallery_folders WHERE folder='$title' LIMIT 1";
  $result = mysqli_query($db, $folder_check_query);
  $dir = mysqli_fetch_assoc($result);
  
  if ($dir) { // ak existuje
    if ($dir['folder'] === $title) {
      array_push($errors, "Priečinok s týmto názvom už existuje<br>Zadaj iný názov priečinka");
    } 
  }
  
  if (count($errors) == 0) {
    $img = $_FILES["gallery-images"]["name"];
    $tempname = $_FILES["gallery-images"]["tmp_name"];    
    $folder = "gallery-images/".$img;
    $query = "INSERT INTO gallery_folders (folder, thumbnail, parent) VALUES('$title', '$img', '$parent')";
    mysqli_query($db, $query);
    header('location: gallery.php');

    if (move_uploaded_file($tempname, $folder))  {
      $msg = "Obrázok sa podarilo nahrať";
    }
    else{
      $msg = "Nepodarilo sa nahrať obrázok";
    }
  } 
}

?>