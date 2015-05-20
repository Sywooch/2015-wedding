jQuery(document).ready(function(){
	$('#backTop').hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#backTop').fadeIn(100);
		} else {
			$('#backTop').fadeOut();
		}
	});
	$('#backTop').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	if($("body").width() < 381) {
		$('.newsNav a').click(function () {
			$('body,html').animate({
				scrollTop: $('#newsSmallMain').offset().top
			}, 500);
			return false;
		});
	}
	$('.zoom').fancybox();
	$("a[rel='zoomImg']").fancybox({
    	openEffect	: 'fade',
    	closeEffect	: 'fade',
		autoPlay   : false,
		playSpeed  : 6000,
		prevEffect		: 'none',
		nextEffect		: 'none',
    });
	$(".clickShow").click(function(){
		$("#comment").addClass("showComment");
	});
	$(".clickHide").click(function(){
		$("#comment").removeClass("showComment");
	});
	//nums
	$("#nums #listNums").click(function(){
		$("#nums #listNums div").slideToggle(0);
	});
	//video
	$(".oneVideo").live('click',function(){
		var idVideo = $(this).attr("id");
		$.get("video-load.php",{id:idVideo},function(data){
			$("#showVideo").html(data);
		});
		$(".oneVideo").removeClass("active");
		$(this).addClass("active");
		$('body,html').animate({
			scrollTop: $('#colLeft').offset().top
		}, 200);
	});
	
	$("#closeFace").hide();
	$("#facewrap #faceHide").click(function(){
		$("#facewrap").animate({right:'0px'},{queue:false,duration:200});
		$("#closeFace").show();
		$("#faceHide").hide();
		
		$("#support").animate({right:'-170px'},{queue:false,duration:200});
		$("#showSup").show();
		$("#closeSup").hide();
	});
	$("#facewrap #closeFace").click(function(){
		$("#facewrap").animate({right:'-245px'},{queue:false,duration:200});
		$("#closeFace").hide();
		$("#faceHide").show();
	});
	$("#closeSup").hide();
	$("#support #showSup").click(function(){
		$("#support").animate({right:'0px'},{queue:false,duration:200});
		$("#closeSup").show();
		$("#showSup").hide();
		
		$("#facewrap").animate({right:'-245px'},{queue:false,duration:200});
		$("#closeFace").hide();
		$("#faceHide").show();
	});
	$("#support #closeSup").click(function(){
		$("#support").animate({right:'-170px'},{queue:false,duration:200});
		$("#showSup").show();
		$("#closeSup").hide();
	});
	
	$("#menuMobile h1").click(function(){
		$(this).next("ul").slideToggle(300)
		.siblings("ul:visible").slideUp(300);
		$(this).toggleClass("sub_active");
		$(this).siblings("h1").removeClass("sub_active");
	});
	
	$("#menuMobile h2").click(function(){
		$(this).next("ul").slideToggle(300)
		.siblings("ul:visible").slideUp(300);
		$(this).toggleClass("sub_active");
		$(this).siblings("h2").removeClass("sub_active");
	});
});
this.sitemapstyler = function(){
	var sitemap = document.getElementById("sitemap")
	if(sitemap){
		
		this.listItem = function(li){
			if(li.getElementsByTagName("ul").length > 0){
				var ul = li.getElementsByTagName("ul")[0];
				ul.style.display = "none";
				var span = document.createElement("span");
				span.className = "collapsed";
				span.onclick = function(){
					ul.style.display = (ul.style.display == "none") ? "block" : "none";
					this.className = (ul.style.display == "none") ? "collapsed" : "expanded";
				};
				li.appendChild(span);
			};
		};
		
		var items = sitemap.getElementsByTagName("li");
		for(var i=0;i<items.length;i++){
			listItem(items[i]);
		};
		
	};	
};
window.onload = sitemapstyler;