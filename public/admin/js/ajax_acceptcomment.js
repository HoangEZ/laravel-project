window.addEventListener('load',function(){
	var btn = document.getElementsByClassName('btn');
	for(var i=0;i<btn.length;i++){
		btn[i].disabled = false;
		btn[i].addEventListener('click',function(e){
			update_click(e,this);
		});
	}
	var btn_del = document.getElementsByClassName('btn-del');
	for(var i=0;i<btn_del.length;i++){
		btn_del[i].addEventListener('click',function(e){
			delete_click(e,this);
		});
	}
	

	var send = function(url,param,callback){
		var token = document.getElementById('token').innerText;
		var xhr = new XMLHttpRequest();
		xhr.addEventListener('readystatechange',function(){
			if(this.readyState==4 && this.status==200){
				callback(this.responseText);
			}
		})
		xhr.open('POST',url);
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send(param+'&_token='+token);
	}
	var delete_click = function(e,element){
		e.preventDefault();
		element.classList.remove('text-danger');
		element.classList.add('test-disabled');
		send('/admin/delete_comment','id='+element.dataset.id,function(data){
			if(data=='success'){
				element.parentElement.parentElement.parentElement.removeChild(element.parentElement.parentElement);
			}else{
				element.classList.add('text-danger');
				element.classList.remove('test-disabled');
			}
		});
	}
	var update_click = function(e,element){
		e.preventDefault();
		element.innerText='Đang xử lý';
		if(element.classList.contains('accept')){
			send('/admin/accept_comment','id='+element.dataset.id,function(data){
				if(data==1){
					element.classList.remove('accept','btn-primary');
					element.classList.add('reject','btn-success');
					element.innerText='Bỏ duyệt';
				}else{
					alert('Có lỗi xảy ra, cập nhật thất bại');
					element.innerText='Duyệt';
				}
			})
		}else if(element.classList.contains('reject')){
			send('/admin/reject_comment','id='+element.dataset.id,function(data){
				if(data==1){
					element.classList.remove('reject','btn-success');
					element.classList.add('accept','btn-primary');
					element.innerText='Duyệt';
				}else{
					alert('Có lỗi xảy ra, cập nhật thất bại');
					element.innerText='Bỏ duyệt';
				}
			})
		}
	}
})