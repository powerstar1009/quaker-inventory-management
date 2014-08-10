<?php
class Imports {
/*
    public $id;
    public $inventories_id;
    public $date;
    public $quantity;
    public $created_time;
    public $updated_time;
*/
    public $db;

    function Imports($db) {
        $this->db = $db;
        if(DB_DEBUG)
            echo "<br/>Create Imports<br/>";
    }
    
    //curd: create, update, read, delete
    public function create($inventories_id, $date, $quantity) {
        $time = time();
        $sql ="INSERT INTO `imports`(`inventories_id`, `date`, `quantity`, `created_time`, `updated_time`) VALUES ($inventories_id, '$date', $quantity, FROM_UNIXTIME($time), FROM_UNIXTIME($time))";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function update($id, $date = NULL, $quantity = NULL) {
        $sql = "UPDATE `imports` SET ";
        if (!$id || ($date == NULL && $quantity == NULL)) {
            return;
        }
        if ($date)
            $sql .=" `date`='$date',";
        if ($quantity)
            $sql .=" `quantity`='$quantity',";
        $sql = rtrim($sql, ",");
        $sql .= " WHERE `id`=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function read() {
        $sql = "SELECT * FROM `imports`";
        $result = $this->db->query($sql);
        while($row = mysqli_fetch_array($result)) {
            if(DB_DEBUG) {
                var_dump($row);
                echo "<br/>";
            }
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM `imports` WHERE id=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }
    
} 

?>
