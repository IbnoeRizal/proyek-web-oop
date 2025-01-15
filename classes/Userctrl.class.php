<?php 
require_once "../include/autoload.inc.php";

final class Userctrl extends Dbh
{
    private $user;

    public function __construct($name,$email, $pwd)
    {
        $this->user = new User($name,$email,$pwd);
    }

    public function cekValidObjData() : bool {
        if (!$this->user->validateOBJ()) {
            return false;
        }
        $koneksi = self::connection();
        $stm = "SELECT count(akun) as jumlah FROM pengguna WHERE akun = ?";
        $koneksi->prepare($stm);
        $koneksi->execute([$this->user->getAkun()]);
        $result = $koneksi->fetchColumn();
        if (!$result['jumlah']>0) {
            return false;
        }
        return true;
    }

    public function insertData () : bool {
        if ($this->cekValidObjData()) {
            $dataarr = [$this->user->getNama(),$this->user->getAkun(),$this->user->getSandi()];
            $koneksi = self::connection();
            $stm = "INSERT INTO pengguna (nama,akun,sandi) VALUES (?, ?, ?)";
            $koneksi->prepare($stm);
            $koneksi->execute($dataarr);
            return true;
        }   
        return false;
    }

    public function setNama ($nama) {
        $this->user->setNama($nama);  
    }

    public function setAkun($akun){
        $this->user->setAkun($akun);
    }

    public function setSandi($sandi){
        $this->user->setSandi($sandi);   
    }

    public function getAkun($akun): string{
        return $this->user->getAkun($akun);
    }
    








    

}
