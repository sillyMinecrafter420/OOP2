<?php

function berekenKamer($lengte, $breedte, $hoogte = 0)
{
  //door onderstaande ifstatement word de hoogte niet meegerekend als er geen hoogte is ingevoerd (als het 0 is)
  if ($hoogte == 0) {
    //onderstaande lijn is de inhoud berekening van een 2d object, lengte keer breedte
    $verplichtResult = $lengte * $breedte;
    //in onderstaande lijn printen we onze som uit op het scherm
    echo "lengte keer breedte: $verplichtResult";
  } else if ($hoogte != 0) {
    echo "<br>";
    //onderstaande lijn is de inhoud berekening van een 3d object, lengte keer breedte keer hoogte
    $optioneelResult = $lengte * $breedte * $hoogte;
    //in onderstaande lijn printen we onze som uit op het scherm
    echo "lengte keer breedte keer hoogte: $optioneelResult";
  }
}



//maak een database format datum aan voor vandaag
$currentDate = date('Y-m-d H:i:s');
$tel = 0;

//functie met een verplichte datum parameter
function nlDatum($datum, $lengte = "lang")
{

  //door onderstaande if statement in te voeren word de originele datum maar een keer op de pagina geladen en kan het ook niet op andere paginas worden geladen die dit script hebben gelinked zonder dat de functie word geroepen
  global $tel;
  if ($tel == 0) {
    //de gerbuiker is natuurlijk ook nieuwsgierig wat de originele datum was
    echo "<br>";
    echo "originele versie van de datum: $datum";
    echo "<br>";
    $tel++;
  }
  //convert te string naar een datum format
  $phpDatum = strtotime($datum);

  //zet de datum in een nederlands format (bleek depricated te zijn dus ik zocht voor een nieuwere oplossing)
  //$omgezetteDatum = strftime('%d-%B-%Y', $phpDatum);

  //door dit if statement te plaatsen kunnen we de lengte van de datum aanpassen naar de wil van de gebruiker
  if ($lengte == "kort") {
    //we gebruiken hier IntlDateFormatter om de maand van getal om te zetten naar woord, met onderstaande lijn stellen we het in
    $datumOmzetter = new IntlDateFormatter('nl_NL', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'dd-MMMM-yy');
    //gebruik de formatter om de datum om te zettem
    $omgezetteDatum = $datumOmzetter->format($phpDatum);

    //als de datum niet goed is aangegeven krijg je een error
    if ($phpDatum == false) {
      echo "datum incorrect ingevoerd";
    }

    //hieronder printen we de informatie op het scherm
    echo "<br>";
    echo "nederlandse verkorte versie van de datum: $omgezetteDatum";
    echo "<br>";
  } else {
    //we gebruiken hier IntlDateFormatter om de maand van getal om te zetten naar woord, met onderstaande lijn stellen we het in
    $datumOmzetter = new IntlDateFormatter('nl_NL', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'dd-MMMM-yyyy');
    //gebruik de formatter om de datum om te zettem
    $omgezetteDatum = $datumOmzetter->format($phpDatum);

    //als de datum niet goed is aangegeven krijg je een error
    if ($phpDatum == false) {
      echo "datum incorrect ingevoerd";
    }

    //hieronder printen we de informatie op het scherm
    echo "<br>";
    echo "nederlandse verlengde versie van de datum: $omgezetteDatum";
    echo "<br>";
  }

  //onderstaande lijn gebruikte ik origineel om de datum in elkaar te zetten maar het bleven toen getallen
  // $nlDatum = date("d-m-Y", $phpDatum);

}

$magIkStemmen = "nee";
function magStemmen($leeftijd){

// vertel de gebruiker welke datum ze hebben ingevoerd
echo "Uw geboorte datum was op " . $leeftijd . "<br>";
// achterhaal welke dag het vandaag is 
$currentDate = date('Y-m-d');

//vertel de gebruiker welke dag het vandaag is
echo "Vandaag is de datum " . $currentDate . "<br>";

// bereken welke dag 18 jaar geleden is
$achtienJaarGeleden = date('Y-m-d', strtotime($currentDate . ' -18 years'));




echo "18 jaar geleden was op ".$achtienJaarGeleden . "<br><br>";

  if($leeftijd > $achtienJaarGeleden){
    $magIkStemmen = "nee";
    $hoeOud = $currentDate - $leeftijd;
    //vertel aan de gebruiker dat ze niet mogen stemmen en vertel ook hoe oud ze zijn
    echo "Dus ". $magIkStemmen . ", jij mag niet stemmen want je bent nog maar ". $hoeOud . " jaar oud";
    }else if($leeftijd < $achtienJaarGeleden){
      $magIkStemmen = "ja";
      $hoeOud = $currentDate - $leeftijd;
      echo "Dus ". $magIkStemmen . ", U mag stemmen want u bent al " . $hoeOud. " jaar oud";
    }
}

if (isset($_POST['submitAge'])) {


  if (isset($_POST['AGE'])) {
    $leeftijd = $_POST['AGE'];

    magStemmen($leeftijd);
  }
}