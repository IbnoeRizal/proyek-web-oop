<?php 
include_once __DIR__."/../include/autoload.inc.php";

final class Userctrl extends Dbh
{
    private $user;

    public function __construct(string $name, string $email, string $pwd)
    {
        $this->user = new User($name,$email,$pwd);
    }

    public function cekValidObjData() : int {
        $koneksi = self::connection();
        $stm = "SELECT sandi FROM pengguna WHERE akun = ?";
        $stmt = $koneksi->prepare($stm);
        $stmt->execute([$this->user->getAkun()]);
        $result = $stmt->fetch();
        if (!$result) {
            return 0;
        }
        if (!password_verify($this->user->getSandi(),$result["sandi"])) {
            return -1;
        }
        return 1;
    }

    public function insertData () : bool {
        if ($this->cekValidObjData()<=0) {
            $dataarr = [$this->user->getNama(),$this->user->getAkun(),password_hash($this->user->getSandi(),PASSWORD_DEFAULT)];
            $koneksi = self::connection();
            $stm = "INSERT INTO pengguna (nama,akun,sandi) VALUES (?, ?, ?)";
            $stmt = $koneksi->prepare($stm);
            $stmt->execute($dataarr);
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
