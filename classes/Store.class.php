<?php

class Store
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBooks($catId)
    {
        if (empty($catId)) {
            $query = $this->db->prepare('SELECT *, categories.id AS "catId" FROM books LEFT JOIN book_categories ON books.id = book_categories.book LEFT JOIN categories ON book_categories.category = categories.id;');
        } else {
            $query = $this->db->prepare('SELECT *, categories.id AS "catId" FROM books LEFT JOIN book_categories ON books.id = book_categories.book LEFT JOIN categories ON book_categories.category = categories.id WHERE categories.id = ?;');
        }
        $query->execute(array($catId));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFeaturedBooks()
    {
        $query = $this->db->prepare('SELECT *, categories.id AS "catId" FROM books LEFT JOIN book_categories ON books.id = book_categories.book LEFT JOIN categories ON book_categories.category = categories.id where books.featured="1" limit 10;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}