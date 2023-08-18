<?php 
if($_POST){
    $param = $_POST['param'];
}
else{
    $param="1";
}
$url= "https://pokeapi.co/api/v2/pokemon/{$param}";


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

$resultado = json_decode(curl_exec(($ch)));
curl_close($ch);

// print_r($resultado);

$param2 =  $resultado->name;

$url2= "https://pokeapi.co/api/v2/pokemon-form/{$param2}";


$ch2 = curl_init($url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);

$resultado2 = json_decode(curl_exec(($ch2)));
curl_close($ch2);
// print_r($resultado2);



// variaveis usadas
$id =  $resultado ->id;
$xp = $resultado ->base_experience;
$type = $resultado -> types;
$stats = $resultado ->stats;
$name = $resultado ->name; 
$height = $resultado ->height; //formatar o dado lembrar
$weight = $resultado ->weight; //formatar o dado lembrar
$moves = $resultado ->abilities; 
$img = $resultado2->sprites->front_default;
$soma=0;
for ($i = 0; $i < count($stats); $i++) {$soma = $soma+$stats[$i]->base_stat;} 
$media = $soma / 6;
?>
<span class="id-aux" value="<?php echo $id ?>"></span>
    <div class="principal">
        <div class="info-head">
            <h1 class="name"><?php echo $name ?></h1>
            <h1 class="score"><?php echo "Power: " . number_format($media, 1, '.', ''); ?></h1>
            <div class="div-flex"><?php for ($i = 0; $i < count($type); $i++){echo"<p class='icone-tipo'>". $type[$i]->type->name. "</p> "; }?></div>
        </div>
        <div class="img-central">
            <img class="img-pokemon" src="<?php echo $img ?>" alt="">
        </div>
        <div class="info-card">
            <div class="nav-info">
                <ul>
                    <li><span class="ativo">Base Stats</span></li>
                    <li><span>Moves</span></li>
                    <li><span>About</span></li>
                </ul>
            </div>
            <div class="info-bottom-1">
                <h1><?php echo $height ?></h1> 
                <h1><?php echo $weight ?></h1>
            </div>
            <div class="info-bottom-2">
                <?php for ($i = 0; $i < count($stats); $i++) {?><div class="info-graf"><div class="flex-tabela"><?php echo "<span  style='padding-left: 10px;'>". $stats[$i]->stat->name. "</span>"."<span  style='color: #d0d2d6;font-size: 14px;'>". $stats[$i]->base_stat."</span>";?></div>
                                                                    <div class="graph-container">
                                                                    <div class="graph-fill" style="width: <?php echo ($stats[$i]->base_stat/ 120) * 100; ?>%;"></div>
                                                                    </div>
                                                                </div>
                <?php } ?>
            </div>
            <div class="info-bottom-3">
                <h1><?php for ($i = 0; $i < count($moves); $i++) {echo  $moves[$i]->ability->name. " ";} ?></h1>
            </div>
        </div>
    </div>
<script>


</script>







