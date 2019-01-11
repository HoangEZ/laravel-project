window.addEventListener('load',function () {
	var form = document.getElementById('cmtForm');
	form.name.addEventListener('input',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Tên không được phép rỗng');
		}else{
			this.setCustomValidity('');
		}
	})
	form.name.addEventListener('invalid',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Tên không được phép rỗng');
		}
	})
	form.email.addEventListener('input',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Email không được phép rỗng');
		}else{
			this.setCustomValidity('');
		}
	})
	form.email.addEventListener('invalid',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Email không được phép rỗng');
		}
	})
	form.email.addEventListener('input',function(e){
		if(this.validity.typeMismatch){
			this.setCustomValidity('Hãy điền đúng định dạng email');
		}else{
			this.setCustomValidity('');
		}
	})
	form.email.addEventListener('invalid',function(e){
		if(this.validity.typeMismatch){
			this.setCustomValidity('Hãy điền đúng định dạng email');
		}
	})
	form.avatar.addEventListener('input',function(e){
		if(this.validity.typeMismatch){
			this.setCustomValidity('Hãy điền đúng định dạng url');
		}else{
			this.setCustomValidity('');
		}
	})
	form.avatar.addEventListener('invalid',function(e){
		if(this.validity.typeMismatch){
			this.setCustomValidity('Hãy điền đúng định dạng url');
		}
	})
	form.avatar.addEventListener('input',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Còn thiếu url');
		}else{
			this.setCustomValidity('');
		}
	})
	form.avatar.addEventListener('invalid',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Còn thiếu url');
		}
	})
	form.comment.addEventListener('input',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Bạn chưa bình luận gì nè');
		}else{
			this.setCustomValidity('');
		}
	})
	form.comment.addEventListener('invalid',function(e){
		if(this.validity.valueMissing){
			this.setCustomValidity('Bạn chưa bình luận gì nè');
		}
	})
});