// Permet d'afficher le mot de passe ou non lors de l'inscription au site
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