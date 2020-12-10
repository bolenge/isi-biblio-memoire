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