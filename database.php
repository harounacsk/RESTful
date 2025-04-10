<?php

class Database
{
	private string $host = "localhost";
	private string $dbname = "restful_db";
	private string $username = "root";
	private string $password = "";
	private ?PDO $connection;
	private int $port = 3306;

	public function __construct()
	{
		$this->connection = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->username, $this->password);
	}


	public function insert(Article $article)
	{
		$data = $this->getData($article);
		$sql = "INSERT INTO article(name,price,backup) VALUES(:name,:price,:backup)";
		$stmt = $this->connection->prepare($sql);
		$stmt->bindParam(':name', $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(':price', $data["price"], PDO::PARAM_STR);
		$stmt->bindParam(':backup', $data["backup"], PDO::PARAM_BOOL);
		return $stmt->execute();
	}


	public function update(Article $article, $id)
	{
		$data = $this->getData($article);
		$sql = "UPDATE article SET name = :name, price = :price, backup = :backup  WHERE id = :id";
		$stmt = $this->connection->prepare($sql);
		$stmt->bindParam(':name', $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(':price', $data["price"], PDO::PARAM_STR);
		$stmt->bindParam(':backup', $data["backup"], PDO::PARAM_BOOL);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		return $stmt->execute();
	}


	public function delete($id)
	{
		if ($this->getArticleById($id)) {
			$sql = "DELETE FROM article  WHERE id=:id ";
			$stmt = $this->connection->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			return $stmt->execute();
		}
		return false;
	}

	public function select()
	{
		$sql = "SELECT * FROM article";
		$stmt = $this->connection->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getArticleById($id)
	{
		$sql = "SELECT * FROM article WHERE id=:id";
		$stmt = $this->connection->prepare($sql);
		$stmt->bindParam("id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
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
		$this->connection = null;
	}

}
