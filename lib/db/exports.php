<?php
class Exports {
/*
    public $id;
    public $inventories_id;
    public $date;
    public $quantity;
    public $user;
    public $reason;
    public $created_time;
    public $updated_time;
*/
    public $db;

    function Exports($db) {
        $this->db = $db;
        if(DB_DEBUG)
            echo "<br/>Create Exports<br/>";
    }
    
    //curd: create, update, read, delete
    public function create($inventories_id, $date, $quantity, $user, $reason) {
        $time = time();
        $sql ="INSERT INTO `exports`(`inventories_id`, `date`, `quantity`, `user`, `reason`, `created_time`, `updated_time`) VALUES ($inventories_id, '$date', $quantity, '$user', '$reason', FROM_UNIXTIME($time), FROM_UNIXTIME($time))";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function update($id, $date = NULL, $quantity = NULL, $user = NULL, $reason = NULL) {
        $sql = "UPDATE `exports` SET ";
        if (!$id || ($date == NULL && $quantity == NULL&& $user == NULL && $reason == NULL)) {
            return;
        }
        if ($date)
            $sql .=" `date`='$date',";
        if ($quantity)
            $sql .=" `quantity`='$quantity',";
        if ($user)
            $sql .= " `user`='$user',";
        if ($reason)
            $sql .= " `reason`='$reason',";
        $sql = rtrim($sql, ",");
        $sql .= " WHERE `id`=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function read() {
        $sql = "SELECT * FROM `exports`";
        $result = $this->db->query($sql);
        while($row = mysqli_fetch_array($result)) {
            if(DB_DEBUG) {
                var_dump($row);
                echo "<br/>";
            }
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM `exports` WHERE id=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }
    
} 

?>
