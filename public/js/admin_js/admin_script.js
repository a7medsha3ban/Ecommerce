$(document).ready(function (){
    // check admin password
    $("#currentPassword").keyup(function (){
        var currentPassword = $("#currentPassword").val();
        $.ajaxSetup({
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')}
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
                    $("#checkCurrentPassword").html("<font color = green> Current password is incorrect</font>")

                }
            },
            error:function (){
                alert("Error");
            }
        })
    });
});
