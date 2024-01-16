<?php

class DatabaseHandler
{
    private $pdo;

    public function __construct()
    {
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

    public function verifyUser($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE Username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && $password == $user['Password']) {
            return true; // User exists and password is correct
        } else {
            return false; // User doesn't exist or password is incorrect
        }
    }

    public function insertContact($name, $email, $message)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO contactrequests (Name, Email, Message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);
        } catch (PDOException $e) {
            // Handle errors in data insertion
            echo "Insertion failed: " . $e->getMessage();
            exit;
        }
    }

    public function insertPost($Title, $Content)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO blogposts (Title, Content) VALUES (?, ?)");
            $stmt->execute([$Title, $Content]);
        } catch (PDOException $e) {
            // Handle errors in data insertion
            echo "Insertion failed: " . $e->getMessage();
            exit;
        }
    }

    public function fetchAllSkills()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM skills');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function fetchAllPosts()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM blogposts ORDER BY PublishedDate DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function fetchAllMessages()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM contactrequests ORDER BY SubmissionDate DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getInfoFromCategory($skillId) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT p.* 
                FROM projects p 
                INNER JOIN projectskills ps ON p.ProjectID = ps.ProjectID 
                WHERE ps.SkillID = :skillId
            ");
            $stmt->execute(['skillId' => $skillId]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Handle errors in query
            echo "Query failed: " . $e->getMessage();
            exit;
        }
    }

    public function deleteSkill($skillId)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM skills WHERE SkillID = :skillId");
            $stmt->execute(['skillId' => $skillId]);
        } catch (PDOException $e) {
            // Handle errors in deletion
            echo "Deletion failed: " . $e->getMessage();
            exit;
        }
    }

    public function updateSkill($skillId, $skillName, $skillImage) {
        try {
            $stmt = $this->pdo->prepare("UPDATE skills SET SkillName = :skillName, image = :skillImage WHERE SkillID = :skillId");
            $stmt->execute(['skillName' => $skillName, 'skillImage' => $skillImage, 'skillId' => $skillId]);
        } catch (PDOException $e) {
            // Handle errors
            echo "Update failed: " . $e->getMessage();
            exit;
        }
    }

}

