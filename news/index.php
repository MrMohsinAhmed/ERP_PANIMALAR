<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'news_website');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch news from the database
$result = $conn->query("SELECT * FROM news ORDER BY created_at DESC");

$newsItems = [];
while ($row = $result->fetch_assoc()) {
    $newsItems[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .marquee {
            height: 500px;
            overflow: hidden;
            position: relative;
        }
        .marquee-content {
            position: absolute;
            width: 100%;
            animation: scroll 15s linear infinite;
        }
        @keyframes scroll {
            0% { top: 100%; }
            100% { top: -100%; }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Live News</h2>
        <div class="marquee">
            <div class="marquee-content">
                <?php foreach ($newsItems as $news) : ?>
                    <div class="mb-3">
                        <h4 style="font-weight: bold;"><?php echo $news['title']; ?></h4>
                        <p style="text-align: justify;"><?php echo $news['content']; ?></p>
                        <?php if ($news['link']) : ?>
                            <button><a style="text-decoration: none;" href="<?php echo $news['link']; ?>" target="_blank">Click Here</a></button>
                        <?php endif; ?>
                        <?php if ($news['file_path']) : ?>
                            <button class="btn btn-primary"><a style="text-decoration: none; color: white;" href="<?php echo $news['file_path']; ?>" download>Download Now</a></button>
                        <?php endif; ?><br><br>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
