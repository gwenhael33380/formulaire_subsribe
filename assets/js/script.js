const app = document.querySelector(".app");
let path = 'http://cerveza-api/rest/medias/';
function generateBeer() {
    var html_to_insert="";
    fetch("http://cerveza-api/rest/Beer")
        .then((res) => res.json())
        .then((response) => { for(item of response) {
            html_to_insert += "<p>";
            html_to_insert += item._name;
            html_to_insert += '<img src="';
            html_to_insert += path;
            html_to_insert += item._photo;
            html_to_insert += '">'
            html_to_insert += "</p>";
        }
        app.innerHTML = html_to_insert;
        })
        .catch(error => alert("Erreur : " + error));

}
generateBeer()

//   .then(commits => alert(commits[0]._name))