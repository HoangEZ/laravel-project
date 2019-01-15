window.addEventListener('load',function(){
	var form = document.getElementsByClassName('login')[0];
	form.subm.disabled=false;
	var align = function(){
		var w_width = window.innerWidth;
		var w_height = window.innerHeight;
		var width = form.offsetWidth;
		var height = form.offsetHeight;
		form.style.left = w_width/2-width/2 +'px';
		form.style.top = w_height/2 - height/2+'px';
	};
	align();
	window.addEventListener('resize',align);
})