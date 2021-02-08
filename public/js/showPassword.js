function Afficher() { 
var input = document.getElementById("show-password"); 
if (input.type === "password")
    { 
        input.type = "text"; 
    } 
else
    { 
        input.type = "password"; 
    } 
}