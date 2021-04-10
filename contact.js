var $ = function(id) {
    return document.getElementById(id);
};

var submitContact = function() {
    var email = $("email").value;
    var phone = parseInt($("phone").value);
    var valid = true;

    if (!email.includes("@" && ".") || email == "") {
        $("em1").firstChild.nodeValue = "Please enter a valid email address.";
        valid = false;
    }

    if (isNaN(phone) || !(phone.toString().length > 9)) {
        $("em2").firstChild.nodeValue = "Please enter a valid phone number.";
        valid = false;
    }

    if (valid) {
        window.location.href = "contact-success.html";
        $("em1").firstChild.nodeValue = "";
        $("em2").firstChild.nodeValue = "";
    }
};

var clearPage = function (){
    $("em1").firstChild.nodeValue = "*";
    $("em2").firstChild.nodeValue = "*";
};

window.onload = function() {
    $("submit").onclick = submitContact;
    $("clear").onclick = clearPage;
};
