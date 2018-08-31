<?php 

class Auth {

  protected $db;

   public function __construct($db)
   {
       $this->db = $db;
   }

   public function login($email, $password) 
   {
   	$sql = "SELECT * FROM customer WHERE email = ? AND password = ? ";
    $password = hash('sha256', $password);
    $data = array($email, $password);
    $statement = $this->db->prepare($sql);
    try {
       $statement->execute($data);
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       } 
    $userRow = $statement->fetch(PDO::FETCH_ASSOC);
    return $userRow;
   }

   public function register($customerName, $customerAddress, $customerPhone, $customerEmail, $password){
     $sql = "INSERT INTO customer(name, address, phone, email, password) VALUES (?, ?, ?, ?, ?)";
     $password = hash('sha256', $password);
     $data = array($customerName, $customerAddress, $customerPhone, $customerEmail, $password);
     $statment = $this->db->prepare($sql);
     try {
       $statment->execute($data);
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }
       return $statement;
   }

   public function checkEmail($email)
    {
      $sql = "SELECT * FROM customer WHERE email = ?";
      $data = array($email);
      $statement = $this->db->prepare($data);
       try {
       $statment->execute($data);
     } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql </p><p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }
      $userRow = $statement->fetch(PDO::FETCH_ASSOC);
      return $userRow;
    }
}

?>