var Config = {
	website:"https://qrisia.ge/",
	website_:"https://qrisia.ge",
	ajax:"https://qrisia.ge/ge/ajax/index", 
	pleaseWait:"მოთხოვნა იგზავნება...",
	mainLanguage:"ge"
};

jQuery(document).on("click", ".sendEmail", function(){
	
	var ajaxFile = "/sendmessage";
	jQuery("#g-output").html("...");
	var lang = jQuery("#lang").val();
	var namelname = jQuery(".namelname").val();
	var email = jQuery(".email").val();
	var phone = jQuery(".phone").val();
	var message = jQuery(".message").val();
	
	jQuery.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { namelname:namelname, email:email, phone:phone, message:message, lang:lang }
	}).done(function( msg ) {
		var obj = jQuery.parseJSON(msg);
		if(obj.Success.Code==1){
			var text = obj.Success.Text;
		}else{
			var text = obj.Error.Text;
		}
		console.log(text);
		jQuery("#g-output").html(text);
		jQuery(".namelname").val("");
		jQuery(".email").val("");
		jQuery(".phone").val("");
		jQuery(".message").val("");
	});
});


jQuery(document).on("click", "#edit-submit", function(){
	var lang = jQuery(".lang").val();
	let url = Config.website+lang+"/search/?w="; 
	let s = encodeURI(jQuery("#edit-search-block-form--2").val());
	location.href = url + s;
});