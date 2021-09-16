// Checking admin current password using ajax

$(document).ready(function (){
    // check admin password
    $("#currentPassword").keyup(function (){
        var currentPassword = $("#currentPassword").val();
        $.ajaxSetup({
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        })
        $.ajax({
            type:'post',
            url:'/admin/check-current-Password',
            data:{
                "currentPassword":currentPassword,
            },
            success: function (response){
                if(response=="false"){
                    $("#checkCurrentPassword").html("<font color = red> Current password is incorrect</font>")
                }
                else{
                    $("#checkCurrentPassword").html("<font color = green> Current password is correct</font>")

                }
            },
            error:function (){
                alert("Error");
            }
        })
    });

    // Sections status
    $(".updateSectionStatus").click(function (){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
        $.ajaxSetup({
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        })
        $.ajax({
            type:'post',
            url:'/admin/update-section-status',
            data:{
                // "dh el hyroh lel function": dh el variable
                "status":status,
                "section_id":section_id,
            },
            success: function (response){
                if(response['status']==0){
                    $('#section-'+section_id).html("<a href=\"javascript:void(0)\" class=\"updateSectionStatus\">Inactive</a>")
                }
                else{
                    $('#section-'+section_id).html("<a href=\"javascript:void(0)\" class=\"updateSectionStatus\">Active</a>")

                }
            },
            error:function (){
                alert("Error");
            }
        })
    })

    // Categories status
    $(".updateCategoryStatus").click(function (){
        var status = $(this).text();
        var category_id = $(this).attr("category_id");
        $.ajaxSetup({
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        })
        $.ajax({
            type:'post',
            url:'/admin/update-category-status',
            data:{
                // "dh el hyroh lel function": dh el variable
                "status":status,
                "category_id":category_id,
            },
            success: function (response){
                if(response['status']==0){
                    $('#category-'+category_id).html("<a href=\"javascript:void(0)\" class=\"updateCategoryStatus\">Inactive</a>")
                }
                else{
                    $('#category-'+category_id).html("<a href=\"javascript:void(0)\" class=\"updateCategoryStatus\">Active</a>")

                }
            },
            error:function (){
                alert("Error");
            }
        })
    })

});
