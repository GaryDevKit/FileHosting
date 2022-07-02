function ShowFiles(){
    showImageFiles();
    showVideoFiles();
    showDocFiles();
}

function showImageFiles(type){

    type = "Type=image";

    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", "PHP/Scripts/showFilesScript.php");

    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.responseType = "text";
    // Define a callback function
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("images-content").innerHTML = this.response;
        }
    }

    // Send a request
    xhttp.send(type);
}

function showVideoFiles(type){
    
    type = "Type=video";

    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", "PHP/Scripts/showFilesScript.php");

    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.responseType = "text";
    // Define a callback function
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("videos-content").innerHTML = this.response;
        }
    }

    // Send a request
    xhttp.send(type);
}

function showDocFiles(type){
    
    type = "Type=document";

    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", "PHP/Scripts/showFilesScript.php");

    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.responseType = "text";
    // Define a callback function
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("documents-content").innerHTML = this.response;
        }
    }

    // Send a request
    xhttp.send(type);
}

function getElementData(el){
    const name =  el.getAttribute('data-media-name');
    const tile = el.closest('.media-tile');
    RemoveFile(tile, name);
}

function RemoveFile(tile, name){
    const file = "Name=" + name;
    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", "PHP/Scripts/fileRemoveScript.php");
    
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.responseType = "text";

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.response);
            tile.parentNode.removeChild(tile);

        }
    }

    xhttp.send(file);
}