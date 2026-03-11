<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?self $instance = null;
    private PDO $pdo;

    private function __construct(array $config)
    {
        $this->pdo = $this->connectWithFallback($config);
    }

    public static function getInstance(array $config): self
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }

    public function pdo(): PDO
    {
        return $this->pdo;
    }

    private function connectWithFallback(array $config): PDO
    {
        try {
            return $this->connectToDatabase($config);
        } catch (PDOException $exception) {
            $sqlState = $exception->errorInfo[1] ?? null;
            $autoCreate = (bool)($config['auto_create_database'] ?? true);

            if ($sqlState !== 1049 || !$autoCreate) {
                throw $exception;
            }

            $serverPdo = $this->connectToServer($config);
            $dbName = $config['database'];
            $charset = $config['charset'] ?? 'utf8mb4';

            $serverPdo->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET %s COLLATE %s_unicode_ci',
                str_replace('`', '``', $dbName),
                $charset,
                $charset
            ));

            return $this->connectToDatabase($config);
        }
    }

    private function connectToDatabase(array $config): PDO
    {
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['port'],
            $config['database'],
            $config['charset'] ?? 'utf8mb4'
        );

        return new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    private function connectToServer(array $config): PDO
    {
        $dsn = sprintf('mysql:host=%s;port=%s;charset=%s', $config['host'], $config['port'], $config['charset'] ?? 'utf8mb4');

        return new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}
