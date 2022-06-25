function SaveData() {
    localStorage.setItem("save", document.getElementById("content").innerHTML);
}

function LoadData() {
    if("save" in localStorage) {
        document.getElementById("savedContent").innerHTML = decodeURI(localStorage.getItem("save"));
        localStorage.setItem("save", document.getElementById("content").innerHTML);
    }
}