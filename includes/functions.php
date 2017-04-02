<?php
// Properly renders pages with header and footer
function render($template, $values, $filename) {
    $exempt_urls = ["login.php", "index.php", "signup.php", "new_member.php", "login-verify.php", "functions.php", "logout.php"];
    // Catch if the user is trying to access a page they need to be logged in for
    if (!isset($_SESSION['memberID']) && !in_array(basename($filename), $exempt_urls)) {
        //echo "here";
        $values['title'] = "Login";
        $values['message'] = "Sorry, you have to login to view that page.";
        if (file_exists("../templates/$template")) {
            if ($values != NULL){
                extract($values);
            }
            require("../templates/header.php");

            require("../templates/login-form.php");

            require("../templates/footer.php");
        }
        else {
            trigger_error("Template does not exist.", E_USER_ERROR);
        }
    }
    else {
        if (file_exists("../templates/$template")) {
            if ($values != NULL){
                extract($values);
            }
            require("../templates/header.php");

            require("../templates/$template");

            require("../templates/footer.php");
        }
        else {
            trigger_error("Template does not exist.", E_USER_ERROR);
        }
    }
}