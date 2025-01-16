<?php
class User{
    private $nama;
    private $akun;
    private $sandi;

    public function __construct(string $nama, string $akun, string $sandi){
       
        $this->nama = $this->validateNama($nama);
        $this->akun = $this->validateAkun($akun);
        $this->sandi = $this->validateSandi($sandi);
       
    }

    private function validateNama(string $nama) : string {
        $namePatern = "/^[a-zA-Z]+$/";
        $nama = trim($nama);
        if (empty($nama)) {
            throw new Exception("Nama tidak valid");
        }
        if (!preg_match($namePatern, $nama)){
            throw new Exception("Nama tidak valid");
        }
        $nama = strtolower($nama);
        return $nama;
    }
    
    private function validateAkun (string $akun) : string {
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $akun = trim($akun);
        if (!preg_match($pattern, $akun)){
            throw new Exception("Akun tidak valid");
        }
        if(!filter_var($akun,FILTER_VALIDATE_EMAIL)){
            throw new Exception("Akun tidak valid");
        }
        return $akun;
    }

    private function validateSandi ($sandi) : string {
        $sandi = trim($sandi);
        if (empty($sandi)){
            throw new Exception("Sandi tidak valid");
        }
        return $sandi;
    }

    public function setNama($nama) : void {
        $this->nama  = $this->validateNama($nama);
    }

    public function setAkun($akun) : void {
        $this->akun = $this->validateAkun($akun);
    }

    public function setSandi($sandi) :void {
        $this->sandi = $this->validateSandi($sandi);
    }

    public function getNama(): string{
        return $this->nama;
    }

    public function getAkun(): string{
        return $this->akun;
    }
    
    public function getSandi(): string{
        return $this->sandi;
    }
}