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

function logIn() {
    $("#loginEnv").css("display", "grid");
    $("#loginEnv").hide();
    $("#loginEnv").fadeIn();

    $("#loginSubmit").click(completeLogin)
}

var elementClicked;

function logOut(){

    if(!elementClicked) {
        $("#loginEnv").fadeOut();
        setTimeout(function() {
            $("#loginEnv").css("display", "none");
        }, 1000); 
    }

    elementClicked = false;

}

function completeLogin() {
    let username = $("username");
    let password = $("password");

    console.log("username: " + username +"\npassowrd: " + password);
}

function loader() {

    $("#login").click(function(){
        elementClicked = true;
    });
    
    $("#loginIcon").click(logIn);
    $("#loginEnv").click(logOut);
}

window.onload = loader;