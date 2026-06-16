<?php
class User
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $username;
    public string $password;
    public string $userAdmin;

    //gebruiker toevoegen
    public function insert()
    {
        $conn = Database::start();

        $firstname = mysqli_real_escape_string($conn, $this->firstname);
        $lastname = mysqli_real_escape_string($conn, $this->lastname);
        $email = mysqli_real_escape_string($conn, $this->email);
        $username = mysqli_real_escape_string($conn, $this->username);
        $password = mysqli_real_escape_string($conn, $this->password);

        $sql = "INSERT INTO users (
            user_firstname, 
            user_lastname, 
            user_email, 
            user_username, 
            user_password,
            user_admin
            ) VALUES (
            '" . $firstname . "', 
            '" . $lastname . "', 
            '" . $email . "', 
            '" . $username . "', 
            '" . $password . "',
            '" . $this->userAdmin . "'
            )";

        $result = $conn->query($sql);
        $this->id = $conn->insert_id;

        $conn->close();
        return $result;
    }

    //gebruiker inloggen
    public static function Login($username, $password)
    {
        $conn = Database::start();

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM users WHERE user_username = '$username' AND user_password = '$password'";
        $result = $conn->query($sql);

        $user = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $user = new User();
            $user->id = $row['user_id'];
            $user->firstname = $row['user_firstname'];
            $user->lastname = $row['user_lastname'];
            $user->username = $row['user_username'];
            $user->email = $row['user_email'];
            $user->password = $row['user_password'];
            $user->userAdmin = $row['user_admin'];
        }

        $conn->close();
        return $user;
    }

    //alle gebruikers zoeken 
    public static function findAllUsers()
    {
        $conn = Database::start();

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        $users = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->id = $row["user_id"];
                $user->firstname = $row["user_firstname"];
                $user->lastname = $row["user_lastname"];
                $user->email = $row["user_email"];
                $user->userAdmin = $row["user_admin"];
                $user->username = $row["user_username"];
                $user->password = $row["user_password"];
                $users[] = $user;
            }
        }

        $conn->close();
        return $users;
    }

    //gebruiker op id zoeken 
    public static function findByID($userId)
    {
        $conn = Database::start();

        $sql = "SELECT * FROM users WHERE user_id = '$userId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new User();
            $user->id = $row["user_id"];
            $user->firstname = $row["user_firstname"];
            $user->lastname = $row["user_lastname"];
            $user->email = $row["user_email"];
            $user->userAdmin = $row["user_admin"];
            $user->username = $row["user_username"];
            $user->password = $row["user_password"];
            return $user;
        }

        $conn->close();
        return null;
    }

    //gebruikers verwijderen
    public function delete()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);

        $query = "
            DELETE FROM
                users
            WHERE
                user_id = '" . $id . "'
        ";

        $conn->query($query);
        $conn->close();
    }

    //gebruiker aanpassen
    public function update()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);
        $firstname = mysqli_real_escape_string($conn, $this->firstname);
        $lastname = mysqli_real_escape_string($conn, $this->lastname);
        $email = mysqli_real_escape_string($conn, $this->email);
        $username = mysqli_real_escape_string($conn, $this->username);
        $password = mysqli_real_escape_string($conn, $this->password);
        $userAdmin = mysqli_real_escape_string($conn, $this->userAdmin);

        $sql = "
            UPDATE 
                users
            SET
                user_firstname = '$firstname',
                user_lastname = '$lastname',
                user_email = '$email',
                user_username = '$username',
                user_password = '$password',
                user_admin = '$userAdmin'
            WHERE
                user_id = " . $id . "
        ";

        $conn->query($sql);
        $conn->close();
    }
}
