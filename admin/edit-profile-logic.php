<?php
require "config/database.php";

// if(!isset($_SESSION['user_is_admin'])){
//     header("location: " . ROOT_URL . "logout.php");
    
//     session_destroy();
// }
if(isset($_POST['submit'])){
    
    $id = $_SESSION['user-id'];
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    
    if(!$firstname || !$lastname ){
        $_SESSION['edit-user'] = "Invalid form input on edit page";

    }else{
        $avatar_name = $time . $avatar['name'];
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username = '$username', email = '$email', password = '$password', avatar = '$avatar_name', is_admin=$is_admin WHERE id= $id LIMIT 1";
        $result = mysqli_query($connection, $query);

        $time = time();  
        
        $avatar_tmp_name=$avatar['tmp_name'];
        $avatar_destination_path='../images/' . $avatar_name;

                
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $avatar_name);
        $extension = end($extension);

        if(in_array($extension,$allowed_files)){

                    
            if($avatar['size']<1000000){

                        
                move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
            }else{
                $_SESSION['add-user']="Folder size too big.Should be less than 1mb";
            }
        }else{
            $_SESSION['add-user']="File should be png, jpg or jpeg";
        }

        if(mysqli_errno($connection)){
            $_SESSION['edit-user'] = 'Failed to update user';

        }else{
            $_SESSION['edit-user-success'] = "User $firstname $lastname updated successfully";

        }

    }

}
header("location: " . ROOT_URL . "admin/profile.php");
die();
?>