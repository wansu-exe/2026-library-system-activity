<?php
declare(strict_types=1);
namespace App\Entity;

class Book {
    private int $id;
    private string $title;
    private string $author;
    private string $year;
    private string $genre;

    public function __construct(int $id, string $title, string $author, string $year, string $genre) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->genre = $genre;
    }
 
    
    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getYear(): string {
        return $this->year;
    }

    public function getGenre(): string {
        return $this->genre;
    }

    public function setGenre(string $genre): void {
        $this->genre = $genre;
    }
    
    public function setId(int $id) {
        $this->id = $id;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }
    public function setAuthor(string $author): void {
        $this->author = $author;
    }

    public function setYear(string $year): void {
        $this->year = $year;
    }
    
}

?>