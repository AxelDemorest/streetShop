var xhr = new XMLHttpRequest();

function disconnect() {

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            document.location.reload();

        }
    };

    xhr.open("GET", '../home/disconnect.php', true);

    xhr.send();

}