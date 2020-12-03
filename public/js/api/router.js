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