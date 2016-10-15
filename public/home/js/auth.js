$(document).ready(function(){ 
	$("#loginbutton").click(function(){				
		$("#authbackground").show();
		$("#loginbox").show();
	});
  							   			    
	$("#registerbutton").click(function(){
		$("#authbackground").show();
		$("#registerbox").show();
	});
  				
	$("#loginexit").click(function(){
		$("#authbackground").hide();
		$("#loginbox").hide();
	});
 				
	$("#registerexit").click(function(){
		$("#authbackground").hide();
		$("#registerbox").hide();
	});
	
	$("#login").click(function(){				
		var email = $("#loginemail").val();
		var password = $("#loginpassword").val();
		
		$.ajax({
            cache: true,
            type: "POST",
            url: "./login",
	　　　　　　data: {					
				"email": email,
				"password": password,
				"remember": 1, 	　　　　　　　　　	
	　　　　　　},
	
            async: false,
            error: function(request, status, error) {
                alert("Connection error");
                alert(error);
            },
            success: function(){
            	window.location.reload();			               
            }
        });	     
    });	
	
	$("#register").click(function(){				
		var email = $("#registeremail").val();
		var name = $("#registername").val();
		var password = $("#registerpassword").val();
		var id = $("#registerid").val();
	
		$.ajax({
            cache: true,
            type: "POST",
            url: "./register",
	　　　　　　data: {					
				"email": email,
				"password": password,
				"password_confirmation": password,
				"name": name,
				"id" : id,　　　　　　　　　	
	　　　　　　},
	
            async: false,
            error: function(request, status, error) {
                alert("Connection error");
                alert(error);
            },
            success: function(){
            	window.location.reload();			               
            }
        });	     
    });
});

