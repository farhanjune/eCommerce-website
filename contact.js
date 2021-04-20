var $ = function(id) {
    return document.getElementById(id);
};

var submitContact = function() {
    var name = $("name").value;
    var email = $("email").value;
    var phone = parseInt($("phone").value);
    var comment = $("comment").value;
    var valid = true;

    if (!(name.toString().length > 0)) {
        $("em1").firstChild.nodeValue = "Please enter a name.";
        valid = false;
    }

    if (!email.includes("@" && ".") || !(email.toString().length > 0)) {
        $("em2").firstChild.nodeValue = "Please enter a valid email address.";
        valid = false;
    }

    if (isNaN(phone) || !(phone.toString().length > 9)) {
        $("em3").firstChild.nodeValue = "Please enter a valid phone number.";
        valid = false;
    }

    if (!(comment.toString().length > 0)) {
        $("em4").firstChild.nodeValue = "Please enter a comment.";
        valid = false;
    }

    if (valid) {
        window.location.href = "validate-contact.php";
        $("em1").firstChild.nodeValue = "";
        $("em2").firstChild.nodeValue = "";
        $("em3").firstChild.nodeValue = "";
        $("em4").firstChild.nodeValue = "";
        return true;
    }
    else {
        return false;
    }
};

var clearPage = function (){
    $("em1").firstChild.nodeValue = "*";
    $("em2").firstChild.nodeValue = "*";
    $("em3").firstChild.nodeValue = "*";
    $("em4").firstChild.nodeValue = "*";
};

window.onload = function() {
    $("submit").onclick = submitContact;
    $("clear").onclick = clearPage;
};
