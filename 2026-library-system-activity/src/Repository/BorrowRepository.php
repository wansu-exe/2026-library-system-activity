<?php
declare(strict_types=1);
namespace App\Repository;

use App\Config\LibraryConfig;
use App\Exception\DatabaseException;
use App\Entity\Book;
/**
 * Handles database operations related to books
 *
 * This repository provides methods for adding, retrieving, updating, and deleting books from the database,
 * 
 * @author Diaz
 * @since 2026-05-07
 */

class BorrowRepository{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function addBorrowRecord(int $studentId, int $bookId): void
    {
        $sql = 'INSERT INTO borrow_records (student_id, book_id) VALUES (?, ?)';
        $statement = $this->connection->prepare($sql);
        if (!$statement) {
            throw DatabaseException::queryError($this->connection->error);
        }
        $statement->bind_param('ii', $studentId, $bookId);
        if (!$statement->execute()) {
            throw DatabaseException::queryError($statement->error);
        }
    }
   
    public function CreateBorrowRecord(int $studentId, int $bookId, string $borrow_date, string $due_date, string $status, float $fine_amount, string $return_date): void
    {
        $sql = 'INSERT INTO borrow_records (student_id, book_id, borrow_date, due_date, status, fine_amount, return_date) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $statement = $this->connection->prepare($sql);
        if (!$statement) {
            throw DatabaseException::queryError($this->connection->error);
        }
        $statement->bind_param('iisssds', $studentId, $bookId, $borrow_date, $due_date, $status, $fine_amount, $return_date);
        if (!$statement->execute()) {
            throw DatabaseException::queryError($statement->error);
        }
    }
    public function ReturnBook(int $studentId, int $bookId, string $return_date): void
    {
        $sql = 'UPDATE borrow_records SET return_date = ?, status = "returned" WHERE student_id = ? AND book_id = ?';
        $statement = $this->connection->prepare($sql);
        if (!$statement) {
            throw DatabaseException::queryError($this->connection->error);
        }
        $statement->bind_param('sii', $return_date, $studentId, $bookId);
        if (!$statement->execute()) {
            throw DatabaseException::queryError($statement->error);
        }
    }
    public function calculateFine(int $studentId, int $bookId): float
    {
        $sql = 'SELECT due_date FROM borrow_records WHERE student_id = ? AND book_id = ?';
        $statement = $this->connection->prepare($sql);
        if (!$statement) {
            throw DatabaseException::queryError($this->connection->error);
        }
        $statement->bind_param('ii', $studentId, $bookId);
        if (!$statement->execute()) {
            throw DatabaseException::queryError($statement->error);
        }
        $result = $statement->get_result();
        if ($result->num_rows === 0) {
            return 0.0;
        }
        $row = $result->fetch_assoc();
        $dueDate = new DateTime($row['due_date']);
        $currentDate = new DateTime();
        if ($currentDate > $dueDate) {
            $interval = $dueDate->diff($currentDate);
            return (float)$interval->days * LibraryConfig::FINE_PER_DAY;
        }
        return 0.0;
    }
public function getBorrowRecordsByStudentId(int $studentId): array
    {
        $sql = 'SELECT * FROM borrow_records WHERE student_id = ?';
        $statement = $this->connection->prepare($sql);
        if (!$statement) {
            throw DatabaseException::queryError($this->connection->error);
        }
        $statement->bind_param('i', $studentId);
        if (!$statement->execute()) {
            throw DatabaseException::queryError($statement->error);
        }
        $result = $statement->get_result();
        $borrowRecords = [];
        while ($row = $result->fetch_assoc()) {
            $borrowRecords[] = new BorrowRecord(
                (int)$row['student_id'],
                (int)$row['book_id'],
                $row['borrow_date'],
                $row['due_date'],
                $row['status'],
                (float)$row['fine_amount'],
                $row['return_date']
            );
        }
        return $borrowRecords;
    }

}


?>