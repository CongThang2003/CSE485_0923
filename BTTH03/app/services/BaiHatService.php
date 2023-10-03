<?php
require_once APP_ROOT.'/app/models/BaiHat.php';
class BaiHatService {
    private $songService;

    public function __construct()
    {
        $this->songService = new DBConnection();
        $this->songService = $this->songService->getConnection();
    }

    public function showBHService() : array {
        $query = "SELECT * FROM baihat";
        $stmt = $this->songService->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $stmt = [];
        }
    }

    public function addSongService($songname, $singer, $cateid) : string {
        $query_check = "SELECT * FROM baihat WHERE tenBaiHat = '$songname'";
        $stmt = $this->songService->prepare($query_check);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return 'Add failed. Song name already exist';
        }
        $query = "INSERT INTO baihat(tenBaiHat, caSi, idTheLoai) VALUES ('$songname', '$singer', $cateid)";
        $stmt = $this->songService->prepare($query);
        if($stmt->execute()) {
            return 'Add success';
        } else {
            return 'Add failed';
        }
    }

    public function removeSongService($id) : string {
        $query = "DELETE FROM baihat WHERE id = $id";
        $stmt = $this->songService->prepare($query);
        if($stmt->execute()) {
            return 'Delete success';
        } else {
            return 'Delete failed';
        }
    }

    public function editSongService($id, $songname, $singer, $cateid) : string {
        $query_check = "SELECT * FROM baihat WHERE tenBaiHat = '$songname'";
        $stmt = $this->songService->prepare($query_check);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return 'Edit failed. Category name already exist';
        }
        $query = "UPDATE baihat SET tenBaiHat = '$songname', caSi = '$singer', idTheLoai = $cateid WHERE id = $id";
        $stmt = $this->songService->prepare($query);
        if($stmt->execute()) {
            return 'Edit success';
        } else {
            return 'Edit failed';
        }
    }
}