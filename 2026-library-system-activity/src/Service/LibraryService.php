<?php
declare(strict_types=1);
namespace App\Service;

use App\Entity\Book;
use App\Entity\BorrowRecord;
use App\Entity\Student;
use App\Config\DatabaseConfig;
use App\Repository\BookRepository;
use App\Repository\BorrowRepository;

class LibraryService {
    private BookRepository $bookRepository;
    private BorrowRepository $borrowRepository;

    public function __construct(DatabaseConfig $dbConfig) {
        $this->bookRepository = new BookRepository($dbConfig);
        $this->borrowRepository = new BorrowRepository($dbConfig);
    }

    public function addBook(string $title, string $author, string $isbn): void {
        $book = new Book(0, $title, $author, $isbn);
        $this->bookRepository->addBook($book);
    }

    public function borrowBook(int $studentId, int $bookId): void {
        $this->borrowRepository->addBorrowRecord($studentId, $bookId);

    }
    public function returnBook(int $studentId, int $bookId, string $return_date): void {
        $this->borrowRepository->ReturnBook($studentId, $bookId, $return_date);
    }
    public function findBookById(int $id): ?Book {
        return $this->bookRepository->getBookById($id);
    }
    
}
?>