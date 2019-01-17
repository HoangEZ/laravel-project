window.addEventListener('load',function(){
    var form = document.getElementById('form-add');
    var genres = document.getElementsByClassName('span-genre');
    form.submit.disabled=false;
    form.addEventListener('submit',function(e){
        form.submit.disabled=true;
        e.preventDefault();
        var param = 'title='+form.title.value
        param += '&image='+form.url.value
        param += '&content='+CKEDITOR.instances['txt-content'].getData();
        if(genres.length>0){
            for(var i=0;i<genres.length;i++){
                param+= '&genreid[]='+genres[i].dataset.id;
            }
            send('/admin/entry_add',param,function(data){
            if(data==0){
                    alert('Chèn thất bại');
                }else if(data==1){
                    location.href='/admin/entry_manage';
                    return;
                }else{
                    alert(data);
                }
                form.submit.disabled=false;
            });
        }else{
            alert('Bạn chưa chọn thể loại');
            form.submit.disabled=false;
        }
    })
})