<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$meta['title']?></title>
    <meta name="description" content="<?=$meta['desc']?>">
    <meta name="keywords" content="<?=$meta['keywords']?>">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <h1>Hello Default Page</h1>
    <?php if(!empty($menu)): ?>
    <ul class="nav nav-pills">
        <?php foreach ($menu as $item): ?>
            <li><a href="#"><?=$item['title']?></a></li>
        <?php endforeach; ?>
    </ul>

    <?php endif; ?>

<?=$content?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>