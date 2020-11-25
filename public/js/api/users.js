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
            },
            error: (err) => {
                console.log(err);
            }
        })
    })
}