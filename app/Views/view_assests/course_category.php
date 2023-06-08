<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Tables</h1> 
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
                <h5 class="card-title">Course Category</h5> 
                <button class="btn btn-primary" id="category_modal_btn">+Add</button>
                <!-- Modal -->
                <div class="modal fade" id="category_modal" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="card-body"> 
                        <form class="row g-3" id="category-data">
                        <div class="col-12"> 
                             <label for="c_name" class="form-label">Category</label>
                            <input type="text" class="form-control" id="c_name"  name="c_name">
                            </div>
                            <div class="col-12">
                            <label for="c_desc" class="form-label">Description</label> 
                            <textarea name="c_desc" id="c_desc"  rows="5" class="form-control"></textarea>
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
          <table class="table  ">
            <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Course name</th>
                <th scope="col">Description</th> 
                <th scope="col" class="">Action</th> 
              </tr>
            </thead>
            <tbody class="category_output">
            <?php
                                if($category){
                                    foreach($category as $value){ 
                                        ?>
                                        <tr> 
                                          <td scope="row"><?=$value['c_id']?></td>
                                            <td><?php $dh = $value['c_name'];   echo substr($dh,0,18)?></td>
                                            <td style="width:40%"><?php $dt = $value['c_desc'];   echo substr($dt,0,100)?></td>  
                                            <td> 
                                            <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                                            <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                          </td>
                                        </tr>
                                       
                                        <?php
                                    }
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
