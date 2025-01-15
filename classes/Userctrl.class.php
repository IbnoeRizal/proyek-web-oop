<?php 
require_once "../include/autoload.inc.php";

final class Userctrl extends Dbh
{
    private $user;

    public function __construct(string $name, string $email, string $pwd)
    {
        $this->user = new User($name,$email,$pwd);
    }

    public function cekValidObjData() : bool {
        $koneksi = self::connection();
        $stm = "SELECT count(akun) as jumlah FROM pengguna WHERE akun = ? AND sandi = ?";
        $koneksi->prepare($stm);
        $koneksi->execute([$this->user->getAkun(),$this->user->getSandi()]);
        $result = $koneksi->fetchColumn();
        if (!$result['jumlah']>0) {
            return false;
        }
        return true;
    }

    public function insertData () : bool {
        if (!$this->cekValidObjData()) {
            $dataarr = [$this->user->getNama(),$this->user->getAkun(),$this->user->getSandi()];
            $koneksi = self::connection();
            $stm = "INSERT INTO pengguna (nama,akun,sandi) VALUES (?, ?, ?)";
            $koneksi->prepare($stm);
            $koneksi->execute($dataarr);
            return true;
        }   
        return false;
    }

    public function setNama (string $nama) {
        $this->user->setNama($nama);  
    }

    public function setAkun(string $akun){
        $this->user->setAkun($akun);
    }

    public function setSandi(string $sandi){
        $this->user->setSandi($sandi);   
    }

    public function getNama () {
        return $this->user->getNama();  
    }

    public function getAkun(): string{
        return $this->user->getAkun();
    }
    








    

}
