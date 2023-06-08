
$(document).ready(function () {
    console.log('Main ajax file included');

    // ====================================== Admin Details ====================================== 
    let admin_load = () => {
        $.ajax({
            url: base_url + "admin_data",
            type: "post",
            data: { 'user_role_id': 2 },
            cache: false,
            success: function (response) {
                let res = JSON.parse(response);
                // console.log(res.admin);
                let opt1 = "";
                let i = 1;
                $.each(res.admin, (key, value) => {
                    opt1 += `<tr> <td scope="row">${i}</td><td>${value.first_name}   ${value.last_name}</td><td>${value.email}</td>    <td>2016-05-25</td> <td>
                    <a href="#"><button class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                    <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                    <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                  </td></tr>`;
                    i++;
                })
                // alert(opt)
                $('.admin_output').html(opt1);
                // $('.dd').html(opt); 
            }
        })

    }
    admin_load()

    // ====================================== Instructor Details ====================================== 
    let instructor_load = () => {
        $.ajax({
            url: base_url + "instructor_data",
            type: "post",
            data: { 'user_role_id': 2 },
            cache: false,
            success: function (response) {
                //   debugger; 
                let res = JSON.parse(response);
                // console.log(res.instructor);
                let opt = "";
                let i = 1;
                $.each(res.instructor, (key, value) => {
                    opt += `<tr> <td scope="row">${i}</td><td>${value.first_name}   ${value.last_name}</td><td>${value.email}</td>    <td>2016-05-25</td> <td>
                    <a href="#"><button class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                    <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                    <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                  </td></tr>`;
                    i++;
                })
                // alert(opt)
                $('.instructor_output').html(opt);
                // $('.dd').html(opt); 
            }
        })

    }
    instructor_load();

    $('#modal_show_btn').click(function () {
        $('#modal').modal('show');
        $(document).on("click", '#instructor_sbt', function (e) {
            e.preventDefault();
            var data = $("#form-data").serialize();
            $.ajax({
                url: base_url + "instructor_form_data",
                type: "post",
                data: data,
                cache: false,
                success: function (response) {
                    // console.log(response);
                    if (response != 0) {
                        $('#modal').modal('hide');
                        $('#form_error').hide();
                        $('#form_success').show();
                        instructor_load();
                        setTimeout(() => {
                            $('#form_success').slideUp();
                        }, 3000);
                    } else {
                        $('#form_success').hide();
                        $('#form_error').show();
                        setTimeout(() => {
                            $('#form_error').slideUp();
                        }, 3000);
                    }


                }
            })
        })

    })


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
                    opt2 += `<tr> <td scope="row">${i}</td><td>${value.first_name}  ${value.last_name}</td><td>${value.email}</td>    <td>2016-05-25</td> <td>
                    <a href="#"><button class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                    <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                    <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                  </td></tr>`;
                    i++;
                })
                // alert(opt)
                $('.student_output').html(opt2);
                // $('.dd').html(opt); 
            }
        })

    }
    student_load();



    $('#student_modal_btn').click(function () {
        $('#student_modal').modal('show');
        $(document).on("click", '#student_sbt', function (e) {
            e.preventDefault();
            var data = $("#student-data").serialize();
            $.ajax({
                url: base_url + "student_form_data",
                type: "post",
                data: data,
                cache: false,
                success: function (response) {
                    // console.log(response);
                    if (response != 0) {
                        student_load();
                        $('#student_modal').modal('hide');
                        $('#student_success').show();
                        $('#student_error').hide();
                        setTimeout(() => {
                            $('#form_success').slideUp();
                        }, 3000);
                    } else {
                        $('#student_success').hide();
                        $('#student_error').show();
                        setTimeout(() => {
                            $('#student_error').slideUp();
                        }, 3000);
                    }


                }
            })
        })

    })

 // ====================================== Course  Details ====================================== 

 $('#category_modal_btn').click(function () {
    $('#category_modal').modal('show');
    $(document).on("click", '#category_sbt', function (e) {
        e.preventDefault();
        var data = $("#category-data").serialize();
        $.ajax({
            url: base_url + "category_form_data",
            type: "post",
            data: data,
            cache: false,
            success: function (response) {
                if (response != 0) {
                    course_category_load();
                    $('#category_modal').modal('hide');
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

})


 let course_category_load = () => {
    $('.table').addClass('dataTable')
    // $('.table').dataTable();
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
                ct += `<tr> <td scope="row">${i}</td>
                <td>${value.c_name}</td>
                <td style="width:40%">${value.c_desc.slice(0,50)}...</td>  
                 <td> 
                <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
              </td></tr>`;
                i++;
            })
            // alert(opt)
            $('.category_output').html(ct);
            // $('.dd').html(opt); 
        }
    })

}
// course_category_load();

//  let course_list = () => {
//     $('.table').addClass('dataTable')
//     // $('.table').dataTable();
//     $.ajax({
//         url: base_url + "course_list_load",
//         type: "post",
//         data: {},
//         cache: false,
//         success: function (response) {
//             let res = JSON.parse(response);
//             // console.log(res);
//             let clist = "";
//             let i = 1;
//             $.each(res.topic, (key, value) => {
//                 // console.log(value);
//                 clist += `<tr> <td scope="row">${i}</td>
//                 <td style="width:">${value.c_id}</td>  
//                 <td style="width:">${value.creater_id}</td>  
//                 <td style="width:30%">${value.t_heading}</td>  
//                 <td style="width:">${value.price}</td>  
//                 <td style="width:">${value.image}</td>  
//                  <td> 
//                 <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
//                 <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
//               </td></tr>`;
//                 i++;
//             })
//             // alert(opt)
//             $('.course_list_output').html(clist); 
//         }
//     })

// }
// course_list();
 

function student_course_list(){
    $.ajax({
        url: base_url + "student_course_list",
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            let res = JSON.parse(response); 
            let screat = "";
            let i = 1;
            $.each(res.category, (key, value) => {
                // console.log(value);
                screat += ` <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <img src="${value.image}"
                                            class="card-img-top" alt="..." style="height:200px;object-fit:contain;">

                                        <div class="course-content px-2 py-3">
                                            <h3 class="course-cat ">${value.c_name}</h3>
                                            <p><a href="#">${value.c_desc.slice(0,60)}...</a></p>
                                            <div class="course-meta">
                                                <span class="course-student"><i class="bi bi-person-fill px-2"></i>340
                                                    Students</span>
                                                <span class="course-duration"><i class="bi bi-card-checklist px-2"></i>82
                                                    Lessons</span>
                                            </div>
                                        </div>
                                    </div>
                    </div>`;
                i++;
            })
            // alert(opt)
            $('.stu_courselist').html(screat); 
        }
    })
}
// student_course_list();

$('#course_input_btn').click(function () {
    $('#course_input_modal').modal('show');
    $(document).on("submit", '#course_input_modal_form', function (e) {
        e.preventDefault();
        // var data = $("#course_input_modal_form").serialize();
        $.ajax({
            url: base_url + "course_list_insert",
            type: "post",
            data: new FormData(this),
            cache: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                // if (response != 0) {
                //     course_category_load();
                //     $('#category_modal').modal('hide');
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

})


});