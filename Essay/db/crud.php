<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insert($content, $count_w, $time_t){
            try {
                $sql = "INSERT INTO essay_word (essay_content, word_count, time_taken) VALUES (:content, :count_w, :time_t)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':content',$content);
                $stmt->bindparam(':count_w',$count_w);
                $stmt->bindparam(':time_t',$time_t);
            
                $stmt->execute();
                return true;        //True?

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // public function getRecord()
    }
?>