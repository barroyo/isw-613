<?php
$IMAGE_HOST_NAME = 'http://localhost:8080/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $targetDir = "uploads/"; // Directory where uploaded files will be stored
        $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "File already exists.";
        } else {

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                echo "File uploaded successfully: " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                echo "<img src=\"$IMAGE_HOST_NAME$targetFile\" >";
            } else {
                echo "Error uploading the file.";
            }
        }
    } else {
        echo "Invalid file upload or no file selected.";
    }
}
?>
