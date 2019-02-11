<?php ob_start(); ?>

<a href="<?= url('locations/add') ?>">Ajouter un élément</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Conducteur</th>
        <th>Vehicule</th>
        <th></th>
    </tr>

    <?php foreach($locations as $location) : ?>
        <tr>
            <td><?= $location->id() ?></td>
            <td><?= $location->conducteur()->nomComplet() ?></td>
            <td><?= $location->vehicule()->infoVehicule() ?></td>
            <td>
                <a href="<?= url('locations/' . $location->id() . '/delete')?>" class="delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>