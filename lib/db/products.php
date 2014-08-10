<?php
class Products {
/*
    public $id;
    public $group;
    public $lot_no;
    public $name;
    public $spec;
    public $created_time;
    public $updated_time;
*/
    public $db;
    
    function Products($db) {
        $this->db = $db;
        if(DB_DEBUG)
            echo "<br/>Create Products<br/>";
    }
    
    //curd: create, update, read, delete
    public function create($group, $lot_no, $name, $spec) {
        $time = time();
        $sql ="INSERT INTO `products`(`group`, `lot_no`, `name`, `spec`, `created_time`, `updated_time`) VALUES ('$group', '$lot_no', '$name', '$spec', FROM_UNIXTIME($time), FROM_UNIXTIME($time))";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function update($id, $group = NULL, $lot_no = NULL, $name = NULL, $spec = NULL) {
        $sql = "UPDATE `products` SET ";
        if (!$id || ($group == NULL && $lot_no == NULL && $name == NULL && $spec == NULL)) {
            return;
        }
        if ($group)
            $sql .=" `group`='$group',";
        if ($lot_no)
            $sql .= " `lot_no`='$lot_no',";
        if ($name)
            $sql .= " `name`='$name',";
        if ($spec)
            $sql .= " `spec`='$spec',";
        $sql = rtrim($sql, ",");
        $sql .= " WHERE `id`=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }

    public function read() {
        $sql = "SELECT * FROM `products`";
        $result = $this->db->query($sql);
        while($row = mysqli_fetch_array($result)) {
            if(DB_DEBUG) {
                var_dump($row);
                echo "<br/>";
            }
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM `products` WHERE id=$id";
        $result = $this->db->query($sql);
        if (DB_DEBUG)
            var_dump($result);
    }
} 

?>
