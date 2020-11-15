<!doctype html>
<html lang="en">
<head>
	<meta charset="euc-kr">
	<title>Document</title>
	<style>
		*{margin:0; padding:0;}
		.section{height:100vh;}
		.flex{
			display:-webkik-box;
			display:-ms-flexbox;
			display:flex;
			flex-direction:column;
			-webkit-box-pack:center;
			-ms-flex-pack:center;
			justify-content:center;
			height:100%;
		}
		.item{
			width:100%;
			text-align:center;
		}



		#test .newcard-bg{z-index:-1; position:absolute; left:50%; top:300px; width:1920px; height:280px; margin-left:-960px; background:url("https://www.itscard.co.kr/image/renewal2019/main/newcard_bg.jpg") 0 0 no-repeat; overflow:hidden;}
		#test #circle_area{position:absolute; left:0; top:0; right:0; bottom:0;}
		#test .newcard-bg .circle{position:absolute;}
		#test .newcard-bg .circle01{left:70px; top:172px; width:211px; height:248px; background:url("https://www.itscard.co.kr/image/renewal2019/main/newcard_circle_01.png") 0 0 no-repeat;}
		#test .newcard-bg .circle02{left:331px; top:-67px; width:127px; height:149px; background:url("https://www.itscard.co.kr/image/renewal2019/main/newcard_circle_02.png") 0 0 no-repeat;}
		#test .newcard-bg .circle03{right:255px; top:26px; width:95px; height:112px; background:url("https://www.itscard.co.kr/image/renewal2019/main/newcard_circle_03.png") 0 0 no-repeat;}
		#test .newcard-bg .circle04{right:72px; top:186px; width:169px; height:198px; background:url("https://www.itscard.co.kr/image/renewal2019/main/newcard_circle_04.png") 0 0 no-repeat;}
	</style>
</head>
<body>
	<h1>Require Js Test</h1>
	<div id="wrap"></div>

	<div id="test" style="position:relative; height:2000px;">
		<div class="newcard-bg">
			<div id="circle_area">
				<div class="circle circle01" id="circle01"></div>
				<div class="circle circle02" id="circle02"></div>
				<div class="circle circle03" id="circle03"></div>
				<div class="circle circle04" id="circle04"></div>
			</div>
		</div>
	</div>
	
	<button id="ChangeBtn">Change</button>
	<div id="testBtn">
		<p>Test Button</p>
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="js/require.js"></script>
	<script>
		$("#ChangeBtn").click(function(){
			$("#testBtn p").html('Test Button 2');
		});
		$("#testBtn p").click(function(){
			alert('테스트 버튼 입니다.');
		});

		requirejs.config({
			baseUrl: 'js',
			paths: {
				'jquery': 'https://code.jquery.com/jquery-1.12.4.min',
				'TweenMax': 'scrollmagic/lib/greensock/TweenMax.min',
				'ScrollPlugin': 'scrollmagic/lib/greensock/plugins/ScrollToPlugin.min',
				'modernizr': 'scrollmagic/lib/modernizr.custom.min',
				'iscroll': 'scrollmagic/lib/iscroll-probe',
				'ScrollMagic': 'scrollmagic/minified/ScrollMagic.min',
				'animation': 'scrollmagic/minified/plugins/animation.gsap.min',
				'debugIndicators': 'scrollmagic/minified/plugins/debug.addIndicators.min'
			},
			shim: {
				'animation':{
					deps:['TweenMax'],
					exports:'animation'
				}
			}
		});
		requirejs([
			'jquery'
			], 
			function(){
				requirejs([
					'ScrollMagic',
					'debugIndicators',
					'TweenMax',
					'animation'
				], function(ScrollMagic) {
					console.log(ScrollMagic)
					var controller = new ScrollMagic.Controller();
					var circle01 = $("#circle01"),
						circle02 = $("#circle02"),
						circle03 = $("#circle03"),
						circle04 = $("#circle04");

					var tlm = new TimelineMax();

						tlm.fromTo(circle01, 5, {rotation: 0, x: 0, y: 350}, {rotation: -0, x: 0, y: -500}, 0)
							.fromTo(circle02, 5, {rotation: 0, x: 0, y: -350/2}, {rotation: -0, x: 0, y: 500/2}, 0)
							.fromTo(circle03, 5, {rotation: 0, x: 0, y: -350/2}, {rotation: -0, x: 0, y: 500/2}, 0)
							.fromTo(circle04, 5, {rotation: 0, x: 0, y: 350}, {rotation: -0, x: 0, y: -500}, 0);


					// build scene
					var scene = new ScrollMagic.Scene({
										triggerElement: "#circle_area",
										triggerHook: 1,
										duration: 2000
									})
									.setTween(tlm) // Tween Max 애니메이션 세팅
									//.addIndicators({name: "1 (duration: 280)"}) // Start 지점, End 지점 표기
									.addTo(controller);
				});
		});
		
		//requirejs.config({
			//baseUrl: 'js'
		//});
		//requirejs([
			//'jquery',
			//'text!/my1/sub/html/section01.html',
			//'text!/my1/sub/html/section02.html',
			//'text!/my1/sub/html/section03.html',
			//'text!/my1/sub/html/section04.html'
		
			//], function($, section01, section02, section03, section04){
			//var $wrap = $("#wrap");
			//var	$html01 = $(section01),
				//$html02 = $(section02),
				//$html03 = $(section03),
				//$html04 = $(section04);
			
			//$wrap.append($html01);
			//$wrap.append($html02);
			//$wrap.append($html03);
			//$wrap.append($html04);
		//});

		//requirejs([
			//'test_01',
			//'test_02',
			//'test_03',
			//'test_04'
		//], function() {
			//test01();
			//test02();
			//test03();
			//test04();
		//});

		//require([
			//'test_01',
			//'test_02',
			//'test_03',
			//'test_04'
		//], function(relative, dotjs, absolute, foo) {
			//console.log(relative);	
			//console.log(dotjs);	
			//console.log(absolute);	
			//console.log(foo);	
		//});
		window.onload = function() {
			
		}
	</script>
</body>
</html>