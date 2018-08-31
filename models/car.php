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
 }
?>