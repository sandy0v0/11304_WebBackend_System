// JavaScript Document 
$(document).ready(function (e) {
	$(".mainmu").mouseover(
		function () {
			// $(this)現在這一層的下一層(children)叫.mw的
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function () {
			$(this).children(".mw").hide()
		}
	)
});
function lo(x) {
	location.replace(x)
}

// $()括弧裡面放PDO，$(x) 選擇器的意思，fadeIn代表淡入，fadeOut代表淡出
function op(x, y, url) {
	$(x).fadeIn()
	if (y)
		$(y).fadeIn()
	if (y && url)
		$(y).load(url)
}
function cl(x) {
	$(x).fadeOut();
}