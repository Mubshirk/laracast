<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link rel="stylesheet" href="css/app.css">
</head>
<body>

    <?php foreach($posts as $post): ?>

    <article>
        <h1> <a href="posts/<?php echo $post->slug; ?>/"> 
            <?php echo $post->title; ?> </h1>
            </a>
        <div>
            
            <?php echo $post->excerpt; ?>
        </div>
    </article>
    <?php  endforeach; ?>
</body>
</html>