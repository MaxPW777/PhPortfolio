<?php

class DatabaseHandler {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8mb4', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            // Handle database connection errors
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }

    public function verifyUser($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && $password == $user['Password']) {
            return true; // User exists and password is correct
        } else {
            return false; // User doesn't exist or password is incorrect
        }
    }

    public function insertContact($name, $email, $message) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO contactrequests (Name, Email, Message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);
        } catch (PDOException $e) {
            // Handle errors in data insertion
            echo "Insertion failed: " . $e->getMessage();
            exit;
        }
    }

    public function fetchAllSkills() {
        $stmt = $this->pdo->prepare('SELECT * FROM skills');
        $stmt->execute();
        return $stmt->fetchAll();
    }}

?>
