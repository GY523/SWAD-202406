<?php
include("auth.php");
require('database.php');
//File Upload Section
if (isset($_POST['upload'])) {
  //validation
    $allowedExtensions = ['pdf', 'doc', 'docx', 'txt'];

    $uploadedFileName = $_FILES['file']['name'];
    //validation
    $fileExtension=strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)){

        
        $targetDirectory = "upload/";
        $targetFilePath = $targetDirectory . $uploadedFileName;
    

        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            $userInput = $_POST['user_input'];

            $insertQuery = "INSERT INTO files (filename, user_input) VALUES 
            ('$uploadedFileName', '$userInput')";
            mysqli_query($con, $insertQuery) or die(mysqli_error($con));

            $status = "File uploaded successfully.";
        } else {
            $status = "File upload failed.";
        }
    }else{
       $status="invalid file type. Allowed file types: pdf, doc, docx, txt";
    }
}

//file update/reupload
if (isset($_POST['update'])) {
    $fileId = $_POST['file_id'];
    $userInput = $_POST['user_input'];

    //
    $allowedExtensions = ['pdf', 'doc', 'docx', 'txt'];

    if ($_FILES['new_file']['size'] > 0) {
        $newUploadedFileName = $_FILES['new_file']['name'];

        $newfileExtension = strtolower(pathinfo(PATHINFO_EXTENSION));

        if(in_array($newfileExtension, $allowedExtensions)){
            $targetDirectory = "upload/";
            $targetFilePath = $targetDirectory . $newUploadedFileName;
            if (move_uploaded_file($_FILES['new_file']['tmp_name'], $targetFilePath)) {
                $selectQuery = "SELECT filename FROM files WHERE id = $fileId";
                $result = mysqli_query($con, $selectQuery);
                $row = mysqli_fetch_assoc($result);
                $oldFilename = $row['filename'];
                $oldFilePath = "upload/" . $oldFilename;
                if (file_exists($oldFilePath) && !is_dir($oldFilePath)) {
                    unlink($oldFilePath);
                }
                $updateFileQuery = "UPDATE files SET filename = '$newUploadedFileName', 
                user_input = '$userInput' WHERE id = $fileId";
                mysqli_query($con, $updateFileQuery) or die(mysqli_error($con));
                $status = "File re-uploaded successfully.";
            } else {
                $status = "File re-upload failed.";
            }
        } else {
            $updateQuery = "UPDATE files SET user_input = '$userInput' WHERE id = $fileId";
            mysqli_query($con, $updateQuery) or die(mysqli_error($con));
            $status = "File details updated successfully.";
        }
    }
}   

//File Delete Section
if (isset($_GET['delete'])) {
    $fileId = $_GET['delete'];
    $selectQuery = "SELECT filename FROM files WHERE id = $fileId";
    $result = mysqli_query($con, $selectQuery);

    if($result && mysqli_NUM_ROWS($result)>0){
        $row = mysqli_fetch_assoc($result);
        $filename = $row['filename'];
        $filePath = "upload/" . $filename;
        if (file_exists($filePath) && !is_dir($filePath)) {
            unlink($filePath);
        }
        $deleteQuery = "DELETE FROM files WHERE id = $fileId";
        mysqli_query($con, $deleteQuery);
        $status = "File deleted successfully.";
    }else{
        $status="Error: File not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>File Manager</title>
</head>
<body>
<p><a href="dashboard.php">User Dashboard</a> |
<a href="logout.php">Logout</a></p>
<h1>File Manager</h1>
 <!-- Form for File Upload section -->

<form enctype="multipart/form-data" method="post" action="">
<input type="text" name="user_input" placeholder="Add comment or note" required
/>
<input type="file" name="file" required /><br><br>
<input type="submit" name="upload" value="Upload File" />
</form>
<?php
  $filesQuery = "SELECT * FROM files";
  $filesResult = mysqli_query($con, $filesQuery);
  
if ($filesResult) {
    while ($fileRow = mysqli_fetch_assoc($filesResult)) {
        echo "<li>";
        echo "<form method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='file_id' value='" . $fileRow['id'] . "' />";
        echo "<input type='text' name='user_input' value='" . $fileRow['user_input'] . "' />";
        echo "<label for='reupload_file'>Re-upload File:</label>";
        echo "<input type='file' name='new_file' id='reupload_file' />";
        echo "<input type='submit' name='update' value='Update' />";
        echo "</form>";
        echo " <a href='upload/" . $fileRow['filename'] . "' target='_blank'>View</a>";
        echo " | <a href='file_manager.php?delete=" . $fileRow['id'] . "' onclick=\"return confirm('Are you sure you want to delete this file?')\">Delete</a>";
        echo "</li>";
    }
}
?>
</body>
<?php
if (isset($status)) {
    echo "<p>Status: $status</p>";
}
?>
</html>