window.addEventListener('load',function(){
    var del = document.getElementsByClassName('badge-del');
    for(var i = 0;i<del.length;i++){
        del[i].addEventListener('click',function(e){
            e.preventDefault();
            var id = this.parentElement.dataset.id;
            var element = this;
            var event = e;
            var status = 200;
            status = send('/admin/genre_delete','id='+id,function(data){
                if(data==500){
                    alert('Có lỗi xảy ra, kiểm tra xem có bài viết thuộc thể loại này không, nếu không hãy liên hệ với quản lý server');
                }else{
                    delete_genre(element,event);
                }
            });
        })
    }
})