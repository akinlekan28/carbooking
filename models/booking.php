<?php

class Booking{

  private $db;
  private $conn;

  public function __construct($db) {
     $this->conn = $db;
   }

   public function createBooking($customerId, $carId, $duration){
     $sql = "INSERT INTO booking(customer_id, car_id, duration) VALUES (?, ?, ?)";
     $data = array($customerId, $carId, $duration);
     $statement = $this->conn->prepare($sql);
     try {
       $statment->execute($data);
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }
       return $statement;
   }

   public function viewBooking(){
      $sql = "SELECT * FROM booking";
     $statement = $this->conn->prepare($sql);
     try {
        $statement->execute();
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }   
     return $statement;
   }

   public function deleteBooking($bookingId){
     $sql = "DELETE FROM booking WHERE booking_id = ?";
     $data = array($bookingId);
     $statement = $this->conn->prepare($sql);
     try {
       $statment->execute($data);
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }
       return $statement;

   }
}

?>