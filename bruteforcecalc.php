<!DOCTYPE HTML>  
<html>
<head>
<title>Ondřej Műhlhandel</title>
<meta charset="utf-8">
<style>
body {background-color: gray;}
label {display: inline-block; width: 150px;}
h1,span,p, {margin-left: 15px;}
</style>
</head>
<body>  

<?php
$s = 0;
$D = 0;
$mala = 0;
$velka = 0;
$cisla = 0;
$znaky = 0;           

$pocet = $pokusy = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pocet = test_input($_POST["pocet"]);
    $pokusy= test_input($_POST["pokusy"]);

  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<h1>Brute force kalkulačka</h1>
<form action="bruteforcecalc.php" method="post" >

<label for="mala_pis">Malá písmena (a-z)</label>
  <input type="checkbox" id="mala" name="mala" value=26>
  <br>
<label for="velka_pis">Velká písmena (A-Z)</label>
  <input type="checkbox" id="velka" name="velka" value=26>
  <br>
<label for="cisla">Číslice (0-9)</label>
  <input type="checkbox" id="cisla" name="cisla" value=10>
 <br>
<label for="spec_znaky">Speciální znaky (*!@)</label>
  <input type="checkbox" id="znaky" name="znaky" value=33>
  <br><br>
<span>Heslo je z </span>
<input type="Text" id="pocet" size="2" max="20" name="pocet"> 
<span>znaků</span>
  <br><br>
<span>Počet pokusů/s </span>
<input type="Texts" id="pokusy" size="10" max="2800000000" name="pokusy">
  <br><br>
  <input name="submit" type="submit" id="tlacitko1" value="Vypočítej">
<input name="submit2" type="submit" id="tlacitko2" value="Smaž" onclick="reset()">
</form>
<p>Poznámka: Malých písmen uvažujme <b>26</b>, velkých písmen také <b>26</b>, číslic <b>10</b> a speciálních znaků <b>33</b>.</p>


<?php 

  if(isset($_POST['mala'])){
    $mala =26; 
  }else {
    $mala = 0;
  }
  if(isset($_POST['velka'])){
    $velka = 26;
  }else {
   $velka = 0;
 }
  if(isset($_POST['cisla'])){
    $cisla  = 10;
    }else {
    $cisla = 0;
   }

   if(isset($_POST['znaky'])){
    $znaky = 33;
    }else {
    $znaky = 0;
}
     function bruteforceCalc($sekundy)
    {
     $ret = "";
 
     $dny = intval(intval($sekundy) / (3600*24));
     if($dny> 0)
     {
         $ret .= "$dny dnů ";
     }

     $hodiny = (intval($sekundy) / 3600) % 24;
     if($hodiny > 0)
     {
           $ret .= "$hodiny hodin ";
     }

     $minuty = (intval($sekundy) / 60) % 60;
     if($minuty > 0)
     {
         $ret .= "$minuty minut a ";
     }


      $sekundy = intval($sekundy) % 60;
      if ($sekundy > 0) {
         $ret .= "$sekundy sekund při ";
      }

      return $ret;
    }
  echo bruteforceCalc ((pow($mala + $velka + $cisla + $znaky, $pocet))/ $pokusy);

  if (pow(($mala + $velka + $cisla + $znaky), $pocet) > 1) {
    echo pow(($mala + $velka + $cisla + $znaky), $pocet);
  echo " kombinacích ";
  }
 
  ?>
</body></html>