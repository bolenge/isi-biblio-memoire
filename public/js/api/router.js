import { loginUser, registerUser } from "./users.js";

router('/register', () => {
    registerUser()
})

router('/login', () => {
    loginUser();
})