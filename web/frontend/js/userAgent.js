function htmlentities(s){
    return $("<div/>").text(s).html();
}

function html_entity_decode(s){
    return $("<div/>").html(s).text();
}

function checkUserAgent(){
    var backendUA = $('.userAgent')[0].innerHTML,
        jsUA = navigator.userAgent;

    if(html_entity_decode(backendUA) != jsUA){
        $('#jsUA').val(htmlentities(navigator.userAgent));
        $('.jsUABox').removeClass('hidden');        
    }
}
