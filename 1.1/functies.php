<?php
if (isset($_POST['DtoBin']))
{
    echo "DEC TO BIN";
  if (isset($_POST['ORIGIN'])){
    $origin = $_POST['ORIGIN'];
    echo $origin;
    $answer = decbin($origin);

    $type = "Bin";
  }
}
if (isset($_POST['BtoDEC']))
{
    echo "BIN TO DEC";

     if (isset($_POST['ORIGIN'])){
  $origin = $_POST['ORIGIN'];
  echo $origin;
  $answer = bindec($origin);

  $type = "Dec";
  }
}

if (isset($_POST['DtoHEX']))
{
    echo "DEC TO HEX";

     if (isset($_POST['ORIGIN'])){
  $origin = $_POST['ORIGIN'];
  echo $origin;
  $answer = dechex($origin);

  $type = "Hex";
  }
}
// if (isset($_POST['BtoHEX']))
// {
//     echo "BIN TO HEX";

//      if (isset($_POST['ORIGIN'])){
//   $origin = $_POST['ORIGIN'];
//   echo $origin;
//   $answer = bin2hex($origin);

//   $type = "Hex";
//   }
// }
// if (isset($_POST['HtoBIN']))
// {
//     echo "HEX TO BIN";

//      if (isset($_POST['ORIGIN'])){
//   $origin = $_POST['ORIGIN'];
//   echo $origin;
//   $answer = hex2bin($origin);

//   $type = "Bin";
//   }
// }