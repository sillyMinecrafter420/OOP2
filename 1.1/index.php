<?php

$type = "any";
//alle if statements hieronder zijn bijna exact hetzelfde dus ik leg met tags de bovenste uit en de extra opdracht
//als we een post variabel hebben gekregen uit een form van de vorige pagina die als naam 'DtoBin' heeft voer dan de rest van de code uit.
if (isset($_POST['DtoBin'])) {

  //als de gebruiker een waarde heeft ingevoerd in de rekenmachine voer dan de rest van de code uit
  if (isset($_POST['ORIGIN'])) {
    //zet de waarde van het formulier in een php variabel
    $origin = $_POST['ORIGIN'];

    //zet de formulier php variabel om van decimaal naar binary en sla het op in een nieuwe variabel genaamd 'answer' (antwoord)
    $answer = decbin($origin);

    //ik geef de original type aan zodat ik kan aangeven welke conversion het laatst is gebruik
    $originalType = "Dec";

    //met onderstaande variabele kan de gebruiker zien welk type getal ze in hun balk hebben gekregen
    $type = "Bin";
  }
}
if (isset($_POST['BtoDEC'])) {

  if (isset($_POST['ORIGIN'])) {
    $origin = $_POST['ORIGIN'];

    $answer = bindec($origin);

    $originalType = "Bin";
    $type = "Dec";
  }
}

if (isset($_POST['DtoHEX'])) {


  if (isset($_POST['ORIGIN'])) {
    $origin = $_POST['ORIGIN'];

    $answer = dechex($origin);

    $originalType = "Dec";
    $type = "Hex";
  }
}
if (isset($_POST['HtoDEC'])) {


  if (isset($_POST['ORIGIN'])) {
    $origin = $_POST['ORIGIN'];

    $answer = hexdec($origin);

    $originalType = "Hex";
    $type = "Dec";
  }
}

//dit was de extra opdracht, bijna precies hetzelfde als alle andere if-statements met een kleine verandering :)
if (isset($_POST['BtoHEX'])) {


  if (isset($_POST['ORIGIN'])) {
    $origin = $_POST['ORIGIN'];

    //om de input om te zetten van bin naar hex heb ik een workaround uitgevoerd, ik zag dat er een php functie was maar die kreeg ik niet werkend
    //voor mijn gevoel was deze simpele oplossing ook prima

    //eerst zetten we de binary om naar decimal
    $answer = bindec($origin);
    //vervolgens zetten we de decimal om naar hexadecimal
    $answer = dechex($answer);

    $originalType = "Bin";
    $type = "Hex";
  }
}
if (isset($_POST['HtoBIN'])) {


  if (isset($_POST['ORIGIN'])) {
    $origin = $_POST['ORIGIN'];

    $answer = hexdec($origin);
    $answer = decbin($answer);

    $originalType = "Hex";
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
 
      <?php if (isset($answer)) {
        echo $type . " ";
      }if ($type == "any") {
        echo "I've given you a Hex type number ";
      } ?>getal: <input type="text" name="ORIGIN" value="<?php if (isset($answer)) {
                                                            echo $answer;
                                                          } else if (!isset($answer)) {
                                                            echo "f7d6ff";
                                                          } ?>"><br>
      <?php
      if ($type == "any") {
        echo "
        <button type='submit' name='DtoBin'>DEC->BIN</button>
        <button type='submit' name='BtoDEC'>BIN->DEC</button>
      <button type='submit' name='DtoHEX'>DEC->HEX</button>
      <button type='submit' name='HtoDEC'>HEX->DEC</button>
      <button type='submit' name='BtoHEX'>BIN->HEX</button>
      <button type='submit' name='HtoBIN'>HEX->BIN</button>";
      } else if ($type == "Bin") {
        echo "
        <button type='submit' name='BtoDEC'>BIN->DEC</button>
        <button type='submit' name='BtoHEX'>BIN->HEX</button>
      ";
      } else if ($type == "Dec") {
        echo "
        <button type='submit' name='DtoBin'>DEC->BIN</button>
        <button type='submit' name='DtoHEX'>DEC->HEX</button>
      ";
      } else if ($type == "Hex") {
        echo "
        <button type='submit' name='HtoDEC'>HEX->DEC</button>
        <button type='submit' name='HtoBIN'>HEX->BIN</button>
      ";
      }

      ?>
    </form>


    <?php
    // als er een waarde is ingevoerd in de form voer de rest van de code uit
    if (isset($_POST['ORIGIN'])) {
      echo "<p>Antwoord:</p>";
      // hier laten we de resultaten van de rekenmachine zien op de pagina
      echo "<p>" .  $origin . "->" .  $answer . "</p>";
    }

    //if the conversion output type is hex then we show the hex color :33
    if ($type == "Hex") {
      // hier laten we de kleur in een div zien
      echo '<div style=" border-radius: 16px; border: 2px solid black; background-color:#' . $answer . ';"><center><br>the hex in color<br> <p></center></div';
    }

    ?>
  </div>
</body>

</html>