function setCookie (name, value) {
    document.cookie = name + "=" + value + ";";
}

function getCookie (name) {
    var searchName = name + "=";	
                                
    var decodedCookie = decodeURIComponent (document.cookie);
    var carray = decodedCookie.split(';');		
                        
    var i, oneCookie;

        //document.write("array length: " + carray.length + "<br>");
    for (i = 0; i < carray.length; i++) {
            oneCookie = carray[i];			
    while (oneCookie.charAt(0) == ' ') {
        oneCookie = oneCookie.substring(1);
    }
    if (oneCookie.indexOf(searchName) == 0) {
        return oneCookie.substring (searchName.length, oneCookie.length);
    }
    }
    return ""; 
}

function delCookie (name) {
    document.cookie = name;
}

function loader() {

    $('svg').remove();
    var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    $("#loginIcon").append( svg );
    $('svg').attr({height:50, width: 50});

    var circle1 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
    var circle2 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
    var path = document.createElementNS("http://www.w3.org/2000/svg", "path");

    $('svg').append(circle1);
    $('svg').append(circle2);
    $('svg').append(path);

    var color = getCookie("color");

    $(circle1).attr({cx:25, cy:25, r:20, stroke:"white", strokeWidth:1, fill:color});
    $(circle2).attr({cx:25, cy:20, r:7.5, stroke:"white", strokeWidth:1, fill:"lightgray"});
    $(path).attr({d:"M 16 42.5 q 9 -22.5 18 0", stroke:"white", strokeWidth:1, fill:"lightgray"});

    $("#iconText").text("logout   " + getCookie("username"));
}

window.onload = loader;