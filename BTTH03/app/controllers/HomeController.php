<?php
require_once APP_ROOT.'/app/libs/DBConnection.php';
require_once APP_ROOT . '/app/services/BaiHatService.php';
class HomeController {

    private $songService;

    public function __construct() {
        $this->songService = new BaiHatService();
    }
    public function index() {
        $arrSong = $this->songService->showBHService();
        require_once APP_ROOT.'/app/views/index.php';
    }

    public function addSong() {
        if(isset($_POST['songname'])) {
            $notiAdd = $this->songService->addSongService($_POST['songname'], $_POST['singer'], $_POST['cateid']);
            header("Location: .?a=addSong&err=$notiAdd");
        }
        require_once APP_ROOT.'/app/views/add_song.php';
    }

    public function removeSong() {
        if($_GET['id']) {
            $notiRemove = $this->songService->removeSongService($_GET['id']);
            header("Location: .?err=$notiRemove");
        }
        require_once APP_ROOT.'/app/views/index.php';
    }

    public function editSong() {
        if(isset($_POST['btnEditSong'])) {
            if(isset($_GET['id'])) {
                $notiEdit = $this->songService->editSongService($_GET['id'], $_POST['songname'], $_POST['singer'], $_POST['cateid']);
                header("Location: .?a=editSong&err=$notiEdit");
            }
        }
        require_once APP_ROOT.'/app/views/edit_song.php';
    }
}