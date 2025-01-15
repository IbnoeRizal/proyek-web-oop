<?php
class User{
    private $nama;
    private $akun;
    private $sandi;

    public function __construct(string $nama, string $akun, string $sandi){
       
        $this->nama = $this->validateNama($nama);
        $this->akun = $this->validateAkun($akun);
        $this->sandi = $this->validateSandi($sandi);

        if (!$this->validateOBJ()) {
            throw new Exception("Data tidak valid");
        }
       
    }

    private function validateNama(string $nama) : string {
        $namePatern = "/^[a-zA-Z]+$/";
        $nama = trim($nama);
        if (empty($nama)) {
            return null;
        }
        if (!preg_match($namePatern, $nama)){
            return null;
        }
        $nama = strtolower($nama);
        return $nama;
    }
    
    private function validateAkun (string $akun) : string {
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $akun = trim($akun);
        if (!preg_match($pattern, $akun)){
            return null;
        }
        if(!filter_var($akun,FILTER_VALIDATE_EMAIL)){
            return null;
        }
        return $akun;
    }

    private function validateSandi ($sandi) : string {
        $sandi = trim($sandi);
        if (empty($sandi)){
            return null;
        }
        return password_hash($sandi,PASSWORD_DEFAULT);
    }

    private function validateOBJ() : bool {
        if ($this->nama && $this->sandi &&$this->akun) {
            return true;
        }
        return false;
    }

    public function setNama($nama) : void {
        $validatedNama = $this->validateNama($nama);
        if ($validatedNama === null) {
            throw new Exception("Nama tidak valid");
        }
        $this->nama = $validatedNama;
    }

    public function setAkun($akun) : void {
        $validatedAkun = $this->validateAkun($akun);
        if ($validatedAkun === null) {
            throw new Exception("Akun tidak valid");
        }
        $this->akun = $validatedAkun;
    }

    public function setSandi($sandi) :void {
        $validatedSandi = $this->validateSandi($sandi);
        if ($validatedSandi === null) {
            throw new Exception("Sandi tidak valid");
        }
        $this->sandi = $validatedSandi;
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