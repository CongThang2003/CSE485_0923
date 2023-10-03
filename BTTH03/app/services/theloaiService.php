<?php
class theloaiService {
    private $db;
    public function __construct()
    {
        $this->db = new DBConnection();
        $this->db = $this->db->getConnection();
    }

    public function showTLService() : array {
        $query = "SELECT * FROM theloai";
        $stmt = $this->db->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $stmt = [];
        }
    }

    public function createTL($tentheloai) : string {
        $query_check = "SELECT * FROM theloai WHERE tenTheLoai = '$tentheloai'";
        $stmt = $this->db->prepare($query_check);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return 'Add failed. Category name already exist';
        }
        $query = "INSERT INTO theloai(tenTheLoai) VALUES ('$tentheloai')";
        $stmt = $this->db->prepare($query);
        if($stmt->execute()) {
            return 'Add success';
        } else {
            return 'Add failed';
        }
    }

    public function removeTL($id) {
        $query_baihat = "DELETE FROM baihat WHERE baihat.idTheLoai = $id";
        $stmt = $this->db->prepare($query_baihat);
        $stmt->execute();
        $query = "DELETE FROM theloai WHERE id = $id";
        $stmt = $this->db->prepare($query);
        if($stmt->execute()) {
            return 'Delete success';
        } else {
            return 'Delete failed';
        }
    }

    public function editTL($id, $tentheloai) : string {
        $query_check = "SELECT * FROM theloai WHERE tenTheLoai = '$tentheloai'";
        $stmt = $this->db->prepare($query_check);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return 'Edit failed. Category name already exist';
        }
        $query = "UPDATE theloai SET tenTheLoai = '$tentheloai' WHERE id = $id";
        $stmt = $this->db->prepare($query);
        if($stmt->execute()) {
            return 'Edit success';
        } else {
            return 'Edit failed';
        }
    }
}