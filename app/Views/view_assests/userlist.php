
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admin List</h5>  
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach( $userdata as $key=>$value){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $value['id']   ?></th>
                    <td><?php echo $value['first_name']   ?></td>
                    <td><?php echo $value['last_name']   ?></td>
                    <td><?php echo $value['email']   ?></td> 
                    <td>
                      <a href=""><button class="btn btn-primary">Edit</button></a>
                      <a href=""><button class="btn btn-danger">Delete</button></a>
                    </td>
                  </tr>
                  <?php
                  }
                ?>
   
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
 