<?php
class Sessie
{
    //Eigenschappen
    public string $sessionId;
    public string $sessionUserId;
    public string $sessionKey;
    public string $sessionStart;
    public string $sessionEnd;

    //Maakt een nieuwe sessie aan en slaat deze op in de database.
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

    //Vindt en retourneert de actieve sessie op basis van de sessiecookie,
    public static function vindActieveSessie()
    {
        $sessie = null;

        if (isset($_COOKIE["keukenprins-session"])) {
            $conn = Database::start();

            $key = mysqli_real_escape_string($conn, $_COOKIE["keukenprins-session"]);

            $query = "SELECT * FROM sessions WHERE session_key = '" . $key . "' AND session_end > '" . date("Y-m-d H:i:s") . "'";
            $resultaat = $conn->query($query);

            if ($resultaat->num_rows > 0) {
                $rij = $resultaat->fetch_assoc();

                $sessie = new Sessie();
                $sessie->sessionId = $rij['session_id'];
                $sessie->sessionUserId = $rij['session_user_id'];
                $sessie->sessionKey = $rij['session_key'];
                $sessie->sessionStart = $rij['session_start'];
                $sessie->sessionEnd = $rij['session_end'];
            }

            $conn->close();
        }

        return $sessie;
    }
}
