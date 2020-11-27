import { loginUser, logOutUser, registerUser } from "./users.js";

logOutUser();

router('/register', () => {
    registerUser()
})

router('/login', () => {
    loginUser();
})