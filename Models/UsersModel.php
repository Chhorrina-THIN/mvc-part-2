<?php
    class UsersModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database("localhost", "rd_store_db", "root", "");
        }

        public function getUsers()
        {
            $result = $this->db->query("SELECT * FROM users");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserById($id)
        {
            $result = $this->db->query("SELECT * FROM users WHERE id = :id", [':id' => $id]);
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function addUser($name, $password, $email)
        {
            try {
                $this->db->query(
                    "INSERT INTO users (name, password, email) VALUES (:name, :password, :email)",
                    [
                        ':name' => $name,
                        ':password' => $password,
                        ':email' => $email
                    ]
                );
            } catch (PDOException $e) {
                echo "Error adding product: " . $e->getMessage();
            }
        }

        public function updateUser($id, $name, $password, $email)
        {
            try {
                $this->db->query("UPDATE users SET name = :name, password = :password, email = :email WHERE id = :id", [
                    ':id' => $id,
                    ':name' => $name,
                    ':password' => $password,
                    ':email' => $email, 
                ]);
            } catch (PDOException $e) {
                echo "Error updating product: " . $e->getMessage();
            }
        }

        public function deleteUser($id)
        {
            try {
                $this->db->query("DELETE FROM users WHERE id = :id", [':id' => $id]);
            } catch (PDOException $e) {
                echo "Error deleting product: " . $e->getMessage();
            }
        }
    }
?>