<?php
// echo "<pre>";
// print_r($topic);
// exit;
// echo $topic['t_heading'];
foreach($topic as $val){
    $title= $val['t_heading'];
    $creater= $val['creater_id'];
    $desc= $val['t_desc'];
    $list= $val['t_list'];
    $requirement= $val['t_requirement'];
    $image= $val['image'];
    $price= $val['price'];
}
// exit;



?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
    </div>
    <section class="section">
    <div class="main-view">

<div class="cours-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cours-short-details">
                    <div class="coure-brudcurm">
                    <h1 class="cours-heading"><?php echo $title;?></h1>
                        <p class="course-title"><?php echo $desc;?></p>

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
                                <span class="total-student">1,448 students</span>
                            </div>
                        </div>

                        <div class="create-by">
                            <span class="creator-name">Created by</span>
                            <a href="javascript:void(0)" class="created"><?php ;
                            $conn= mysqli_connect('localhost','root','','learningmanagementsystem');
                            $sql = "select * from tbl_users where id=$creater";
                            $rs = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($rs)){
                                while($row= mysqli_fetch_assoc($rs)){
                                    echo $row['first_name']." ".$row['last_name'];
                                }
                            }
                            ?></a>
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

                <div class="what-you-learn">
                    <h4 class="head-what">What you'll learn</h4>
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

                <div class="course-content">
                    <div class="course-head">
                        <h4 class="head-what">Course content</h4>
                    </div>
                    <div class="course-del">
                        <p class="cour-section">12 sections • 23 lectures • 3h 11m total length</p>
                        <a href="javascript:void(0)" class="expand-all">Expand all sections</a>
                    </div>
                    <div class="accordion" id="accordionExample">

                        <?php
                            foreach($module as $val){
                                $id= $val['id'];
                                $name= $val['name']; 
                                echo "
                                <div class='accordion-item'>
                                    <h2 class='accordion-header ' id='headingOne'>
                                        <button class='accordion-button d-block w-100 d-flex justify-content-between px-3  acc_btn'type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne".$id."' aria-expanded='true' aria-controls='collapseOne'>
                                            <span class='arr-head acc_btn_span'  style='font-size:20px ' >".$name."</span> 
                                        </button> 
                                    </h2>
                                    <div id='collapseOne".$id."' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                                    "?>

                                                                            <?php 
                                        $id =  $id ; 
                                        $conn = mysqli_connect('localhost','root','','learningmanagementsystem');
                                        $sql =mysqli_query($conn,"select name from module_lession where m_id=$id") ;
                                        if(mysqli_num_rows($sql)>0){
                                        while($row = mysqli_fetch_assoc($sql)){ 

                            ?>
                        <div
                            class='accordion-body d-flex justify-content-between'>
                            <?php echo $row['name']  ?>
                            <a  class="myvideoplay" ><i
                                    class="bi bi-play-circle-fill"></i></a>
                        </div>
                        <?php
                                    }
                                    } 
                                
                                echo " 
                                </div>
                        </div>
                            ";
                        } 
                        ?>
                        <!-- Modal -->
