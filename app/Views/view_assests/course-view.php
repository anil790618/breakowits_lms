<?php
// echo "<pre>";
// print_r($topic);
// exit;
// echo $topic['t_heading'];
// $modulecount="";
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
                        <div class="col-lg-8 col-md-12">
                            <div class="cours-short-details">
                                 </span>
                                 
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
                                                <?=$stu_count ?> 
                                                students
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
                                </div>
                                <!-- Modal -->
                                 
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
                                        // echo $id;
                                        $name= $val['name']; 
                                        echo "
                                        <div class='accordion-item'>
                                            <h2 class='accordion-header d-flex align-items-center' id='headingOne'>
                                                <button class='accordion-button collapsed d-block w-100 d-flex justify-content-between px-3  acc_btn'type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne".$id."' aria-expanded='true' aria-controls='collapseOne'>
                                                    <span class='arr-head acc_btn_span'  style='font-size:20px ' >".$name."</span> 
                                                    </button> 
                                                    
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
                                                                </div> 
                                                                <?php
                                                    }
                                                    $quiz = base_url()."mcq-quiz/".$id;
                                                    echo "<a href='$quiz' class='btn btn-info py-0 px-2 mx-3 ' >quiz</a>";
                                                    } else{
                                                        echo " <div id='collapseOne' class='accordion-collapse collapse show' data-bs-parent='#accordionExample'>
                                                        <div class='accordion-body'>
                                                        No lession found
                                                        </div>
                                                        </div>
                                                        ";
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
                      No  module found
                      </button>
                      </h2>
                      <div id='collapseOne' class='accordion-collapse collapse show' data-bs-parent='#accordionExample'>
                      <div class='accordion-body'>
                      No  lession found
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
                     
                        <div class="requiremnet-description my-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="head-what">Requirements</h4>
                                 
                                
                            </div>

                            <p class="cour-section more bg-more">
                                <?php echo $requirement;?>
                            </p>

                            <a href="" class="read-more"></a>
                        </div>
                        <div class="Frequently-Together">
                                <div class="freq-head">
                                    <h4 class="head-what">Students also bought</h4>
                                </div>
                                <div class="Frequently-list">
                                    <div class="Frequently-item">
                                        <div class="img-ba-del">
                                            <div class="fre-item-img">
                                                <img src="https://img-c.udemycdn.com/course/240x135/4714924_95d8_5.jpg"
                                                    alt="">
                                                <div class="add-show">+</div>
                                            </div>
                                            <div class="nst-cour-del">
                                                <div class="fre-con-del">
                                                    <p class="cour-nam">Modern Urban Barber Fade Crash Course</p>
                                                    <p class="ins-p">Alex Rose</p>
                                                </div>
                                                <div class="ins-rating">
                                                    <span class="total-ins-rating">4.8</span>
                                                    <div class="star-head">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                    </div>
                                                    <span class="total-ins-user">(125)</span>
                                                </div>
                                                <div class="bestseller">
                                                    Bestseller
                                                </div>
                                            </div>
                                        </div>

                                        <div class="this-cour-price">
                                            <span class="actaul-price-ins">₹499</span>
                                            <span class="actaul-des-ins">₹4998</span>
                                        </div>


                                    </div>

                                    <div class="Frequently-item">
                                        <div class="img-ba-del">
                                            <div class="fre-item-img">
                                                <img src="https://img-c.udemycdn.com/course/240x135/4714924_95d8_5.jpg"
                                                    alt="">
                                                <div class="add-show">+</div>
                                            </div>
                                            <div class="nst-cour-del">
                                                <div class="fre-con-del">
                                                    <p class="cour-nam">Modern Urban Barber Fade Crash Course</p>
                                                    <p class="ins-p">Alex Rose</p>
                                                </div>
                                                <div class="ins-rating">
                                                    <span class="total-ins-rating">4.8</span>
                                                    <div class="star-head">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                    </div>
                                                    <span class="total-ins-user">(125)</span>
                                                </div>
                                                <div class="bestseller">
                                                    Bestseller
                                                </div>
                                            </div>
                                        </div>

                                        <div class="this-cour-price">
                                            <span class="actaul-price-ins">₹499</span>
                                            <span class="actaul-des-ins">₹4998</span>
                                        </div>


                                    </div>

                                    <div class="Frequently-item">
                                        <div class="img-ba-del">
                                            <div class="fre-item-img">
                                                <img src="https://img-c.udemycdn.com/course/240x135/4714924_95d8_5.jpg"
                                                    alt="">
                                                <div class="add-show">+</div>
                                            </div>
                                            <div class="nst-cour-del">
                                                <div class="fre-con-del">
                                                    <p class="cour-nam">Modern Urban Barber Fade Crash Course</p>
                                                    <p class="ins-p">Alex Rose</p>
                                                </div>
                                                <div class="ins-rating">
                                                    <span class="total-ins-rating">4.8</span>
                                                    <div class="star-head">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                    </div>
                                                    <span class="total-ins-user">(125)</span>
                                                </div>
                                                <div class="bestseller">
                                                    Bestseller
                                                </div>
                                            </div>
                                        </div>

                                        <div class="this-cour-price">
                                            <span class="actaul-price-ins">₹499</span>
                                            <span class="actaul-des-ins">₹4998</span>
                                        </div>


                                    </div>
                                </div>

                                <div class="all-cours-price">
                                    <div class="tot-pr">
                                        <span class="tot-heading">Total :</span>
                                        <span class="tot-price">₹1,497</span>
                                        <span class="tot-des">₹6,597</span>
                                    </div>
                                    <div class="add-to-cart btn btn-main">Add all to cart</div>
                                </div>
                            </div>

                            <div class="Instructor">
                                <div class="Instructor-heading">
                                    <h4 class="head-what">Instructor</h4>
                                </div>
                                <div class="Instructor-content">
                                    <div class="inst-name">
                                        <p class="name-in">Michael Holm</p>
                                        <p class="year-ex">17 years experienced barber</p>
                                    </div>
                                </div>

                                <div class="insta-main-bio">
                                    <div class="inst-bio">
                                        <img src="https://img-c.udemycdn.com/user/200_H/122679069_9b42.jpg"
                                            class="ins-img" alt="">
                                        <div class="bio-con">
                                            <ul>
                                                <li><i class="fas fa-star"></i><span class="ins-bio-fea"> 4.8 Instructor
                                                        Rating</span></li>
                                                <li><i class="fas fa-trophy"></i><span class="ins-bio-fea">486
                                                        Reviews</span></li>
                                                <li><i class="fas fa-user-friends"></i><span class="ins-bio-fea">1,536
                                                        Students</span></li>
                                                <li><i class="fas fa-play-circle"></i><span class="ins-bio-fea">2
                                                        Courses</span></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="ins-bioi items">
                                        <div class="bio-con-p ">
                                            I started my barbering career in 2003 when I joined Angus college in the
                                            north
                                            east of Scotland, followed by 2 years of further learning in traditional
                                            barbering at a well established barbershop in the small town of Arbroath.
                                        </div>
                                        <div class="bio-con-p ">
                                            Having always dreamed of running my own business I moved on from that
                                            position
                                            to open my own barbershop 15 miles away in Montrose, this shop traded very
                                            successfully for 8 years before I moved to a more central location and
                                            opened my
                                            current shop, Chop!_
                                        </div>
                                        <div class="bio-con-p item">
                                            Chop!_ has operated successfully for six years and during that time I've
                                            been
                                            published in industry magazines, won a trade award, lectured at the college
                                            I
                                            begun my career, become a finalist in Scotland's best barber 2019 and opened
                                            another shop in the city of Aberdeen.
                                        </div>
                                        <div class="bio-con-p item">
                                            I have almost fifteen years of experience in training my own staff who have
                                            ranged from students with no knowledge whatsoever coming into the trade and
                                            those leaving college. Some of whom have gone on to open their own thriving
                                            businesses elsewhere or found employment in other successful barbershops.
                                        </div>
                                        <div class="bio-con-p item">
                                            I have a passion for this wonderful creative industry and it is my hope that
                                            I
                                            can share everything I've learned over my many years of service to the next
                                            budding generation of talented barbers.
                                        </div>
                                    </div>

                                  

                                    <div class="more-courses-instutor">
                                        <div class="more-ins-head">
                                            <h4 class="head-what">More Courses by <span style="color: #20ad96;">Michael
                                                    Holm</span></h4>
                                        </div>

                                        <div class="more-course">
                                            <div class="more-cour-div">
                                                <div class="more-cours-img">
                                                    <img src="https://img-c.udemycdn.com/course/240x135/4527446_8eb4.jpg"
                                                        alt="">
                                                </div>
                                                <div class="more-courses-con">
                                                    <p class="cour-head-more">Learn beginners Gents Scissor Cutting |
                                                        Barbering</p>
                                                    <p class="more-course-ins-name">Michael Holm</p>
                                                    <div class="rading-div-start star-head">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                        <span class="total-view">(59)</span>
                                                    </div>
                                                    <p class="total-hour">1.5 total hours - 15 lectures - Beginner</p>
                                                    <p class="more-cour-price"><span class="autal-pmore">₹
                                                       
                                                        </span><span class="discount-pri">₹1,999</span></p>
                                                </div>
                                            </div>

                                            <div class="more-cour-div">
                                                <div class="more-cours-img">
                                                    <img src="https://img-c.udemycdn.com/course/240x135/4527446_8eb4.jpg"
                                                        alt="">
                                                </div>
                                                <div class="more-courses-con">
                                                    <p class="cour-head-more">Learn beginners Gents Scissor Cutting |
                                                        Barbering</p>
                                                    <p class="more-course-ins-name">Michael Holm</p>
                                                    <div class="rading-div-start star-head">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                        <span class="total-view">(59)</span>
                                                    </div>
                                                    <p class="total-hour">1.5 total hours - 15 lectures - Beginner</p>
                                                    <p class="more-cour-price"><span class="autal-pmore">₹
                                                     
                                                        </span><span class="discount-pri">₹1,999</span></p>
                                                </div>
                                            </div>

                                            <div class="more-cour-div">
                                                <div class="more-cours-img">
                                                    <img src="https://img-c.udemycdn.com/course/240x135/4527446_8eb4.jpg"
                                                        alt="">
                                                </div>
                                                <div class="more-courses-con">
                                                    <p class="cour-head-more">Learn beginners Gents Scissor Cutting |
                                                        Barbering</p>
                                                    <p class="more-course-ins-name">Michael Holm</p>
                                                    <div class="rading-div-start star-head">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                        <span class="total-view">(59)</span>
                                                    </div>
                                                    <p class="total-hour">1.5 total hours - 15 lectures - Beginner</p>
                                                    <p class="more-cour-price"><span class="autal-pmore">₹ 
                                                        </span><span class="discount-pri">₹1,999</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="sidebar-cour">
                            <div class="video-img">
                                <img src="<?php
                                echo (!$image)?'https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled-1150x647.png':base_url().'media/course/thumb/'.$image;
                                ?>
                               "> 
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
                                <div class="buy-now btn btn-solid-border" id="Add_to_wish_list">Add to wish list</div>

                                <p class="money-back"></p>

                                <div class="course-side-usp">
                                    <p class="usp-heading">What you'll learn:</p>  <ul>
                                        <?php
                                 $arr = explode(",",$list); 
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
 
</main><!-- End #main -->