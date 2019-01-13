<?php
require_once ('Db.php');
class CRUD extends Db {

    public function select($table) {
        $sql = "SELECT * FROM $table";
        $hasil = $this->connect()->query($sql);

        if(!$hasil) {
            echo "Terjadi kesalahan dalam query";
        }

        if($hasil->rowCount() > 0) {
        while($row = $hasil->fetch()) {
            $data[] = $row;
        }
      }  

        return $data;
    }

    public function select_panti() {
        $sql = "SELECT * FROM panti JOIN pemilik_panti ON panti.id_pemilik=pemilik_panti.id_pemilik WHERE panti.id_pemilik=pemilik_panti.id_pemilik";
        $hasil = $this->connect()->query($sql);

        if(!$hasil) {
            echo "Terjadi kesalahan dalam query";
        }

        if($hasil->rowCount() > 0) {
        while($row = $hasil->fetch()) {
            $data[] = $row;
        }
      }  

        return $data;
    }

    public function list_panti() {
        $sql = "SELECT * FROM panti JOIN pemilik_panti ON panti.id_pemilik=pemilik_panti.id_pemilik WHERE panti.id_pemilik=pemilik_panti.id_pemilik AND status_panti='verified'";
        $hasil = $this->connect()->query($sql);

        if(!$hasil) {
            echo "Terjadi kesalahan dalam query";
        }

        if($hasil->rowCount() > 0) {
        while($row = $hasil->fetch()) {
            $data[] = $row;
        }
      }  

        return $data;
    }

    public function detail_panti($id_panti) {
        $sql = "SELECT * FROM panti JOIN pemilik_panti ON panti.id_pemilik=pemilik_panti.id_pemilik WHERE panti.id_pemilik=pemilik_panti.id_pemilik AND status_panti='verified' AND id_panti='$id_panti'";
        $hasil = $this->connect()->query($sql);

        if(!$hasil) {
            echo "Terjadi kesalahan dalam query";
        }

        if($hasil->rowCount() > 0) {
        while($row = $hasil->fetch()) {
            $data[] = $row;
        }
      }  

        return $data;
    }

    public function insert($table, $data) {
        $implodeColumns = implode(', ',array_keys($data));
        $implodePlaceholder = implode(", :",array_keys($data));
        $sql = "INSERT INTO $table ($implodeColumns) VALUES (:".$implodePlaceholder.")";
        $stmt = $this->connect()->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':'.$key,$value);
        }

        $stmtExect = $stmt->execute();

        if(!$stmtExect) {
            throw new Exception("Error");
        }
    }

    public function selectOne($table, $id, $primary) {
        $sql = "SELECT * FROM $table WHERE $primary=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($table, $fields, $id, $primary) {
        $st = "";
        $counter = 1;
        $total_fields = count($fields);
        foreach($fields as $key => $value) {
            if($counter === $total_fields) {
                $set = "$key = :".$key;
                $st = $st.$set;
            }
            else {
                $set = "$key = :".$key.", ";
                $st = $st.$set;
                $counter++;
            }
        }

        $sql = "";
        $sql.= "UPDATE $table SET ".$st;
        $sql.=" WHERE $primary = ".$id;

        $stmt = $this->connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $stmt->bindValue(':'.$key, $value);
        }

        $stmtExect = $stmt->execute();

        if(!$stmtExect) {
            throw new Exception("Error");
        }
    }

    public function destroy($table, $id, $primary) {
        $sql = "DELETE FROM $table WHERE $primary = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
    
    
}