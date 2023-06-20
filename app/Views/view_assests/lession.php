<?php 
foreach($lession as $val){
    $id= $val['id'];
    $name= $val['name'];
    $description= $val['description'];
    $video_url= $val['video_url']; 
}
// exit;



?>

<main id="main" class="main"> 
    <section class="section">
        <div class="main-view"> 
        <h1><?=$name?></h1>
        <br><br>
        <div class="col-12 m-auto">
        <iframe width="100%" height="350" src="<?=$video_url?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> 
        </div>
     
        <br><br>
        <p><?=$description?></p>
        </div>
    </section>

</main>