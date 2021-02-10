var xhr = new XMLHttpRequest();

function add_panier(productName, productId) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            alert(`Ajouté au panier avec succès !`)

        }
    };

    xhr.open("POST", '../php_ajax/add_panier.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(`product=${productName}&productId=${productId}`);

}