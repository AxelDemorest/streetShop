var xhr = new XMLHttpRequest();

function disconnect() {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            document.location.reload();

        }
    };

    xhr.open("GET", '../php_ajax/disconnect.php', true);

    xhr.send();

}

function supp_product_panier(productName, productId, productsStock) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            document.location.reload();

        }
    };

    xhr.open("POST", '../php_ajax/supp_product_panier.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send("product=" + productName + "&productId=" + productId + "&productsStock=" + productsStock);

}

function supp_all_product_panier() {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            document.location.reload();

        }
    };

    xhr.open("GET", '../php_ajax/supp_all_product_panier.php', true);

    xhr.send();

}

function validation_panier() {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            let allPanierSelector = document.querySelectorAll(".all_panier")
            
            allPanierSelector.forEach(function(PanierDiv) {
                PanierDiv.style.display = "none";
              });
        
            document.getElementById("alert-ajax").style.display = "block";

            let buttonPanierAll = document.querySelectorAll(".button_group")

            buttonPanierAll.forEach(function(button) {
                button.style.display = "none";
              });
        }
    };

    xhr.open("GET", '../php_ajax/validation_panier.php', true);

    xhr.send();

}

function become_admin(userId) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            alert("Promotion effectuée !");

            document.location.reload();

        }
    };

    xhr.open("POST", '../php_ajax/become_admin.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send("userId=" + userId);

}

function supp_category(category_id) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            alert("Catégorie supprimée !");

            document.location.reload();

        }
    };

    xhr.open("POST", '../php_ajax/supp_category.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send("categoryId=" + category_id);

}

function supp_product(product_id) {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            alert("Produit supprimé !");

            document.location.reload();

        }
    };

    xhr.open("POST", '../php_ajax/supp_product.php', true);

    xhr.responseType = "text";

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send("productId=" + product_id);

}