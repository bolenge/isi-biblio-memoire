/**
 * Gestion de catégories
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

export function initCategories() {
    if ($('#table-categories').length){
        $('#table-categories').DataTable({
            "language": {
                "search": "Recherche",
                "lengthMenu": "Affiche _MENU_ categories par page",
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
		$('#table-categories').editableTableWidget();
    }
    
    createCategory();
    editCategory();
    deleteCategory();
}

/**
 * Récuperation nombre de catégories actives
 * @param {Function} callback 
 */
export function getCountCategoriesActives(callback) {
    $.ajax({
        type: "GET",
        url: "/api/categories/count/actives",
        dataType: "json",
        success: function (response) {
            if (response) {
                if (response.state) {
                    callback(response.result)
                } else {
                    callback(0);
                }
            } else {
                callback(0);
            }
        },
        error: function () {
            callback(0);
        }
    });
}

/**
 * Récuperation de catégories actives
 * @param {Function} callback 
 */
export function getCategoriesActives(callback) {
    $.ajax({
        type: "GET",
        url: "/api/categories/all/actives",
        dataType: "json",
        success: function (response) {
            callback(response);
        },
        error: function (err) {
            callback({
                state: false,
                message: "Une erreur est survenue lors de la récupération de catégories",
                result: null
            });
        }
    });
}

/**
 * Création d'une nouvelle catégorie
 */
export function createCategory() {
    $('#form-create-category').on('submit', function (e) {
        e.preventDefault();
        const $this = this;
        
        $.ajax({
            url: '/api/categories/create',
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-create-category'))
            },
            complete: () => {
                stopSuperLoader($('#card-create-category'))
            },
            success: (response) => {
                console.log(response);
                if (response) {
                    if (response.state) {
                        $this.reset();
                        
                        swal({
                            title: "Création catégorie réussie !",
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
 * Edition d'une categorie
 */
export function editCategory() {
    $('.btn-edit-category').on('click', function (e) { 
        e.preventDefault();

        const id_category = $(this).attr('data-id');

        swal({
            title: "Editer cette categorie ?",
            text: "",
            icon: "warning",
            buttons: ["Non","Oui"],
            dangerMode: true
        }).then((yes) => {
            if (yes) {
                ajaxGet("/api/categories/for/update/" + id_category, function (response) {
                    console.log(response);
                        if (response) {
                            if (response.state) {
                                let options = "";

                                if (response.result.types.length > 0) {
                                    for (let i = 0; i < response.result.types.length; i++) {
                                        options += `<option value="${response.result.types[i].id}" ${response.result.types[i].id == response.result.category.idType ? "selected" : ""}>${response.result.types[i].intituled}</option>`;
                                    }
                                } else {
                                    options += `<option value="">Aucun type</option>`;
                                }

                                $('#title-create-category').html('Edition d\'une catégorie');
                                $('#content-card-create-type').html(`<form action="#" id="form-update-category">
                                    <div class="form-group">
                                        <label for="intituled">Type <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control" required>
                                            ${options}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="intituled">Intitulé <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="intituled" name="intituled" required minlength="2" value="${response.result.category.intituled || ""}" />
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description (facultatif)</label>
                                        <textarea name="description" id="description" class="form-control">${response.result.category.description || ""}</textarea>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Modifier <i class="fa fa-save"></i></button>
                                    </div>
                                </form>`);

                                $('#card-create-category').removeClass('animate__animated animate__wobble');
                                $('#card-create-category').addClass('animate__animated animate__wobble');

                                updateCategory(response.result.category.id);
                            } else {
                                swal("Alert !", response.message, "warning")
                            }
                        } else {
                            swal("Alert !", "Une erreur est survenue, réessayez !", "warning");
                        }
                })
                
            }
        })
    })
}

/**
 * Modification d'une catégorie
 * @param {Number} category L'ID de la catégorie à modifier
 */
export function updateCategory(category) {
    $('#form-update-category').on('submit', function (e) {
        e.preventDefault();
        const $this = this;
        
        $.ajax({
            url: '/api/categories/update/'+category,
            type: "PUT",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-create-category'))
            },
            complete: () => {
                stopSuperLoader($('#card-create-category'))
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
export function deleteCategory() {
    $('.btn-delete-category').on('click', function (e) {
        e.preventDefault();

        const $this = this;

        swal({
            title: "Supprimer cette catégorie ?",
            text: "Cette suppression peut entrainer la disparition de certains livres",
            icon: "warning",
            buttons: ["Non", "Oui"],
            dangerMode: true
        }).then((yes) => {
            if (yes) {
                const id_category = $($this).attr('data-id');

                $.ajax({
                    type: "DELETE",
                    url: "/api/categories/delete/"+id_category,
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