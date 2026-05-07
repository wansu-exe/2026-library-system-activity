<?php
declare(strict_types=1);
namespace App\Entity;



   /**
 * Manages the Borrow Book details
 *Entity class represents a borrow transaction
 * This Entity use encapsulation for the borrow book get and set.
 *
 * @author Diaz
 * @since 2026-05-07
 */
class BorrowRecord{
    private int $studentId;
    private int $bookId;
    private string $borrow_date;
    private string $due_date;
    private string $status;
    private float $fine_amount;
    private string $return_date;

    public function __construct(int $studentId, int $bookId, string $borrow_date, string $due_date, string $status, float $fine_amount, string $return_date) {
        $this->studentId = $studentId;
        $this->bookId = $bookId;
        $this->borrow_date = $borrow_date;
        $this->due_date = $due_date;
        $this->status = $status;
        $this->fine_amount = $fine_amount;
        $this->return_date = $return_date;
    }

    public function getStudentId(): int {
        return $this->studentId;
    }

    public function getBookId(): int {
        return $this->bookId;
    }

    public function getBorrowDate(): string {
        return $this->borrow_date;
    }

    public function getDueDate(): string {
        return $this->due_date;
    }
    public function getStatus(): string {
        return $this->status;
}
    public function getFineAmount(): float {
        return $this->fine_amount;
    }
    public function getReturnDate(): string {
        return $this->return_date;
    }

    public function setStudentId(int $studentId): void {
        $this->studentId = $studentId;
    }
    public function setBookId(int $bookId): void {
        $this->bookId = $bookId;
    }
    public function setBorrowDate(string $borrow_date): void {
        $this->borrow_date = $borrow_date;
    }
    public function setDueDate(string $due_date): void {
        $this->due_date = $due_date;
    }
    public function setStatus(string $status): void {
        $this->status = $status;
    }
    public function setFineAmount(float $fine_amount): void {
        $this->fine_amount = $fine_amount;
        $fine_amount = 5.00;
    }
    public function setReturnDate(string $return_date): void {
        $this->return_date = $return_date;
    }
}
?>