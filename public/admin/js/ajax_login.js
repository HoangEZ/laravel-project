window.addEventListener('load',function(){
	var xhr = new XMLHttpRequest();
	var form =  document.getElementsByClassName('login')[0];
	xhr.addEventListener('readystatechange',function(){
		if(this.readyState==4){
			if(this.status==200){
				if(this.responseText==1) history.back(1);
				return;
			}
		}
		form.subm.disabled=false;
	});
	form.addEventListener('submit',function(e){
		e.preventDefault();
		form.subm.disabled=true;
		xhr.open('POST','/admin/login-process');
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send('name='+form.user.value+'&password='+form.password.value+'&_token='+form._token.value);
	});
})