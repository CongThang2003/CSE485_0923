<?php
class TheLoai {
    private $id;
    private $tenTheLoai;

    /**
     * @param $tenTheLoai
     */
    public function __construct($tenTheLoai)
    {
        $this->tenTheLoai = $tenTheLoai;
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
    public function getTenTheLoai()
    {
        return $this->tenTheLoai;
    }
}