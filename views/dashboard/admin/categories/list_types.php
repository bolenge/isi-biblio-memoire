<div class="row small-spacing">
    <div class="col-xs-12">
        <h3>Liste de types de catégories</h3>
        <div class="box-content">
            <table id="table-types-categories" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th>Actions</th>
                        <th>Switch</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th>Actions</th>
                        <th>Switch</th>
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