<?php
declare(strict_types=1);
namespace App\Config;

class DatabaseConfig{
    private string $host;
    private string $username;
    private string $password;
    private string $database;

    public function __construct(string $host, string $username, string $password, string $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function getHost(): string {
        return $this->host;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getDatabase(): string {
        return $this->database;
    }
}
?>