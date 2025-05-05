<?php
class Formation implements JsonSerializable{
    private $idFormation;
    private $nom;
    private $description;
    private $age;
    private $niveau;
    private $image;
    private $createur;

    function __construct($idFormation, $nom, $description, $age, $niveau, $image,$createur) {
        $this->idFormation = $idFormation;
        $this->nom = $nom;
        $this->description = $description;
        $this->age = $age;
        $this->niveau = $niveau;
        $this->image = $image;
        $this->createur = $createur;
    }
    public function jsonSerialize() {
        return [
            'idFormation' => $this->idFormation,
            'nom' => $this->nom,
            'description' => $this->description,
            'age' => $this->age,
            'niveau' => $this->niveau,
            'image' => $this->image,
            'createur' => $this->createur
        ];
    }
    public function __toString() {
        return "idFormation=".$this->idFormation." nom=".$this->nom." description=".$this->description." age=".$this->age." niveau=".$this->niveau." image=".$this->image." createur=".$this->createur;
    }

    public function getIdFormation(){return $this->idFormation;}
    public function setIdFormation($idFormation){$this->idFormation = $idFormation;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}
    
    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;}

    public function getAge(){return $this->age;}
    public function setAge($age){$this->age = $age;}

    public function getNiveau(){return $this->niveau;}
    public function setNiveau($niveau){$this->niveau = $niveau;}
    
    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}
    
    public function getCreateur(){return $this->createur;}
    public function setCreateur($createur){$this->createur = $createur;}
}