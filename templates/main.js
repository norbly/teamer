// AJAX 
function ajax_request(url, callback_function, args) {
    var xhttp = new XMLHttpRequest;
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            callback_function(this, args);
        }
    }
    xhttp.open("GET", url);
    xhttp.send();
}

var array_selected_label = []; 

// functions to call ajax
function requestLabelSuggestions(args) {
        
    var exclude = JSON.stringify(array_selected_label);
    ajax_request('./ajax.php?action=get_label&lang=' + args.lang + '&q=' + args.input_elem.value + '&exclude=' + exclude,displayLabel, args); 
}
 
// everything about label
function displayLabel(xhttp, args) {
    var div_suggestions_label = args.div_suggestions;
    var temp_div = document.createElement("div");
    var suggestions = JSON.parse(xhttp.responseText);
    var entry;
    
    if (suggestions.error != null) {
        entry = document.createElement("div");
        entry.innerHTML = suggestions.error;
        temp_div.appendChild(entry);
    } else {
        suggestions.forEach(element => {
            var translation = element['translation'];
            entry = document.createElement("div");
            entry.innerHTML = translation;
            entry.addEventListener("click", function() {                   
                selectLabel(translation, element['label_id'], args);
                clearSuggestions(args);
            })
            temp_div.appendChild(entry);
        });
    }
    div_suggestions_label.replaceChild(temp_div, div_suggestions_label.firstChild);
}

function selectLabel(translation, label_id, args) {
    array_selected_label.push(label_id);
    var div_selected = args.div_selected;
    var template = document.getElementById("template_label");
    var clon = template.content.cloneNode(true);

    
    clon.querySelectorAll("span")[0].innerHTML = translation;
    clon.querySelectorAll("span")[1].addEventListener("click", function() {
        removeSelectedLabel(this,label_id, args);
    });
    clon.querySelectorAll("input")[0].value = 3;
    div_selected.appendChild(clon);
}

function removeSelectedLabel(node,label_id, args) {
    node.parentNode.parentNode.removeChild(node.parentNode);
    var index = array_selected_label.indexOf(label_id);
    array_selected_label.splice(index,1);
    requestLabelSuggestions(args);
}

function clearSuggestions(args) {
    args.div_suggestions.replaceChild(document.createElement("div"), args.div_suggestions.firstChild);
    args.input_elem.value = "";
}
 
//general functions
function getQueryParams(qs) {
    qs = qs.split('+').join(' ');

    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }

    return params;
}

//
function displayEventBox(xhttp, args) {
    var events = JSON.parse(xhttp.responseText);
    var target_div = args.target_div;
    var template = document.getElementById("template_box_event");
    events.forEach(element => {
        var clon = template.content.cloneNode(true);
        clon.querySelectorAll("a")[0].href = "index.php?action=event&id="+element.event_id;
        clon.querySelectorAll("h3")[0].innerHTML = element.event_title;
        clon.getElementById('start_date').innerHTML = element.start_date;
        target_div.appendChild(clon);
    });  
}