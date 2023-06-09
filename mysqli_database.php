<?php

class Database
{
    private string $host = 'localhost';
    private string $username = 'hrn';
    private string $password = 'my_pass';
    private string $dbname = 'testDB';
    private mysqli $mysqli ;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    }


    public function insert(Article $article)
    {
        $data = $this->getData($article);
        $sql = "INSERT INTO article(name,price,backup) VALUES(?,?,?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("sdi", $data["name"], $data["price"], $data["backup"]);
        return $stmt->execute();
    }


    public function update(Article $article, $id)
    {
        $data = $this->getData($article);
        $sql = "UPDATE article SET name = ?, price = ?, backup = ?  WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("sdii", $data["name"], $data["price"], $data["backup"], $id);
        return $stmt->execute();
    }


    public function delete($id)
    {
        if ($this->getArticleById($id)) {
            $sql = "DELETE FROM article  WHERE id=? ";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
        return false;
    }

    public function select()
    {
        $sql = "SELECT * FROM article";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticleById($id)
    {
        $sql = "SELECT * FROM article WHERE id=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    private function getData(Article $article)
    {
        return [
            "name" => $article->getName(),
            "price" => $article->getPrice(),
            "backup" => $article->isBackup(),
        ];
    }

    public function close()
    {
        $this->mysqli->close();
    }
}