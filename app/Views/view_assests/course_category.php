<main id="main" class="main">

  <div class="pagetitle">
    <!-- <h1>Data Tables</h1>  -->
    <!-- form submit status  -->
    <!-- <div class="alert " id="form_submit_status" role="alert"> -->
    <div class="alert alert-success" role="alert" id="c-success">
      Category Added successfully!
    </div>
    <div class="alert alert-danger" role="alert" id="c-error">
    Category not Added successfully!
    </div>


  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card px-3">
          <div class="card-body p-0">
            <div class="h d-flex justify-content-between align-items-center p-0 m-0">
              <h1 class="card-title h1" style="font-size:30px">Category</h1>
              <button class="btn btn-primary" id="category_modal_btn">+Add</button>
              <!-- Modal -->
              <div class="modal fade" id="category_modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body">
                        <form class="row g-3" id="category-data" method="post" enctype="multipart/form-data">
                          <div class="col-12">
                            <label for="c_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="c_name" name="c_name">
                          </div>
                          <!-- <div class="col-12">
                            <label for="c_name" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                          </div> -->
                      </div>
                      <div class="col-12" style="padding:0 20px 20px 20px">
                        <label for="c_desc" class="form-label">Description</label>
                        <textarea name="c_desc" id="c_desc" rows="5" class="form-control"></textarea>
                      </div>

                      <div class="text-center">
                        <button type="submit" id="category_sbt" class="btn btn-primary">Submit</button>
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
          <table class="table  " id="myTable">
            <thead>
              <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Category name</th>
                <th scope="col">Description</th>
                <th scope="col" class="">Action</th>
              </tr>
            </thead>
            <tbody id="category_output">

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
    
    </div>
  </section>

  <!-- category edit model============================-->
  <!-- Modal -->
  <div class="modal fade" id="category_update_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editcategory">
          
        </div>

      </div>
    </div>
  </div>

  <div class="modal modal-lg fade" id="category_detail_module">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="card-body" id="category_detail_from_add">
                      <!-- Multi Columns Form -->
                      <!-- <form class="row g-3" id="course_input_modal_form" method="post"
                          enctype="multipart/form-data">
                          <div class="col-md-6">
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
                          </div>
                         
                          <div class="col-md-12">
                              <label for="t_heading" class="form-label">Title </label> 
                              <input type="text" name="t_heading" id="t_heading"  class="form-control">
                          </div>
                          <div class="col-md-12">
                              <label for="t_desc" class="form-label">
                                  Description</label>
                              <textarea name="t_desc" id="t_desc" rows="3"
                                  class="form-control"></textarea>
                          </div>
                          <div class="col-md-6">
                              <label for="t_list" class="form-label">What you will
                                  learn</label>
                              <textarea name="t_list" id="t_list" rows="3"
                                  class="form-control"></textarea>
                          </div>
                          <div class="col-md-6">
                              <label for="t_requirement" class="form-label">
                                  Requirement</label>
                              <textarea name="t_requirement" id="t_requirement" rows="3"
                                  class="form-control"></textarea>
                          </div>

                          <div class="col-6">
                              <label for="image" class="form-label">Image</label>
                              <input type="file" class="form-control" id="image" name="image">
                          </div>
                          <div class="col-6">
                              <label for="price" class="form-label">Discount Price</label>
                              <input type="text" class="form-control" id="currentprice" name="currentprice">
                          </div>
                          <div class="col-6">
                              <label for="price" class="form-label">Fixed Price</label>
                              <input type="text" class="form-control" id="mrp" name="mrp">
                          </div>
                          <div class="col-md-6">
                              <label for="creator_id" class="form-label">Created by</label>
                              <select class="form-select  "name="creater_id"  id="creater_id">
                                  <option selected>Select course Creator</option>
                                  <?php 
                                  // if($creator){
                                  //     foreach($creator as $vaue){
                                  //         echo ' <option value="'.$vaue['id'].'">'.$vaue['first_name'].'</option>';

                                  //     }
                                  // }
                                  ?>
                              </select>
                          </div>
                          <div class="text-center">
                              <button type="submit" id="course_input_modal_btn"
                                  class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                          </div>
                      </form> -->
                      <!-- End Multi Columns Form -->
                  </div>
              </div>
          </div>
      </div>
  </div>
</main><!-- End #main -->