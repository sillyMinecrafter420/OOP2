<?php

function berekenKamer($lengte, $breedte, $hoogte = 0){
  //door onderstaande ifstatement word de hoogte niet meegerekend als er geen hoogte is ingevoerd (als het 0 is)
    if ($hoogte == 0){
        //onderstaande lijn is de inhoud berekening van een 2d object, lengte keer breedte
     $verplichtResult = $lengte * $breedte;
     //in onderstaande lijn printen we onze som uit op het scherm
     echo "lengte keer breedte: $verplichtResult";
}else if ($hoogte != 0){
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
 function nlDatum($datum, $lengte = "lang"){

  //door onderstaande if statement in te voeren word de originele datum maar een keer op de pagina geladen en kan het ook niet op andere paginas worden geladen die dit script hebben gelinked zonder dat de functie word geroepen
global $tel;
if ($tel == 0){
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
if($lengte == "kort"){
//we gebruiken hier IntlDateFormatter om de maand van getal om te zetten naar woord, met onderstaande lijn stellen we het in
$datumOmzetter = new IntlDateFormatter('nl_NL', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'dd-MMMM-yy');
} else{
//we gebruiken hier IntlDateFormatter om de maand van getal om te zetten naar woord, met onderstaande lijn stellen we het in
$datumOmzetter = new IntlDateFormatter('nl_NL', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'dd-MMMM-yyyy');
}

//gebruik de formatter om de datum om te zettem
$omgezetteDatum = $datumOmzetter->format($phpDatum);


  //als de datum niet goed is aangegeven krijg je een error
  if ($phpDatum == false){
    echo "datum incorrect ingevoerd";
  }

  //onderstaande lijn gebruikte ik origineel om de datum in elkaar te zetten maar het bleven toen getallen
  // $nlDatum = date("d-m-Y", $phpDatum);

  //hieronder printen we de informatie op het scherm
  echo "<br>";
  echo "nederlandse versie van de datum: $omgezetteDatum";
  echo "<br>";
 }