<div class="row small-spacing">
    <div class="col-sm-4 col-xs-12" id="col-create-category">
        <div class="box-content card white" id="card-create-category">
            <h4 class="box-title" id="title-create-category">Nouvelle catégorie</h4>
            <!-- /.box-title -->
            <div class="card-content" id="content-card-create-type">
                <form action="#" id="form-create-category">
                    <div class="form-group">
                        <label for="intituled">Type <span class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-control" required>
                            <?php if (!empty($types)) : ?>
                                <?php foreach ($types as $type) : ?>
                                    <option value="<?= $type->id ?>"><?= $type->intituled ?></option>
                                <?php endforeach ?>
                            <?php else: ?>
                                <option value="">Aucun type disponible</option>
                            <?php endif ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="intituled">Intitulé <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="intituled" name="intituled" required minlength="2" />
                    </div>

                    <div class="form-group">
                        <label for="description">Description (facultatif)</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Enregistrer <i
                                class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.card-content -->
        </div>
        <!-- /.box-content -->
    </div>
    <div class="col-sm-8 col-xs-12">
        <div class="box-content">
            <h3 class="box-title">Liste de catégories de livres</h3>
            <table id="table-categories" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Type</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Type</th>
                        <th>Intitulé</th>
                        <th>Descriptions</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (!empty($categories)) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($categories as $categorie) : ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $categorie->type ?></td>
                                <td><?= $categorie->intituled ?></td>
                                <td><?= sub_string($categorie->description, 12) ?></td>
                                <td class="text-center">
                                    <a href="#" data-id="<?= $categorie->id ?>" class="btn btn-primary btn-xs btn-edit-category"><i class="fa fa-pencil"></i></a>
                                    <a href="#" data-id="<?= $categorie->id ?>" class="btn btn-danger btn-xs btn-delete-category"><i class="fa fa-trash-o"></i></a>
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