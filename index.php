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

// FILTERED BY PARK LIST

$filteredParkingArray = [];

foreach ($hotels as $cur_hotel) {
    if ($cur_hotel["parking"] == true) {
        $filteredParkingArray[] = $cur_hotel;
    }
}

// FILTERED BY PARK LIST

// SELECT OPTION 
$selected = $_GET["park_av"] ?? "Nessuna Selezione";

// echo $selected;

if ($selected === "si") {
    echo "<h1> Soluzioni con parcheggio </h1>";
} else {
    echo "<h1> Tutte le soluzioni </h1>";
};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
</head>
<body>
    <form action="index.php" method="GET">
        <label for="parking">Con parcheggio</label>
        <select name="park_av" id="parking">
            <option value="" disabled selected>Seleziona un'opzione</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <button type="submit">Filtra</button>
    </form>


<!-- FILTERED -->
    <?php if ($selected === "si") {
        foreach ($filteredParkingArray as $cur_hotel) {

        // TRANSFORM BOOLEAN IN STRINGA
        if ($cur_hotel["parking"] === true) {
            $cur_hotel["parking"] = "Si";
        } else {
            $cur_hotel["parking"] = "No";
        };
        // TRANSFORM BOOLEAN IN STRINGA
        ?>
        
        <!-- LAYOUT --> 
            <h3><?php echo $cur_hotel["name"] ?></h3>
            <span>Descrizione - <?php echo $cur_hotel["description"] ?></span><br>
            <span>Voto -  <?php echo $cur_hotel["vote"] ?></span><br>
            <span>Parcheggio - <?php echo $cur_hotel["parking"] ?></span><br>
            <span>Distanza dal Centro - <?php echo $cur_hotel["distance_to_center"] ?> km</span>
        <!-- /LAYOUT -->

<!-- /FILTERED -->

<!-- FULL -->
    <?php }}  else {
        foreach ($hotels as $cur_hotel) {

        // TRANSFORM BOOLEAN IN STRINGA
            if ($cur_hotel["parking"] === true) {
                $cur_hotel["parking"] = "Si";
            } else {
                $cur_hotel["parking"] = "No";
            };
        // TRANSFORM BOOLEAN IN STRINGA
        ?>    


        <!-- LAYOUT -->
            <h3><?php echo $cur_hotel["name"] ?></h3>
            <span>Descrizione - <?php echo $cur_hotel["description"] ?></span><br>
            <span>Voto -  <?php echo $cur_hotel["vote"] ?></span><br>
            <span>Parcheggio - <?php echo $cur_hotel["parking"] ?></span><br>
            <span>Distanza dal Centro - <?php echo $cur_hotel["distance_to_center"] ?> km</span>
        <!-- /LAYOUT -->
    <?php }}?>
<!-- /FULL -->

</body>
</html>