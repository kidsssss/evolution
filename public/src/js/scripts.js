$(document).ready(function(){
	$('ul.parent > li').hover(function(){
		$(this).find('ul.child').show(50);
	}, function(){
		$(this).find('ul.child').hide(100);
	});
});