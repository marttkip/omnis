
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

function submit_account(){

	var config_url = document.getElementById("config_url").value;
    var data_url = config_url+"create-new-account";
  
     var company_name = $('#company_name').val();
     var postal_address = $('#postal_address').val();
     var postal_code = $('#postal_code').val();
     var location = $('#location').val();
     var city = $('#city').val();
     var phone_number = $('#phone_number').val();
     var company_email = $('#company_email').val();

     var first_name = $('#first_name').val();
     var other_names = $('#other_names').val();
     var email_address = $('#email').val();
     var password = $('#password').val();
     var confirm_password = $('#confirm_password').val();
      // alert(company_name);
    $.ajax({
    type:'POST',
    url: data_url,
    data:{phone_number: phone_number,company_email: company_email, location: location, city: city, postal_code: postal_code, company_name: company_name, postal_address: postal_address,
    	 first_name : first_name, other_names : other_names, email_address: email_address, password: password, confirm_password : confirm_password},
    dataType: 'text',
    success:function(data){
    //obj.innerHTML = XMLHttpRequestObject.responseText;
    	alert(data);
    },
    error: function(xhr, status, error) {
    //alert("XMLHttpRequest=" + xhr.responseText + "\ntextStatus=" + status + "\nerrorThrown=" + error);
    alert(error);
    }

    });
	return false;
}
function submit_login(){

	var config_url = document.getElementById("config_url").value;
    var data_url = config_url+"login-account";
   
     var email_address = $('#email_address').val();
     var password = $('#password').val();
     
    $.ajax({
    type:'POST',
    url: data_url,
    data:{email_address: email_address,password: password},
    dataType: 'text',
    success:function(data){
    //obj.innerHTML = XMLHttpRequestObject.responseText;
    },
    error: function(xhr, status, error) {
    //alert("XMLHttpRequest=" + xhr.responseText + "\ntextStatus=" + status + "\nerrorThrown=" + error);
    alert(error);
    }

    });
	return false;
}