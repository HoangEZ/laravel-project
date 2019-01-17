window.addEventListener('load',function(){
    var del = document.getElementById('btn-del');
    var delAll = document.getElementById('btn-del-all');
    var check = document.getElementsByClassName('chk-del');
    var sending = false;
    del.addEventListener('click',function(e){
        e.preventDefault();
        sending = true;
        var param='';
        var checked=false;
        for(var i=0;i<check.length;i++){
            if(check[i].checked){
                if(!checked){
                    param+='id[]='+check[i].dataset.id;
                    checked=true;
                }else{
                    param+='&id[]='+check[i].dataset.id;
                }
            }
        }
        var conf = confirm('Bạn có chắc là muốn xóa?');
        if(conf && sending && param!=''){
            send('/admin/entry_delete',param,function(data){
                if(data>0){
                    for(var i=0;i<check.length;i++){
                        if(check[i].checked){
                            check[i].parentElement.parentElement.parentElement.removeChild(check[i].parentElement.parentElement);
                            i--;
                        }
                    }
                }
                sending=false;
            })
        }
    })
    delAll.addEventListener('click',function(e){
        e.preventDefault();
        var param='delAll';
        sending = true;
        var conf = confirm('Bạn có chắc là muốn xóa?');
        if(conf && sending && param!=''){
            send('/admin/entry_delete',param,function(data){
                if(data>0){
                    for(var i=0;i<check.length;i++){
                        check[i].parentElement.parentElement.parentElement.removeChild(check[i].parentElement.parentElement);
                        i--;
                    }
                }
                sending=false;
            })
        }
    })    
})