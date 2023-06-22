<main id="main" class="main">

    <div class="pagetitle">
        <!-- <h1>Data Tables</h1> -->
        <!-- form submit status  -->
        <!-- <div class="alert " id="form_submit_status" role="alert"> -->
        <div class="alert alert-success" role="alert" id="c-success">
            Form submitted successfully!
        </div>
        <div class="alert alert-danger" role="alert" id="c-error">
            Form not submitted successfully!
        </div>


    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="h d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Course List</h5>
                            <button class="btn btn-primary" id="course_input_btn">+Add</button>
                            <!-- Modal -->
                            <div class="modal modal-lg fade" id="course_input_modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <!-- Multi Columns Form -->
                                                <form class="row g-3" id="course_input_modal_form" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="col-6">
                                                    <label for="firstname" class="form-label">Category</label>
                                                    <select  class="form-select  mb-3" aria-label=" example" name="c_id" id="c_id">
                                                        <option selected> Select category</option>
                                                        <?php
                                                            if($category){
                                                                foreach($category as $vc){
                                                                    $id = $vc['c_id'] ;
                                                                    echo "<option value=".$vc['c_id'].">".$vc['c_name']."</option>";
                                                                }
                                                            }
                                                        ?>
                                                        
                                                        </select>
                                                    </div>
                                                <div class="col-6">
                                                    <label for="firstname" class="form-label">Subcategory</label>
                                                    <select class="form-select  mb-3" aria-label=" example" name="cat_id" id="cat_id">
                                                        <option selected> Select subcategory</option>
                                                    
                                                        </select>
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <label for="c_id" class="form-label">Course
                                                        </label>
                                                        <select class="form-select" name="c_id" id="c_id">
                                                            <option selected>Select Course </option>
                                                            <?php 
                                                            // if($category){
                                                            //     foreach($category as $vaue){
                                                            //         echo ' <option value="'.$vaue['c_id'].'">'.$vaue['c_name'].'</option>';

                                                            //     }
                                                            // }
                                                            ?>
                                                        </select>
                                                    </div> -->
                                                  
                                                    <div class="col-md-12">
                                                        <label for="t_heading" class="form-label">Course
                                                             </label>
                                                             <input type="text" name="t_heading" id="t_heading"
                                                            class="form-control">
                                                        <!-- <textarea rows="3" name="t_heading" id="t_heading"
                                                            class="form-control"></textarea> -->
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="image" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="image">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="creator_id" class="form-label">Created by</label>
                                                        <select class="form-select  "name="creater_id"  id="creater_id">
                                                            <option selected>Select course Creator</option>
                                                            <?php 
                                                            if($creator){
                                                                foreach($creator as $vaue){
                                                                    echo ' <option value="'.$vaue['id'].'">'.$vaue['first_name'].'</option>';

                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="price" class="form-label">Base Price</label>
                                                        <input type="text" class="form-control" id="price" name="price">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="price" class="form-label">Sale Price</label>
                                                        <input type="text" class="form-control" id="currentprice" name="currentprice">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="t_desc" class="form-label">
                                                            Description</label>
                                                        <textarea name="t_desc" id="t_desc" rows="3"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="t_list" class="form-label">What you will
                                                            learn</label>
                                                        <textarea name="t_list" id="t_list" rows="3"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="t_requirement" class="form-label">
                                                            Requirement</label>
                                                        <textarea name="t_requirement" id="t_requirement" rows="3"
                                                            class="form-control"></textarea>
                                                    </div>

                                                   
                                                    <div class="text-center">
                                                        <button type="submit" id="course_input_modal_btn"
                                                            class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                    </div>
                                                </form>
                                                <!-- End Multi Columns Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table  ">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Topic</th>
                                    <th scope="col">Course Category</th>
                                    <!-- <th scope="col">Created by</th> -->
                                    <th scope="col">price</th>
                                    <!-- <th scope="col">image</th> -->
                                    <th scope="col" class="">Action</th>
                                </tr>
                            </thead>
                            <tbody class="course_list_output">



                            </tbody>
                        </table>

                        <!-- End Table with stripped rows  topic-->

                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="update_course_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="editcourse">

                    </div>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->