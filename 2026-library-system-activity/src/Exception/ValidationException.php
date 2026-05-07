<?php
declare(strict_types=1);
namespace App\Exception;

use InvalidArgumentException;

/****
 * Custom exception for validation errors
 *
 * @author Diaz
 * @since 2026-05-07
 */
class ValidationException extends InvalidArgumentException
{

public function invalidInput(string $input): self
{
    return new self('Invalid input: ' . $input);
}

public function invalidYear(string $year): self
{
    return new self('Invalid year: ' . $year);
}

public function invalidEmail(string $email): self
{
    return new self('Invalid email: ' . $email);
}

public function invalidBookID (string $bookID): self
{
    return new self('Invalid book ID: ' . $bookID);
}

public function invalidStudentID (string $studentID): self
{
    return new self('Invalid student ID: ' . $studentID);
}

}
?>