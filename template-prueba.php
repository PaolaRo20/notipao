<?php 
// Template Name: Prueba
get_header( );
$video = get_field("video");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://newsapi.org/v2/top-headlines?country=co&apiKey=aa61b89ba0e5465cacdf190cf786c932",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$noticias = curl_exec($curl);
$noticias = json_decode($noticias);

curl_close($curl);
?>



<?php if($video):  ?>
    <div class="video">
        <div class="overlay"></div>
        <video controls="false" autoplay="true" muted="true" loop="true">
            <source src="<?= $video["url"] ?>" type="<?= $video["mime_type"] ?>">
        </video>

        <div class="info"> 
            <div class="ciudad"></div>
            <div class="clima"></div>
            <div class="reloj"></div>
        </div>

        <h1>NOTICIAS</h1>
    </div>
<?php endif; ?>

<div class="container">
    
    <?php if($noticias): ?>
        <div class="noticias">
            <?php if($noticias->articles):?>
                <?php foreach($noticias->articles as $key => $articulo): ?>
                    <div class="articulo">
                        <div class="imagen">
                            <img src="<?= $articulo->urlToImage?>" alt="">
                        </div>
                        <div class="contenido">
                            <h2><?= $articulo->title ?></h2>
                            <p><?= $articulo->description ?></p>
                            <div class="autor">
                                <?= $articulo->author?> - <?= $articulo->source->name?>
                            </div>
                            <div class="link">
                               <a target="_blank" href=" <?= $articulo->url ?>">Ver mas</a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- <pre>
        <?php print_r($noticias) ?>
    </pre> -->
   
</div>

<?php get_footer();
?>