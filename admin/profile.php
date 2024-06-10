<?php
include "partials/header.php";

$current_user_id=$_SESSION['id'];
$query="SELECT  firstname , lastname ,username FROM users WHERE id=$current_user_id ORDER BY id DESC" ;
$posts = mysqli_query($connection,$query);
?>

<section class="dashboard">
    <?php if(isset($_SESSION['signin-success'])): ?>
        
        <div class="alert__message success container">
            <p>
                <?=$_SESSION['signin-success'];
                unset($_SESSION['signin-success']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['add-post'])): ?>
        
        <div class="alert__message error container">
            <p>
                <?=$_SESSION['add-post'];
                unset($_SESSION['add-post']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['add-post-success'])): ?>
        
        <div class="alert__message success container">
            <p>
                <?=$_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-post'])): ?>
        
        <div class="alert__message error container">
            <p>
                <?=$_SESSION['edit-post'];
                unset($_SESSION['edit-post']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-post-success'])): ?>
        
        <div class="alert__message success container">
            <p>
                <?=$_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']); 
                ?>
            </p>
        </div>
        <?php endif ?>
        <div class="container dashboard__container">
        <li class="nav__profile">
        <div class="avatar">
            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
        </div>
        
          
        <span>Nama : <?= $avatar['firstname']?></span>
        <br>
        <span>Nama Akhir : <?= $avatar['lastname']?></span> 
        </li>
    </div>

     
                
    



<?php
include "../partials/footer.php";
?>