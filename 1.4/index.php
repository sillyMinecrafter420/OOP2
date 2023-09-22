<?php
include('../functies.php');

//activeer de functie mag ik stemmen? en stuur het getal 18 mee als variabele om te testen.
// magStemmen(18);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mag ik stemmen?</title>
</head>
<body>

<form action="index.php" method="post">
uw geboorte datum: <input type="date" name="AGE" value="14/12/2004"><br>
<button type='submit' name='submitAge'>Mag ik stemmen?</button>
<a href="../index.html">terug naar overzicht</a>
</form>
</body>
</html>