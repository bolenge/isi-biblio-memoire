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

                        alertBootstrap($('#col-login-user'), response.message, 'success');

                        // setInterval(function () { 
                        //     redirect('/login');
                        // }, 3000)
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