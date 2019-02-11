<?php ob_start(); 
?>

<form action="<?= url('conducteurs/save') ?>" method="post">

    <input type="hidden" name="id"     value="<?= (isset($conducteur)) ? $conducteur->id() : '' ?>">
    <input type="text"   name="prenom" value="<?= (isset($conducteur)) ? $conducteur->prenom() : '' ?>" placeholder="Prenom" class="form-control">
    <input type="text"   name="nom"    value="<?= (isset($conducteur)) ? $conducteur->nom() : '' ?>"    placeholder="Nom"    class="form-control">

    <button type="submit" class="btn btn-<?= (isset($conducteur)) ? 'warning' : 'success' ?>">
        <?= (isset($conducteur)) ? 'Editer' : 'Créer' ?> un conducteur
    </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>