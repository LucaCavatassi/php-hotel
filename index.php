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

// foreach ($hotels as $cur_hotel) {
//     if ($cur_hotel["parking"] === true) {
//         $cur_hotel["parking"] = "Si";
//     } else {
//         $cur_hotel = "No";
//     };
// };


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
</head>
<body>
    <?php foreach ($hotels as $cur_hotel) {

// TRANSFORM BOOLEAN IN STRINGA
        if ($cur_hotel["parking"] === true) {
            $cur_hotel["parking"] = "Si";
        } else {
            $cur_hotel["parking"] = "No";
        };

        ?>
        <!-- LAYOUT --> 
            <h3><?php echo $cur_hotel["name"] ?></h3>
            <span>Descrizione - <?php echo $cur_hotel["description"] ?></span><br>
            <span>Voto -  <?php echo $cur_hotel["vote"] ?></span><br>
            <span>Parcheggio - <?php echo $cur_hotel["parking"] ?></span><br>
            <span>Distanza dal Centro - <?php echo $cur_hotel["distance_to_center"] ?> km</span>
        <!-- /LAYOUT -->


    <?php }?>
</body>
</html>