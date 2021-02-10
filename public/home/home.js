var xhr = new XMLHttpRequest();

function add_panier(productName, productID) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            alert(`Commande effectuée avec succès !`)

        }
    };

    xhr.open("POST", 'add_panier.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send("product=" + productName);

}