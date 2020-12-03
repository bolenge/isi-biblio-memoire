<div class="row small-spacing">
    <div class="col-xs-12">
        <h3>Liste de types de catégories</h3>
        <div class="box-content">
            <table id="table-types-categories" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Date</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Date</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php for ($i = 1;$i < 6;$i++) : ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-center">12/10/2009</td>
                        <td>Livre</td>
                        <td>Alex</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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