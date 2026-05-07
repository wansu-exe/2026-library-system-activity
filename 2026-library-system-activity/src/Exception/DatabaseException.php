<?php
declare(strict_types=1);
namespace App\Exception;

use RuntimeException;

/**
 * Custom exception for database-related errors
 *
 * @author Diaz
 * @since 2026-05-07
 */

class DatabaseException extends RuntimeException
{
 public static function connectionError(string $message): self
 {
     return new self('Database connection error: ' . $message);
 }

 public static function queryError(string $message): self
 {
     return new self('Database query error: ' . $message);
 }
}

?>