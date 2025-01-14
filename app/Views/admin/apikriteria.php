
<?php


class apikriteria
{
    private $conn;
    private $table_name = "ahp_analisa_kriteria";

    public $kp;
    public $nak;
    public $hak;
    public $kk;
    public $bb;
    public function __construct()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $this->conn = $db;
    }
    function readAll2()
    {

        $query = "SELECT * FROM ahp_data_kriteria";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function countAll()
    {

        $query = "SELECT * FROM ahp_data_kriteria";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
    }



    function insert($a, $b, $c)
    {

        $query = "insert into " . $this->table_name . " values('$a','$b','','$c')";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function insert2($a, $b, $c)
    {

        $query = "update " . $this->table_name . " set hasil_analisa_kriteria = '$a' where id_kriteria1 = '$b' and id_kriteria2 = '$c'";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function insert3($a, $b)
    {

        $query = "update ahp_data_kriteria set jumlah_kriteria='$a' where id_kriteria11='$b'";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function insert4($a, $b)
    {

        $query = "update ahp_data_kriteria set bobot_kriteria='$a' where id_kriteria11='$b'";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function insert5($a, $b)
    {

        $query = "update tb_kriteria set bobot='$a' where id_kriteria='$b'";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function readAll()
    {

        $query = "SELECT * FROM ahp_data_kriteria";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readAll1($a, $b)
    {

        $query = "SELECT * FROM " . $this->table_name . " where id_kriteria1 = '$a' and id_kriteria2 = '$b' LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->kp = $row['nilai_analisa_kriteria'];
    }



    function readSum1($a)
    {

        $query = "SELECT sum(nilai_analisa_kriteria) as jumkr FROM " . $this->table_name . " where id_kriteria2 = '$a'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nak = $row['jumkr'];
    }

    function getIr($n)
    {
        switch ($n) {
            case 3:
                $r = 0.58;
                break;
            case 4:
                $r = 0.90;
                break;
            case 5:
                $r = 1.12;
                break;
            case 6:
                $r = 1.24;
                break;
            case 7:
                $r = 1.32;
                break;
            case 8:
                $r = 1.41;
                break;
            case 9:
                $r = 1.45;
                break;
            case 10:
                $r = 1.49;
                break;
            case 11:
                $r = 1.51;
                break;
            case 12:
                $r = 1.48;
                break;
            case 13:
                $r = 1.56;
                break;
            case 14:
                $r = 1.57;
                break;
            case 15:
                $r = 1.59;
                break;

            default:
                $r = 0.00;
                break;
        }
        return $r;
    }

    function readSum2($a)
    {

        $query = "SELECT sum(hasil_analisa_kriteria) as jumkr2 FROM " . $this->table_name . " where id_kriteria2 = '$a'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nak = $row['jumkr2'];
    }

    function readSum3()
    {

        $query = "SELECT sum(bobot_kriteria) as bbkr FROM ahp_data_kriteria";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->bb = $row['bbkr'];
    }

    function readAvg($a)
    {

        $query = "SELECT avg(hasil_analisa_kriteria) as avgkr FROM " . $this->table_name . " where id_kriteria1 = '$a'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->hak = $row['avgkr'];
    }

    // update the product
    function update($a, $b, $c)
    {

        $query = "UPDATE  " . $this->table_name . "  SET nilai_analisa_kriteria = '$b' WHERE id_kriteria1 = '$a' and id_kriteria2 = '$c'";

        $stmt = $this->conn->prepare($query);
        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete the product
    function delete()
    {

        $query = "DELETE FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        if ($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>