<div class="modal fade" id="videomodal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- <iframe src="demo_iframe.htm" height="200" width="300" title="Iframe Example"></iframe> https://www.youtube.com/embed/9xwazD5SyVg -->
      <iframe width="100%" height="315" src="https://www.youtube.com/embed/9xwazD5SyVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
  
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                        </div>
                    
                </div>

                <!-- <div class="requiremnet">
                    <h4 class="head-what">Requirements</h4>
                    <p class="cour-section">• Basic equipment required for the practical sections</p>
                </div> -->
                <div class="requiremnet-description my-3">
                    <h4 class="head-what">Requirements</h4>
                    <p class="cour-section more bg-more">
                    <?php echo $requirement;?>
                    </p>

                    <a href="" class="read-more"></a>
                </div>

                <div class="also-bought">
                    <div class="also-bought-head">
                        <h4 class="head-what">Students also bought</h4>
                    </div>
                    <div class="also-bought-list items">
                        <div class="also-b-item item">
                            <div class="b-img">
                            <img src="<?php echo base_url().$image ?>" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>

                        <div class="also-b-item item">
                            <div class="b-img">
                                <img src="assets/images/clients/test-1.jpg" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>

                        <div class="also-b-item item ">
                            <div class="b-img">
                                <img src="assets/images/clients/test-1.jpg" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>

                        <div class="also-b-item item">
                            <div class="b-img">
                                <img src="assets/images/clients/test-1.jpg" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>

                        <div class="also-b-item item">
                            <div class="b-img">
                                <img src="assets/images/clients/test-1.jpg" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>

                        <div class="also-b-item item">
                            <div class="b-img">
                                <img src="assets/images/clients/test-1.jpg" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>

                        <div class="also-b-item item ">
                            <div class="b-img">
                                <img src="assets/images/clients/test-1.jpg" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>

                        <div class="also-b-item item">
                            <div class="b-img">
                                <img src="assets/images/clients/test-1.jpg" alt="">
                            </div>
                            <div class="b-con">
                                <p class="also-con-head">
                                    Learn beginners Gents Scissor Cutting | Barbering Skills
                                </p>
                                <p class="total-hour">
                                    <span class="total-h">1 total hours </span>
                                    <span class="updated">Updated 2/2022</span>
                                </p>
                            </div>
                            <div class="rating-user-price">
                                <div class="b-rating">
                                    <span class="count-b">4.9 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="b-user">
                                    <span class="count-b"><i class="fas fa-user-friends"></i> 222</span>
                                </div>
                                <div class="b-price">
                                    <div class="actual-price">₹499</div>
                                    <div class="dis-price">₹499</div>
                                </div>
                            </div>
                            <div class="wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M178 32c-20.65 0-38.73 8.88-50 23.89C116.73 40.88 98.65 32 78 32a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 220.66 240 164 240 94a62.07 62.07 0 0 0-62-62Zm-50 174.8C109.74 196.16 32 147.69 32 94a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
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
                            <img src="https://img-c.udemycdn.com/user/200_H/122679069_9b42.jpg" class="ins-img"
                                alt="">
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
                                I started my barbering career in 2003 when I joined Angus college in the north
                                east of Scotland, followed by 2 years of further learning in traditional
                                barbering at a well established barbershop in the small town of Arbroath.
                            </div>
                            <div class="bio-con-p ">
                                Having always dreamed of running my own business I moved on from that position
                                to open my own barbershop 15 miles away in Montrose, this shop traded very
                                successfully for 8 years before I moved to a more central location and opened my
                                current shop, Chop!_
                            </div>
                            <div class="bio-con-p item">
                                Chop!_ has operated successfully for six years and during that time I've been
                                published in industry magazines, won a trade award, lectured at the college I
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
                                I have a passion for this wonderful creative industry and it is my hope that I
                                can share everything I've learned over my many years of service to the next
                                budding generation of talented barbers.
                            </div>
                        </div>

                        <div class="cours-rating">
                            <div class="rating-head">
                                <h4 class="head-what"><i class="fa fa-star rating-i"></i>4.8 course rating
                                    <span>427 ratings</span></h4>
                            </div>
                            <div class="student-uers">

                                <div class="stu-uers-rating">
                                    <div class="stu-rating-head">
                                        <div class="stupro-ra">
                                            <div class="pro-name">NC</div>
                                            <div class="stu-name-and-rating">
                                                <p class="name-stu">Sunil jindal</p>
                                                <div class="rading-div-start star-head">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half"></i>
                                                </div>
                                                <p class="duration">a week ago</p>
                                            </div>
                                        </div>
                                        <div class="repost-ins">
                                            <div class="btn-group dropleft">
                                                <a href="javascript:void(0)" class="dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 20 20">
                                                        <g fill="currentColor">
                                                            <circle cx="10" cy="15" r="2" />
                                                            <circle cx="10" cy="10" r="2" />
                                                            <circle cx="10" cy="5" r="2" />
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Report</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stu-para">
                                        <p>
                                            Great Course! Gone from knowing nothing to actually having the
                                            skills to cut hair. Amazing for anyone who wants to start out
                                        </p>
                                    </div>
                                    <div class="stu-help">
                                        <span>Helpful?</span>

                                        <!-- like -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 9v12H1V9h4m4 12a2 2 0 0 1-2-2V9c0-.55.22-1.05.59-1.41L14.17 1l1.06 1.06c.27.27.44.64.44 1.05l-.03.32L14.69 8H21a2 2 0 0 1 2 2v2c0 .26-.05.5-.14.73l-3.02 7.05C19.54 20.5 18.83 21 18 21H9m0-2h9.03L21 12v-2h-8.79l1.13-5.32L9 9.03V19Z" />
                                        </svg>

                                        <!-- dislike -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19 15V3h4v12h-4M15 3a2 2 0 0 1 2 2v10c0 .55-.22 1.05-.59 1.41L9.83 23l-1.06-1.06c-.27-.27-.44-.64-.44-1.06l.03-.31l.95-4.57H3a2 2 0 0 1-2-2v-2c0-.26.05-.5.14-.73l3.02-7.05C4.46 3.5 5.17 3 6 3h9m0 2H5.97L3 12v2h8.78l-1.13 5.32L15 14.97V5Z" />
                                        </svg>

                                    </div>
                                </div>

                                <div class="stu-uers-rating">
                                    <div class="stu-rating-head">
                                        <div class="stupro-ra">
                                            <div class="pro-name">NC</div>
                                            <div class="stu-name-and-rating">
                                                <p class="name-stu">Sunil jindal</p>
                                                <div class="rading-div-start star-head">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half"></i>
                                                </div>
                                                <p class="duration">a week ago</p>
                                            </div>
                                        </div>
                                        <div class="repost-ins">
                                            <div class="btn-group dropleft">
                                                <a href="javascript:void(0)" class="dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 20 20">
                                                        <g fill="currentColor">
                                                            <circle cx="10" cy="15" r="2" />
                                                            <circle cx="10" cy="10" r="2" />
                                                            <circle cx="10" cy="5" r="2" />
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Report</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stu-para">
                                        <p>
                                            Great Course! Gone from knowing nothing to actually having the
                                            skills to cut hair. Amazing for anyone who wants to start out
                                        </p>
                                    </div>
                                    <div class="stu-help">
                                        <span>Helpful?</span>

                                        <!-- like -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 9v12H1V9h4m4 12a2 2 0 0 1-2-2V9c0-.55.22-1.05.59-1.41L14.17 1l1.06 1.06c.27.27.44.64.44 1.05l-.03.32L14.69 8H21a2 2 0 0 1 2 2v2c0 .26-.05.5-.14.73l-3.02 7.05C19.54 20.5 18.83 21 18 21H9m0-2h9.03L21 12v-2h-8.79l1.13-5.32L9 9.03V19Z" />
                                        </svg>

                                        <!-- dislike -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19 15V3h4v12h-4M15 3a2 2 0 0 1 2 2v10c0 .55-.22 1.05-.59 1.41L9.83 23l-1.06-1.06c-.27-.27-.44-.64-.44-1.06l.03-.31l.95-4.57H3a2 2 0 0 1-2-2v-2c0-.26.05-.5.14-.73l3.02-7.05C4.46 3.5 5.17 3 6 3h9m0 2H5.97L3 12v2h8.78l-1.13 5.32L15 14.97V5Z" />
                                        </svg>

                                    </div>
                                </div>

                                <div class="stu-uers-rating">
                                    <div class="stu-rating-head">
                                        <div class="stupro-ra">
                                            <div class="pro-name">NC</div>
                                            <div class="stu-name-and-rating">
                                                <p class="name-stu">Sunil jindal</p>
                                                <div class="rading-div-start star-head">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half"></i>
                                                </div>
                                                <p class="duration">a week ago</p>
                                            </div>
                                        </div>
                                        <div class="repost-ins">
                                            <div class="btn-group dropleft">
                                                <a href="javascript:void(0)" class="dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 20 20">
                                                        <g fill="currentColor">
                                                            <circle cx="10" cy="15" r="2" />
                                                            <circle cx="10" cy="10" r="2" />
                                                            <circle cx="10" cy="5" r="2" />
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Report</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stu-para">
                                        <p>
                                            Great Course! Gone from knowing nothing to actually having the
                                            skills to cut hair. Amazing for anyone who wants to start out
                                        </p>
                                    </div>
                                    <div class="stu-help">
                                        <span>Helpful?</span>

                                        <!-- like -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 9v12H1V9h4m4 12a2 2 0 0 1-2-2V9c0-.55.22-1.05.59-1.41L14.17 1l1.06 1.06c.27.27.44.64.44 1.05l-.03.32L14.69 8H21a2 2 0 0 1 2 2v2c0 .26-.05.5-.14.73l-3.02 7.05C19.54 20.5 18.83 21 18 21H9m0-2h9.03L21 12v-2h-8.79l1.13-5.32L9 9.03V19Z" />
                                        </svg>

                                        <!-- dislike -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19 15V3h4v12h-4M15 3a2 2 0 0 1 2 2v10c0 .55-.22 1.05-.59 1.41L9.83 23l-1.06-1.06c-.27-.27-.44-.64-.44-1.06l.03-.31l.95-4.57H3a2 2 0 0 1-2-2v-2c0-.26.05-.5.14-.73l3.02-7.05C4.46 3.5 5.17 3 6 3h9m0 2H5.97L3 12v2h8.78l-1.13 5.32L15 14.97V5Z" />
                                        </svg>

                                    </div>
                                </div>

                                <div class="stu-uers-rating">
                                    <div class="stu-rating-head">
                                        <div class="stupro-ra">
                                            <div class="pro-name">NC</div>
                                            <div class="stu-name-and-rating">
                                                <p class="name-stu">Sunil jindal</p>
                                                <div class="rading-div-start star-head">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half"></i>
                                                </div>
                                                <p class="duration">a week ago</p>
                                            </div>
                                        </div>
                                        <div class="repost-ins">
                                            <div class="btn-group dropleft">
                                                <a href="javascript:void(0)" class="dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 20 20">
                                                        <g fill="currentColor">
                                                            <circle cx="10" cy="15" r="2" />
                                                            <circle cx="10" cy="10" r="2" />
                                                            <circle cx="10" cy="5" r="2" />
                                                        </g>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Report</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stu-para">
                                        <p>
                                            Great Course! Gone from knowing nothing to actually having the
                                            skills to cut hair. Amazing for anyone who wants to start out
                                        </p>
                                    </div>
                                    <div class="stu-help">
                                        <span>Helpful?</span>

                                        <!-- like -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 9v12H1V9h4m4 12a2 2 0 0 1-2-2V9c0-.55.22-1.05.59-1.41L14.17 1l1.06 1.06c.27.27.44.64.44 1.05l-.03.32L14.69 8H21a2 2 0 0 1 2 2v2c0 .26-.05.5-.14.73l-3.02 7.05C19.54 20.5 18.83 21 18 21H9m0-2h9.03L21 12v-2h-8.79l1.13-5.32L9 9.03V19Z" />
                                        </svg>

                                        <!-- dislike -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19 15V3h4v12h-4M15 3a2 2 0 0 1 2 2v10c0 .55-.22 1.05-.59 1.41L9.83 23l-1.06-1.06c-.27-.27-.44-.64-.44-1.06l.03-.31l.95-4.57H3a2 2 0 0 1-2-2v-2c0-.26.05-.5.14-.73l3.02-7.05C4.46 3.5 5.17 3 6 3h9m0 2H5.97L3 12v2h8.78l-1.13 5.32L15 14.97V5Z" />
                                        </svg>

                                    </div>
                                </div>
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
                                        <p class="more-cour-price"><span class="autal-pmore">₹  <?=$price?></span><span
                                                class="discount-pri">₹1,999</span></p>
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
                                        <p class="more-cour-price"><span class="autal-pmore">₹  <?=$price?></span><span
                                                class="discount-pri">₹1,999</span></p>
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
                                        <p class="more-cour-price"><span class="autal-pmore">₹  <?=$price?></span><span
                                                class="discount-pri">₹1,999</span></p>
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
                        <img src="assets/images/video-1.png" alt="">
                    </div>
                    <div class="con-side">
                        <div class="side-price">
                            <span class="main-price">₹529</span>
                            <span class="main-dis">₹2,899</span>
                            <span class="main-perc">82% off</span>
                        </div>
                        <p class="time-left"><i class="far fa-clock"></i> <b>5 hours</b> left at this price!</p>
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

</main><!-- End #main -->