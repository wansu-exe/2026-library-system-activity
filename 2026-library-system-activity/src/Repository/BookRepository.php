<?php

declare(strict_types=1);

namespace App\Repository;
namespace App\Entity;

/**
 * Manages database operations for Book entities.
 *
 * This repository class encapsulates all SQL queries related to books,
 * ensuring consistent data access and preventing SQL injection through
 * prepared statements.
 *
 * @author Diaz
 * @since 2026-05-07
 */

use DateTime;
use DateInterval;
use mysqli;

class BookRepository
{
    private mysqli $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addBook(Book $book): int
    {
        $sql = 'INSERT INTO books (title, author, year, genre) VALUES (?, ?, ?, ?)';
        $statement = $this->connection->prepare($sql);
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $year = $book->getYear();
        $genre = $book->getGenre();
        $statement->bind_param(
            'ssis',
            $title,
            $author,
            $year,
            $genre
        );
        $statement->execute();

        return $this->connection->insert_id;
    }
}
