<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/episode',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

$api = json_decode($response,true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick And Morty</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all"/>

</head>
<body>
   <h1 class="title">EPISODES RICK AND MORTY</h1>
<div class="wrapper d-flex align-content-start flex-wrap">
   <?php
   foreach ($api['results'] as $key=>$value){
      $id=$value['id'];
      $name=$value['name'];
      $episode=$value['episode'];
      $air_date=$value['air_date'];

   
   ?>

<div class="tarjeta">
<p class="epi"><?php echo $id?></p>
<div class="titulo"><?php echo $name?></div>
<div class="cuerpo">
   <img src="https://hbomax-images.warnermediacdn.com/images/GXkRjxwjR68PDwwEAABKJ/tileburnedin?size=1280x720&partner=hbomaxcom&v=1e5180db922e989abf8e4db3d85a3c76&language=es-419&host=art-gallery.api.hbo.com&w=Infinity" width=350px alt="muestra">
   <p><?php echo $air_date?></p>   
</div>
<p><?php echo $episode?></p>
<div class="pie">
   <a href="#">DETALLE</a>
</div>
</div>

<?php
}
?>
</body>
</html>