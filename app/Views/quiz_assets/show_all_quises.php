<main id="main" class="main">

<div class="pagetitle"> 
</div> 
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
            
              <table class="table datatable">
              
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Option 1</th>
                    <th scope="col">Option 2</th>
                    <th scope="col">Option 3</th>
                    <th scope="col">Option 4</th>
                    <!-- <th scope="col">Start Date</th> -->
                  </tr>
                </thead>
                <tbody>
                <?php
                    if($quises){
                        // echo "<pre>";
                        // print_r($quises);
                        foreach($quises as $key=>$val){
                            ?>
                            <tr>
                                <th scope="row"><?=$val['id']?></th>
                                <td ><?=$val['question']?></td>
                                <td ><?=$val['correct_ans']?></td>
                                <td ><?=$val['opt1']?></td>
                                <td ><?=$val['opt1']?></td>
                                <td ><?=$val['opt1']?></td>
                                <td ><?=$val['opt1']?></td>
                                <!-- <td>28</td>
                                <td>2016-05-25</td> -->
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

</main> 