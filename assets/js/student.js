
    // ====================================== Student Details ====================================== 
    let student_load = () => {
        $('.table').addClass('dataTable')
        // $('.table').dataTable();
        $.ajax({
            url: base_url + "student_data",
            type: "post",
            data: {},
            cache: false,
            success: function (response) {
                let res = JSON.parse(response);
                // console.log(res.student);
                let opt2 = "";
                let i = 1;
                $.each(res.student, (key, value) => {
                    opt2 += `<tr>
                     <td scope="row">${i}</td>
                     <td>${value.name}   </td>
                     <td>${value.email}</td> 
                     <td>${value.phone}</td> 
                     <td>${value.address}</td> 
                     <td>2016-05-25</td>
                     <td> 
                        <a href="javascript:void(0)" onclick=""><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                        <a href="javascript:void(0)" id="studentdelete" onclick="studentDeletefun(${value.id})"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                     </td></tr>`;
                    i++;
                })
                // alert(opt) <a href="#"><button class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                $('.student_output').html(opt2);
                // $('.dd').html(opt); 
            }
        })

    }
    student_load(); 
function studentDeletefun($id){
    alert($id)
    $('#category_update_modal').modal('show');

    $.ajax({
        url: base_url + `category_update/${uid}`,
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            // console.log(response);
            let res_cat = JSON.parse(response);
            // console.log(res_cat.updateData[0].c_name);
            // let updte_cat = `<form class="row g-3" id="category_update"> 
            //                         <div class="col-12"> 
            //                             <label for="c_name" class="form-label">Category</label>
            //                             <input type="text" class="form-control" id="c_name"  name="c_name" value='${res_cat.updateData[0].c_name}'>
            //                             <input type="hidden" class="form-control" id="c_id"  name="c_id" value='${res_cat.updateData[0].c_id}'>
            //                             </div>
            //                             <div class="col-12">
            //                             <label for="c_desc" class="form-label">Description</label> 
            //                             <textarea name="c_desc" id="c_desc"  rows="5" class="form-control">${res_cat.updateData[0].c_desc}</textarea>
            //                             </div>
                                        
            //                             <div class="text-center">
            //                             <button type="submit" id="category_sbt" class="btn btn-primary">Submit</button>
            //                             <button type="reset" class="btn btn-secondary">Reset</button>
            //                             </div>
            //                         </form>`;

            // $('#editcategory').html(updte_cat);

        }
    })
}  
