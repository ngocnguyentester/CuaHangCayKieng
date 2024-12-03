<?php
class KHUYENMAI
{
    private $id;
    private $ten_km;
    private $mota;
    private $ngay_bd;
    private $ngay_kt;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function getten_km()
    {
        return $this->ten_km;
    }

    public function setten_km($value)
    {
        $this->ten_km = $value;
    }
    public function getmota()
    {
        return $this->mota;
    }

    public function setmota($value)
    {
        $this->mota = $value;
    }
    public function getngay_bd()
    {
        return $this->ngay_bd;
    }

    public function setngay_bd($value)
    {
        $this->ngay_bd = $value;
    }
    public function getngay_kt()
    {
        return $this->ngay_kt;
    }

    public function setngay_kt($value)
    {
        $this->ngay_kt = $value;
    }

    // Lấy danh sách
    public function laykhuyenmai()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM khuyenmai";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // Lấy danh mục theo id
    public function laykhuyenmaitheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM khuyenmai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm mới
    public function themkhuyenmai($khuyenmaimoi)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO khuyenmai(ten_km,mota,ngay_bd,ngay_kt) VALUES(:ten_km,:mota,:ngay_bd,:ngay_kt)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ten_km", $khuyenmaimoi->ten_km);
            $cmd->bindValue(":mota", $khuyenmaimoi->mota);
            $cmd->bindValue(":ngay_bd", $khuyenmaimoi->ngay_bd);
            $cmd->bindValue(":ngay_kt", $khuyenmaimoi->ngay_kt);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoakhuyenmai($khuyenmai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM khuyenmai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $khuyenmai->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suakhuyenmai($khuyenmai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE khuyenmai SET tenkhuyenmai=:tenkhuyenmai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenkhuyenmai", $khuyenmai->tenkhuyenmai);
            $cmd->bindValue(":id", $khuyenmai->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
