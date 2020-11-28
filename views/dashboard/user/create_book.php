<div class="content">
    <div class="row">
        <div class="col-lg-12 col-xl-10">
            <a href="/my-books" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Retour</a>
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Publication d'un livre <i class="fa fa-book"></i></h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="category">Catégorie <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="#">Catégorie 1</option>
                                        <option value="#">Catégorie 2</option>
                                        <option value="#">Catégorie 3</option>
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
                                    <label for="author">Nom auteur <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="author" id="author" minlength="2" maxlength="" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group position-relative">
                                    <i class="fa fa-spinner fa-pulse loader-upload-file"></i>
                                    <label for="file_doc">Fichier document <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file_doc" id="file_doc">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="cover">Fichier de couverture</label>
                                    <input type="file" class="form-control" name="cover" id="cover">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="file_audio">Fichier audio (Facultatif)</label>
                                    <input type="file" class="form-control" name="file_audio" id="file_audio">
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
                                    <label>Description du livre <span class="text-danger">*</span></label>
                                    <textarea class="form-control textarea"></textarea>
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