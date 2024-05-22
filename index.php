<?php
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
$selectedVoteArray = [];


$filteredParkingArray = $hotels;
// *************FILTERS*************************
// FILTERED BY PARK LIST
// SELECT OPTION 
$selected = $_GET["park_av"] ?? "Nessuna Selezione"; // PARKING
if ($selected === "si") {
    $filteredParkingArray = [];
    foreach ($hotels as $cur_hotel) {
        if ($cur_hotel["parking"]) {
            $filteredParkingArray[] = $cur_hotel;
        }
    }
}

// FILTERED BY VOTE
// SELECTED OPTION
$selected_vote = $_GET["vote_filter"] ?? "Nessuna Selezione"; // VOTE

// IF VALORE SELZIONATO = X PUSHA TUTTI QUELLI CHE HANNO VOTO MAGGIORE UGUALE A X IN UN ARRAY
if ($selected_vote === "1") {
    foreach ($hotels as $cur_hotel) {
        if ($cur_hotel["vote"] >= 1) {
            $selectedVoteArray[] = $cur_hotel;
        }
    }
    // var_dump($selectedVoteArray);

} else if ($selected_vote === "2") {
    foreach ($hotels as $cur_hotel) {
        if ($cur_hotel["vote"] >= 2) {
            $selectedVoteArray[] = $cur_hotel;
        }
    }
    // var_dump($selectedVoteArray);

} else if ($selected_vote === "3") {
    foreach ($hotels as $cur_hotel) {
        if ($cur_hotel["vote"] >= 3) {
            $selectedVoteArray[] = $cur_hotel;
        }
    }
    // var_dump($selectedVoteArray);

} else if ($selected_vote === "4") {
    foreach ($hotels as $cur_hotel) {
        if ($cur_hotel["vote"] >= 4) {
            $selectedVoteArray[] = $cur_hotel;
        }
    }
    // var_dump($selectedVoteArray);

} else if ($selected_vote === "5") {
    foreach ($hotels as $cur_hotel) {
        if ($cur_hotel["vote"] >= 5) {
            $selectedVoteArray[] = $cur_hotel;
        }
    }
    // var_dump($selectedVoteArray);
}

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
        <label for="parking">Vuoi il parcheggio?</label>
        <select name="park_av" id="parking">
            <option value="" disabled selected>Seleziona un'opzione</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>


        <label for="vote">Filtra per voto</label>
        <select name="vote_filter" id="vote">
            <option value="" disabled selected>Seleziona un'opzione</option>
            <option value="1">1 Stella</option>
            <option value="2">2 Stelle</option>
            <option value="3">3 Stelle</option>
            <option value="4">4 Stelle</option>
            <option value="5">5 Stelle</option>
        </select>
        <button type="submit">Filtra</button>
    </form>


<!-- FILTERED -->
    <?php foreach ($filteredParkingArray as $cur_hotel) {?>
        <!-- LAYOUT --> 
            <h3><?php echo $cur_hotel["name"] ?></h3>
            <span>Descrizione - <?php echo $cur_hotel["description"] ?></span><br>
            <span>Voto -  <?php echo $cur_hotel["vote"] ?></span><br>
            <span>Parcheggio - <?php echo $cur_hotel["parking"] ? "Si" : "No" ?></span><br>
            <span>Distanza dal Centro - <?php echo $cur_hotel["distance_to_center"] ?> km</span>
        <!-- /LAYOUT -->
<!-- /FILTERED -->
    <?php }?>
<!-- /FULL -->


</body>
</html>