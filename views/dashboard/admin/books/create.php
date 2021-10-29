<div class="content">
    <div class="row">
        <div class="col-lg-12 col-xl-10" id="col-create-book">
            <a href="/my-books" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Retour</a>

            <div class="container">
              
            </div>
            <div class="box-content" id="card-create-book">
                <h3 class="card-title">Publication d'un livre <i class="fa fa-book"></i></h3>

                <div class="card-body">
                    <form id="form-create-book" action="#" method="POST"> 
                        <input type="hidden" name="owner" value="<?= session('user')['id'] ?>" />
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="category">Catégorie <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="">Sélectionnez une catégorie pour votre livre    </option>
                                        <?php if (!empty($categories)) : ?>
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?= $category->id ?>"><?= $category->intituled ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="title">Titre livre <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" required minlength="2" maxlength="150" />
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="other">Nom auteur <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="other" id="other" minlength="2" maxlength="" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group position-relative">
                                    
                                    <label for="fileDoc">Fichier document <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control file-to-upload" name="fileDoc" id="fileDoc" data-id="file_doc">
                                    <input type="hidden" name="file_doc" id="file_doc" accept=".doc,.docx,.txt,.pdf,.epub" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fileCover">Fichier de couverture</label>
                                    <input type="file" class="form-control file-to-upload" name="fileCover" id="fileCover" data-id="cover">
                                    <input type="hidden" name="cover" id="cover" accept=".jpg,.jpeg,.png">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fileAudio">Fichier audio (Facultatif)</label>
                                    <input type="file" class="form-control file-to-upload" name="fileAudio" id="fileAudio" data-id="file_audio">
                                    <input type="hidden" name="file_audio" id="file_audio" accept=".mp4,.mp3,.wav" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date_official">Date officielle de publication <span class="text-danger"></span></label>
                                    <input type="date" class="form-control" name="date_official" id="date_official">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description du livre <span class="text-danger">*</span></label>
                                    <textarea class="form-control textarea" name="description" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Enregistrer <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>