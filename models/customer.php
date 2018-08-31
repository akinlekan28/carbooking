<?php 
 class Car {
   private $db;
   private $conn;

   public function __construct($db) {
     $this->conn = $db;
   }

   public function createCustomer($customerName, $customerAddress, $customerPhone, $customerEmail, $password){
     $sql = "INSERT INTO customer(name, address, phone, email, password) VALUES (?, ?, ?, ?, ?)";
     $password = hash('sha256', $password);
     $data = array($customerName, $customerAddress, $customerPhone, $customerEmail, $password);
     $statment = $this->conn->prepare($sql);
     try {
       $statment->execute($data);
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }
       return $statement;
   }

   public function updateCustomer($customerName, $customerAddress, $customerPhone, $customerEmail, $customerId){
      $sql = "UPDATE customer SET name = ? address = ? phone = ? email = ?  WHERE customer_id = ?";
      $data = array($customerName, $customerAddress, $customerPhone, $customerEmail, $customerId);
      $statement = $this->conn->prepare($sql);
     try {
       $statment->execute($data);
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }
       return $statement;
   }

   public function viewCustomers(){
     $sql = "SELECT * FROM customer";
     $statement = $this->conn->prepare($sql);
     try {
        $statement->execute();
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }   
     return $statement;
   }
 }
?>