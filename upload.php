<?php

include('connection.php');

if (isset($_POST['submit'])) {
  // Check if a file was selected for upload
  if (isset($_FILES['uploaded_file'])) {
    // Get the file extension
    $file_extension = pathinfo($_FILES['uploaded_file']['name'], PATHINFO_EXTENSION);

    // Allow only certain file extensions
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (in_array($file_extension, $allowed_extensions)) {
      // Generate a unique file name
      $new_file_name = uniqid() . "." . $file_extension;

      // Set the destination folder and file name
      $destination = "img/" . $new_file_name;

      // Move the uploaded file to the destination folder
      if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $destination)) {
        // Insert the image into the database
        $sql = "INSERT INTO uploads (username, typefile, pictures, size) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $_POST['username'], $file_extension, $new_file_name, $_FILES['uploaded_file']['size']);
        mysqli_stmt_execute($stmt);
      }
    }
  }
}
echo 'Upload Sucessful!';

?>
