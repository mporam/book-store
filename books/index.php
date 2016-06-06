<?php
require '../inc/autoload.php';
require '../inc/dbcon.php';
?>

<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <section class="row">
        <div class="col-sm-12">
            <h1>Book Store</h1>
            <i>Example book store by MPOram</i>
        </div>
    </section>

    <section class="row">
        <?php
        $dbcon = new DbConnection();
        $db = $dbcon->getDB();

        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $pathFragments = explode('/', $path);
        $slug = end($pathFragments);

        $bookObj = new Book($db);
        $book = $bookObj->getBookBySlug($slug);

        include('../inc/tpl/bookPage.tpl');
        ?>
    </section>

</div>
</body>
</html>

