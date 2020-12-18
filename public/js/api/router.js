import { createCategory, getCategoriesActives, initCategories } from "./categories.js";
import { initDashboard, loadCategoriesOnNavbar } from "./dashboard.js";
import { loginUser, logOutUser, registerUser, updateUser } from "./users.js";
import { begingReadingBook, deleteBookByAdmin, initBooks, publishBook, publishChapter, searchBooksForUser } from "./books.js";
import { initTypes } from "./types.js";
import { logoutAdmin } from "./admins.js";

loadCategoriesOnNavbar();
logOutUser();

// Searching book
searchBooksForUser();

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

routerRegex('/books/', () => {
    begingReadingBook();
})

// Admin Routing
router('/admin/types', () => {
    initTypes();
})

router('/admin/categories', () => {
    initCategories();
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
    
    deleteBookByAdmin();
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
    
    deleteBookByAdmin();
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

router('/admin/login', () => {
    $('#form-login-admin').on('submit', function (e) {
        e.preventDefault();

        const $this = this;
        
        $.ajax({
            type: "POST",
            url: "/api/admins/login",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: () => {
                makeSuperLoader($this);
            },
            complete: () => {
                stopSuperLoader($this);
            },
            success: function (response) {
                console.log(response);

                if (response) {
                    if (response.state) {
                        redirect('/admin')
                    } else {
                        swal({
                            title: "Alert !",
                            text: response.message,
                            icon: "warning",
                            button: true
                        })
                    }
                } else {
                    swal({
                        title: "Alert !",
                        text: "Une erreur est survenue, réessayez !",
                        icon: "warning",
                        button: true
                    })
                }
            },
            error: (err) => {
                console.log(err);
                swal({
                    title: "Alert !",
                    text: "Une erreur est survenue, réessayez !",
                    icon: "warning",
                    button: true
                })
            }
        });
    })
})

routerRegex("/admin/", function () {
    logoutAdmin();
})

routerRegex('/admin/books/', () => {
    if ($('#editor').length) {
        initSample();
    }

    publishChapter();
    publishBook();
})
