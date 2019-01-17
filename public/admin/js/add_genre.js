window.addEventListener('load',function(){
    var add = document.getElementById('btn-add');
    var list = document.getElementById('genre-list');
    var select = document.getElementById('sel-genre');
    var options = select.children;
    add.addEventListener('click',function(e){
        e.preventDefault();
        if(select.selectedIndex>-1){
            var span = document.createElement('span');
            span.classList.add('badge','badge-pill','badge-primary','mx-1','span-genre');
            span.dataset.id=select.value;
            span.innerHTML= options[select.selectedIndex].text + ' <span class="fa fa-times badge-del" onclick="delete_genre(this,event)"></span></span>';
            list.appendChild(span);
            select.removeChild(options[select.selectedIndex]);
        }
    })
})