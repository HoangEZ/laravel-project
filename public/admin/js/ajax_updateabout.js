window.addEventListener('load',function(){
    var form = document.getElementById('form-update');
    form.submit.disabled = false;
    form.addEventListener('submit',function(e){
        e.preventDefault();
        form.submit.disabled=true;
        var about = CKEDITOR.instances['txt-content'].getData();
        send('/admin/update_about','about='+about,function(data){
            if(data==500){
                form.submit.disabled=false;
                alert('có lỗi xảy ra');
                return;
            }
            location.href='/admin/update_about/?nc='+Math.floor(Math.random()*100);
        });
    })
})