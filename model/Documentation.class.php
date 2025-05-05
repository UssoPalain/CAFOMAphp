<?php
class Documentation implements JsonSerializable{
    private $idDocumentation;
    private $idFormation;
    private $titre;
    private $type;

    function __construct($idDocumentation, $idFormation, $titre, $type) {
        $this->idDocumentation = $idDocumentation;
        $this->idFormation = $idFormation;
        $this->titre = $titre;
        $this->type = $type;
    }
    public function jsonSerialize() {
        return [
            'idDocumentation' => $this->idDocumentation,
            'idFormation' => $this->idFormation,
            'titre' => $this->titre,
            'type' => $this->type
        ];
    }
    public function __toString() {
        return "idDocumentation=".$this->idDocumentation." idFormation=".$this->idFormation." titre=".$this->titre." type=".$this->type;
    }

    public function getIdDocumentation(){return $this->idDocumentation;}
    public function setIdDocumentation($idDocumentation){$this->idDocumentation = $idDocumentation;}

    public function getIdFormation(){return $this->idFormation;}
    public function setIdFormation($idFormation){$this->idFormation = $idFormation;}
    
    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getType(){return $this->type;}
    public function setType($type){$this->type = $type;}
}