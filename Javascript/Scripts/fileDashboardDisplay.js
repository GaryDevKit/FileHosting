function ShowFiles(){
    const xhttp = new XMLHttpRequest();

    xhttp.responseType = "text";
    // Define a callback function
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("images-content").innerHTML = this.response;
        }
    }

    // Send a request
    xhttp.open("POST", "PHP/Scripts/showFilesScript.php");
    xhttp.send();
}

function getElementData(el){
    el.closest(getElementsByClassName('image-tile'));  
    let fileName = el.getAttribute('data-media-name');
    RemoveFile(el, fileName); 
}

function RemoveFile(tile, fileName){
    const file = "Name="+fileName;
    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", "PHP/Scripts/fileRemoveScript.php", True);
    
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.responseType = "text";
    // Define a callback function
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.response);
            tile.parentNode.removeChild(tile);

        }
    }

    // Send a request
    xhttp.send(file);
}