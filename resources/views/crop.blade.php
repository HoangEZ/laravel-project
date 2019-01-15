<?php
	$width = 80;
	$height = (!empty($_GET['r'])) ? $_GET['r']*$width : 80;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		#box{
			position: relative;
		}
		#rect{
			position: absolute;
			width:<?=$width?>px;
			height:<?=$height?>px;
			box-shadow: 0 0 0 5px rgba(255,255,255,0.4) inset;
			-moz-box-shadow: 0 0 0 5px rgba(255,255,255,0.4) inset;
			-o-box-shadow: 0 0 0 5px rgba(255,255,255,0.4) inset;
			-ms-box-shadow: 0 0 0 5px rgba(255,255,255,0.4) inset;
			border: 1px solid rgba(0,0,0,0.4);
			top: 0;
			left: 0;
			cursor: pointer;
		}
		button{
			display: block;
			border: none;
			background-color: #00aeff;
			font-weight: bold;
			color: #fff;,
			margin: 0;
			cursor: pointer;
			float:left;
		}
		button:hover{
			background-color: #bf6649
		}
		.btn-grp{
			margin-bottom: 3px;
		}
		.btn-grp:after{
			content:'';
			display: block;
			clear: both;
		}
		#sub{
			margin-right: 6px;
		}
	</style>
</head>
<body>
	<div class="btn-grp">
		<button id="submit">Cắt ảnh</button>
	</div>
	<div class="btn-grp">
		<button id="sub">Giảm kích thước vùng cắt (cuộn xuống)</button>
		<button id="add">Tăng kích thưóc vùng cắt (cuộn lên)</button>
	</div>
	<div id="box">
		<img id="img">
		<div id="rect"></div>
	</div>
	<script>
		window.addEventListener('load',function(e){
			var text = this.opener.document.getElementById('image').value;
			var img = document.getElementById('img');
			var btn_sub = document.getElementById('sub');
			var btn_add = document.getElementById('add');
			var btn_submit = document.getElementById('submit');
			var top = 0;
			var left = 0;
			var deltaTop = 0;
			var deltaLeft = 0;
			var expand_t;
			var shrink_t;
			//some setup
			if(text.value!=''){
				img.src = text;
			}
			
			
			//some event
			img.addEventListener('load',function(){
				btn_submit.style.width = img.clientWidth+'px';
				btn_add.style.width = btn_sub.style.width = img.clientWidth/2-3+'px';
			})
			var rect = document.getElementById('rect');
			rect.addEventListener('mousedown',function(e){
				e.preventDefault();
				top = rect.offsetTop;
				left = rect.offsetLeft;
				deltaTop = top-e.pageY;
				deltaLeft = left-e.pageX;
				document.addEventListener('mousemove',move);
			});
			document.addEventListener('mouseup',function(){
				document.removeEventListener('mousemove',move);
			})
			
			var move = function(e){
				e.preventDefault();
				var top = deltaTop+e.pageY;
				var left = deltaLeft+e.pageX;
				if(top<0){
					top = 0;
				}
				if(top+rect.offsetHeight > img.offsetHeight){
					top = img.offsetHeight - rect.offsetHeight;
				} 
				if(left < 0){
					left = 0;
				}
				if(left + rect.offsetWidth > img.offsetWidth){
					left = img.offsetWidth - rect.offsetWidth;
				}
					rect.style.top = top+'px';
					rect.style.left = left+'px';
			}
			btn_add.addEventListener('mousedown',function(e){
				expand_t = setInterval(function(){
					if(rect.offsetLeft+rect.offsetWidth+1<=img.clientWidth && rect.offsetTop+rect.offsetHeight+1<=img.clientHeight){
						rect.style.width=rect.clientWidth+1+'px';
						rect.style.height=rect.clientWidth+1+'px';
					}
				},1);
			});
			document.addEventListener('mouseup',function(e){
				clearInterval(expand_t);
			});
			btn_sub.addEventListener('mousedown',function(e){
				shrink_t = setInterval(function(){
					if(rect.offsetWidth-1>=0 &&rect.offsetHeight-1>=0){
						rect.style.width=rect.clientWidth-1+'px';
						rect.style.height=rect.clientWidth-1+'px';
					}
				},1);
			});
			document.addEventListener('mouseup',function(e){
				clearInterval(shrink_t);
			});
			btn_submit.addEventListener('click',function(){
				var top = rect.offsetTop-img.offsetTop;
				var left = rect.offsetLeft-img.offsetLeft;
				var height = rect.offsetHeight;
				var width = rect.offsetWidth;
				var canvas = window.opener.document.getElementById('canv');
				var context = canvas.getContext('2d');
				context.clearRect(0,0,canvas.width,canvas.height);
				context.drawImage(img,left,top,width,height,0,0,80,80);
				canvas.dataset.top = top;
				canvas.dataset.left = left;
				canvas.dataset.width = width;
				canvas.dataset.height = height;
				window.close();
			})
			rect.addEventListener('wheel',function(e){
				e.preventDefault();
				if(e.deltaY<0){
					if(rect.offsetLeft+rect.offsetWidth+1<=img.clientWidth && rect.offsetTop+rect.offsetHeight+1<=img.clientHeight){
						this.style.width = this.clientWidth+3+'px';
						this.style.height = this.clientHeight+3+'px';
					}
				}
				if(e.deltaY>0){
					if(rect.offsetWidth-1>=0 &&rect.offsetHeight-1>=0){
						this.style.width = this.clientWidth-3+'px';
						this.style.height = this.clientHeight-3+'px';
					}
				}
			})
		})
	</script>
</body>
</html>