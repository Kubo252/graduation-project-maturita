<?php

require_once "libs/db.php";

$msg = "";
// pridávanie článkov adminom

if (isset($_POST['add-article'])) {
  // získanie vstupných hodnôt z formulára
  $title = $_POST['title'];
  $content = $_POST['content'];

  $img = $_FILES["article-images"]["name"];
  $tempname = $_FILES["article-images"]["tmp_name"];    
  $folder = "article-images/".$img;

  $query = "INSERT INTO articles (title, img, content,datetime) VALUES('$title', '$img', '$content', CURRENT_TIMESTAMP)";
  mysqli_query($db, $query);
  header('location: news.php');
  
  if (move_uploaded_file($tempname, $folder))  {
    $msg = "Obrázok sa podarilo nahrať";
  }
  else{
    $msg = "Nepodarilo sa nahrať obrázok";
  }
}

?>