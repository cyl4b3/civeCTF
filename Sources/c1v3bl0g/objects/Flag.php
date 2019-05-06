<?php

//flag object

class Flag{

    private $conn;
    private $table_name = "submissions";

    public $submission_id;
    public $name;
    public $difficulty;
    public $submitted_date;
    private $ctflags = array('ctf{Wh0a_Y0u_JuSt_BrUt3_F0rc3d_M3}', 'ctf{G00sh_LFIs_ArE_ReAllY_Bad}');

    public function __construct($db){
        $this->conn = $db;
    }

    public function checkFlag($flags){

        if(count(array_diff($this->ctflags, $flags)) === 0){
            //echo "True";
            return true; //0
        }
        
        else{
            //echo "False";
            return false; //>0
        }
        

    }

    public function saveFlag($name, $diff, $date){
        
        $this->name = $name;
        $this->difficulty = $diff;
        $this->submitted_date = $date;

        $query = "INSERT INTO ".$this->table_name." SET name = :name, difficulty = :difficulty, submitted_date = :submitted_date";
        
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->difficulty = htmlspecialchars(strip_tags($this->difficulty));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':difficulty', $this->difficulty);
        $stmt->bindParam(':submitted_date', $this->submitted_date);

        if($stmt->execute()){
            echo "Success";
            return true;
        }else{
            echo "Failed";
            return false;
        }
        
    }

    public function fetchWinners(){

        $query = "SELECT * FROM ".$this->table_name." ORDER BY submitted_date ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            $this->submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }else{
            echo "Error!";
        }
    }

}

