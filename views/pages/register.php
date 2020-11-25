<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-lg-8">
            <h5 class="card-title">Création de compte</h5>
            <p class="lead">Inscrivez-vous et bénéficiez de toutes les fonctionnalités que vous offre <?= config('app.name') ?> </p>
            <img src="/public/img/signup.png" alt="Illustrator Inscription" class=" w-75">
        </div>
        <div class="col-lg-4">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title text-center">Création de compte <i class="fa fa-pencil"></i></h5>
                </div>
                <div class="card-body p-5">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn bgc-primary">S'Inscrire <i
                                        class="fa fa-pencil-square-o"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>