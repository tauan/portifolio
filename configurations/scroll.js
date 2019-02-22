$(function(){
	var __menu = $('.nav-fixed');
	var __nameheader = $('.name-header');
	var __altura = $(window).height();
	var __anterior = 0;
	var aa = __altura/3;
	var n = $("div").length;
	var __ultimoElemento = n-1;

	//alert($("div").eq(__ultimoElemento).attr("style"));
	if($("div").eq(__ultimoElemento).attr("style") == 'text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'){
		$("div").eq(__ultimoElemento).css("display","none");
	}



	$("#background-header").addClass("bg-first");
	


	$(window).scroll(function(){
		
		if($(this).scrollTop() > 70){
			__menu.fadeIn(500);
		}else{
			__menu.fadeOut(0);
		}
		if($(this).scrollTop() > aa){
			__nameheader.fadeOut(500);
			$('.logo-anchor').fadeIn(500);
		}else{
			__nameheader.fadeIn(500);
			$('.logo-anchor').fadeOut(500);
		}
		if(__altura < 500){
			if($(this).scrollTop() > 500){
				$("#background-header").removeClass("bg-first").addClass("bg-secound");
			}else{
				$("#background-header").removeClass("bg-secound").addClass("bg-first");
			}
		}else{
			if($(this).scrollTop() > __altura){
				$("#background-header").removeClass("bg-first").addClass("bg-secound");
			}else{
				$("#background-header").removeClass("bg-secound").addClass("bg-first");
			}
		}
	});

	//scroll 
	$('a[href^="#"]').click(function(e){

		var target = $(this).attr('href');
		var strip = target.slice(1);
		var anchor = $("a[name='" + strip +"']");

		e.preventDefault();

		$('html, body').animate({
			scrollTop: anchor.offset().top
		}, 'slow');

	});


});