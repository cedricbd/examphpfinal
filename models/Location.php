<?php
class Location extends Db {

    protected $id;
    protected $id_vehicule;
    protected $id_conducteur;

    const TABLE_NAME = 'association_vehicule_conducteur';

    public function __construct($id_vehicule, $id_conducteur, $id = null) {
        $this->setIdVehicule($id_vehicule);
        $this->setIdConducteur($id_conducteur);
        $this->setId($id);
    }

    /**
     * Get the value of id
     */ 
    public function id()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of id_vehicule
     */ 
    public function idVehicule()
    {
        return $this->id_vehicule;
    }
    /**
     * Set the value of id_vehicule
     *
     * @return  self
     */ 
    public function setIdVehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }
    /**
     * Get the value of id_conducteur
     */ 
    public function idConducteur()
    {
        return $this->id_conducteur;
    }
    /**
     * Set the value of id_conducteur
     *
     * @return  self
     */ 
    public function setIdConducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }  
    
    public static function findOne(int $id) {

        $data = Db::dbFind(self::TABLE_NAME, [
            ['id' => $id]
        ]);

        if(count($data) > 0) $data = $data[0];
        else return;

        $location = new Location($data['id_vehicule'], $data['id_conducteur'], $data['id']);
        
        return $location;
    }

    public static function findAll() {

        $datas = Db::dbFind(self::TABLE_NAME);

        $location = [];

        foreach($datas as $data) {
            $locations[] = new Location($data['id'], $data['id_vehicule'], $data['id_conducteur']);
        }

        return $location;
    }

    public function save() {

        $data = [

            "id_vehicule"     => $this->idVehicule(),
            "id_conducteur"    => $this->idConducteur(),
        ];

        if ($this->id() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);

        return $this;
    }
    public function update() {

        if ($this->id > 0) {

            $data = [
                "id_vehicule"      => $this->idVehicule(),
                "id_conducteur"    => $this->idConducteur(),
                "id"               => $this->id()
            ];

            Db::dbUpdate(self::TABLE_NAME, $data, 'id_location');

            return $this;
        }

        return;

    }

    public function delete() {

        $data = [

            'id' => $this->id(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);

        // On supprime aussi tous les locations !
        Db::dbDelete(Location::TABLE_NAME, [
            'id_conducteur' => $this->id()
        ]);

        return;

    }

    public function vehicule() {

        return Vehicule::findOne($this->idVehicule());
    }

    public function conducteur() {

        return Conducteur::findOne($this->idConducteur());
    }
    
}