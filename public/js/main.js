$(window).load(function(){
    setTimeout(function(){
        $('#alert').fadeOut();
    },1500);
});

$(function() {
	$('#imagePreview1').click(function(){
			$('#picture_1').click();
	});
	$('#imagePreview2').click(function(){
			$('#picture_2').click();
	});
	$('#imagePreview3').click(function(){
			$('#picture_3').click();
	});
	$('#imagePreview4').click(function(){
			$('#picture_4').click();
	});

	$("#picture_1").on("change", function()
		{
			var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return;

	        if (/^image/.test( files[0].type)){
	            var reader = new FileReader();
	            reader.readAsDataURL(files[0]);

	            reader.onloadend = function(){
	            	$("#imagePreview1").css("background-image", "url("+this.result+")");
	            	$("#imagePreview1").css("background-size", "cover");
	            }
	        }
	        $("#imagePreview2").fadeIn(500);
	});

	$("#picture_2").on("change", function()
		{
			var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return;

	        if (/^image/.test( files[0].type)){
	            var reader = new FileReader();
	            reader.readAsDataURL(files[0]);

	            reader.onloadend = function(){
	            	$("#imagePreview2").css("background-image", "url("+this.result+")");
	            	$("#imagePreview2").css("background-size", "cover");
	            }
	        }
	        $("#imagePreview3").fadeIn(500);
	});

	$("#picture_3").on("change", function()
		{
			var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return;

	        if (/^image/.test( files[0].type)){
	            var reader = new FileReader();
	            reader.readAsDataURL(files[0]);

	            reader.onloadend = function(){
	            	$("#imagePreview3").css("background-image", "url("+this.result+")");
	            	$("#imagePreview3").css("background-size", "cover");
	            }
	        }
	        $("#imagePreview4").fadeIn(500);
	});

	$("#picture_4").on("change", function()
		{
			var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return;

	        if (/^image/.test( files[0].type)){
	            var reader = new FileReader();
	            reader.readAsDataURL(files[0]);

	            reader.onloadend = function(){
	            	$("#imagePreview4").css("background-image", "url("+this.result+")");
	            	$("#imagePreview4").css("background-size", "cover");
	            }
	        }
	});
 });