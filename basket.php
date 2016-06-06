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
        <div class="col-sm-12">
            <h3>Basket</h3>
        </div>
        <?php
        $dbcon = new DbConnection();
        $db = $dbcon->getDB();

        session_start();

        if (!empty($_GET['add'])) {
            if (!empty($_SESSION['books']) && !in_array($_GET['add'], $_SESSION['books'])) {
                $_SESSION['books'][] = $_GET['add'];
                $_SESSION['basketCount'][$_GET['add']] = 1;
            } else {
                $_SESSION['basketCount'][$_GET['add']]++;
            }
        }

        $total = 0;

        if (!empty($_SESSION['books']) && is_array($_SESSION['books'])) {
            foreach($_SESSION['books'] as $bookId) {
                $bookObj = new Book($db);
                $book = $bookObj->getBookById($bookId);
                $book['quantity'] = $_SESSION['basketCount'][$bookId];
                include('inc/tpl/basketBook.tpl');

                $total += ($book['price'] * $book['quantity']);
            }
        }
        ?>

        <div class="col-sm-12">
            <p>&nbsp;</p>
            <p><strong>Total: &pound;<?php echo $total; ?></strong></p>

            <a href="/">Return to store</a>
        </div>
    </section>


</div>
</body>
</html>

