<link rel="stylesheet" href="styles/footer.css">
<script src="script.js"></script>
<?php require_once 'libs/users.php' ?>

<footer>
        <p class="copyright">Copyright &copy; 2021 Košice Západ</p>
        <div class="links">
            <a href="gdpr.php">Ochrana osobných údajov</a>
        </div> 
        <div class="registration">

            <!-- ak je užívateľ prihlásený -->
            <div class="logged">
                <?php  if (isset($_SESSION['username'])) : ?>
    	        <strong><?php echo $_SESSION['username']; ?></strong>
                <br>
                <strong class="logout"><a href="index.php?logout='1'" style="color: #551AA9;">Odhlásiť sa</a></strong> 	
                <?php endif ?>
            </div>
            
            
            <?php  if (!isset($_SESSION['username'])) : ?>
    	         <a class="sign_in" href="login.php">Prihlásiť sa</a>  
                 <a class="register" href="register.php">Registrovať</a> 	
            <?php endif ?>
                                               
        </div>
        <p id="date"></p>        
        
        <div class="social-media">
            <a href="https://www.facebook.com/kosice.zapad/" class="facebook"><img src="images/facebook.png" alt="facebook" width="50px" height="50px"></a>
            <a href="https://www.instagram.com/kosice_zapad_terasa/" class="instagram"><img src="images/instagram.png" width="50px" height="50px" alt="instagram"></a>
        </div>
</footer> 