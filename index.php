<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Videá a rebríček</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f4; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1, h2 { color: #333; }
        .video-list, .ranking { margin-top: 20px; }
        .video-item { border-bottom: 1px solid #eee; padding: 10px 0; }
        .video-item video { width: 100%; border-radius: 4px; }
        form { margin-top: 20px; }
        input, button { padding: 10px; margin-top: 10px; }
        input[type="file"] { border: 1px solid #ccc; }
        button { background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>Nahrať nové video</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="video">Vyber súbor s videom:</label>
        <input type="file" name="video" id="video" accept="video/*" required>
        <button type="submit">Nahrať video</button>
    </form>

    <hr>

    <h2>Všetky videá</h2>
    <div class="video-list">
        <?php
        $directory = 'videa/';
        $videos = glob($directory . "*.{mp4,mov,avi,webm}", GLOB_BRACE);

        if (count($videos) > 0) {
            foreach ($videos as $video) {
                $filename = basename($video);
                echo '<div class="video-item">';
                echo '    <h2>' . htmlspecialchars($filename) . '</h2>';
                echo '    <video controls>';
                echo '        <source src="' . htmlspecialchars($video) . '" type="video/mp4">';
                echo '        Váš prehliadač nepodporuje HTML5 video.';
                echo '    </video>';
                echo '</div>';
            }
        } else {
            echo '<p>Zatiaľ tu nie sú žiadne videá.</p>';
        }
        ?>
    </div>
    
    <hr>

    <h2>Rebríček najlepších</h2>
    <div class="ranking">
        <p>Pre rebríček by bola potrebná databáza (napr. s počtom zhliadnutí alebo hodnotením), ale tu je zatiaľ miesto preň.</p>
        <ol>
            <li>Video A</li>
            <li>Video B</li>
            <li>Video C</li>
        </ol>
    </div>
</div>

</body>
</html>
