window.addEventListener('load',function(){
    var form = document.getElementById('form-add');
    form.addEventListener('submit',function(e){
        e.preventDefault();
        send('/admin/entry_add','title='+form.title.value+'&image='+form.url.value+'&content='+CKEDITOR.instances['txt-content'].getData());
    })
})