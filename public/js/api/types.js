/**
 * Gestion de types de catégories
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

export function initTypes() {
    if ($('#table-types-categories').length){
        $('#table-types-categories').DataTable({
            "language": {
                "search": "Recherche",
                "lengthMenu": "Affiche _MENU_ domaines par page",
                "zeroRecords": "Aucune information enregistrée pour l'instant",
                "info": "Affichage _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucune information disponible",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "next": "Suivant",
                    "previous": "Précédent"
                }
            }
        });
		$('#table-types-categories').editableTableWidget();
    }
    
    createType();
    editType();
    deleteType();
}

/**
 * Création d'un nouveau type
 */
export function createType() {
    $('#form-create-type').on('submit', function (e) {
        e.preventDefault();
        const $this = this;
        
        $.ajax({
            url: '/api/types/create',
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-create-type'))
            },
            complete: () => {
                stopSuperLoader($('#card-create-type'))
            },
            success: (response) => {
                console.log(response);
                if (response) {
                    if (response.state) {
                        $this.reset();
                        
                        swal({
                            title: "Création type réussie !",
                            text: "",
                            icon: "success",
                            button: "Ok",
                        }).then((ok) => {
                            window.location.reload();
                        })
                    } else {
                        swal({
                            title: "Alert !",
                            text: response.message,
                            icon: "warning",
                            button: true
                        }).then((ok) => {
                            // 
                        })
                    }
                } else {
                    swal({
                        title: "Alert !",
                        text: "Une erreur est survenue, réessayez",
                        icon: "warning",
                        button: true
                    }).then((ok) => {
                        // 
                    })
                }
            },
            error: (err) => {
                console.log(err)
                swal({
                    title: "Alert !",
                    text: "Une erreur est survenue, réessayez",
                    icon: "warning",
                    button: true
                }).then((ok) => {
                    // 
                })
            }
        })
    })
}

/**
 * Edition d'un type
 */
export function editType() {
    $('.btn-edit-type').on('click', function (e) { 
        e.preventDefault();

        const id_type = $(this).attr('data-id');

        swal({
            title: "Editer ce type ?",
            text: "",
            icon: "warning",
            buttons: ["Non","Oui"],
            dangerMode: true
        }).then((yes) => {
            if (yes) {
                $.ajax({
                    type: "GET",
                    url: "/api/types/"+id_type,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            if (response.state) {
                                $('#title-create-type').html('Edition du domaine');
                                $('#content-card-create-type').html(`<form action="#" id="form-update-type" method="POST">
                                    <div class="form-group">
                                        <label for="intituled">Intitulé <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="intituled" name="intituled" value="${response.result.intituled || ""}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description (facultatif)</label>
                                        <textarea name="description" id="description" class="form-control">${response.result.description}</textarea>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Modifier <i class="fa fa-pencil"></i></button>
                                    </div>
                                </form>`);

                                $('#card-create-type').removeClass('animate__animated animate__wobble');
                                $('#card-create-type').addClass('animate__animated animate__wobble');

                                updateType(response.result.id);
                            } else {
                                swal("Alert !", response.message, "warning")
                            }
                        } else {
                            swal("Alert !", "Une erreur est survenue, réessayez !", "warning");
                        }
                    },
                    error: (err) => {
                        swal("Alert !", "Une erreur est survenue, réessayez !", "warning");
                    }
                });
                
            }
        })
    })
}

/**
 * Modification d'un type
 * @param {Number} type L'ID du type à modifier
 */
export function updateType(type) {
    $('#form-update-type').on('submit', function (e) {
        e.preventDefault();
        const $this = this;
        
        $.ajax({
            url: '/api/types/update/'+type,
            type: "PUT",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-create-type'))
            },
            complete: () => {
                stopSuperLoader($('#card-create-type'))
            },
            success: (response) => {
                console.log(response);
                if (response) {
                    if (response.state) {
                        $this.reset();
                        
                        swal({
                            title: "Mise à jour réussie !",
                            text: "",
                            icon: "success",
                            button: "Ok",
                        }).then((ok) => {
                            window.location.reload();
                        })
                    } else {
                        swal({
                            title: "Alert !",
                            text: response.message,
                            icon: "warning",
                            button: true
                        }).then((ok) => {
                            // 
                        })
                    }
                } else {
                    swal({
                        title: "Alert !",
                        text: "Une erreur est survenue, réessayez",
                        icon: "warning",
                        button: true
                    }).then((ok) => {
                        // 
                    })
                }
            },
            error: (err) => {
                console.log(err)
                swal({
                    title: "Alert !",
                    text: "Une erreur est survenue, réessayez",
                    icon: "warning",
                    button: true
                }).then((ok) => {
                    // 
                })
            }
        })
    })
}

/**
 * Suppression d'un type
 */
export function deleteType() {
    $('.btn-delete-type').on('click', function (e) {
        e.preventDefault();

        const $this = this;

        swal({
            title: "Supprimer ce type ?",
            text: "Cette suppression peut entrainer la disparition de certains livres ou catégories",
            icon: "warning",
            buttons: ["Non", "Oui"],
            dangerMode: true
        }).then((yes) => {
            if (yes) {
                const id_type = $($this).attr('data-id');

                $.ajax({
                    type: "DELETE",
                    url: "/api/types/delete/"+id_type,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            if (response.state) {
                                swal("Suppression réussie !", "", "success").then((ok) => {
                                    window.location.reload();
                                })
                            } else {
                                swal("Erreur !", response.message, "warning");
                            }
                        } else {
                            swal("Erreur !", "Une erreur est survenue, réessayez !", "warning");
                        }
                    },
                    error: (err) => {
                        console.log(err);
                        swal("Erreur !", "Une erreur est survenue, réessayez !", "warning");
                    }
                });
            }
        })
    })
}