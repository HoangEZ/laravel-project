window.addEventListener('load',function(){
	var xhr = new XMLHttpRequest();
	var form = document.getElementById('cmtForm');
	var crop = document.getElementById('crop');
	var canvas = document.getElementById('canv');
	var recapchaToken = '';
	var load_crop = function(){
		if(this.value!=''){
			canvas.style.display='block';
			crop.style.display='block';
			window.open('/crop','_blank','top=10,left=10');
		}
	};
	var generateToken = function(){
		grecaptcha.execute('6Lf2mocUAAAAAOm-UPuADWlyazGzDeHRyat_vgNR', {action: 'homepage'})
		.then(function(token) {
			recapchaToken = token;
		});
	}
	//some setup
	canvas.style.display='none';
	crop.style.display='none';
	form.name.value = form.email.value = form.avatar.value = form.comment.value = '';
	grecaptcha.ready(generateToken);
	//some event
	xhr.addEventListener('progress',function(e){
		if(e.loaded<e.total){
			form.submit.value='Đang xử lý: '+(e.loaded/e.total)*100+'%';
		}
	})
	xhr.addEventListener('readystatechange',function(){
		if(this.readyState==4){
			if(this.status==200){
				var text = this.responseText;
				if(text==001){
					alert('Chỉ hỗ trợ ảnh jpg và png');
				}else if(text==004){
					alert('Xin lỗi, website đã được bảo vệ bởi reCaptcha');
				}else if(text==002){
					alert('Lỗi kiểm duyệt');
				}
				else{
					alert('Thành công, bình luận của bạn đang chờ được duyệt');
					form.name.value = form.email.value = form.avatar.value = form.comment.value = '';
					canvas.getContext('2d').clearRect(0,0,canvas.width,canvas.height);
				}
			}
		}
		form.submit.disabled = false;
		form.submit.innerText='Gửi bình luận';
	})
	form.avatar.addEventListener('change',load_crop);
	crop.addEventListener('click',load_crop);
	form.addEventListener('submit',function(e){
		e.preventDefault();
		this.submit.disabled=true;
		this.submit.innerText='Đang xử lý';
		//get ID
		var path = window.location.pathname;
		var id = path.split('/')[2];
		//create post parametter
		var str = '_token='+this._token.value
		str += '&entry_id='+id;
		str += '&name='+this.name.value;
		str += '&email='+this.email.value;
		str += '&avatar='+this.avatar.value;
		str += '&comment='+this.comment.value;
		str += '&top='+canvas.dataset.top;
		str += '&left='+canvas.dataset.left;
		str += '&size='+canvas.dataset.width;
		str += '&token='+recapchaToken;
		xhr.open('POST',this.dataset.action);
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send(str);
		generateToken();
	})
})