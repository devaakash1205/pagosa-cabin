<?php
class Reviews
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    //get all reviews
    function getAllReviews()
    {
        $sql = $this->conn->query("SELECT `name`, `description`,`address` FROM user_reviews WHERE status = 1");
        $result = [];
        if ($sql->num_rows > 0) {
            while ($pageResult = $sql->fetch_assoc()) {
                $result[] = $pageResult;
            }
        }
        return $result;
    }

    function getReviewById($id)
    {
        $sql = $this->conn->query("SELECT `name`, `description`, `address`, `email`, `phone` FORM user_reviews WHERE id = '$id'");

        if ($sql->num_row > 0) {
            return $sql->fetch_assoc();
        }

        return null;
    }
}
