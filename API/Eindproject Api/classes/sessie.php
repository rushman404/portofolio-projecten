<?php
class sessie
{
    public string $sessionId;
    public string $sessionUserId;
    public string $sessionKey;
    public string $sessionStart;
    public string $sessionEnd;

    //sessie toevoegen
    public function insert()
    {
        $conn = Database::start();

        $userId = mysqli_real_escape_string($conn, $this->sessionUserId);
        $key = mysqli_real_escape_string($conn, $this->sessionKey);
        $start = mysqli_real_escape_string($conn, $this->sessionStart);
        $end = mysqli_real_escape_string($conn, $this->sessionEnd);

        $sql = "INSERT INTO sessions (
            session_user_id,
            session_key,
            session_start,
            session_end
        ) VALUES (
            '" . $userId . "',
            '" . $key . "',
            '" . $start . "',
            '" . $end . "'
        )";

        $conn->query($sql);
        $conn->close();
    }

    //actieve sessie zoeken
    public static function vindActieveSessie($sessionKey = "")
    {
        $sessie = null;

        $conn = Database::start();

        if (empty($sessionKey)) {
            return null;
        }

        $key = mysqli_real_escape_string($conn, $sessionKey);

        $query = "SELECT * FROM sessions 
              WHERE session_key = '$key' 
              AND session_end > '" . date("Y-m-d H:i:s") . "'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $rij = $result->fetch_assoc();

            $sessie = new Sessie();
            $sessie->sessionId = $rij['session_id'];
            $sessie->sessionUserId = $rij['session_user_id'];
            $sessie->sessionKey = $rij['session_key'];
            $sessie->sessionStart = $rij['session_start'];
            $sessie->sessionEnd = $rij['session_end'];
        }

        $conn->close();
        return $sessie;
    }
}
