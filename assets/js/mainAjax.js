
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
                    opt1 += `<tr> <td scope="row">${i}</td><td>${value.first_name}${value.last_name}</td><td>${value.email}</td>    <td>2016-05-25</td> <td>
                    <a href="#"><button class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                    <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                    <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                  </td></tr>`;
                    i++;
                })
                // alert(opt)
                $('.admin_output').append(opt1);
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
                    opt += `<tr> <td scope="row">${i}</td><td>${value.first_name}${value.last_name}</td><td>${value.email}</td>    <td>2016-05-25</td> <td>
                    <a href="#"><button class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                    <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                    <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                  </td></tr>`;
                    i++;
                })
                // alert(opt)
                $('.instructor_output').append(opt);
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
                    console.log(response);
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
                    opt2 += `<tr> <td scope="row">${i}</td><td>${value.first_name}${value.last_name}</td><td>${value.email}</td>    <td>2016-05-25</td> <td>
                    <a href="#"><button class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                    <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                    <a href="#"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                  </td></tr>`;
                    i++;
                })
                // alert(opt)
                $('.student_output').append(opt2);
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
                    console.log(response);
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

});