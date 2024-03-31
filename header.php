<?php require_once 'libs/users.php' ?> 
<?php require_once 'libs/db.php' ?>

<script src="script.js"></script>
<header>
        <div class="change-logo">
                <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
                        <?php $results = mysqli_query($db, "SELECT * FROM logo"); ?>
                        <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                                <a href="change-logo.php?change=<?php echo $row['id']; ?>">
                                        <button name="" class="btn btn-success btn-lg" class="btn-outline-info">                                       
                                                <i class="fa fa-edit"></i> <span class="show">Zmeniť logo</span>                                       
                                        </button>
                                </a>
                        <?php } ?>
                                
                <?php endif; ?>
        </div>
        <?php $results = mysqli_query($db, "SELECT * FROM logo"); ?>                
        <?php while ($row = mysqli_fetch_array($results)) { ?>

        <img src="logo/<?= $row['logo'] ?> " alt="logo" class="logo" onclick="logoClick()">

        <?php } ?>
        <p class="title" onclick="logoClick()">Košice Západ</p>                
        <nav class="menu" id="menu">         
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <div class="pages">
                        <a href="index.php">Domov</a>
                        <a href="news.php">Aktuality</a>
                        <a href="gallery.php">Galéria</a>
                        <a href="contact.php">Kontakt</a>
                </div>                            
        </nav>
</header>  