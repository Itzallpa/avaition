<?php
session_start();

if (isset($_FILES["file"])) {
    $file = $_FILES["file"];
    
    // Directory to store the uploaded profile pictures
    $uploadDirectory = "upload_profile/";
    
    // Generate a unique filename for the uploaded image
    $filename = uniqid() . '_' . $file["name"];
    
    // Move the uploaded file to the upload directory
    if (move_uploaded_file($file["tmp_name"], $uploadDirectory . $filename)) {
        // Set the profile picture URL in the session
        $_SESSION["profile_picture"] = $uploadDirectory . $filename;
    }
}

header("Location: profile.php");
exit();
?>
