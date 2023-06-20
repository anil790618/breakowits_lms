<main id="main" class="main">

<div class="pagetitle">
  <!-- <h1>Data Tables </h1>  -->
  <!-- form submit status  -->
  <!-- <div class="alert " id="form_submit_status" role="alert"> -->
  <div class="alert alert-success" role="alert" id="form_success">
  Form submitted successfully!
</div>
<div class="alert alert-danger" role="alert" id="form_error">
Form not submitted successfully!
</div>
  <!-- A simple primary alert—check it out! -->
</div>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
            <div class="h d-flex justify-content-between align-items-center">
                <h5 class="card-title">Instructor Details</h5> 
 
                <button class="btn btn-primary"  id="modal_show_btn">+Add</button>
                <!-- Modal -->
                <div class="modal fade" id="modal" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Instructor </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Vertical Form</h5>  -->
                        <form class="row g-3" id="form-data">
                            <div class="col-12">
                            <input type="hidden" class="form-control" id="user_role_id" name="user_role_id" value="2">
                            <label for="firstname" class="form-label"> First name</label>
                            <input type="text" class="form-control" id="firs_tname"  name="first_name">
                            </div>
                            <div class="col-12">
                            <label for="lastname" class="form-label"> Last name</label>
                            <input type="text" class="form-control" id="last_name"  name="last_name">
                            </div>
                            <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password"  name="password">
                            </div>
                            <!-- <div class="col-12"> -->
                            <!-- <label for="cpassword" class="form-label">Confirm password</label> -->
                           
                            <!-- </div> -->
                            <div class="text-center">
                            <button type="submit" id='instructor_sbt' class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- Vertical Form --> 
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                    </div>
                </div>
                </div> 
            </div>
          <!-- Table with stripped rows -->
          <table class="table  ">
            <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Joining Date</th>
                <th scope="col">Action</th> 
              </tr>
            </thead>
            <tbody class="instructor_output">
              
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
<!-- <div class="dd"></div> -->
        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
