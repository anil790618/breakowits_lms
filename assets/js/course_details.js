console.log('course Details')
  
    
function heading_and_desc(uid) {
    // alert(uid);
    $('#heading_and_desc_modal').modal('show');

    $.ajax({
        url: base_url + `heading_and_desc/${uid}`,
        type: "post",
        data: {},
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            // console.log(response);
            let res_cat = JSON.parse(response);
            // console.log(res_cat);
            let heading_desc = `<form class="row g-3" id="heading_desc_form"> 
                            <div class="col-12">
                                <label for="t_heading" class="form-label">Course Heading</label>
                                <input type="hidden" name="t_id" value="${res_cat.topic[0].t_id}">
                                <input type="text" class="form-control" id="t_heading" name="t_heading"  value="${res_cat.topic[0].t_heading}"> 
                            </div>
                            <div class="col-12">
                                <label for="t_desc" class="form-label"> Description</label> 
                                <textarea name="t_desc" id="t_desc"style="width:100%;height:150px"  >${res_cat.topic[0].t_desc}</textarea>
                            </div>
                            <div class="col-6">
                                <label for="bgcolor" class="form-label">Choose Background color</label>  <br>
                                <input type="color" name="bgcolor" id="bgcolor"> 
                            </div>
                            <div class="col-6">
                                <label for="textcolor" class="form-label">Choose Text color</label> <br>
                                <input type="color" name="textcolor" id="textcolor"> 
                            </div>
                            <div class="text-center">
                                <button type="submit"  class="btn btn-primary">Submit</button>
                            </div>
                            </form> `;

            $('#course_heading_desc').html(heading_desc);

        }
    })
     
}

