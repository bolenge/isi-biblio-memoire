<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="col-login-user">
            <div class="card card-user" id="card-login-user">
                <div class="card-body p-5">
                    <h5 class="card-title text-center mb-4">Connexion</h5>

                    <form action="#" method="POST" id="form-login-user">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control" required minlength="8" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <label for="remember"><input type="checkbox" name="remember" id="remember" />&nbsp;&nbsp;Garder ma session active</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn bgc-primary">Connexion <i class="fa fa-sign-in"></i></button>

                                <p class="mt-2"><a href="/register">Je veux m'inscrire <i class="fa fa-pencil"></i></a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>