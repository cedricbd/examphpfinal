<?php
class Conducteur extends Db {

    protected $id;
    protected $prenom;
    protected $nom;

    const TABLE_NAME = 'conducteur';

    public function __construct($prenom, $nom, $id = null) {
        $this->setNom($prenom);
        $this->setPrenom($nom);
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
     * Get the value of prenom
     */ 
    public function prenom()
    {
        return $this->prenom;
    }
    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    
        {
            if (strlen($prenom) == 0) {
                throw new Exception('Le prénom ne doit pas être nul.');
            }
            if (strlen($prenom) > 100) {
                throw new Exception('Le prénom ne doit pas être plus long que 100 caractères.');
            }
        
        $this->prenom = $prenom;
        return $this;
    }
    /**
     * Get the value of nom
     */ 
    public function nom()
    {
        return $this->nom;
    }
    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)

        {

         if (strlen($nom) == 0) {
            throw new Exception('Le nom ne doit pas être nul.');
        }
        if (strlen($nom) > 100) {
            throw new Exception('Le nom ne doit pas être plus long que 100 caractères.');
        }   

        $this->nom = $nom;

        return $this;

    }

    public function nomComplet() {

        return $this->prenom() . ' ' . $this->nom();
        
    }
    
     /**
     * CRUD Methods
     */
    public static function findOne(int $id) {

        $data = Db::dbFind(self::TABLE_NAME, [
            ['id', '=', $id]
        ]);
        
        if(count($data) > 0) $data = $data[0];
        else return;

        $conducteur = new Conducteur($data['prenom'], $data['nom'], $data['id']);
        
        return $conducteur;
    }

    public static function findAll() {

        $datas = Db::dbFind(self::TABLE_NAME);

        $conducteurs = [];

        foreach($datas as $data) {

            $conducteurs[] = new Conducteur($data['prenom'], $data['nom'], $data['id']);
        }

        return $conducteurs;
    }

    public function save() {

        $data = [
            "prenom"       => $this->prenom(),
            "nom"          => $this->nom(),
        ];

        if ($this->id() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);

        return $this;
    }

    public function update() {

        if ($this->id > 0) {

            $data = [
                "prenom"       => $this->prenom(),
                "nom"       => $this->nom(),
                "id"        => $this->id()
            ];
            
            Db::dbUpdate(self::TABLE_NAME, $data, 'id_conducteur');

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
        Db::dbDelete(Emprunt::TABLE_NAME, [
            'id_conducteur' => $this->id()
        ]);

        return;
    }
}