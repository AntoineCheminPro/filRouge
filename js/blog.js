
// objet de base pour gérer les requêtes et les réponses
httpRequest = new XMLHttpRequest();

// code à exécuter
httpRequest.onreadystatechange = function() {
    // tout va bien, la réponse a été reçue
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            // la réponse est exploitable et valide
            // on affiche la réponse sur la page
            let blog = JSON.parse(httpRequest.responseText);
            let section = document.getElementById("blog");
            for (let property in blog){
                console.log(property);
                // create an article                    
                let article = document.createElement("article");
                article.classList.add("card");
                article.classList.add("col-5"); 
                article.classList.add("m-4");
                // create a header
                let header = document.createElement("header");
                header.classList.add("card-header");
                header.classList.add("bg-warning");
                header.classList.add("rounded-pill");
                console.log(blog[property]["titre"]);
                header.innerText = blog[property]["titre"];
                console.log(article);
                // put header in article
                article.appendChild(header);
                // create a div
                let div = document.createElement("div");
                div.classList.add("card-body");
                // create blockquote
                let blockquote = document.createElement("blockquote");
                blockquote.classList.add("blockquote");
                blockquote.classList.add("mb-0");
                // create p
                let p = document.createElement("p");
                // add "contenu" in p and then p in blockquote
                p.innerText = blog[property]["contenu"];
                blockquote.appendChild(p);
                // add blockquote to div
                div.appendChild(blockquote);
                // add div to article
                article.appendChild(div);
                section.appendChild(article);
            }
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
httpRequest.open('GET', 'https://oc-jswebsrv.herokuapp.com/api/articles', true);
httpRequest.send();

