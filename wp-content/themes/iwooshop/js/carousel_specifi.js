// JavaScript Document
$(document).ready(function() {
	$('#owl-demo').owlCarousel({
			loop:true,
			margin:20,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				767:{
					items:2,
					nav:false
				},
				1000:{
					items:4,
					nav:true,
					loop:false
				}
			}
			
		})
		$('#owl-demo0').owlCarousel({
			loop:true,
			margin:20,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				767:{
					items:2,
					nav:false
				},
				1000:{
					items:4,
					nav:true,
					loop:false
				}
			}
			
		})
		$('#owl-demo1').owlCarousel({
			loop:true,
			margin:20,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				767:{
					items:2,
					nav:false
				},
				1000:{
					items:4,
					nav:true,
					loop:false
				}
			}
			
		})
		$('#owl-demo2').owlCarousel({
			loop:true,
			margin:20,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				767:{
					items:2,
					nav:false
				},
				1000:{
					items:3,
					nav:true,
					loop:false
				}
			}
			
		})
		
		
		$("#owl-demo3").owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		nav:true,
		paginationSpeed : 400,
		items : 1,
		itemsDesktop : false,
		itemsDesktopSmall : false,
		itemsTablet: false,
		itemsMobile : false
	
		});
		
		var owl = $("#owl-demo4");
		owl.owlCarousel({
			itemsCustom : [
			  [0, 5],
			  [450, 5],
			  [600, 5],
			  [700, 5],
			  [1000, 5],
			  [1200, 5],
			  [1400, 5],
			  [1600, 5]
			],
			navigation : true
		});
		
		var owl = $("#owl-demo5");
		owl.owlCarousel({
			itemsCustom : [
			  [0, 5],
			  [450, 5],
			  [600, 5],
			  [700, 5],
			  [1000, 5],
			  [1200, 5],
			  [1400, 5],
			  [1600, 5]
			],
			navigation : true
		});

		$('#owl-demo6').owlCarousel({
			loop:true,
			margin:20,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:3,
					nav:false
				},
				1000:{
					items:4,
					nav:true,
					loop:false
				}
			}
			
		})

		var owl = $("#owl-demo7");
		owl.owlCarousel({
			itemsCustom : [
			  [0, 1],
			  [450, 2],
			  [600, 3],
			  [700, 3],
			  [1000, 3.9],
			  [1200, 3.9],
			  [1400, 4],
			  [1600, 4]
			],
			navigation : true
		});
});