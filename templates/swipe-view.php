<?php
/**
 * Script to get a new animal every time the "Swipe" page loads
 */
$secret ="3b01189e7d22ef5343b93af919a2a592";
$public= "e540e02b94af2ffb8a82381b03e11654";
$animal= $_SESSION['animal']; // can be set via choice
$animal = strtolower($animal);
$output= "full"; //sets information gathered to all
$location= "10118"; //empire state building location as default
// creates the signature for accessing the api
$code = md5($secret . "key=" . $public . "&location=10118&animal=" . $animal . "&output=" . $output . "&format=json" );
// final processed line used to access the api
$url = "http://api.petfinder.com/pet.getRandom?key=" . $public . "&location=10118&animal=" . $animal . "&output=full&format=json&sig=" . $code;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

$decoded = json_decode($data, true);
$decoded = $decoded['petfinder']['pet'];

$name = $decoded['name']['$t'];
$age = $decoded['age']['$t'];
$sex = $decoded['sex']['$t'];
$pic = $decoded['media']['photos']['photo'][0]['$t'];
$pic = strtok($pic, '?');
$code = $decoded['id']['$t'];

if ($sex == "M") {
    $sex = "Male";
}
else {
    $sex = "Female";
}
?>

<!--HTML for the structure of the page-->
<div class="body-wrapper">
    <div class="col-sm-3" id="reject-div">
        <button type="submit" class="btn btn-danger" id="reject">Not For Me</button>
    </div>

    <div class="col-sm-6" id="swipe-pic">
        <h1><?php echo $name ?></h1>
        <img src="<?php echo $pic ?>" id="main-pic">
        <h2><?php echo $age ?></h2>
        <h2><?php echo $sex ?></h2>
    </div>

    <div class="col-sm-3" id="accept-div">
        <button type="submit" class="btn btn-success" id="accept">Like!</button>
    </div>
</div>

<!--Arrow keys left/right-->
<script>
    document.onkeydown = function(e) {
        if (e.keyCode == '37') {
            // left
            $.post("submitSwipe.php",
                {
                    accept : "false"
                },
                function(data, status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
        } else if (e.keyCode == '39') {
            // right
            $.post("submitSwipe.php",
                {
                    accept : "true"
                },
//                function(data, status){
//                    alert("Data: " + data + "\nStatus: " + status);
//                });
        }
    };
</script>

<!--Buttons clicked left/right-->
<script>
    $("#reject").click(function(){
        $.post("submitSwipe.php",
            {
                accept : "false",
                animalCode : <?php echo $code ?> // This should be updated to use the proper variable from the API
            },
            function(){
                window.location.reload();
            });;
    });
    $("#accept").click(function(){
        $.post("submitSwipe.php",
            {
                accept : "false",
                animalCode : <?php echo $code ?> // This should be updated to use the proper variable from the API
            },
            function(){
                window.location.reload();
            });
//            function(data, status){
//                alert("Data: " + data + "\nStatus: " + status);
//            });
    });
</script>





