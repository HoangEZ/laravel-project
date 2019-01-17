window.addEventListener('load',function(){
	var form = document.getElementsByTagName('form')[0];
	var pass_missmatch = document.getElementById('pass_missmatch');
	form.name.addEventListener('input',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Tên không được để trống');
		}else{
			this.setCustomValidity('');
		}
	});
	form.name.addEventListener('invalid',function(e) {
		if(this.validity.valueMissing){
			this.setCustomValidity('Tên không được để trống');
		}
	});
	form.email.addEventListener('input',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Email không được phép rỗng');
		}else if(this.validity.typeMismatch){
			this.setCustomValidity('Hãy điền đúng định dạng email');
		}else{
			this.setCustomValidity('');
		}
	});
	form.email.addEventListener('invalid',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Email không được phép rỗng');
		}else if(this.validity.typeMismatch){
			this.setCustomValidity('Hãy điền đúng định dạng email');
		}
	});
	form.password.addEventListener('input',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Mật khẩu không được để trống');
		}else{
			this.setCustomValidity('');
		}
	});
	form.password.addEventListener('invalid',function(e) {
		if(this.validity.valueMissing){
			this.setCustomValidity('Mật khẩu không được để trống');
		}
	});
	form.password_compare.addEventListener('input',function(e){
		if(this.value != form.password.value){
			this.setCustomValidity('Mật khẩu không khớp');
		}else{
			this.setCustomValidity('');
		}
	});
	form.password_compare.addEventListener('invalid',function(e) {
		if(this.value != form.password.value){
			this.setCustomValidity('Mật khẩu không khớp');
		}
	});
})