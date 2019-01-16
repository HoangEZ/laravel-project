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