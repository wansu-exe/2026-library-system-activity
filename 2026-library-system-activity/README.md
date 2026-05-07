# Student Library Management System

A refactored OOP PHP application for managing library books, borrow records,
and overdue fines. Built following PSR-12 coding standards.

## Author
- Juan Dela Cruz

## Requirements
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Git

## Installation
1. Clone the repository
2. Import `database/schema.sql` into MySQL
3. Copy `.env.example` to `.env` and configure database credentials
4. Run `composer install` (if dependencies exist)

## File Structure
src/
Entity/ 	# Data models (Book, BorrowRecord, Student)
Repository/ 	# Database access layer
Service/ 	# Business logic
Config/ 	# Configuration and constants
View/ 		# HTML templates
public/ 	# Web-accessible entry point
docs/ 		# Generated PHPDoc output

## PSR-12 Compliance
All PHP files follow PSR-12 coding standards:
- 4-space indentation
- Unix LF line endings
- Strict typing enabled
- Descriptive naming conventions

## Usage Examples

### Adding a Book
```php
$connection = new DatabaseConnection($config);
$repository = new BookRepository($connection);

$book = new Book('The Great Gatsby', 'F. Scott Fitzgerald', 1925, 'Fiction');
$bookId = $repository->addBook($book);
Borrowing a Book

$service = new LibraryService($connection);
$service->borrowBook(101, 42, 14); // student 101 borrows book 42 for 14 days
---

Step 16: Commit Documentation
git add .
git status
git commit -m "docs: add PHPDoc to BookRepository class"
git commit -m "docs: add PHPDoc to LibraryService methods"
git commit -m "docs: add README.md with installation and usage guide"


