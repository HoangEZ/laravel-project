window.addEventListener('DOMContentLoaded',function(){
	var name_form = document.getElementById('name-form');
	var email_form = document.getElementById('email-form');
	var pass_form = document.getElementById('pass-form');
	name_form.name.value=document.getElementById('txt-name').innerHTML;
	email_form.email.value=document.getElementById('txt-email').innerHTML;
	pass_form.password.value='';
	pass_form.new_pass.value='';
	pass_form.new_pass_confirm.value='';
	email_form.submit.disabled = name_form.submit.disabled = pass_form.submit.disabled=false;
})
window.addEventListener('load',function(){
	var name_form = document.getElementById('name-form');
	var email_form = document.getElementById('email-form');
	var name = document.getElementById('txt-name');
	var email = document.getElementById('txt-email');
	var pass_form = document.getElementById('pass-form');
	var infor = document.getElementById('infor-name');
	var xhr = new XMLHttpRequest();
	var data = 'Lỗi máy chủ';
	xhr.addEventListener('readystatechange',function(){
		console.log(this.readyState);
		if(this.readyState==4){
			if(this.status==200){
				data = this.responseText;
				if(data=='name_success'){
					infor.innerHTML = name.innerHTML=name_form.name.value;
					name_form.submit.disabled=false;					
				}else if(data=='email_success'){
					email.innerHTML=email_form.email.value;
					email_form.submit.disabled=false;
				}else if(data=='password_success'){
					alert("Cập nhật mật khẩu thành công");
					email_form.submit.disabled=false;
				}else{
					alert(data);
				}
			}
		}
	})
	var update = function(page,param){
		xhr.open('POST',page);
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send(param)
	}
	name_form.addEventListener('submit',function(e){
		e.preventDefault();
		if(this.name.value!=name.innerHTML && this.name.value!=''){
			name_form.submit.disabled=true;
			update('/admin/name_update','_token='+this._token.value+'&name='+this.name.value);
		}
	})
	email_form.addEventListener('submit',function(e){
		e.preventDefault();
		if(this.email.value!=email.innerHTML && this.email.value!=''){
			email_form.submit.disabled = true;
			update('/admin/email_update','_token='+this._token.value+'&email='+this.email.value);
		}
		
	})
	pass_form.addEventListener('submit',function(e){
		e.preventDefault();
		if(this.new_pass.value==this.new_pass_confirm.value && this.password.value!='' && this.new_pass.value!=''){
			email_form.submit.disabled = true;
			update('admin/password_update','_token='+this._token.value+'&password='+this.password.value+'&new_pass='+this.new_pass.value+'&new_pass_confirm='+this.new_pass_confirm.value);
		}else if(this.new_pass.value!=this.new_pass_confirm.value){
			alert("Mật khẩu không khớp");
		}
		
	})
})