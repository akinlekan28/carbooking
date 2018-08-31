<?php
Abstract class DataBase {
      // DB Params
      private $dbinfo = "127.0.0.1:3306",
                  $dbuser = "root",
                  $dbpassword = "",
                  $database = "LuxuryCars",
                  $db;

      // DB Connect
      public static function connect() {
            self::$db = null;
            try {
                  self::$db = new PDO("mysql:host=self::$dbinfo;dbname=self::$database", self::$dbuser, self::$dbpassword);
                  self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                  // echo "Connected successfully"	;
            } catch(PDOEXCEPTION $e) {
                  $errorMessage = "Connection Failed!" . $e->getMessage();
                  trigger_error($errorMessage);
            }

            return self::$db;
      }
}
?>