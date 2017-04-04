<?php
/**
 * Directed here after a successful reservation
 * */
require('../includes/config.php');
$values['title'] = 'Successfully Reserved';
render("../templates/reservationSuccessful-view.php", $values, __FILE__);

?>