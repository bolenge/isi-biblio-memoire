import { getCategoriesActives } from "./categories.js";
import { initDashboard, loadCategoriesOnNavbar } from "./dashboard.js";
import { loginUser, logOutUser, registerUser, updateUser } from "./users.js";
import { initBooks } from "./books.js";

loadCategoriesOnNavbar();
logOutUser();

// Searching book
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
            url: "/api/books/search",
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
                            
                            response.result.forEach((book, index, tab) => {
                                $('#content-search').append(`<div class="col-xl-3 col-lg-4 col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center p-2 pb-0">
                                            <a href="/books/${book.id}">
                                                <img src="/${book.cover ? book.cover : "public/img/books/default-book-cover.png"}" alt="Image de ${book.title}" class="img-book" />
                                            </a>

                                            <div class="description pt-3">
                                                <h6 class="title-book">${book.title.substr(0, 35)}</h6>
                                                <p class="pb-0 mb-0">${book.other.substr(0, 35)}</p>
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
                                                <a href="/books/${book.id}"><i class="fa fa-book"></i> eBook</a>${book.fileAudio ? ' | <a href="/'+book.fileAudio+'"><i class="fa fa-play-circle"></i> Audio</a>' : ''}
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

router('/register', () => {
    registerUser()
})

router('/login', () => {
    loginUser();
})

router('/dashboard', () => {
    initDashboard();
})

router('/profile', () => {
    updateUser();
})

router('/my-books/create', () => {
    initBooks();
})

router('/admin/types', () => {
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
})

router('/admin/categories', () => {
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
})

router('/admin/books/published', () => {
    if ($('#table-books-published').length){
        $('#table-books-published').DataTable({
            "language": {
                "search": "Recherche",
                "lengthMenu": "Affiche _MENU_ livres par page",
                "zeroRecords": "Aucun livre enregistrée pour l'instant",
                "info": "Affichage _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucune information disponible",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "next": "Suivant",
                    "previous": "Précédent"
                }
            }
        });
		$('#table-books-published').editableTableWidget();
	}
})

router('/admin/books/waiting', () => {
    if ($('#table-books-waiting').length){
        $('#table-books-waiting').DataTable({
            "language": {
                "search": "Recherche",
                "lengthMenu": "Affiche _MENU_ livres par page",
                "zeroRecords": "Aucun livre enregistrée pour l'instant",
                "info": "Affichage _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucune information disponible",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "next": "Suivant",
                    "previous": "Précédent"
                }
            }
        });
		$('#table-books-waiting').editableTableWidget();
	}
})

router('/admin/others', () => {
    if ($('#table-list-others').length){
        $('#table-list-others').DataTable({
            "language": {
                "search": "Recherche",
                "lengthMenu": "Affiche _MENU_ auteurs par page",
                "zeroRecords": "Aucun auteur enregistrée pour l'instant",
                "info": "Affichage _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucune information disponible",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "next": "Suivant",
                    "previous": "Précédent"
                }
            }
        });
		$('#table-list-others').editableTableWidget();
	}
})