<?php
declare(strict_types=1);


require_once __DIR__ . '/../src/Config/DatabaseConfig.php';
require_once __DIR__ . '/../src/Config/LibraryConfig.php';
require_once __DIR__ . '/../src/Exception/DatabaseException.php';
require_once __DIR__ . '/../src/Exception/ValidationException.php';
require_once __DIR__ . '/../src/Entity/Book.php';
require_once __DIR__ . '/../src/Entity/BorrowRecord.php';
require_once __DIR__ . '/../src/Entity/Student.php';
require_once __DIR__ . '/../src/Service/LibraryService.php';
require_once __DIR__ . '/../src/Repository/BookRepository.php';
require_once __DIR__ . '/../src/Repository/BorrowRepository.php';


use App\DatabaseConnection;
use App\LibraryService;
use App\Exception\DatabaseException;
use App\Exception\ValidationException;

$connection = new DatabaseConnection();
$libraryService = new LibraryService($connection);


try {
    $connection = new DatabaseConfig();
    $libraryService = new LibraryService($connection);
} catch (DatabaseException $e) {
    die('Database error: ' . $e->getMessage());
}

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $title = $_POST['title'] ?? '';
                $author = $_POST['author'] ?? '';
                $isbn = $_POST['isbn'] ?? '';
                $libraryService->addBook($title, $author, $isbn);
                echo 'Book added successfully.';
            } catch (ValidationException $e) {
                echo 'Validation error: ' . $e->getMessage();
            } catch (DatabaseException $e) {
                echo 'Database error: ' . $e->getMessage();
            }
        }
           break;

           case 'borrow':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                try {
                    $studentId = (int)($_POST['student_id'] ?? 0);
                    $bookId = (int)($_POST['book_id'] ?? 0);
                    $libraryService->borrowBook($studentId, $bookId);
                    echo 'Book borrowed successfully.';
                } catch (ValidationException $e) {
                    echo 'Validation error: ' . $e->getMessage();
                } catch (DatabaseException $e) {
                    echo 'Database error: ' . $e->getMessage();
                }
            }
            break;
            case 'list':
                try {
                    $books = $libraryService->listBooks();
                    foreach ($books as $book) {
                        echo 'ID: ' . $book->getId() . ' - Title: ' . $book->getTitle() . ' - Author: ' . $book->getAuthor() . ' - ISBN: ' . $book->getIsbn() . '<br>';
                    }
                } catch (DatabaseException $e) {
                    echo 'Database error: ' . $e->getMessage();
                }
                break;

                case 'return':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        try {
                            $studentId = (int)($_POST['student_id'] ?? 0);
                            $bookId = (int)($_POST['book_id'] ?? 0);
                            $libraryService->returnBook($studentId, $bookId);
                            echo 'Book returned successfully.';
                        } catch (ValidationException $e) {
                            echo 'Validation error: ' . $e->getMessage();
                        } catch (DatabaseException $e) {
                            echo 'Database error: ' . $e->getMessage();
                        }
                    }
                    break;

                default:
                    echo '<h1>Library Management System</h1>';
                    echo '<ul>';
                    echo '<li><a href="?act=list">List all books</a></li>';
                    echo '<li><a href="?act=borrow">Borrow a book</a></li>';
                    echo '<li><a href="?act=overdue">View overdue books</a></li>';
                    echo '<li><a href="?act=report">Generate report</a></li>';
                    echo '</ul>';
        break;
}
     
?>