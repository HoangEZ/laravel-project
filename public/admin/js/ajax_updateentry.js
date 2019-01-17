window.addEventListener('load',function(){
    var form = document.getElementById('form-update');
    var genres = document.getElementsByClassName('span-genre');
    form.submit.disabled=false;
    form.addEventListener('submit',function(e){
        form.submit.disabled=true;
        e.preventDefault();
        var param = 'id='+form.title.dataset.id;
        param += '&title='+form.title.value;
        param +='&image='+form.url.value;
        param +='&content='+CKEDITOR.instances['txt-content'].getData();
        if(genres.length>0){
            for(var i=0;i<genres.length;i++){
                param+= '&genreid[]='+genres[i].dataset.id;
            }
            send('/admin/entry_edit',param,function(data){
                if(data==0){
                    alert('Cập nhật thất bại');
                }else if(data==1){
                    location.href=location.origin+location.pathname+'?nc='+(Math.floor(Math.random()*100));
                    return;
                }
                form.submit.disabled=false;
            });
        }else{
            alert('Bạn chưa chọn thể loại');
            form.submit.disabled=false;
        }
    })
})