export class FileShow {
    constructor(){
    }

    showFileTypes() {

        const typeFile = {image:"images-content", video:"videos-content", document:"documents-content"};

        for (let x in typeFile){

            let type = "Type=" + x;
            let dashSection = typeFile[x];
        
            const xhttp = new XMLHttpRequest();
    
            xhttp.open("POST", "PHP/Scripts/showFilesScript.php");
    
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
            xhttp.responseType = "text";
            // Define a callback function
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(dashSection).innerHTML = this.response;
                }
            }
    
            // Send a request
            xhttp.send(type);
        }
    }
}