$(document).on("submit", '#heading_desc_form', function (e) {
    e.preventDefault(); 
    $.ajax({
        url: base_url + "heading_desc_update",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response != 0) {
                // course_category_load();
                $('#heading_and_desc_modal').modal('hide');
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
 
    
      
function what_you_learn(uid) { 
    $('#what_you_will_learn').modal('show'); 
    $.ajax({
        url: base_url + `heading_and_desc/${uid}`,
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            // console.log(response);
            let res_cat = JSON.parse(response);
            // console.log(res_cat);
            let what_you = `    <form class="row g-3" id="what_you_learn_list">
            <div class="col-12"> 
            <input type="hidden" name="t_id" value="${res_cat.topic[0].t_id}">
                                        <textarea name="t_list" id="t_list"style="width:100%;height:250px"  >${res_cat.topic[0].t_list}</textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                    </form> 
                              `;

            $('#what_you_will_learn_m').html(what_you);

        }
    }) 
}

$(document).on("submit", '#what_you_learn_list', function (e) {
    e.preventDefault(); 
    $.ajax({
        url: base_url + "what_you_learn_list_update",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response != 0) {
                // course_category_load();
                $('#what_you_will_learn').modal('hide');
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


 
function requirement_fun(uid) { 
    $('#requirement_modal').modal('show'); 
    // $.ajax({
    //     url: base_url + `details_Requirements/${uid}`,
    //     type: "post",
    //     data: {},
    //     cache: false,
    //     success: function (response) {
    //         // console.log(response);
    //         let res_cat = JSON.parse(response);
    //         // console.log(res_cat);
    //         let what_you = `  <form class="row g-3" id="what_you_learn_list">
    //         <div class="col-12"> 
    //         <input type="hidden" name="t_id" value="${res_cat.topic[0].t_id}">
    //                                     <textarea name="t_list" id="t_list"style="width:100%;height:250px"  >${res_cat.topic[0].t_list}</textarea>
    //                                 </div>
    //                                 <div class="text-center">
    //                                     <button type="submit" id="" class="btn btn-primary">Submit</button>
    //                                     <button type="reset" class="btn btn-secondary">Reset</button>
    //                                 </div>
    //                                 </form>  `;

    //         $('#requirement_modal_m').html(what_you);

    //     }
    // }) 
}


function detail_course_module(uid) { 
    // alert(uid)
    $('#detail_module_modal').modal('show'); 
    $.ajax({
        url: base_url + `details_module_view/${uid}`,
        type: "post",
        data: {},
        cache: false,
        success: function (response) {
            console.log(response);
            let res_cat = JSON.parse(response);
            // console.log(res_cat.topic1[0].c_cat_id);
            let what_youw = `<form class="row g-3" id="course_module_form">
            <div class="col-12">
                <input type="hidden" class="form-control" id="id" name="id" value="${res_cat.topic1[0].id}">
                 
                <input type="hidden" class="form-control" id="t_id"  name="t_id" value="${res_cat.topic1[0].t_id}"  > 
            </div>
            <div class="col-12">
                <label for="name" class="form-label"> Module
                    name</label>
                <input type="text" class="form-control" id="name"
                    name="name" value="${res_cat.topic1[0].name}">
                    
            </div>
            <div class="text-center">
                <button type="submit" id=""
                    class="btn btn-primary">Submit</button>
            </div>
        </form> `;

            $('#detail_module_modal_data').html(what_youw);

        }
    }) 
} 

$(document).on("submit", '#course_module_form', function (e) {
    e.preventDefault(); 
    $.ajax({
        url: base_url + "course_module_form_update",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response != 0) {
                // course_category_load();
                $('#detail_module_modal').modal('hide');
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



function detail_course_lession(uid) { 
    $('#details_lession_modal').modal('show'); 
    $.ajax({
        url: base_url + `details_lession_view/${uid}`,
        type: "post",
        data: {},
        cache: false,
        success: function (response) { 
            let res_cat = JSON.parse(response); 
            let detail_lession = `  <form class="row g-3" id="details_lession_form"> 
            <div class="col-6">
            <input type="hidden" class="form-control"
            id="id" name="id" value="${res_cat.lession[0].id}">
                <label for="name" class="form-label">Lession
                </label>
                <input type="text" class="form-control" id="name"
                    name="name" value="${res_cat.lession[0].name}">
            </div>
            <div class="col-6">
                <label for="video_url" class="form-label">video
                    url</label>
                <input type="text" class="form-control"
                    id="video_url" name="video_url" value="${res_cat.lession[0].video_url}">
            </div>
            <div class="col-12">
                <label for="desc" class="form-label">Description
                </label> 
                <textarea class="form-control" id="description"
                    name="description" rows="3">${res_cat.lession[0].description}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" id=""
                    class="btn btn-primary">Submit</button>
                <button type="reset"
                    class="btn btn-secondary">Reset</button>
            </div>
        </form>  `;

            $('#detail_lession_data').html(detail_lession);

        }
    }) 
} 


$(document).on("submit", '#details_lession_form', function (e) {
    e.preventDefault(); 
    $.ajax({
        url: base_url + "details_lession_update",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response != 0) {
                // course_category_load();
                $('#details_lession_modal').modal('hide');
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
// $('.myvideoplay').click(function(){
//     // alert();
//     console.log("linked video")
//     $('#videomodal').modal('show');
// })




 const details_add_module =( )=>{ 
    $('#Details_add_modul').modal('show'); 
 }
 
 

$(document).on("submit", '#detail_update_form', function (e) {
    e.preventDefault(); 
    $.ajax({
        url: base_url + "details_add_module",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response != 0) {
                // course_category_load();
                $('#Details_add_modul').modal('hide');
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


const details_add_lession =()=>{ 
    $('#details_lession_modal12').modal('show'); 
 }
 

$(document).on("submit", '#details_lession_form', function (e) {
    e.preventDefault(); 
    $.ajax({
        url: base_url + "details_add_lession_save",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response != 0) {
                // course_category_load();
                $('#details_lession_modal12').modal('hide');
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



const addQuiz_fun =( )=>{ 
    $('#quiz_modal').modal('show'); 
 }
 
 

$(document).on("submit", '#quiz_form', function (e) {
    e.preventDefault(); 
    $.ajax({
        url: base_url + "quiz_data_save",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response != 0) {
                // course_category_load();
                $('#quiz_form').trigger('reset');
                $('#quiz_modal').modal('hide');
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


$('#Add_to_wish_list').click(function(){
    alert("Course added in your wish list");
})

// quizform



$(document).on("submit", '#quiz_answer_form', function (e) {
    e.preventDefault(); 
    // alert();
    let time = $('.timer').text();
    // time = 30.00-time;
$('#time').val(time)

    $.ajax({
        url: base_url + "quiz_answer_form_save",
        type: "post",
        data: new FormData(this),
        cache: false, 
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            window.location.href =base_url+response;
            // if (response != 0) {
            //     // course_category_load();
            //     $('#quiz_form').trigger('reset');
            //     $('#quiz_modal').modal('hide');
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

// quiz_final_submitted

 