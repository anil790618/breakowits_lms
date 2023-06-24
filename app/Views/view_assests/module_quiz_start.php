<?php
$session = session();
?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center borderd" >
            <h5 class="card-title  " style="padding: 20px 20px 0px 37px;">All Questions are Required </h5>
            <h5 class="card-title timer" id="quiz_time" time="<?=$quiztime['endtime'] ?? '' ?>"> </h5>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form id="quiz_answer_form"   name='quiz_answer_form' method="post">
                   
                        <?php
                        $no = 1;
                        foreach ($quiz_question as $key => $value) {
                        //    echo $value['question'];
                        // echo "<pre>"; 
                        // print_r($quiz_question);
                           ?> 
                        <div class="card">
                            <div class="card-body">
                                <div class="  card-title" style="    padding: 0px 0 0px 0px;"><?=$no?>. <?= $value['question'];?></div>
                                <div class="form-check">
                                    <div> <input class="form-check-input" type="radio" value="1" id="opt<?= $value['id'].$no;?>"  name="question<?=$no?>">  <label class="form-check-label"  > <?= $value['opt1'];?>  </label></div>
                                    <div> <input class="form-check-input" type="radio" value="2" id="opt<?= $value['id'].$no;?>"  name="question<?=$no?>">  <label class="form-check-label"  ><?= $value['opt2'];?>  </label></div>
                                    <div> <input class="form-check-input" type="radio" value="3" id="opt<?= $value['id'].$no;?>"  name="question<?=$no?>">  <label class="form-check-label"  ><?= $value['opt3'];?>  </label></div>
                                    <div> <input class="form-check-input" type="radio" value="4" id="opt<?= $value['id'].$no;?>"  name="question<?=$no?>">  <label class="form-check-label"  ><?= $value['opt4'];?>  </label></div>
                                </div>
                            </div>
                        </div> 
                        <?php

                        $no++;
                        }


                        ?>
                    <input type="hidden" name="student_id" value="<?php    echo  $session->get('id');  ?>">
                    <input type="hidden" name="m_id" value="<?= $value['m_id'];?>">
                    <input type="hidden" name="time" id="time" >
                    <button type="submit" class='btn btn-primary'>Submit Quiz</button>
                </form>
               
            </div>
        </div>
    </section>

</main><!-- End #main -->