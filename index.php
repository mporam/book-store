<?php
require 'inc/autoload.php';
require 'inc/dbcon.php';
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
            $store = new Store($db);
            $featuredBooks = $store->getFeaturedBooks();

            foreach($featuredBooks as $book) {
                include 'inc/tpl/featuredBook.tpl';
            }

            ?>
        </section>

    </div>
</body>
</html>

