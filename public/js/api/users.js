/**
 * Dynamisation users
 * @author Don de Dieu Bolenge
 */

/**
 * Inscription d'un nouvel utilisateur
 */
export function registerUser() {
    $('#form-register-user').on('submit', function (e) {
        e.preventDefault();
        
        const $this = this;

        $.ajax({
            url: "/api/users/register",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-register-user'))
            },
            complete: () => {
                stopSuperLoader($('#card-register-user'))
            },
            success: (response) => {
                console.log(response);
                if (response) {
                    if (response.state) {
                        $this.reset();

                        alertBootstrap($('#col-register-user'), response.message, 'success');

                        setInterval(function () { 
                            redirect('/login');
                        }, 3000)
                    } else {
                        alertBootstrap($('#col-register-user'), response.message, 'danger');
                    }
                } else {
                    alertBootstrap($('#col-register-user'), "Une erreur est survenue, réessayez", 'danger');
                }
            },
            error: (err) => {
                console.log(err);
                alertBootstrap($('#col-register-user'), "Une erreur est survenue, réessayez", 'danger');
            }
        })
    })
}

/**
 * Inscription d'un nouvel utilisateur
 */
export function loginUser() {
    $('#form-login-user').on('submit', function (e) {
        e.preventDefault();
        
        const $this = this;

        $.ajax({
            url: "/api/users/login",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-login-user'))
            },
            complete: () => {
                stopSuperLoader($('#card-login-user'))
            },
            success: (response) => {
                console.log(response);
                if (response) {
                    if (response.state) {
                        $this.reset();

                        redirect('/dashboard');
                    } else {
                        alertBootstrap($('#col-login-user'), response.message, 'danger');
                    }
                } else {
                    alertBootstrap($('#col-login-user'), "Une erreur est survenue, réessayez", 'danger');
                }
            },
            error: (err) => {
                console.log(err);
                alertBootstrap($('#col-login-user'), "Une erreur est survenue, réessayez", 'danger');
            }
        })
    })
}

/**
 * D"connexion utilisateur
 */
export function logOutUser() {
    $('.logout-user').on('click', function (e) {
        let node = this.nodeName.toLowerCase();

        if (node === 'a') {
            e.preventDefault();
        }

        swal({
            title: "Voulez-vous vraiment vous déconnecter ?",
            text: "",
            icon: "warning",
            dangerMode: true,
            buttons: ["Non","Oui"]
        }).then((yes) => {
            if (yes) {
                $.ajax({
                    type: "PUT",
                    url: "/api/users/logout",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            if (response.state) {
                                redirect('/login');
                            } else {
                                swal({
                                    title: "Alert !",
                                    text: response.message,
                                    button: "Ok",
                                    icon: "warning"
                                })
                            }
                        }else {
                            swal({
                                title: "Alert !",
                                text: "Une erreur est survnue, réessayez",
                                button: "Ok"
                            })
                        }
                    },
                    error: function (err) {
                        console.log(err);

                        swal({
                            title: "Alert !",
                            text: "Une erreur est survnue, réessayez",
                            button: "Ok"
                        })
                    }
                });
            }
        })
    })
}

/**
 * Mise à jour infos d'un utilisateur
 */
export function updateUser() {
    $('#form-update-user').on('submit', function (e) {
        e.preventDefault();
        
        const $this = this;

        $.ajax({
            url: "/api/users/update",
            type: "PUT",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-update-user'))
            },
            complete: () => {
                stopSuperLoader($('#card-update-user'))
            },
            success: (response) => {
                console.log(response);
                if (response) {
                    if (response.state) {
                        $this.reset();

                        alertBootstrap($('#col-update-user'), response.message, 'success');

                        setInterval(function () { 
                            redirect('/login');
                        }, 3000)
                    } else {
                        alertBootstrap($('#col-update-user'), response.message, 'danger');
                    }
                } else {
                    alertBootstrap($('#col-update-user'), "Une erreur est survenue, réessayez", 'danger');
                }
            },
            error: (err) => {
                console.log(err);
                alertBootstrap($('#col-update-user'), "Une erreur est survenue, réessayez", 'danger');
            }
        })
    })
}