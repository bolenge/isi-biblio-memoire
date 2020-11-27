import { getCategoriesActives } from "./categories.js";
import { initDashboard, loadCategoriesOnNavbar } from "./dashboard.js";
import { loginUser, logOutUser, registerUser } from "./users.js";

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