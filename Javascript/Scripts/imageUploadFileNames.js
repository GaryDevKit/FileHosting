/* 
==============================
==============================

BEGINNING OF THE FUNCTION TO 
RETURN NAMES OF FILES SELECTED

==============================
==============================
*/


function returnFileNames(){
    const list = document.getElementById('rlMediaUploadBttn');
    
    const listFile = list.files;

    let text="";

    let i;

    if(listFile.length == 0){
        document.getElementById('fileUploadButton').innerHTML= "Please select a file";
        document.getElementById('fileNameList').innerHTML= "";
    } else{
        if(listFile.length > 5){
            document.getElementById('fileNameList').innerHTML= "<span>Too Many Files Buddy</span><br><br>";
        } else{
            for (i = 0; i < listFile.length; i++ ) {
                text += "<span>" + listFile.item(i).name + "</span><br><br>";
                let numFiles = i+1;
                document.getElementById('fileNameList').innerHTML= text;
                document.getElementById('fileUploadButton').innerHTML= "Upload " + numFiles + " Files";
            } 
        }
    }
}

function resetInputValue(){
    document.getElementById("rlMediaUploadBttn").value= "";
    document.getElementById('fileUploadButton').innerHTML= "Please select a file";
    document.getElementById('fileNameList').innerHTML= "";
    document.getElementById('file-upload-area').style.display="none";
    document.getElementById('trans-overlay').style.display="none";
}

function showUploadArea(){
    document.getElementById('file-upload-area').style.display="block";
    document.getElementById('trans-overlay').style.display="block"; 
}


