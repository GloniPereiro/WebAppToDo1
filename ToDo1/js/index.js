function refresh() {
    var today = new Date();
    var day = today.getDate();
    if (day < 10) day = "0" + day;
    var month = today.getMonth() + 1;
    var year = today.getFullYear();
    var hour = today.getHours();
    if (hour < 10) hour = "0" + hour;
    var minute = today.getMinutes();
    if (minute < 10) minute = "0" + minute;
    var second = today.getSeconds();
    if (second < 10) second = "0" + second;

    document.getElementById("watch").innerHTML = day + "/" + month + "/" + year + " | " + hour + ":" + minute + ":" + second;
    setTimeout("refresh()", 1000);
}
function onZaloguj() {
    window.open("login.php", "_self");
}
function onWyloguj() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "logout.php", true);
    xhttp.send();
    location.reload();
}
var buttons = document.getElementsByClassName("delete-button");
for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function () {
        var id = this.getAttribute("data-id");
        var xhr = new XMLHttpRequest();
        xhr.open("DELETE", "delete.php?id=" + id, true);
        xhr.send();
    });
}
function deleteRecord(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("DELETE", "delete.php?id=" + id, true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
        }
    };
}
function markAsDone(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("PUT", "update.php?id=" + id + "&status=done", true);
    xhr.send();
    var currentDiv = document.querySelector("[data-id='" + id + "']").parentElement;
    var doneContainer = document.getElementById("zrobione");
    doneContainer.appendChild(currentDiv);
    currentDiv.remove();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
        }
    };
}