/*
=====================================================================================================
WHEN IMPORTING FROM A CLASS/FUNCTION/VARIABLE FROM ANOTHER FILE, WIL WILL NEED TO BOTH DELCARE
THE FUNCTION AND THEN CALL THE FUNCTION.

MODULES USE MODULE SCOPE, CALLING A FUNCTION FROM MAIN HTML USING onload FROM A MODULE SCRIPT WILL
RESULT IN AN UNDEFINED ERROR.

TO RESOLE THIS, ASSIGN THE FUCTION TO THE WINDOW OBJECT -> window.[function name] = fucnction.
=====================================================================================================
*/

import {FileShow} from "/FileHosting/Javascript/Classes/FileShowClass.js";

window.ShowFiles = function ShowFiles(indFileType = null){
    const filesShow = new FileShow();
    filesShow.showFileTypes(indFileType);
}

window.getElementData = function getElementData(el){
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

/*
=====================================================================================================
BELOW FUCNCTIONS HAVE BEEN COMMENTED OUT.
REASON:: CREATED A CLASS (Javascript/Classes/FileShowClass.js), WHICH USES / MAKES USE OF AN OBJECT. 
         LOOPINIG THROUGH THE OBJECT PROVIDES THE SAME FUNCTIONALITY, AS THIS LONGER METHOD BELOW.
=====================================================================================================

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
}*/