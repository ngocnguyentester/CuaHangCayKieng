<?php
class PHANLOAI
{
    private $id;
    private $tenpl;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettenpl()
    {
        return $this->tenpl;
    }

    public function settenpl($value)
    {
        $this->tenpl = $value;
    }

    // Lấy danh sách
    public function layphanloai()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM phanloai";
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
    public function layphanloaitheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM phanloai WHERE id=:id";
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
    public function themphanloai($phanloai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO phanloai(tenpl) VALUES(:tenpl)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenpl", $phanloai->tenpl);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoaphanloai($phanloai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM phanloai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $phanloai->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suaphanloai($phanloai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE phanloai SET tenpl=:tenpl WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenpl", $phanloai->tenpl);
            $cmd->bindValue(":id", $phanloai->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
