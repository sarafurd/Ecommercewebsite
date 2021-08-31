<?php
// The Product objects
class Product{

      //database connection
      private $conn;
      private $table_name="products";

      //object properties
      public $id;
      public $brand;
      public $scent;
      public $volume;
      public $image;
      public $name;
      public $price;
      public $description;
      public $category_id;
      public $category_name;
      public $timestamp;

      //constructor
      public function __construct($db){
        $this->conn = $db;
      }

      //read all the products from the db
      function read($from_record_num, $records_per_page){

        // select all products query
        $query = "SELECT
                    id, name, description, price, scent
                FROM
                    " . $this->table_name . "
                ORDER BY
                    created ASC
                LIMIT
                    ?, ?";

          //prepare query statement
          $stmt = $this->conn->prepare($query);

          // bind limit clause variables
          $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
          $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

          // execute query
          $stmt->execute();

          // return values
          return $stmt;
      }

      //read all the products from the db
      function read_by_scent($from_record_num, $records_per_page, $scent){

        // select all products query
        $query = "SELECT
                    id, name, description, price, scent
                FROM
                    " . $this->table_name . "
                WHERE scent=? ORDER BY
                    created ASC";
             //   LIMIT
            //        ?, ?";

          //prepare query statement
          $stmt = $this->conn->prepare($query);
          /*
          if(!empty($_GET['scent'])) {
            $scent = $_GET['scent'];
          } else {
            $scent = '';
          }*/
          // bind limit clause variables
          $stmt->bindParam(1, $scent, PDO::PARAM_STR );
         // $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
         // $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);

          // execute query
          $stmt->execute();

          // return values
          return $stmt;
      }

      function read_by_brand($from_record_num, $records_per_page, $brand){

        // select all products query
        $query = "SELECT
                    id, name, description, price, image,scent
                FROM
                    " . $this->table_name . "
                WHERE brand=? ORDER BY
                    created ASC";
             //   LIMIT
            //        ?, ?";

          //prepare query statement
          $stmt = $this->conn->prepare($query);
          //var_dump($query);
          /*
          if(!empty($_GET['scent'])) {
            $scent = $_GET['scent'];
          } else {
            $scent = '';
          }*/
          // bind limit clause variables
          $stmt->bindParam(1, $brand, PDO::PARAM_STR );
         // $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
         // $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);

          // execute query
          $stmt->execute();

          // return values
          return $stmt;
      }

      //used for pagination
      public function count(){
        // query to count all product records
        $query = "SELECT count(*) FROM " . $this->table_name;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        // get row value return array index is column
        $rows = $stmt->fetch(PDO::FETCH_NUM);

        // return count  /total rows
        return $rows[0];
      }

      // read all product based on product ids included in the $ids variable
      public function readByIds($ids){

          $ids_arr = str_repeat('?,', count($ids) - 1) . '?';

          // query to select products
          $query = "SELECT id, name, price FROM " . $this->table_name . " WHERE id IN ({$ids_arr}) ORDER BY name";

          // prepare query statement
          $stmt = $this->conn->prepare($query);

          // execute query
          $stmt->execute($ids);

          // return values from database
          return $stmt;
      }

      public function compareProductsByScent($scent) {

        // query to select products
        $query = "SELECT id, name, price, brand,image FROM " . $this->table_name . " WHERE scent IN ('" . $scent . "') ORDER BY name";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }

}
?>
