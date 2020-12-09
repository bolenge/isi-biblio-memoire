/**
 * Gestion de types de catégories
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

export function initTypes() {
    if ($('#table-types-categories').length){
        $('#table-types-categories').DataTable({
            "language": {
                "search": "Recherche",
                "lengthMenu": "Affiche _MENU_ types par page",
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
    
   createType()
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
 * Recherche des types
 */
export function searchtypesForUser() {
    $('#input-search').on('focus', function (e) {
        $('#block-search').addClass('call-block-search');
        $('#block-search').removeClass('close-call-block-search');
    })

    $('#btn-close-search').on('click', function (e) {
        $('#block-search').removeClass('call-block-search');
        $('#block-search').addClass('close-call-block-search');
    })

    $('#input-search').on('keyup', function (e) {
        let value = this.value;

        value = value.trim();

        if (value.length > 0) {

            $.ajax({
                type: "POST",
                url: "/api/types/search",
                beforeSend: () => {
                    makeSuperLoader($('#content-search'))
                },
                data: {
                    query: value
                },
                dataType: "json",
                success: function (response) {
                    if (response) {
                        if (response.state) {
                            if (response.result.length > 0) {
                                $('#search-title').html('Résultat de la recherche :');
                                $('#content-search').html('');
                                
                                response.result.forEach((type, index, tab) => {
                                    $('#content-search').append(`<div class="col-xl-3 col-lg-4 col-md-4">
                                        <div class="card">
                                            <div class="card-body text-center p-2 pb-0">
                                                <a href="/types/${type.id}">
                                                    <img src="/${type.cover ? type.cover : "public/img/types/default-type-cover.png"}" alt="Image de ${type.title}" class="img-type" />
                                                </a>

                                                <div class="description pt-3">
                                                    <h6 class="title-type">${type.title.substr(0, 35)}</h6>
                                                    <p class="pb-0 mb-0">${type.other.substr(0, 35)}</p>
                                                </div>
                                            </div>
                                            <div class="card-footer p-2">
                                                <div class="legend text-center">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                    <i class="fa fa-star-o text-warning"></i>
                                                </div>
                                                <hr>
                                                <div class="stats text-center">
                                                    <a href="/types/${type.id}"><i class="fa fa-type"></i> etype</a>${type.fileAudio ? ' | <a href="/'+type.fileAudio+'"><i class="fa fa-play-circle"></i> Audio</a>' : ''}
                                                </div>
                                            </div>
                                        </div>
                                    </div>`)
                                })
                            } else {
                                $('#search-title').html('Aucun résultat trouvé !');
                            }
                        } else {
                            $('#search-title').html('Aucun résultat trouvé !');
                        }
                    } else {
                        $('#search-title').html('Aucun résultat trouvé !');
                    }
                },
                error: (err) => {
                    console.log(err);
                    $('#search-title').html('Aucun résultat trouvé !');
                }
            });
        }
    })
}