<?php


class Book
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBookBySlug($slug)
    {
        $query = $this->db->prepare('SELECT *, categories.id AS "catId" FROM books LEFT JOIN book_categories ON books.id = book_categories.book LEFT JOIN categories ON book_categories.category = categories.id where books.slug = ?');
        $query->execute(array($slug));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getBookById($id)
    {
        $query = $this->db->prepare('SELECT *, categories.id AS "catId" FROM books LEFT JOIN book_categories ON books.id = book_categories.book LEFT JOIN categories ON book_categories.category = categories.id where books.id = ?');
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}