<?php

class LocationsController {

    public function index() {

        $locations = Location::findAll();
        view('locations.index', compact('locations'));
    }

    public function add() {

        $conducteurs = Conducteur::findAll();
        $vehicules = Vehicule::findAll();
        view('locations.add', compact('conducteurs', 'vehicules'));
    }

    public function save() {

        $location = new Location($_POST['id_conducteur'], $_POST['id_vehicule'], $_POST['id']);
        $location->save();

        Header('Location: '. url('locations'));
        exit();
    }

    public function delete() {

    }
}