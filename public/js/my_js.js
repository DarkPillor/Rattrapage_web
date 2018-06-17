// Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" ) {
alert("Tu devais pas commenter ? ^^ !");
} else {
document.getElementById('form').submit();
alert("Yoplaboum envoyé");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
