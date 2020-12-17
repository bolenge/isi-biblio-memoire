<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h3>Liste de livres en attente</h3><br>

            <table id="table-books-waiting" class="display" style="width: 100%">
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
                    <?php if (!empty($books)) : ?>
                        <?php $i = 1 ?>
                        <?php foreach ($books as $book) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td title="<?= $book->title ?>"><?= sub_string($book->title, 25) ?></td>
                                <td><?= $book->category ?></td>
                                <td><?= $book->other ?></td>
                                <td><?= format_date($book->createdAt) ?></td>
                                <td class="text-center">
                                    <a href="<?= $book->fileDoc ?>" download="<?= $book->fileDoc ?>"> <i class="fa fa-file-word-o"></i></a> |
                                    <a href="#"><i class="fa fa-play"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-xs btn-delete-book" data-id="<?= $book->id ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                    <a href="/admin/books/<?= $book->id ?>/publish" class="btn btn-success btn-xs"><i class="fa fa-send"></i></a>
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