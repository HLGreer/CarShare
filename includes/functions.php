<?php
// Properly renders pages with header and footer
function render($template, $values, $filename)
{
    $exempt_urls_member = ["login.php", "index.php", "signup.php", "new_member.php", "login-verify.php", "functions.php", "logout.php", "adminLogin.php"];
    // Catch if the user is trying to access a page they need to be logged in for
    if (isset($_SESSION['adminID'])) {
        if (file_exists("../templates/$template")) {
            if ($values != NULL){
                extract($values);
            }
            require("../templates/header.php");

            require("../templates/$template");

            require("../templates/footer.php");
        }
    }
    elseif (!isset($_SESSION['memberID']) && !in_array(basename($filename), $exempt_urls_member)) {
        //echo "here";
        $values['title'] = "Login";
        $values['message'] = "Sorry, you have to login to view that page.";
        if (file_exists("../templates/$template")) {
            if ($values != NULL) {
                extract($values);
            }
            header('Location: login.php');
            /*
            require("../templates/header.php");

            require("../templates/login-form.php");

            require("../templates/footer.php");
            */

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

function buildTable($columns, $result_set)
{
    //Create an empty table
    $table = '';
    $table .= '<div class="container"><table border="1" class="table table-striped">';

    //Build the column structure, passed in from the $columns array
    $table .= "<tr>";
    foreach ($columns as $column) {
        $table .= "<td>$column</td>";
    }
    $table .= "</tr>";

    //Build the rows from the $result_set array
    foreach ($result_set AS $array) {
        $table .= "<tr>";
        //Pass each nested array to the table as a single row
        //per nested array
        foreach ($array AS $table_cell) {
            $table .= "<td>$table_cell</td>";
        }
        //Placeholder for adding additional columns (usually button columns)
//            $table .= "<td><button type='button'>Test</button></td>";

        $table .= "</tr>";
    }
    echo $table;
}