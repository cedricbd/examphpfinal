<?php
class ConducteursController {
  
        public function index() {

            $conducteurs = Conducteur::findAll();
            view('conducteurs.index', compact('conducteurs'));
        }

        public function show($id) {

            $conducteur = Conducteur::findOne($id);
            view('conducteurs.show', compact('conducteur'));
        }

        public function add() {

            view('conducteurs.add');

        }

        public function save() {

            $conducteur = new Conducteur($_POST['prenom'], $_POST['nom'], $_POST['id']);
            $conducteur->save();
            Header('Location: '. url('conducteurs'));
            exit();
        }

        public function edit($id) {

            $conducteur = Conducteur::findOne($id);
            view('conducteurs.add', compact('conducteur'));
        }

        public function delete($id) {

            $conducteur = Conducteur::findOne($id);
            $conducteur->delete();
            Header('Location: '. url('conducteurs'));
        }   
    }