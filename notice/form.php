<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Notice Board Form</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Submit Job Notice</h2>
        <form action="submit_notice.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="sender_name">Sender Name</label>
                <input type="text" class="form-control" id="sender_name" name="sender_name" required>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" id="job_description" name="job_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="eligible_criteria">Eligible Criteria</label>
                <textarea class="form-control" id="eligible_criteria" name="eligible_criteria" required></textarea>
            </div>
            <div class="form-group">
                <label for="ctc">CTC</label>
                <input type="text" class="form-control" id="ctc" name="ctc" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="file">Upload File</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <div class="form-group">
        <label for="company_logo">Company Logo:</label>
        <input type="file" class="form-control" id="company_logo" name="company_logo" accept="image/*" required>
    </div>
            <div class="form-group">
                <label for="apply_link">Application Link</label>
                <input type="url" class="form-control" id="apply_link" name="apply_link" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Notice</button>
        </form>
    </div>
</body>
</html>
<?php
// Directory where logos will be saved
$targetDir = "uploads/logos/";
$targetFile = $targetDir . basename($_FILES["company_logo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file is an image
$check = getimagesize($_FILES["company_logo"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (optional, here 5MB)
if ($_FILES["company_logo"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// If everything is ok, try to upload the file
} else {
    if (move_uploaded_file($_FILES["company_logo"]["tmp_name"], $targetFile)) {
        echo "The file ". basename( $_FILES["company_logo"]["name"]). " has been uploaded.";
        
        // Insert company logo info into the database
        $companyLogo = basename($_FILES["company_logo"]["name"]);
        
        // Save the file name to the database (assuming you already have a SQL query here)
        $sql = "INSERT INTO notices (company_name, company_logo, other_columns) VALUES ('$companyName', '$companyLogo', 'other_values')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Notice added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>

