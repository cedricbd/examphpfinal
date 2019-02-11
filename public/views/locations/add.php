<?php ob_start(); ?>

<form action="<?= url('locations/save') ?>" method="post">

    <select name="id_conducteur" class="form-control">

        <?php foreach ($conducteurs as $conducteur): ?>
            <option value="<?= $conducteur->id()?>"><?= $conducteur->nomComplet()?></option>

        <?php endforeach; ?>

    </select>

    <select name="id_vehicule" class="form-control">

        <?php foreach ($vehicules as $vehicule): ?>

            <option value="<?= $vehicule->id()?>"><?= $vehicule->infoVehicule()?></option>

        <?php endforeach; ?>

    </select>

    <button type="submit" class="btn btn-success">Ajouter une location</button>

</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>