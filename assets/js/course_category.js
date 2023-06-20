// =====================course category ==========================================

$('.category_edit').click(function () {
    // debugger;
    alert();
    console.log("linked video")
})
let course_category_load = () => {
    $('.table').addClass('dataTable')
    $.ajax({
        url: base_url + "course_cat_data",
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            let res = JSON.parse(response);
            // console.log(res.category);
            let ct = "";
            let i = 1;
            $.each(res.category, (key, value) => {
                let id = value.c_id;
                ct += `<tr> <td scope="row">${i}</td>
                <td>${value.c_name}</td>
                <td style="width:40%">${value.c_desc.slice(0, 50)}...</td>  
                 <td> 
                 <button class="btn btn-primary category_edit" onclick="myalert(${id})" ><i class="bi bi-pencil-square"></i></button> 
                <a href='category_delete/${value.c_id}'><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
              </td></tr>`;
                i++;
            })
            $('#category_output').html(ct);
        }
    })

}
course_category_load();

function myalert(uid) {
    // alert(uid);
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
            let updte_cat = `<form class="row g-3" id="category_update"> 
                                    <div class="col-12"> 
                                        <label for="c_name" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="c_name"  name="c_name" value='${res_cat.updateData[0].c_name}'>
                                        <input type="hidden" class="form-control" id="c_id"  name="c_id" value='${res_cat.updateData[0].c_id}'>
                                        </div>
                                        <div class="col-12">
                                        <label for="c_desc" class="form-label">Description</label> 
                                        <textarea name="c_desc" id="c_desc"  rows="5" class="form-control">${res_cat.updateData[0].c_desc}</textarea>
                                        </div>
                                        
                                        <div class="text-center">
                                        <button type="submit" id="category_sbt" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>`;

            $('#editcategory').html(updte_cat);

        }
    })
    // })
}

$(document).on("submit", '#category_update', function (e) {
    e.preventDefault();
    $.ajax({
        url: base_url + "category_update_data",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            // console.log(response);
            if (response != 0) {
                course_category_load();
                $('#category_update_modal').modal('hide');
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

// course module 

let course_module_load = () => {
    $.ajax({
        url: base_url + "course_module_load",
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            let res = JSON.parse(response);
            // console.log(res.module);
            let ctm = "";
            let i = 1;
            $.each(res.module, (key, value) => {
                console.log(value)
                // let id = value.id;
                // alert(id);
                ctm += ` <tr>
                <td>${i}</td> 
                <td>${value.c_name}</td> 
                <td>${value.name}</td> 
                <td> 
                 <a href="javascript:void(0)" onclick ="mymodule_modal(${value.id})"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                 <a href='module_delete/${value.id}'><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                </td>
                </tr> `;
                i++;
            })
            $('.module_output').html(ctm);
        }
    })

}
course_module_load();
function mymodule_modal(id){
    // alert(id);
    $('#module_update_modal').modal('show');
    $.ajax({
        url: base_url + `module_update_show/${id}`,
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            // console.log(response);
            let res_cat = JSON.parse(response);
            // console.log(res_cat.module[0].name);
            let updte_cat1 = ` <form class="row g-3" id="module_update_form1">
            <div class="col-12"> 
            <input type="hidden" name = "id" id="id" value="${res_cat.module[0].id}">
                <label for="firstname" class="form-label"> Course</label> 
                
                <select class="form-select  mb-3" aria-label=" example" name="c_cat_id" id="c_cat_id">
                    <option value='${res_cat.module[0].c_cat_id}'>${res_cat.module[0].c_cat_id}</option> 
                    </select>
                </div>
                <div class="col-12">
                <label for="name" class="form-label"> Module name</label>
                <input type="text" class="form-control" id="name"  name="name" value='${res_cat.module[0].name}'>
                </div> 
                <div class="text-center">
                <button type="submit" id="module_update_btn" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>`;

            $('#module_update_form').html(updte_cat1);

        }
    })

}

$(document).on("submit", '#module_update_form1', function (e) {
    e.preventDefault();
    $.ajax({
        url: base_url + "module_update_data",
        type: "post",
        data: new FormData(this),
        cache: false,  
        success: function (response) {
            console.log(response);
            // if (response != 0) {
            //     course_module_load();
            //     $('#module_update_modal').modal('hide');
            //     $('#c-success').show();
            //     $('#c-error').hide();
            //     setTimeout(() => {
            //         $('#c-success').slideUp();
            //     }, 3000);
            // } else {
            //     $('#c-success').hide();
            //     $('#c-error').show();
            //     setTimeout(() => {
            //         $('#c-error').slideUp();
            //     }, 3000);
            // }


        }
    })
})


let autoload = () => { 
    $.ajax({
        url: base_url + "autoload_data",
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            let res = JSON.parse(response);
            // console.log(res);
           
        }
    })

}
autoload();