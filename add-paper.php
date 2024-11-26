<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Research Paper</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Add Research Paper</h2>
        <form action="save_paper.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="paper_id">Paper ID:</label>
                <input type="text" class="form-control" id="paper_id" name="paper_id" required>
            </div>
            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" class="form-control" id="author_name" name="author_name" required>
            </div>
            <div class="form-group">
                <label for="co_author1">Co-author 1:</label>
                <input type="text" class="form-control" id="co_author1" name="co_author1">
            </div>
            <div class="form-group">
                <label for="co_author2">Co-author 2:</label>
                <input type="text" class="form-control" id="co_author2" name="co_author2">
            </div>
            <div class="form-group">
                <label for="co_author3">Co-author 3:</label>
                <input type="text" class="form-control" id="co_author3" name="co_author3">
            </div>
            <div class="form-group">
                <label for="co_author4">Co-author 4:</label>
                <input type="text" class="form-control" id="co_author4" name="co_author4">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" min="2000" max="2024" required>
            </div>
            <div class="form-group">
                <label for="date_of_publish">Date of Publish:</label>
                <input type="date" class="form-control" id="date_of_publish" name="date_of_publish" required>
            </div>
            <div class="form-group">
                <label for="author_email">Author E-mail ID:</label>
                <input type="email" class="form-control" id="author_email" name="author_email" required>
            </div>
            <div class="form-group">
                <label for="paper_file">Upload Paper:</label>
                <input type="file" class="form-control" id="paper_file" name="paper_file" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
