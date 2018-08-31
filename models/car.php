<?php 
 class Car {
   private $db;
   private $conn;

   public $name;
   public $models;
   public $numberPlate;
   public $fee;

   public function __construct($db) {
     $this->conn = $db;
   }

   // Create Car
   public function createCar() {
      // Create query
      $query = 'INSERT INTO ' . 
        $this->table . ' 
        SET
        id = :id,
        name = :name,
        models = :models,
        numberPlate = :numberPlate,
        fee = :fee ';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

         // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':models', $this->models);
      $stmt->bindParam(':numberPlate', $this->numberPlate);
      $stmt->bindParam(':fee', $this->fee);

      // Execute query
      if($stmt->execute() === true) {
        echo "Record Created Successfully";
      } else {
        echo "Error creating record: " . $stmt->error;
      }
   }

   public function readCar() {
     // Select all data
    $query = "SELECT 
        id, name, models, numberPlate, fee
        FROM " . 
        $this->table . "
        ORDER BY 
          id";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);    

    // Execute Statement
    $stmt->execute();

    return $stmt;

   }

   public function singleCar() {
      // create query
      $query = "SELECT id FROM ". $this->table . "limit 0,1";

      // Prepare Statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute Statement
      $stmt->execute();

      // Fetch data
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set Properties
      $this->name = $row['name'];
      $this->models = $row['models'];
      $this->numberPlate = $row['numberPlate'];
      $this->fee = $row['fee'];
   }

   public function updateCar() {
     // Create query
     $query = 'UPDATE ' . $this->table .' SET name = :name, models = :models, numberPlate = :numberPlate, fee = :fee WHERE id = :id';

     // Prepare Statement
     $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':models', $this->models);
    $stmt->bindParam(':numberPlate', $this->numberPlate);
    $stmt->bindParam(':fee', $this->fee);

    // Execute Statement
    if($stmt->execute() === true) {
      echo "Record Updated Successfully";
    } else {
      echo "Error updating record";
    }
   }

   public function deleteCar() {
     // Create query
     $query = 'DELETE FROM ' . $this->table . 'WHERE id = :id';

     // Prepare statement
     $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam(':id', $this->id);

     // Execute statement
     if($stmt->execute() === true) {
      echo "Record Deleted Successfully";
    } else {
      echo "Error deleting record";
    }
   }
 }
?>