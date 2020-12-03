<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h3>Liste de livres en attente</h3><br>

            <table id="table-list-other" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Auteur</th>
                        <th>Date soumise</th>
                        <th>Fichiers</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Auteur</th>
                        <th>Date soumise</th>
                        <th>Fichiers</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php for ($i = 1;$i < 6;$i++) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>Livre</td>
                        <td>Alex</td>
                        <td>Memoire</td>
                        <td>12/10/2009</td>
                        <td>
                            <a href="#">Docs <i class="fa fa-file-word-o"></i></a> |
                            <a href="#">Audio <i class="fa fa-play"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                            <a href="#" class="btn btn-success btn-xs">Valider et Publier</a>
                        </td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
    <!-- /.col-xs-12 -->
</div>