
$(document).ready(function(){
    console.log('Main ajax file included');
    let instructor_load=()=>{
        $.ajax({
            url:base_url+"/instructor_table",
            type:"get",
            data:{},
            cache:false,
            success:function(response){
                let res = JSON.parse(response);
                console.log(res);
            }
        })

    }
    instructor_load();

});