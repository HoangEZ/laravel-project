window.addEventListener('load',function(){
    var del = document.getElementsByClassName('badge-del');
    for(var i = 0;i<del.length;i++){
        del[i].addEventListener('click',function(e){
            delete_genre(this,e);
        });
    }
})