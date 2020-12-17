<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h3>Publication du livre</h3><br>

            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>
                                <strong>Titre du livre</strong><br>
                                <span><?= $book->title ?></span>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p>
                                <strong>Catégorie du livre</strong><br>
                                <span><?= $book->category->intituled ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="margin-top-20">
                        <form action="#" method="post" id="form-create-chapter">
                            <input type="hidden" id="admin" name="admin" value="<?= session('admin')['id'] ?>" />
                            <input type="hidden" id="book" name="book" value="<?= $id_book ?>" />
                            <div class="form-group">
                                <label for="chapter">Intitulé du chapite</label>
                                <input type="text" name="chapter" id="chapter" class="form-control">
                            </div>

                            <textarea name="content" id="editor"></textarea>

                            <div class="form-group text-center pt-5">
                                <button type="submit" class="btn btn-primary mt-5">Enregistrer <i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3" id="col-publish-book">
                    <p>
                        <strong>Chapitres enregistrés</strong><br>
                        <?php if (!empty($book->chapters)) : ?>
                            <ul>
                                <?php foreach ($book->chapters as $chapter) : ?>
                                    <li><a href="/admin/books/<?= $id_book ?>/chapters/<?= $chapter->id ?>"><?= $chapter->title ?></a></li>
                                <?php endforeach ?>
                            </ul>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" id="btn-publish-book" data-book="<?= $id_book ?>">Publier ce livre <i class="fa fa-send"></i></button>
                            </div>
                        <?php endif ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

