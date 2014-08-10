<?php
class DB {
    private $host;
    private $name;
    private $user;
    private $pass;
    private $conn;
    
    public function open($db_host, $db_user, $db_pass, $db_name) {
        $this->host = $db_host;
        $this->name = $db_name;
        $this->user = $db_user;
        $this->pass = $db_pass;
        if (!$this->conn) {
            $this->conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if (mysqli_connect_error()) {
                echo '<script>alert(\"';
                die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
                echo '\")</script>';
            } else {
                if (DB_DEBUG)
                    var_dump($this->conn);
            }
        }
        return $this->conn;
    }

    public function get_connect() {
        return $this->conn;
    }

    public function close() {
        $this->conn->close();
    }

    public function query($sql) {
        echo $sql.'<br/>';
        return mysqli_query($this->conn, $sql);
    }

    function DB($db_host, $db_user, $db_pass, $db_name) {
        return $this->open($db_host, $db_user, $db_pass, $db_name);
    }
    
    function __destruct(){
        $this->close();
        if (DB_DEBUG)
            echo "DB close<br/>";
    }
}
?>
