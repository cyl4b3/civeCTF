<?php

//post object

class Post{

    private $conn;
    private $table_name = "posts";

    public $post_id;
    public $post_title;
    public $post_pic_arr;
    public $post_pic;
    public $post_body;
    public $created_at;
    public $user_id;
    public $posts = [];

    public function __construct($db){
        $this->conn = $db;
    }

    public function savePic($file){

        foreach($file['post_pic'] as $picVar => $picArr){

            $post_pic_name = basename($picArr['name']);
            $post_pic_ext = explode('.', $picArr['name'])[1];
            $post_pic_size = $picArr['size'];
            $post_pic_type = $picArr['type'];
            $post_pic_tmp = $picArr['tmp_name'];

        }
        
        $target_path   = "uploads/"; 
        $target_file   =  $target_path.$post_pic_name;

        // Check if it's an image? 
        if( ( strtolower( $post_pic_ext ) == 'jpg' || strtolower( $post_pic_ext ) == 'jpeg' || strtolower( $post_pic_ext ) == 'png' ) && 
            ( $post_pic_size < 500000 ) && 
            ( $post_pic_type == 'image/jpeg' || $post_pic_type == 'image/png' ) && 
            getimagesize( $post_pic_tmp ) ) { 
            
            chdir('../'); //change dir up one level
            
            // Can we move the file to the web root from the temp folder? 
            if( move_uploaded_file($post_pic_tmp, $target_file) ) { 

                $this->post_pic = $post_pic_name;
                
                return true; 
            } 

        } 
        else { 
            // Invalid file 
            return false; 
        } 

    }

    public function savePost(){
        
        $query = "INSERT INTO ".$this->table_name." SET post_title = :post_title, post_pic = :post_pic, post_body = :post_body, created_at = :created_at, user_id = :user_id";
        
        $stmt = $this->conn->prepare($query);

        $this->post_title = htmlspecialchars(strip_tags($this->post_title));
        $this->post_body = htmlspecialchars(strip_tags($this->post_body));

        $stmt->bindParam(':post_title', $this->post_title);
        $stmt->bindParam(':post_pic', $this->post_pic);
        $stmt->bindParam(':post_body', $this->post_body);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':user_id', $this->user_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function fetchPosts(){

        $query = "SELECT * FROM ".$this->table_name." LIMIT 3";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            $this->posts = $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }else{
            echo "Error!";
        }
    }

    public function emptyPosts(){

        $query = "DELETE FROM ".$this->table_name." WHERE post_id > 1";

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

}

