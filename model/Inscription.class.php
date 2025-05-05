<?php
class Inscription implements JsonSerializable{
    private $login;
    private $idFormation;

    function __construct($login, $idFormation) {
        $this->login = $login;
        $this->idFormation = $idFormation;
    }
    public function jsonSerialize() {
        return [
            'login' => $this->login,
            'idFormation' => $this->idFormation
        ];
    }
    public function __toString() {
        return "login=".$this->login." idFormation=".$this->idFormation;
    }

    public function getLogin(){return $this->login;}
    public function setLogin($login){$this->login = $login;}

    public function getIdFormation(){return $this->idFormation;}
    public function setIdFormation($idFormation){$this->idFormation = $idFormation;}
}