<?php 

    class Database{
        private $host='localhost';
        private $username='hrn';
        private $password='my_pass';
        private $dbname='testDB';
        private $mysqli='';

        public function __construct(){
            $this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        }


        public function insert(Article $article){
            $sql="INSERT INTO article(name,price,backup) VALUES(?,?,?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("sdi", $article->getName(),$article->getPrice(),intval($article->isBackup()));
            $stmt->execute();
        }


        public function update(Article $article,$id){
           $sql="UPDATE article SET name = ?, price = ?, backup = ?  WHERE id = ?";
           $stmt = $this->mysqli->prepare($sql);
           $stmt->bind_param("sdii", $article->getName(),$article->getPrice(),$article->isBackup(),$id);
           return $stmt->execute();
        }


        public function delete($id){
            if($this->getArticleById($id)){
                $sql="DELETE FROM article  WHERE id=? ";
                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param("i",$id);            
                return $stmt->execute();
            }
            return false;
        }

        public function select(){
            $sql="SELECT * FROM article";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->execute();
            $result= $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getArticleById($id){
            $sql="SELECT * FROM article WHERE id=?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("i",$id);            
            $stmt->execute();
            $result= $stmt->get_result();
            return $result->fetch_assoc();
        }

        public function close(){
            $this->mysqli->close();
        }
    }
