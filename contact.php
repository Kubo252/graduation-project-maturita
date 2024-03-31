<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/contact.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Kontakt</title>
<body onload = time();>

    <?php require_once "./header.php" ?>  
    <?php require_once 'libs/users.php' ?> 
    <?php require_once 'libs/db.php' ?>   
    
    <div class="content">
        <div class="contact">           

            <div class="info"> 
                <?php $results = mysqli_query($db, "SELECT * FROM contact"); ?>
                                
                <?php while ($row = mysqli_fetch_array($results)) { ?>

                <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
                    <button class="btn btn-success edit-info" style="border-radius: 15px;">
                        <a href="change-info.php?edit=<?php echo $row['id']; ?>">Upraviť údaje <i class="fa fa-edit"></i></a> 
                    </button>
                <?php endif; ?>

                <h2>Adresa<i class="fa fa-address-book" style="font-size:24px; margin-left: 4.5%"></i></h2>
                
                <address><?php echo $row['address']; ?></address>

                <h2>Starosta<i class="fa fa-vcard" style="font-size:24px; margin-left: 4.5%"></i></h2>
                <address><?php echo $row['mayor']; ?></address>

                <h2>Telefónne číslo<i class="fa fa-phone" style="font-size:24px; margin-left: 4.5%"></i></h2>
                
                <address><?php echo $row['phone']; ?></address>
                <h2>E-mail<i class="fa fa-envelope" style="font-size: 24px; margin-left: 4.5%"></i></h2>
                
                <address><?php echo $row['email']; ?></address>

                <?php } ?>
            </div>  
            
            

            <div class="map">
                
                <?php $results = mysqli_query($db, "SELECT * FROM map"); ?>
                                
                <?php while ($row = mysqli_fetch_array($results)) { ?>

                <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
                    <button class="btn btn-success edit-info" style="border-radius: 15px;">
                        <a href="edit-map.php?edit=<?php echo $row['id']; ?>">Upraviť súradnice na mape <i class="fa fa-edit"></i></a> 
                    </button>
                <?php endif; ?>
                
                <?php echo $row['map']; ?>

                <?php } ?>
            </div> 
            
            
        </div>

        <div class="office_hours">
            <h1>Úradné hodiny</h1>

            <table>
                <tr>                
                    <th>Deň</th>
                    <th>Čas</th>
                    <th>Dezinfekčná prestávka</th>
                    <th>Čas</th>                                
                </tr>                

                <?php $results = mysqli_query($db, "SELECT * FROM office_hours"); ?>
                
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr class="time">
                        <td class="day"> <?= $row["day"] ?>
                            <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
                                <button class="btn btn-success" style="border-radius: 15px; margin-right: 10%;">
                                    <a href="edit-time.php?edit=<?php echo $row['id']; ?>">Upraviť časy <i class="fa fa-edit"></i></a>
                                </button>
                            <?php endif; ?>
                        </td>    
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['break']; ?></td>
                        <td><?php echo $row['time2']; ?></td>                                                                            
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>

    <?php require_once "./footer.php" ?>

</body>
</html>