$(document).ready(function() {

    $("#btn-login").click(function(){

    	var serializedData = $('#loginform').serializeArray();
    		$.ajax({
            method: "POST",
            url: "/auth/login",
            data: serializedData,
            dataType: 'json',
            success: function(response) { 
                
                if(response.status == 'true') {
                    $(location).attr('href','/admin/index');
                } else {
                    alert("Email ou senha inválidos.");
                }
            }
        });

        return false;
    });   
    
});