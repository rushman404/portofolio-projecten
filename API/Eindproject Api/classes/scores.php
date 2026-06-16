<?php
class Score
{
    public int $id;
    public int $userId;
    public int $value;
    public string $date;

    //score toevoegen
    public function insert()
    {
        $conn = Database::start();

        $userId = mysqli_real_escape_string($conn, $this->userId);
        $score = mysqli_real_escape_string($conn, $this->value);
        $date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO scores (
            score_user_id, 
            score_value,
            score_date
        ) VALUES (
            '$userId',
            '$score',
            '$date'
        )";

        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }

    //top 10 scores
    public static function top10()
    {
        $conn = Database::start();

        $sql = "SELECT users.user_username, scores.score_value, scores.score_date
                FROM scores
                JOIN users ON users.user_id = scores.score_user_id
                ORDER BY scores.score_value DESC
                LIMIT 10";

        $result = $conn->query($sql);
        $scores = [];

        while ($row = $result->fetch_assoc()) {
            $scores[] = [
                "user_username" => $row['user_username'],
                "score_value" => $row['score_value'],
                "score_date" => $row['score_date']
            ];
        }

        $conn->close();
        return $scores;
    }

    //alle scores
    public static function allScores()
    {
        $conn = Database::start();

        $sql = "SELECT * FROM scores";

        $result = $conn->query($sql);

        $scores = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $score = new score();
                $score->id = $row["score_id"];
                $score->userId = $row["score_user_id"];
                $score->value = $row["score_value"];
                $score->date = $row["score_date"];
                $scores[] = $score;
            }
        }

        $conn->close();
        return $scores;
    }

    //score op id zoeken 
    public static function findById($scoreId)
    {
        $conn = Database::start();

        $sql = "SELECT * FROM scores WHERE score_id = '$scoreId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $score = new score();
            $score->id = $row["score_id"];
            $score->userId = $row["score_user_id"];
            $score->value = $row["score_value"];
            $score->date = $row["score_date"];
            return $score;
        }

        $conn->close();
        return null;
    }

    //score verwijderen
    public function delete()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);

        $query = "
            DELETE FROM
                scores
            WHERE
                score_id = '" . $id . "'
        ";

        $conn->query($query);
        $conn->close(); 
    }

    //score op user id zoeken 
    public static function findByUserId($userId)
    {
        $conn = Database::start();

        $sql = "SELECT * FROM scores WHERE score_user_id = '$userId'";
        $result = $conn->query($sql);

        $scores = [];

        while ($row = $result->fetch_assoc()) {
            $score = new Score();
            $score->id = $row["score_id"];
            $score->userId = $row["score_user_id"];
            $score->value = $row["score_value"];
            $score->date = $row["score_date"];
            $scores[] = $score;
        }

        $conn->close();
        return $scores;
    }
}
