<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <table id="example-edit" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Auteur</th>
                        <th>Date soumise</th>
                        <th>Fichiers</th>
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
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
    <!-- /.col-xs-12 -->
</div>