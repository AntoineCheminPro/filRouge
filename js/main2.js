  function off() {
    document.getElementById("overlay").style.display = "none";
    console.log("tuned OFF");

}

// Étape 1 — Lancement d’une requête HTTP

httpRequest = new XMLHttpRequest();

httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            // la réponse est exploitable et valide
            // on affiche la réponse sur la page
            // put the function
            document.getElementById("textualWarning").innerHTML = this.responseText;
        } 
        else {
            // il y a eu un problème avec la requête,
            // par exemple la réponse peut être un code 404 (Non trouvée) 
            // ou 500 (Erreur interne au serveur)
            console.log("une erreur est survenue");
        }
    } 
    else {
        // pas encore prête
        console.log("en attente de réponse");
    }
};
// ouverture et envoi de la requête
httpRequest.open('GET', 'warning.txt', true);
httpRequest.send();

