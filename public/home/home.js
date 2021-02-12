var xhr = new XMLHttpRequest();

function add_panier(productName, productId, productsStock) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            let dataElements = JSON.parse(xhr.responseText);

            if(dataElements.error === "error_stock") {

                document.getElementById(`card-${productId}`).classList.addClass('disabled');
            }

            alert("Produit ajouté au panier !");

            document.getElementById(`stock-card-${productId}`).textContent = `${productsStock - 1} en stock`;
        }
    };

    xhr.open("POST", '../php_ajax/add_panier.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(`product=${productName}&productId=${productId}&productsStock=${productsStock}`);

}