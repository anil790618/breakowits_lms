<?php
$session = session();
?>

<main id="main" class="main"> 
<section class="section">
<div class="row">
  <div class="col-lg-12 d-flex justify-content-center align-items-center" style="height:70vh"> 
      <div class="quiz_condition">
      <div class="card">
      <h5 class="card-title  "  style="padding: 20px 20px 0px 37px;"> Mr. <?= $session->get('firstname')?>  your Result is  :  </h5>
          <div class="card-body" style="padding: 0 20px 20px 20px;">
          <ol>
          <?php
          if($result){
            foreach($result as $id=>$val){
                // print_r($val);
                // if($val['time']){
                //     $dt = $val['time'];
                //     $time1 = new DateTime($dt);
                //     $time2 = new DateTime('01:30:00');
    
                //     // Calculate the difference
                //     $interval = $time1->diff($time2);
    
                //     // Get the difference in minutes and seconds
                //     $minuteDifference = $interval->i;
                //     $secondDifference = $interval->s; 
                // }
                ?>
                 
                              <li>Correct Questions :  <?=$val['correct_question']?></li>
                              <li>Marks :  <?=$val['marks']?></li>
                              <li>Taken Time :  <?= "00:00" ?></li>
                         
                <?php
            }
          }

          ?>
             </ol>
              <div class="mx-3">
              <a href="#" class="btn btn-outline-primary">Exit </a> 
              </div>
           
          </div>
          </div>
      </div>
  </div>
</div>
</section>

</main> 
