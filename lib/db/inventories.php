<?php
class Inventories {
/*
    public $id;
    public $products_id;
    public $exp;
    public $quantity;
    public $created_time;
    public $updated_time;
*/
    public $db;

    function Inventories($db) {
        $this->db = $db;
        if(DB_DEBUG)
            echo "<br/>Create Inventories<br/>";
    }
    
    //curd: create, update, read, delete
    public function create($products_id, $exp, $quantity) {
        $time = time();
        $sql ="INSERT INTO `inventories`(`products_id`, `exp`, `quantity`, `created_time`, `updated_time`) VALUES ('$products_id', '$exp', $quantity, FROM_UNIXTIME($time), FROM_UNIXTIME($time))";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function update($id, $exp = NULL, $quantity = NULL) {
        $sql = "UPDATE `inventories` SET ";
        if (!$id || ($exp == NULL && $quantity == NULL)) {
            return;
        }
        if ($exp)
            $sql .=" `exp`='$exp',";
        if ($quantity)
            $sql .= " `quantity`='$quantity',";
        $sql = rtrim($sql, ",");
        $sql .= " WHERE `id`=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function read() {
        $sql = "SELECT * FROM `inventories`";
        $result = $this->db->query($sql);
        while($row = mysqli_fetch_array($result)) {
            if(DB_DEBUG) {
                var_dump($row);
                echo "<br/>";
            }
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM `inventories` WHERE id=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }
    
} 

?>
