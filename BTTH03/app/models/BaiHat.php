<?php
class BaiHat {
    private $id;
    private $tenBaiHat;
    private $caSi;
    private $idTheLoai;

    /**
     * @param $tenBaiHat
     * @param $caSi
     * @param $idTheLoai
     */
    public function __construct($tenBaiHat, $caSi, $idTheLoai)
    {
        $this->tenBaiHat = $tenBaiHat;
        $this->caSi = $caSi;
        $this->idTheLoai = $idTheLoai;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTenBaiHat()
    {
        return $this->tenBaiHat;
    }

    /**
     * @return mixed
     */
    public function getCaSi()
    {
        return $this->caSi;
    }

    /**
     * @return mixed
     */
    public function getIdTheLoai()
    {
        return $this->idTheLoai;
    }
}