<?php

include('../functies.php');

//run de datum functie met een database vorm datum en met een verkort jaartal
nlDatum($currentDate, "kort");

//run de datum functie met een database vorm datum en met een verlengt jaartal
nlDatum($currentDate);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datum</title>
    <link rel="stylesheet" href="../styling/style.css">
</head>

<body>
    <a href="../index.html">terug naar overzicht</a>
</body>

</html>