$(document).ready(function() {
	// 타이틀 변환
	var replaceTitle = 
	arrTitle = jQuery('.sub-title h2').text();
	if(replaceTitle==''){
	}else{
		document.title=arrTitle + " | " + "SangMin Portfolio";
	};

	// 텝
	jQuery(".tab-content").hide();
	jQuery("ul.tabs>li:first").addClass("active"); 	
	jQuery(".tab-content:first").show();

	jQuery("ul.tabs>li").click(function(e) {
		e.preventDefault();
		jQuery("ul.tabs>li").removeClass("active");
		jQuery(this).addClass("active");
		jQuery(".tab-content").hide();		
		
		jQuery("ul.tabs>li").find('img').attr("src" ,function(iIndex,sSrc){
			return sSrc.replace('_on.gif', '_off.gif');
		});

		jQuery("ul.tabs>li.active").find('img').attr("src",function(iIndex,sSrc){
			return sSrc.replace('_off.gif', '_on.gif');
		});
		
		var activeTab = jQuery(this).find("a").attr("href");
		jQuery(activeTab).fadeIn();
		return false;
	});

	// menu
	$("#showLeftPush").click(function(){

		if(!$(this).hasClass("closing")){

			if($("#cbp-spmenu-s1").hasClass("cbp-spmenu-open")){
				$(this).removeClass("active");
				$(this).addClass("closing");

				$("body").removeClass("cbp-spmenu-push-toright");
				$("#cbp-spmenu-s1").removeClass("cbp-spmenu-open");

				setTimeout(function(){
					$("#showLeftPush").removeClass("closing");
				}, 500);
			}else{
				$(this).addClass("active");

				$("body").addClass("cbp-spmenu-push-toright");
				$("#cbp-spmenu-s1").addClass("cbp-spmenu-open");
			}

		}

		event.preventDefault();
	});

	function scrollEvent(){
		var $menu = $("#cbp-spmenu-s1 ul li");
		var $menu_a = $(">a", $menu);
		var id = false;
		var sections = [];
		var hash = function(h) {
		if (history.pushState) {
		  history.pushState(null, null, h);
		} else {
		  location.hash = h;
		}
		};

		$menu.eq(0).addClass("active");

		$menu_a.click(function(event) {
			if(event.preventDefault){
				event.preventDefault();
			}else{
				event.returnValue = false; 
			};

			$(this).parent().siblings().removeClass("active");
			$(this).parent().addClass("active");
			$("html, body").animate(
				{
					scrollTop: $($(this).attr("href")).offset().top
				},
				{
					duration: 500,
					easing: 'easeInOutCirc',
					//complete: hash($(this).attr("href"))
				}
			);
		});

		$menu_a.each(function() {
			sections.push($($(this).attr("href")));
		});

		$(window).scroll(function(event) {
			var scrolling = $(this).scrollTop() + $(this).height() / 3;
			var scroll_id;
			for (var i in sections) {
				var section = sections[i];
				if (scrolling > section.offset().top) {
				scroll_id = section.attr("id");
				}
			}
			if (scroll_id !== id) {
				id = scroll_id;
				$menu.removeClass("active");
				$("a[href='#" + id + "']", $menu).parent().addClass("active");
			}
		});
	}
	scrollEvent();


});