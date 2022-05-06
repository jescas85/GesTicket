<?php


$ip = $_SERVER['REMOTE_ADDR']; // Esto contendrá la ip de la solicitud.

// Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
// Vamos a recuperar los datos rápidamente con file_get_contents
$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

//var_dump($dataArray);


foreach($dataArray as $key=>$value) {
    echo 'indice es '.$key.' y el valor es '.$value.'<br>';
}
echo '<br><br>';
$pais = $dataArray->geoplugin_countryName;

echo $pais;


?>