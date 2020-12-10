/**
 * Gestion des admins
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

/**
 * Déconnexion admin
 */
export function logoutAdmin() {
    $(".btn_logout").on('click', function (e) {
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
                    url: "/api/admins/logout",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            if (response.state) {
                                redirect('/admin/login');
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