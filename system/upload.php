<?php
session_start();

require_once "database.php";


if (isset($_FILES["file"])) {
    $file = $_FILES["file"];
    
    // Directory to store the uploaded profile pictures
    $uploadDirectory = "upload_profile/";
    
    // Generate a unique filename for the uploaded image
    $filename = uniqid() . '_' . $file["name"];
    
    // Move the uploaded file to the upload directory
    if (move_uploaded_file($file["tmp_name"], $uploadDirectory . $filename)) {
        // Set the profile picture URL in the session

        // Update the profile picture URL in the database
        $sql = "UPDATE users SET profile_picture = '$uploadDirectory$filename' WHERE id = " . $_SESSION["user_id"];
        mysqli_query($conn, $sql);

        // Redirect to the profile page
        header("Location: profile.php");
        $_SESSION["profile_picture"] = $uploadDirectory . $filename;

        
    }
}

header("Location: profile.php");
exit();
?>
