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

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enregistrer <i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        <strong>Chapitres enregistrés</strong><br>
                        <span>Intitule livre</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>