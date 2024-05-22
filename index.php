<?php
// MAIN ARRAY
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// FILTERED ARRAYS
$filteredArray = $hotels;


// *************FILTER PARK*************************
if (isset($_GET["park_av"]) && $_GET["park_av"] === "si" ){
    $tmp_hotels = [];
    foreach ($filteredArray as $cur_hotel) {
        if ($cur_hotel["parking"]) {
            $tmp_hotels[] = $cur_hotel;
        }
    }
    $filteredArray = $tmp_hotels;
}
// *************FILTER VOTE*************************
if (isset($_GET["vote_filter"])) {
    $selected_vote = intval($_GET["vote_filter"]);
    $tmp_hotels = [];
    foreach ($filteredArray as $cur_hotel) {
        if ($cur_hotel["vote"] >= $selected_vote) {
            $tmp_hotels[] = $cur_hotel;
        }
    }
    $filteredArray = $tmp_hotels;
};

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="index.php" method="GET">

        <!-- PARKING -->
        <label for="parking">Vuoi il parcheggio?</label>
        <select name="park_av" id="parking">
            <option value="" disabled selected>Seleziona un'opzione</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <!-- /PARKING -->

        <!-- VOTE -->
        <label for="vote">Filtra per voto</label>
        <select name="vote_filter" id="vote">
            <option value="" disabled selected>Seleziona un'opzione</option>
            <option value="1">1 Stella</option>
            <option value="2">2 Stelle</option>
            <option value="3">3 Stelle</option>
            <option value="4">4 Stelle</option>
            <option value="5">5 Stelle</option>
        </select>
        <!-- /VOTE -->

        <!-- SUBMIT -->
        <button type="submit">Filtra</button>
        <!-- /SUBMIT -->
    </form>


<!-- LAYOUT -->
    <?php foreach ($filteredArray as $cur_hotel) {?>
            <h3><?php echo $cur_hotel["name"] ?></h3>
            <span>Descrizione - <?php echo $cur_hotel["description"] ?></span><br>
            <span>Voto -  <?php echo $cur_hotel["vote"] ?></span><br>
            <span>Parcheggio - <?php echo $cur_hotel["parking"] ? "Si" : "No" ?></span><br>
            <span>Distanza dal Centro - <?php echo $cur_hotel["distance_to_center"] ?> km</span>
<!-- /LAYOUT -->
    <?php }?>


</body>
</html>