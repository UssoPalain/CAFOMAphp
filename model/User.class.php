<?php
class User implements JsonSerializable{
    private $login;
    private $mdp;
    private $role;
    private $valide;

    function __construct($login, $mdp, $role, $valide) {
        $this->login = $login;
        $this->mdp = $mdp;
        $this->role = $role;
        $this->valide = $valide;
    }
    public function jsonSerialize() {
        return [
            'login' => $this->login,
            'mdp' => $this->mdp,
            'role' => $this->role,
            'valide' => $this->valide
        ];
    }
    public function __toString() {
        return "login=".$this->login." mdp=".$this->mdp." role=".$this->role." valide=".$this->valide;
    }

    public function getLogin(){return $this->login;}
    public function setLogin($login){$this->login = $login;}

    public function getMdp(){return $this->mdp;}
    public function setMdp($mdp){$this->mdp = $mdp;}
    
    public function getRole(){return $this->role;}
    public function setRole($role){$this->role = $role;}

    public function getValide(){return $this->valide;}
    public function setValide($valide){$this->valide = $valide;}
}