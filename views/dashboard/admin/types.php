<div class="row small-spacing">
    <div class="col-sm-4 col-xs-12">
        <div class="box-content card white">
            <h4 class="box-title">Nouveau type</h4>
            <!-- /.box-title animate__animated animate__wobble -->
            <div class="card-content">
                <form>
                    <div class="form-group">
                        <label for="intituled">Intitulé <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="intituled" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description (facultatif)</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Enregistrer <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.card-content -->
        </div>
        <!-- /.box-content -->
    </div>
    <div class="col-sm-8 col-xs-12">
        <div class="box-content">
            <h3 class="box-title">Liste de types de catégories</h3>
            <table id="table-types-categories" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- types -->
                    <?php if (!empty($types)) : ?>
                        <?php $i = 1 ?>
                        <?php foreach ($types as $type) : ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $type->intituled ?></td>
                                <td><?= $type->description ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
    <!-- /.col-xs-12 -->
</div>