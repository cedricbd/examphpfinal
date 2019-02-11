<?php ob_start(); ?>

<a href="<?= url('conducteurs/add') ?>">Ajouter un conducteur</a>

<table class="table table-striped">

    <tr>

        <th>#</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Edition</th>
        <th>Suppression</th>

    </tr>

    <?php foreach($conducteurs as $conducteur) : ?>

        <tr>

            <td>

                <a href="<?= url('conducteurs/' . $conducteur->id())?>">

                    <?= $conducteur->id() ?>
                </a>
            </td>

            <td><?= $conducteurs->prenom() ?></td>
            <td><?= $conducteurs->nom() ?></td>

            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id() . '/edit')?>">

                    <i class="fas fa-pencil-alt"></i>

                </a>

            </td>

            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id() . '/delete')?>" class="delete">

                    <i class="fas fa-trash-alt"></i>

                </a>

            </td>

        </tr>

    <?php endforeach; ?>
    
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>