"use strict";

// Add proprietary CSS for rounded corners with JS to keep CSS files valid
var makeRound = function (elementToRound, tl, tr, br, bl) {
	var dbs, moz, webkit, radius;
	dbs = document.body.style;
	moz = dbs.MozBorderRadius !== undefined;
	webkit = dbs.WebkitBorderRadius !== undefined;
	radius = dbs.borderRadius !== undefined || dbs.BorderRadius !== undefined;
	if (radius || moz || webkit) {
		$(elementToRound).css(radius ? 'border-top-left-radius' : moz ? '-moz-border-radius-topleft' : '-webkit-border-top-left-radius', tl + "px");
		$(elementToRound).css(radius ? 'border-top-right-radius' : moz ? '-moz-border-radius-topright' : '-webkit-border-top-right-radius', tr + "px");
		$(elementToRound).css(radius ? 'border-bottom-right-radius' : moz ? '-moz-border-radius-bottomright' : '-webkit-border-bottom-right-radius', br + "px");
		$(elementToRound).css(radius ? 'border-bottom-left-radius' : moz ? '-moz-border-radius-bottomleft' : '-webkit-border-bottom-left-radius', bl + "px");
	}
};

// Place all JS to be run on page load in this function
$(document).ready(function () {
	// Set WAI-ARIA Roles
	$("#header").attr("role", "banner");
	$("#footer").attr("role", "contentinfo");
	$("#mainContent").attr("role", "main");
	$("#menu").attr("role", "navigation");
	$("#sideNav").attr("role", "navigation");
	
	// Set up drop-down stats panel
	makeRound(".trigger", "0", "0", "10", "10");
	makeRound(".panel", "0", "0", "20", "20");
	$(".panel").css("opacity", 0.95);
	$(".trigger").click(function () {
		var lefto = $("a.trigger").offset();
		$(".panel").css("left", lefto.left - $(".panel").outerWidth() + $("a.trigger").outerWidth());
		$(".panel").slideToggle("slow");
		$(this).toggleClass("active");
		return false;
	});

	// Decode PHP-obfuscated e-mail links
	$("a.nospam").nospam();

	// Add Facebook "Like" button
	$("#sideNav #social").append('<li class="icon bottom"><fb:like href="http://www.facebook.com/pages/USC-Alpha-Phi-Omega-Alpha-Kappa/172262519454709" show_faces="false" width="210" font="verdana"></fb:like></li>');
});