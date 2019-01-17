var send = function(url,param,callback){
    var token = document.getElementById('token').innerText;
    var xhr = new XMLHttpRequest();
    xhr.addEventListener('readystatechange',function(){
        if(this.readyState==4){
            if(this.status==200){
                callback(this.responseText);
            }
            if(this.status==500){
                callback(this.status);
            }
        }
    })
    xhr.open('POST',url);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send(param+'&_token='+token);
}
var delete_genre = function(element,event){
    event.preventDefault();
    element.parentElement.parentElement.removeChild(element.parentElement);
    var select = document.getElementById('sel-genre');
    if(select){
        var option = document.createElement('option');
        option.value = element.parentElement.dataset.id;
        option.text = element.parentElement.innerText;
        select.appendChild(option);
    }
}