import { getCategoriesActives } from "./categories.js";
import { initDashboard, loadCategoriesOnNavbar } from "./dashboard.js";
import { loginUser, logOutUser, registerUser, updateUser } from "./users.js";
import { initBooks } from "./books.js";

loadCategoriesOnNavbar();
logOutUser();

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