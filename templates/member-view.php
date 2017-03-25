<?php
?>
<div class="container">
    <h1>Member Area</h1>
    <h4>These are your previously accepted pets</h4>
    <br><br>
</div>
<?php
function get_pet($id) {
    $secret ="3b01189e7d22ef5343b93af919a2a592";
    $public= "e540e02b94af2ffb8a82381b03e11654";
    $animal= "dog"; // can be set via choice
    $output= "full"; //sets information gathered to all
    $location= "10118"; //empire state building location as default
    // creates the signature for accessing the api
    $met = ($secret . "key=" . $public . "&id=" . $id . "&format=json" );
    $code = md5($met);
    // final processed line used to access the api
    $url = "http://api.petfinder.com/pet.get?key=" . $public . "&id=" . $id . "&format=json&sig=" . $code;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($data, true);
    return $data;
}

function get_swiped_pets() {
    $url = "http://www.robcardy.com/api/swipedanimal/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERPWD, "cardy31" . ":" . "JA83nq&E");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($data, true);
    return $data;
}

function display_pet($petData) { ?>
    <div class="container" id="memberCont">
        <div class="col-lg-6">
            <img src="<?php echo $petData['pic'] ?>" id="memberImage">
        </div>
        <div class="col-lg-6">
            <h1><?php echo $petData['name'] . "</h1><br>";
            echo $petData['age'] . "<br>";
            echo $petData['sex'] . "<br>";
            echo "<div class='pre-scrollable'>" . $petData['description'] . "</div><br>"; ?>
        </div>
        <div><br><br></div>
    </div>
    <?php
}

$allPets = get_swiped_pets();
foreach($allPets as $entry) {
    if ($entry['memberUserId'] == $_SESSION['user']) {
        $pet = get_pet($entry['animalCode']);
        $pet = $pet['petfinder']['pet'];
        $petData = array();
        $petData['name'] = $pet['name']['$t'];
        $petData['age'] = $pet['age']['$t'];
        $petData['description'] = $pet['description']['$t'];
        $petData['sex'] = $pet['sex']['$t'];
        $photo = $pet['media']['photos']['photo'][0]['$t'];
        $petData['pic'] = strtok($photo, '?');
        display_pet($petData);
    }
}

?>


