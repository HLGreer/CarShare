<?php
require("../includes/config.php");
$values["title"] = "Logout";
if (!isset($_SESSION['memberID'])) {
    header('Location: index.php');
}

render("../templates/logout-view.php", $values, __FILE__);

session_destroy();

?>
<script type="text/javascript">
    setTimeout(function () {
        window.location.href = 'index.php';
    },3000)
</script>


