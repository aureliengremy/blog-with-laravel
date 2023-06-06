<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/posts.css">
    <title>Posts</title>
</head>
<body>

    <h1>All Posts</h1>
{{--    <a href="/posts/first-post">First Post</a>--}}

{{--    <a href="/posts/second-post">Second Post</a>--}}

{{--    <a href="/posts/third-post">Third Post</a>--}}


    <?php foreach ($posts as $post) : ?>
        <div class="post">
            <a href="/posts/<?= $post[0] ?>">
                <?= $post[0] ?>
            </a>

                <?= $post[1] ?>

        </div>
    <?php endforeach ?>



</body>
</html>
