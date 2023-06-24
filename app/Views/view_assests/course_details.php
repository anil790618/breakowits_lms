<?php
// echo "<pre>";
// print_r($topic);
// exit;
// echo $topic['t_heading'];
// $modulecount="";
// session_start();
if($topic){
    foreach($topic as $val){
        $t_id= $val['t_id'];
        $c_id= $val['c_id'];
        $title= $val['t_heading'];
        $creater= $val['creater_id'];
        $desc= $val['t_desc'];
        $list= $val['t_list'];
        $requirement= $val['t_requirement'];
        $image= $val['image'];
        $basePrice= $val['price'];
        $currentprice= $val['currentprice'];
        $bgcolor= $val['bgcolor'];
        $textcolor= $val['textcolor'];
    }
}else{
    $t_id=$c_id=$title=$creater=$desc=$list=$requirement=$image=$price="";
}

// exit;



?>

<main id="main" class="main">

    <!-- <div class="pagetitle">
        <h1>Data Tables</h1>
    </div> -->
    <section class="section">
        <div class="main-view">

            <div class="cours-header" style="background-color:<?=$bgcolor??'#000'?>;color:<?=$textcolor?>">
                <div class="container">
                    <div class="row">
                        <div class="alert alert-success" role="alert" id="student_success">
                            Form submitted successfully!
                        </div>
                        <div class="alert alert-danger" role="alert" id="student_error">
                            Form not submitted successfully!
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="cours-short-details">
                                <span id="heading_and_desc_btn" onclick="heading_and_desc(<?=$t_id?>)"> <i
                                        class="bi bi-pencil text-white float-end"
                                        title="Edit Heading and Discription"></i></span>
                                <!-- Modal -->
                                <div class="modal fade" id="heading_and_desc_modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course Module

                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body" id="course_heading_desc">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="coure-brudcurm">
                                    <h1 class="cours-heading" style="color:<?=$textcolor?>">
                                        <?php echo $title;?>
                                    </h1>
                                    <p class="course-title" style="color:<?=$textcolor?>">
                                        <?php echo $desc;?>
                                    </p>

                                    <div class="short-heading">
                                        <div class="bestseller">
                                            Bestseller
                                        </div>
                                        <div class="head-star">
                                            <span class="count-rating">4.8</span>
                                            <div class="star-head">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                            <span class="total-rating">(427 ratings)</span>
                                            <span class="total-student">
                                                <?=$stu_count ?> students
                                            </span>
                                        </div>
                                    </div>

                                    <div class="create-by">
                                        <span class="creator-name">Created by</span>
                                        <a href="javascript:void(0)" class="created">
                                            <?php ;
                                            $conn= mysqli_connect('localhost','root','','learningmanagementsystem');
                                            $sql = "select * from tbl_users where id=$creater";
                                            $rs = mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($rs)){
                                                while($row= mysqli_fetch_assoc($rs)){
                                                    echo $row['first_name']." ".$row['last_name'];
                                                }
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12-col-md-12 col-lg-8">


                            <div class="course-content mt-5">
                                <div class="course-head d-flex justify-content-between">
                                    <h4 class="head-what">Course content</h4>
                                    <div>
                                    </div>
                                </div>
                                <div class="course-del">
                                    <p class="cour-section">
                                        <?=$moduel_count??0  ?> Modules •
                                        <?=$lession_count??0  ?> Lessions
                                    </p>
                                    <div>
                                        <a href="javascript:void(0)" class="px-3" onclick="details_add_module()">Add
                                            Module</a>
                                        <a href="javascript:void(0)" class="px-3" onclick="details_add_lession()">Add
                                            lessions</a>
                                        <a   class="px-3" href="<?=base_url()?>show-all-quises/<?=$t_id?>"> Show Quises</a>
                                    </div>
                                    <!-- <a href="javascript:void(0)" class="expand-all">Expand all sections</a> lession_count  • 3h 11m total time-->
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="details_lession_modal12">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="row " id="details_lession_form">
                                                    <div class="col-6">
                                                        <input type="hidden" name="c_cat_id" id="c_cat_id"
                                                            value="<?=$c_id?>">

                                                    </div>
                                                    <div class="col-12">
                                                        <label for="firstname" class="form-label">Module</label>
                                                        <select class="form-select  mb-3" aria-label=" example"
                                                            name="t_id" id="t_id">
                                                            <!-- <option selected>".$row['name']."</option> -->
                                                            <?php 
                                                                        $conn = mysqli_connect('localhost','root','','learningmanagementsystem');
                                                                        $sql =mysqli_query($conn,"select id,t_id,name from module where t_id=$t_id") ;
                                                                        // $modulecount = mysqli_num_rows($sql);
                                                                        // echo  $modulecount;
                                                                        if(mysqli_num_rows($sql)>0){
                                                                        while($row = mysqli_fetch_assoc($sql)){
                                                                            // print_r($row);
                                                                            // echo $row['name'];
                                                                            echo " <option  value=".$row['id'].">".$row['name']."</option>";
                                                                        }
                                                                        } 
                                                                 ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="name" class="form-label">Lession </label>
                                                        <input type="text" class="form-control" id="name" name="name">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="video_url" class="form-label">video url</label>
                                                        <input type="text" class="form-control" id="video_url"
                                                            name="video_url">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="desc" class="form-label">Description </label>
                                                        <textarea class="form-control" id="description"
                                                            name="description" rows="3"></textarea>
                                                    </div>
                                                    <div class="text-center pt-3">
                                                        <button type="submit" id=""
                                                            class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-secondary"
                                                            data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Details_add_modul Modal -->
                                <div class="modal fade" id="Details_add_modul">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Module Name</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id=" ">
                                                <form class="row" id="detail_update_form">
                                                    <div class="col-12">
                                                        <div class="col-12">
                                                            <input type="hidden" class="form-control" id="t_id"
                                                                name="t_id" value="<?=$t_id?>">
                                                            <textarea name="name" id="name" class="form-control"
                                                                style="width:100%;"></textarea>

                                                        </div>
                                                        <div class="text-center py-3">
                                                            <button type="submit" id=" "
                                                                class="btn btn-primary">Submit</button>
                                                            <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="accordion" id="accordionExample">
                                <?php
                                if($moduel_count > 0){
                                    foreach($module as $val){
                                        // print_r($val);
                                        $id= $val['id']; 
                                        $module_id= $val['id']; 
                                        // $ses_data = ['module_id'=> $id];
                                        // $session->set($ses_data); 
                                        // echo $id;
                                        $name= $val['name']; 
                                        echo "
                                        <div class='accordion-item'>
                                            <h2 class='accordion-header d-flex align-items-center' id='headingOne'>
                                                <button class='accordion-button collapsed d-block w-100 d-flex justify-content-between px-3  acc_btn'type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne".$id."' aria-expanded='true' aria-controls='collapseOne'>
                                                    <span class='arr-head acc_btn_span'  style='font-size:20px ' >".$name."</span> 
                                                    </button> 
                                                    <i class='bi bi-pencil py-3 px-2 'style='font-size:20px'  onclick='detail_course_module($id)'></i>
                                                    <a href='javascript:void(0)' class='px-3' onclick='addQuiz_fun($id)'  style='font-size:16px;white-space:nowrap'>Add Quiz </a>
                                            </h2>
                                            <div id='collapseOne".$id."' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                                            "?>
                                <div class="modal fade" id="detail_module_modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course
                                                    Module </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body" id="detail_module_modal_data">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php 
                                                        $id =  $id ; 
                                                        $conn = mysqli_connect('localhost','root','','learningmanagementsystem');
                                                        $sql =mysqli_query($conn,"select id,name,video_url from module_lession where t_id=$id") ;
                                                        if(mysqli_num_rows($sql)>0){
                                                        while($row = mysqli_fetch_assoc($sql)){ 
                                                            $l_id = $row['id']; 
                                                ?>
                                <div class='accordion-body d-flex justify-content-between '>

                                    <a href="<?=base_url()?>lession/<?=$l_id ?>">
                                        <div class="d-flex justify-content-between" style='flex-grow:1'>
                                            <span>
                                                <?php echo $row['name'] ; ?>
                                            </span>
                                            <a class="myvideoplay" onclick="myvideoplay(<?=$l_id ?>)"><i
                                                    class="bi bi-play-circle-fill" style='font-size:25px'></i></a>
                                        </div>
                                    </a>
                                    <i class='bi bi-pencil-square   px-2 ' style='font-size:15px'
                                        onclick='detail_course_lession(<?=$l_id ?>)'></i>
                                </div>
                                <!-- lession  Modal -->
                                <div class="modal modal-lg fade" id="details_lession_modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Lession
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body" id="detail_lession_data">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                      }
                      } else{
                          echo " <div id='collapseOne' class='accordion-collapse collapse show' data-bs-parent='#accordionExample'>
                          <div class='accordion-body'>
                          create lession
                          </div>
                          </div>";
                      }
                  
                  echo " 
                  </div>
                  </div>
                      ";
                  } 
                  }else{
                      echo"<div class='accordion-item'>
                      <h2 class='accordion-header'>
                      <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                      Create Module
                      </button>
                      </h2>
                      <div id='collapseOne' class='accordion-collapse collapse show' data-bs-parent='#accordionExample'>
                      <div class='accordion-body'>
                      create lession
                      </div>
                      </div>
                  </div>";
                  }
          
                  ?>

                            </div>

                        </div>

                        <div class="what-you-learn ">
                            <div class="d-flex justify-content-between">
                                <h4 class="head-what">What you'll learn</h4>
                                <span id=" " onclick="what_you_learn(<?=$t_id?>)"> <i class="bi bi-pencil"
                                        title="Edit topics"></i> </span>
                                <!-- Modal -->
                                <div class="modal fade" id="what_you_will_learn">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">What you'll
                                                    learn</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body" id="what_you_will_learn_m">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="list-what-learn">
                                        <ul>
                                            <?php
                                 $arr = explode(",",$list);
                                //  print_r($arr);
                                foreach($arr as $v){
                                    echo'  <li><i class="fas fa-check"></i> <span class="fl-l">'.$v.'</span> </li>';
                                } 
                                ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- <div class="requiremnet">
                    <h4 class="head-what">Requirements</h4>
                    <p class="cour-section">• Basic equipment required for the practical sections</p>
                </div> -->
                        <div class="requiremnet-description my-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="head-what">Requirements</h4>
                                <span id=" " onclick="requirement_fun()"> <i class="bi bi-pencil"
                                        title="Edit topics"></i> </span>
                                <!-- Modal -->
                                <div class="modal fade" id="requirement_modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Requirements</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body" id="wrequirement_modal_m">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="cour-section more bg-more">
                                <?php echo $requirement;?>
                            </p>

                            <a href="" class="read-more"></a>
                        </div>





                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="sidebar-cour">
                            <div class="video-img">
                                <img src="<?php
                                echo (!$image)?'https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled-1150x647.png':base_url().'media/course/thumb/'.$image;
                                ?>
                               ">
                                <!-- <?=base_url()?>media/course/thumb/<?=$image ?>??'https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled-1150x647.png'" alt=""> -->
                            </div>
                            <div class="con-side">
                                <div class="side-price">
                                    <?php 
                                        if($currentprice != $basePrice){
                                            $per = ($currentprice*100)/$basePrice ;
                                            $pc = 100-floor($per);
                                            echo "<span class='main-price'>₹$currentprice</span>
                                            <span class='main-dis'>₹$basePrice</span>
                                            <span class='main-perc'>$pc%  off</span>
                                            <p class='time-left'><i class='far fa-clock'></i> <b>5 hours</b> left at this price!
                                            </p>";

                                        } else{
                                            echo "<span class='main-price'>₹$currentprice</span>";
                                        }
                                    ?>


                                </div>

                                <div class="add-to-cart-wislist">
                                    <div class="add-to-cart btn btn-main">Enroll Now</div>
                                    <div class="whislist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 256 256">
                                            <path fill="currentColor"
                                                d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="buy-now btn btn-solid-border">Add to wish list</div>

                                <p class="money-back"></p>

                                <div class="course-side-usp">
                                    <p class="usp-heading">What you'll learn:</p>
                                    <!-- <span id="What_you_learn_btn"> <i class="bi bi-pencil" title="Edit topics" ></i> </span>    -->

                                    <ul>
                                        <?php
                                 $arr = explode(",",$list);
                                //  print_r($arr);
                                foreach($arr as $v){
                                    echo'  <li><i class="fas fa-check"></i> <span class="fl-l">'.$v.'</span> </li>';
                                } 
                                ?>
                                    </ul>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
 <!--Details_add_modul Modal -->
 <div class="modal fade" id="quiz_modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Quiz</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id=" ">
                                                <form class="row" id="quiz_form">
                                                    <div class="col-12">
                                                        <input type="hidden" class="form-control" id="m_id"
                                                            name="m_id" value="
                                                             // $module_id
                                                             
                                                             ">
                                                          
                                                        <!-- <textarea name="name" id="name" class="form-control"
                                                            style="width:100%;"></textarea> -->

                                                    </div>
                                                    <div class="col-12">
                                                        <label for="question" class="form-label">Question </label>
                                                        <input type="text" name="question" id="question" class="form-control"> 
                                                    </div>
                                                    <!-- <label   class="form-label">Option </label> -->
                                                    <div class="col-6">
                                                        <label for="firstname" class="form-label">Option 1</label>
                                                        <input type="text" name="opt1" id="opt1" class="form-control"> 
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="firstname" class="form-label">Option 2</label>
                                                        <input type="text" name="opt2" id="opt2" class="form-control"> 
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="firstname" class="form-label">Option 3</label>
                                                        <input type="text" name="opt3" id="opt3" class="form-control"> 
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="firstname" class="form-label">Option 4</label>
                                                        <input type="text" name="opt4" id="opt4" class="form-control"> 
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="correct_ans" class="form-label">Correct option</label>
                                                        <select class="form-select" aria-label="Default select example"  name="correct_ans" id="correct_ans">
                                                            <option selected> select correct option</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                            <option value="4">Four</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="text-center py-3">
                                                            <button type="submit" id=" "
                                                                class="btn btn-primary">Submit</button>
                                                            <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
</main><!-- End #main -->