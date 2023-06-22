<main id="main" class="main">

    <div class="pagetitle">
        <!-- <h1>Data Tables</h1> -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class=" ">
                    <div class="">
                        <div class="h d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Course Details</h5>
                        </div>
                        <div class="container">
                            <div class="row stu_courselist" id="stu_courselist">
                            <?php
                                if($category){
                                    foreach($category as $value){ 
                                        ?>
                                      <div class="col-sm-6 col-md-4">
                                            <div class="card">
                                                <!-- <img src="<?=$value['image']?>"
                                                    class="card-img-top" alt="..." > -->
                                                <div class="courceimg"  style="height:200px;background:url(<?=base_url()?>media/course/thumb/<?=$value['image']?>) no-repeat center top/contain;">

                                                </div>
                                                <div class="course-content px-4 py-3">
                                                 <a href="<?=base_url()?>course-view/<?=$value['t_id']?>"> <h5 class="course-cat p-0 m-0"> <?php $dh = $value['t_heading'];   echo substr($dh,0,50)?></h5></a> 
                                                    <p><p href="#"><?php $dt = $value['t_desc'];   echo substr($dt,0,100)?></p></p>
                                                    <div class="course-meta">
                                                        <span class="course-student"><i class="bi bi-person-fill px-2"></i>340
                                                            Students</span>
                                                        <span class="course-duration"><i class="bi bi-card-checklist px-2"></i>82
                                                            Lessons</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }

                                ?> 
                            </div>
                        </div> 

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->