<div class="col-sm-8">
    <h3><?php echo $book['name']; ?></h3><i><a href="/books.php?cat=<?php echo $book['catId']; ?>"><?php echo $book['category']; ?></i></a>
    <div class="pull-right"><img src="<?php echo $book['img']; ?>" width="150"></div>
    <h5>Price: <?php echo $book['price']; ?></h5>
    <p><?php echo $book['desc']; ?></p>

    <a href="../basket.php?add=<?php echo $book['id']; ?>">Add to basket</a>
<br><br>
    <a href="/">Return to books</a>
</div>