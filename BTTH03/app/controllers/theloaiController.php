<?php
require_once APP_ROOT.'/app/models/TheLoai.php';
require_once APP_ROOT.'/app/libs/DBConnection.php';
require_once APP_ROOT . '/app/services/theloaiService.php';
class theloaiController {
    public $theloaiService;

    public function __construct() {
        $this->theloaiService = new theloaiService();
    }

    public function index() {
        $arrTheLoai = $this->theloaiService->showTLService();
        require_once APP_ROOT.'/app/views/theloai.php';
    }

    public function add() {
        if(isset($_POST['btnAdd'])) {
            $tentheloai = $_POST['tentheloai'];
            $notiAdd = $this->theloaiService->createTL($tentheloai);
            header("Location: .?c=theloai&a=add&err=$notiAdd");
        }
        require_once APP_ROOT.'/app/views/TheLoai/add_theloai.php';
    }

    public function remove() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $notiRemove = $this->theloaiService->removeTL($id);
            header("Location: .?c=theloai&err=$notiRemove");
        }
        require_once APP_ROOT.'/app/views/theloai.php';
    }

    public function edit() {
        if(isset($_POST['btnEdit'])) {
            $id = $_GET['id'];
            $notiEdit = $this->theloaiService->editTL($id, $_POST['tentheloai']);
            header("Location: .?c=theloai&a=edit&err=$notiEdit");
        }
        require_once APP_ROOT.'/app/views/TheLoai/edit_theloai.php';
    }

}