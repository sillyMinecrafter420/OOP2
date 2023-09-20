<?php
//alle if statements hieronder zijn bijna exact hetzelfde dus ik leg met tags de bovenste uit en de extra opdracht
//als we een post variabel hebben gekregen uit een form van de vorige pagina die als naam 'DtoBin' heeft voer dan de rest van de code uit.
if (isset($_POST['DtoBin']))
{
  //echo op de pagina welke som de gebruiker heeft aangeklikt
    echo "DEC TO BIN";

    //als de gebruiker een waarde heeft ingevoerd in de rekenmachine voer dan de rest van de code uit
  if (isset($_POST['ORIGIN'])){
    //zet de waarde van het formulier in een php variabel
    $origin = $_POST['ORIGIN'];
    
    //zet de formulier php variabel om van decimaal naar binary en sla het op in een nieuwe variabel genaamd 'answer' (antwoord)
    $answer = decbin($origin);

    //ik was vanplan ook nog voor de gebruiker aan te geven welk type variabel er nu in hun balk zat (ik vul automatisch hun output weer in de input balk) maar ik was daar niet meer aan toe gekomen nadat ik bij de laatste verplichte opdracht was
    $type = "Bin";
  }
}
if (isset($_POST['BtoDEC']))
{
    echo "BIN TO DEC";

     if (isset($_POST['ORIGIN'])){
  $origin = $_POST['ORIGIN'];
  
  $answer = bindec($origin);

  $type = "Dec";
  }
}

if (isset($_POST['DtoHEX']))
{
    echo "DEC TO HEX";

     if (isset($_POST['ORIGIN'])){
  $origin = $_POST['ORIGIN'];
 
  $answer = dechex($origin);

  $type = "Hex";
  }
}
if (isset($_POST['HtoDEC']))
{
    echo "HEX TO DEC";

     if (isset($_POST['ORIGIN'])){
  $origin = $_POST['ORIGIN'];
  
  $answer = hexdec($origin);

  $type = "Bin";
  }
}

//dit was de extra opdracht, bijna precies hetzelfde als alle andere if-statements met een kleine verandering :)
if (isset($_POST['BtoHEX']))
{
    echo "BIN TO HEX";

     if (isset($_POST['ORIGIN'])){
  $origin = $_POST['ORIGIN'];

  //om de input om te zetten van bin naar hex heb ik een workaround uitgevoerd, ik zag dat er een php functie was maar die kreeg ik niet werkend
  //voor mijn gevoel was deze simpele oplossing ook prima

  //eerst zetten we de binary om naar decimal
  $answer = bindec($origin);
  //vervolgens zetten we de decimal om naar hexadecimal
  $answer = dechex($answer);

  $type = "Hex";
  }
}
if (isset($_POST['HtoBIN']))
{
    echo "HEX TO BIN";

     if (isset($_POST['ORIGIN'])){
  $origin = $_POST['ORIGIN'];

  $answer = hexdec($origin);
  $answer = decbin($answer);
  $type = "Bin";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekenmachine - sophia</title>
    <link rel="stylesheet" href="../styling/style.css">
</head>
<body>
    
<div> 
<a href="../index.html">terug naar overzicht</a>
    <h2>Getal conversie</h2>
   
<form action="index.php" method="post">
  <!-- in de input hieronder vragen we om een waarde voor de rekenmachine, die word vervolgens doorgestuurd met de naam "ORIGIN" (afkomst) -->
  <!-- met  de if-statement:  if (isset($answer)){echo $answer;}  - kijken we of er een $answer variable bestaat, zoja dan voeren we die automatisch in de balk-->
<!-- met de andere ifstatement was ik vanplan een functie in te voeren dat als de gebruiker een foutieve knop had ingeklikt voor hun waarde dat hun balk niet geleegd zou worden en dat hun werd verteld om een andere knop te gebruiken die wel van toepassing was van hun invoer. (ik was hier niet meer aan toe gekomen) -->

  getal: <input type="text" name="ORIGIN" value="<?php if (isset($answer)){echo $answer;} else if (isset($origin)){echo $origin;}?>"><br>
 <button type='submit' name='DtoBin'>DEC->BIN</button>
  <button type='submit' name='BtoDEC'>BIN->DEC</button>
   <button type='submit' name='DtoHEX'>DEC->HEX</button>
  <button type='submit' name='HtoDEC'>HEX->DEC</button>
  <button type='submit' name='BtoHEX'>BIN->HEX</button>
  <button type='submit' name='HtoBIN'>HEX->BIN</button>
</form>


<?php 
// als er een waarde is ingevoerd in de form voer de rest van de code uit
if (isset($_POST['ORIGIN'])){
    echo "<p>Antwoord:</p>";
// hier laten we de resultaten van de rekenmachine zien op de pagina
    echo "<p>" .  $origin . "->" .  $answer . "</p>"; }?> 
</div>
</body>
</html>