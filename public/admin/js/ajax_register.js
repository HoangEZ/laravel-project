window.addEventListener('load',function(){
	var xhr = new XMLHttpRequest();
	var form = document.getElementById('register-form');
	form.submit.disabled=false;
	var pass_missmatch = document.getElementById('pass_missmatch');
	console.log(form);
	var recapchaToken = '';
	var generateToken = function(){
		grecaptcha.execute('6LeqdokUAAAAAM9A0wdTfa-o8HupazbcL2TCZ1Lx', {action: 'homepage'})
		.then(function(token) {
			recapchaToken = token;
		});
	}
	var setError = function(){
		if(pass_missmatch.classList.contains('d-none')){
			pass_missmatch.classList.remove('d-none').add('d-inline');
		}
	}
	var removeError = function(){
		if(pass_missmatch.classList.contains('d-inline')){
			pass_missmatch.classList.remove('d-inline').add('d-none');
		}
	}
	//some setup
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
				if(text==000){
					alert('Mật khẩu không khớp');
				}else if(text==004){
					alert('Xin lỗi, website đã được bảo vệ bởi reCaptcha');
				}else if(text==002){
					alert('Lỗi kiểm duyệt');
				}
				else{
					alert('Đăng ký thành công');
					location.href='/admin/login';
				}
			}
		}
		form.submit.disabled = false;
		form.submit.innerText='Đăng ký';
	})
	form.addEventListener('submit',function(e){
		e.preventDefault();
		if(this.password.value != this.password_compare.value){
			setError();
		}else{
			removeError();
			this.submit.disabled=true;
			this.submit.innerText='Đang xử lý';
			//create post parametter
			var str = '_token='+this._token.value;
			str += '&name='+this.name.value;
			str += '&email='+this.email.value;
			str += '&password='+this.password.value;
			str += '&password_compare='+this.password_compare.value;
			str += '&token='+recapchaToken;
			xhr.open('POST',this.dataset.action);
			xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xhr.send(str);
			generateToken();
		}
	})
})