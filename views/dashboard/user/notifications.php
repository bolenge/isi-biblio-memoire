<div class="content">
    <div class="row">
        <div class="col-lg-12">

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Notifications</h4>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table">
                            <tbody>
                                <?php if (!empty($notifications)) : ?>
                                    <?php foreach ($notifications as $notification) : ?>
                                        <tr>
                                            <td>
                                                <?= $notification->content ?>
                                                <br><br><a href="#" class="text-danger">Supprimer <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td>Vous n'avez aucune notification pour l'instant...</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>