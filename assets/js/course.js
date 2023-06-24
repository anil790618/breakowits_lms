console.log("course _added")
// $(document).ready(function(){
    


    let course_list = () => {
        $('.table').addClass('dataTable')
        // $('.table').dataTable();
        $.ajax({
            url: base_url + "course_list_load",
            type: "post",
            data: {},
            cache: false,
            success: function (response) {
                let res = JSON.parse(response);
                // console.log(res);
                // console.log(res.topic[0].);
                let clist = "";
                let i = 1;
                $.each(res.topic_join, (key, value) => {
                    // console.log(value);
                    // console.log(value.c_id);
                    // console.log(res.creator);
                    // if(value.c_id == )
                    // let c_id = value.c_id;
                    // alert(value.c_id)<?=base_url()?>media/course/thumb/<?=$image?>     <td style="width:">${value.image}</td>   
                    let id = value.t_id;
                    
                    clist += `<tr> <td scope="row">${i}</td>
                    <td style="width:30%">${value.t_heading}</td>  
                    <td style="width:">${value.c_name}</td>   
                    <td style="width:">${value.price}</td>  
                     <td style="width:15%"> 
                     <a href="course_details/${id}">  <button class="btn btn-info course_update1"   ><i class="bi bi-pencil-square"></i></button> </a> 
                    <a href="course_delete/${id}"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                  </td></tr>`;
                    i++;
                })
                // alert(opt)
                $('.course_list_output').html(clist); 
            }
        })

    }
    course_list();


 
 
function course_update_data(uid) { 
    // alert(uid);
    $('#update_course_modal').modal('show'); 
    $.ajax({
        url: base_url + `course_update/${uid}`,
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            let res_cat = JSON.parse(response);
            console.log(res_cat.updateData[0].c_id);
            course_u = res_cat.updateData[0];
            // console.log(res_cat.updateData[0].c_name);
            let updte_cat = `   
             <form class="row g-3" id="course_update_form" method="post"  enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="c_id" class="form-label">Course
                    Category</label>
                <select class="form-select"  name="c_id" id="c_id">
                    <option selected>${course_u.c_id}</option>
                    
                </select>
            </div>
            <div class="col-md-6">
                <label for="creator_id" class="form-label">Created by</label>
                <select class="form-select  "name="creater_id"  id="creater_id">
                    <option selected>${course_u.creater_id}</option>
                     
                </select>
            </div>
            <div class="col-md-6">
                <label for="t_heading" class="form-label">Topic Name</label>
                <textarea  rows="3" name="t_heading" id="t_heading" class="form-control">${course_u.t_heading}</textarea>
            </div>
            <div class="col-md-6">
                <label for="t_desc" class="form-label">Topic
                    Description</label>
                <textarea name="t_desc" id="t_desc" rows="3"
                    class="form-control">${course_u.t_desc}</textarea>
            </div>
            <div class="col-md-6">
                <label for="t_list" class="form-label">topic list</label>
                <textarea name="t_list" id="t_list" rows="3"
                    class="form-control">${course_u.t_list}</textarea>
            </div>
            <div class="col-md-6">
                <label for="t_requirement" class="form-label"> Requirement</label>
                <textarea name="t_requirement" id="t_requirement" rows="3"
                    class="form-control">${course_u.t_requirement}</textarea>
            </div>

            <div class="col-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control">
                <input type="hidden" class="form-control"  id="image" name="image"  value="${course_u.image}">
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="${course_u.price}">
            </div>
            <div class="text-center">
                <button type="submit" id="course_input_modal_btn" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>`;

            $('#editcourse').html(updte_cat);

        }
    })
}


$(document).on("submit", '#course_update_form', function (e) {
    e.preventDefault();
    $.ajax({
        url: base_url + "course_update_data",
        type: "post",
        data: new FormData(this),
        cache: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            // console.log(response);
            if (response != 0) {
                course_list();
                $('#update_course_modal').modal('hide');
                $('#c-success').show();
                $('#c-error').hide();
                setTimeout(() => {
                    $('#c-success').slideUp();
                }, 3000);
            } else {
                $('#c-success').hide();
                $('#c-error').show();
                setTimeout(() => {
                    $('#c-error').slideUp();
                }, 3000);
            }


        }
    })
})

 


