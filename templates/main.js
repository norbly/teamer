// AJAX 
function ajax_request(url, callback_function) {
    var xhttp = new XMLHttpRequest;
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            callback_function(this);
        }
    }
    xhttp.open("GET", url);
    xhttp.send();
}



