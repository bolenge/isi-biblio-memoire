<div class="content">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-user">
                    <div class="card-header">
                            <h5 class="card-title">Profile utilisateur</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">Prénom <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Téléphone <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" name="phone" id="phone" required minlength="10" maxlength="16" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="town">Pays <span class="text-danger">*</span></label>
                                        <select class="form-control" name="town" id="town" required>
                                            <option value="CD">RD Congo</option>
                                            <option value="CD">RD Congo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adress">Adresse <span class="text-danger">*</span></label>
                                        <input type="adress" class="form-control" name="adress" id="adress" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Biographie (Parlez-nous un peu de vous)</label>
                                        <textarea class="form-control textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary">Modifier <i class="fa fa-pencil-square-o"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="/public/img/damir-bosnjak.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="/public/img/mike.jpg" alt="...">
                            <h5 class="title"><?= session('user')['name'] ?></h5>
                            </a>
                            <p class="description">
                                @bolenge
                            </p>
                        </div>
                        <p class="description text-center">
                            Développeur...
                        </p>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>