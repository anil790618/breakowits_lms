<main id="main" class="main">

  <div class="pagetitle">
    <!-- <h1>Data Tables</h1>  -->
    <!-- form submit status  -->
    <!-- <div class="alert " id="form_submit_status" role="alert"> -->
    <div class="alert alert-success" role="alert" id="student_success">
      Form submitted successfully!
    </div>
    <div class="alert alert-danger" role="alert" id="student_error">
      Form not submitted successfully!
    </div>


  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="h d-flex justify-content-between align-items-center">
              <h5 class="card-title" style="font-size:30px"> Subcategory </h5>
              <button class="btn btn-primary" id="module_modal_btn">+Add</button>
              <!-- Modal -->
              <div class="modal fade" id="module_modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Add   Subcategory </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body">
                        <!-- <h5 class="card-title">Vertical Form</h5>  -->
                        <form class="row g-3" id="course_module_form">
                          <div class="col-12">
                            <!-- <input type="hidden" class="form-control" id="user_role_id" name="user_role_id" value="3"> -->
                            <label for="firstname" class="form-label"> Category</label>
                            <!-- <input type="text" class="form-control" id="firs_tname"  name="first_name"> -->
                            <select class="form-select  mb-3" aria-label=" example" name="c_cat_id" id="c_cat_id">
                              <option selected>Open this select menu</option>
                              <?php
                                    if($category){
                                          foreach($category as $vc){
                                            echo "<option value=".$vc['c_id'].">".$vc['c_name']."</option>";
                                          }
                                    }
                                  ?>

                            </select>
                          </div>
                          <div class="col-12">
                            <label for="name" class="form-label"> Subcategory name</label>
                            <input type="text" class="form-control" id="name" name="name">
                          </div>
                          <div class="text-center">
                            <button type="submit" id="course_module_btn" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                          </div>
                        </form><!-- Vertical Form -->
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
                  <th scope="col">Category Name</th>
                  <th scope="col">Subcategory</th>
                  <th scope="col" class="">Action</th>
                </tr>
              </thead>
              <tbody class="module_output">
                <!-- <?php
                  if($module){
                    foreach($module as $vaue){

                        ?>
                         <tr>
                         <td><?php echo $vaue['id']   ?></td> 
                         <td><?php  
                         $id =  $vaue['c_cat_id'] ;
                         $conn = mysqli_connect('localhost','root','','learningmanagementsystem');
                         $sql =mysqli_query($conn,"select c_name from course_category where c_id=$id") ;
                         if(mysqli_num_rows($sql)>0){
                            while($row = mysqli_fetch_assoc($sql)){
                                // print_r($row);
                                echo $row['c_name'];
                            }
                         }  
                         ?></td> 
                         <td><?php echo $vaue['name']   ?></td> 
                         <td> 
                          <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                          <a href="category_delete/$vaue['id'] "><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                         </td>
                         </tr> 
                         <?php 
                    }
                }
                ?> -->

              </tbody>
            </table>
            <!-- End Table with stripped rows module -->

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Modal -->
  <div class="modal fade" id="module_update_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="module_update_form">

        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>
</main><!-- End #main -->