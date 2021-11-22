<?php
class Ttsanpham extends Db
{
    public function getAllTtsanpham()
    {
        $sql = self::$connection->prepare("SELECT * FROM ttsanpham");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTtsanphamById($masp)
    {
        $sql = self::$connection->prepare("SELECT * FROM ttsanpham WHERE masp = ?");
        $sql->bind_param("i",$masp);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getTtsanphamByManuId($mahangsx)
    {
        $sql = self::$connection->prepare("SELECT * FROM ttsanpham WHERE mahangsx = ?");
        $sql->bind_param("i", $mahangsx);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM ttsanpham 
        WHERE 'tensp' LIKE ? ");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}