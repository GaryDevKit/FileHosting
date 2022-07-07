export class FileShow {
    constructor(){
    }

    showFileTypes(fileType) {

        let typeFile = "";
        let limit = 9999;

        if(fileType == null){
            typeFile = {image:"images-content", video:"videos-content", document:"documents-content"};    
            limit = 20;    
        
        } else if(fileType == "image" || fileType == "video" || fileType == "document"){
            typeFile = {[fileType]:"singleSection"};  
            document.getElementById('dashboard-content-section').innerHTML = "";
            const divEl = document.createElement('div');
            divEl.setAttribute("id","singleSection");
            divEl.setAttribute("class","grid-area");
            document.getElementById('dashboard-content-section').appendChild(divEl);
        }

        for (let x in typeFile){

            let type = "Type=" + x + "&Limit=" + limit;
            let dashSection = typeFile[x];
        
            const xhttp = new XMLHttpRequest();
    
            xhttp.open("POST", "PHP/Scripts/showFilesScript.php", true);
    
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
            xhttp.responseType = "json";
            // Define a callback function
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let Section = this.response;
                    
                    if(fileType != null){
                        let indSection = document.getElementById('dashboard-content-section');
                        let overviewSection = document.getElementById('dashboard-content-overview');

                        indSection.classList.remove('dashboard-section-hidden');
                        overviewSection.classList.add('dashboard-section-hidden');

                        document.getElementById('singleSection').innerHTML = Section.Content;

                    } else{
                        let indSection = document.getElementById('dashboard-content-section');
                        let overviewSection = document.getElementById('dashboard-content-overview');
                            
                        overviewSection.classList.remove('dashboard-section-hidden');                        
                        indSection.classList.add('dashboard-section-hidden');

                        document.getElementById(dashSection).innerHTML = Section.Content;
                    }
                }
            }
    
            // Send a request
            xhttp.send(type);
        }
    }
}