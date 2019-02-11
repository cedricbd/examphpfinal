<?php
class VehiculesController {
    
    public function index() {

        $vehicules = Vehicule::findAll();
        view('vehicules.index', compact('vehicules'));
    }

    public function show($id) {

        $vehicule = Vehiclue::findOne($id);
        view('vehicules.show', compact('vehicule'));
    }

    public function add() {

        view('vehicules.add');
    }

    public function save() {

        $vehicule = new Vehicule($_POST['marque'], $_POST['modele'],$_POST['couleur'],$_POST['immatriculation'],  $_POST['id']);
        $vehicule->save();
        Header('Location: '. url('vehicules'));
        exit();
    }

    public function edit($id) {

        $vehicule = Vehicule::findOne($id);
        view('vehicules.add', compact('vehicule'));
    }

    public function delete($id) {

        $vehicule = Vehicule::findOne($id);
        $vehicule->delete();
        Header('Location: '. url('vehicules'));

    }
}    