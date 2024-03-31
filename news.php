<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/news.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

<title>Aktuality</title>
<body onload = time();>
    <?php require_once "./header.php" ?>
    <?php require_once 'libs/users.php' ?>
    <?php require_once 'libs/db.php'; ?>    
     
    <div class="content">
        <div class="news">
            <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
                <button name="add-article" class="btn btn-info btn-lg">
                    <a href="add-article.php">Pridať nový článok <i class="fa fa-file"></i></a>
                </button>
            <?php endif; ?>
            
            <h1>Aktuálne</h1>
            
            <?php         
                $columns = array('title','datetime');
                $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[1];

                // zisti či treba zoradiť ASC alebo DESC, defaultná hodnota je desc(zostupne) a podľa času
                $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'asc' ? 'ASC' : 'DESC';
                if ($results = mysqli_query($db,"SELECT * FROM articles ORDER BY " .  $column . ' ' . $sort_order)) {
                    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';         
            ?>

            <button class="btn btn-warning" style="border-radius: 15px; margin: 2%;">
                <a href="news.php?column=title&order=<?php echo $asc_or_desc; ?>">Zoradiť podľa názvu <i class="fa fa-sort"></i></a> 
            </button>
            <button class="btn btn-warning" style="border-radius: 15px; margin: 2%;">
                <a href="news.php?column=datetime&order=<?php echo $asc_or_desc; ?>">Zoradiť podľa času pridania <i class="fa fa-sort"></i></a> 
            </button>
           
            <div class="grid-container">                              
                <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                    <div class="grid-item">
                        <h2 class="m-3"> 
                            <a <?php echo $column == 'title' ?> href="article.php?article=<?php echo $row['id']; ?>"><?= $row["title"] ?></a> 
                        </h2>                   
                        <?php if ($row['img']): ?>
                            <img class="m-4 img-thumbnail" src="article-images/<?= $row['img'] ?> ">
                        <?php endif; ?>
                        <div class="article-content"> 
                            <?php
                                $string = strip_tags($row["content"]);
                                if (strlen($string) > 250) {
                                
                                    // skráť reťazec
                                    $stringCut = substr($string, 0, 250);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '...';
                                }
                                echo $string;
                            ?>
                        </div>
                        <?php $string = strip_tags($row["content"]); 
                                if (strlen($string) > 250): ?>
                            <div class="read-more"><a href="article.php?article=<?php echo $row['id']; ?>">Čítať viac</a></div>
                        <?php endif; ?>
                        <div class="time">
                            <i class="far fa-calendar-alt"></i>
                            <?php
                                $time = "SELECT datetime FROM articles";
                                $cr_date=date_create($row['datetime']);
                                $for_date=date_format($cr_date,'d.m.Y H:i');                                
                                echo $for_date; 
                            ?>                                    
                        </div>
                    </div>                                                 
                <?php } ?>                
            </div>                         
        </div>
    </div>
    <?php require_once "./footer.php" ?>

</body>
</html>

<?php
    $results->free();
    }
?>