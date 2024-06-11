<?php
include "partials/header.php";
// if(!isset($_SESSION['user_is_admin'])){
//     header("location: " . ROOT_URL . "logout.php");
    
//     session_destroy();
// }

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT firstname,lastname,username,is_admin,email,password,avatar FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}else{
    // header('location: ' . ROOT_URL . 'admin/manage-users.php');
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Profile</h2>

        <form action="<?=ROOT_URL?>admin/edit-profile-logic.php" enctype="multipart/form-data" method='POST'>
            <input type="text"     name ="firstname"       value ="<?= $user['firstname']?>"  placeholder="First Name">
            <input type="text"     name ="lastname"        value ="<?= $user['lastname']?>"  placeholder="Last Name">
            <input type="username" name ="username"        value ="<?= $user['username']?>"  placeholder="Username">
            <input type="email"    name ="email"           value ="<?= $user['email']?>"  placeholder="email">
            <input type="password" name ="createpassword"  value ="<?= $user['password'] ?>"  placeholder="Password">
            <input type="password" name ="confirmpassword" value ="<?= $user['password']?>"  placeholder="Confirm Password">
             <select name='userrole'>

                <option value="0">Author</option>
                <option value="1">Admin</option>

            </select>
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name ='avatar' id="avatar">
            </div>
            <button type="submit" name='submit' class="btn">Update Profile</button>
        </form>
    </div>
</section>




<?php
include "../partials/footer.php";
?>