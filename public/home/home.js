var xhr = new XMLHttpRequest();

function add_panier(productName, productId, productsStock) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            if (typeof (dataElements) != 'undefined') {
                let dataElements = JSON.parse(xhr.responseText);

            if (dataElements.error == "error_stock") {

                document.getElementById(`card-${productId}`).style.display = "none";

                document.getElementById(`card2-${productId}`).style.display = "none";

                document.getElementById(`text-stock-${productId}`).textContent = "Ce produit n'est plus en stock.";

                document.getElementById(`text-stock-${productId}`).style.textAlign = "center";

                document.getElementById(`text-stock-${productId}`).style.fontStyle = "italic";

                document.getElementById(`text-stock-${productId}`).style.marginBottom = 0;

                document.getElementById(`text-stock-${productId}`).style.marginTop = 2;

                document.getElementById(`text-stock2-${productId}`).textContent = "Ce produit n'est plus en stock.";

                document.getElementById(`text-stock2-${productId}`).style.textAlign = "center";

                document.getElementById(`text-stock2-${productId}`).style.fontStyle = "italic";

                document.getElementById(`text-stock2-${productId}`).style.marginBottom = 0;

                document.getElementById(`text-stock2-${productId}`).style.marginTop = 2;
            }
        }

            alert("Produit ajouté au panier !");

            document.location.reload();
        }
    };

    xhr.open("POST", '../php_ajax/add_panier.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(`product=${productName}&productId=${productId}&productsStock=${productsStock}`);

}