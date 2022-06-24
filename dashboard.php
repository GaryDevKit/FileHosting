<?php
    include_once 'PHP/Classes/SessionsClass.php';
    $sessionsStart = new sessionClass();
    $sessionsStart -> startSession();

    if(!isset($_SESSION['UserAccount'])){
        header ("Location: index.php");
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="">
        <script src="Javascript\Scripts\imageUploadFileNames.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap');
            html, body{
                padding: 0;
                margin: 0;
                font-family: 'Source Sans Pro', sans-serif;
            }

            #dashboard-container{
                display: grid;
                min-height: 100vh;
                grid-template-columns: 200px 1fr 1fr 1fr;
                grid-template-rows: 100px 1fr;
                grid-template-areas: 
                    "logo header header header"
                    "nav content content content"
            }

            #dashboard-logo{
                background: #f5f5f5;
                grid-area: logo;
                display: flex;
                border-bottom: 1px solid #c7c7c7;
            }

            #dashboard-header{
                background: #f5f5f5;
                grid-area: header;
                border-bottom: 1px solid #c7c7c7;
                display: grid;
                grid-template-columns: 1fr min-content;
                box-sizing: border-box;
                padding: 0px 20px;
            }

            #dashboard-header-right{
                display: grid;
                grid-template-columns:min-content max-content;
                grid-template-rows: 100px;
                column-gap: 10px;
            }

            #db-hdr-right-right{
                display: flex;
                align-items: center;
            }

            #db-hdr-right-left{
                display: flex;
                justify-content: center;
                flex-flow: column;
            }

            #db-hdr-right-left h3, #db-hdr-right-left p{
                margin: 0;
            }

            #db-hdr-right-left p a:nth-of-type(1){
                margin-right: 20px;
            }

            #db-hdr-right-right img{
                height: 70%;
            }

            #dashboard-navigation{
                background: #e7e7e7;
                grid-area: nav;
                border-right: 1px solid #c7c7c7;
                display: grid;
                grid-template-rows: min-content 1fr;
            }

            #dashboard-logo img{
                max-width: 90%;
                display: block;
                flex: 1 1 0;
                align-self: center;
            }

            #dashboard-navigation ul{
                list-style: none;
                margin: 0;
                padding: 0;
                margin: 0 auto;
                display: flex;
                flex-flow: column;
                height: 100%;
            }

            #dashboard-navigation ul li{
                display: block;
                padding: 20px;
                margin: 0 auto;
                color: #646464;
                text-transform: capitalize;
                letter-spacing: 0.5px;
                cursor: pointer;
                width: 100%;
                box-sizing: border-box;
            }

            #dashboard-navigation ul li:last-child{
                align-self: flex-end;
                font-weight: 700;
                margin-top: auto;
            }

            #dashboard-navigation ul li:hover{
                background: #878787;
                color: #ffffff;
            }

            #dashboard-navigation ul li i{
                margin-right: 10px;
            }

            #add-media-button{
                padding: 10px;
                background: #2776d7;
                margin: 20px auto;
                text-align: center;
                border-radius: 5px;
                color: white;
                text-transform: capitalize;
                letter-spacing: 0.5px;
                width: 80%;
                box-sizing: border-box;
                cursor: pointer;
            }

            #add-media-button i{
                margin-left: 10px;
            }

            #add-media-button:hover{
                background: #1b62b9;
            }

            #dashboard-content{
                background: white;
                grid-area: content;
            }

            #trans-overlay{
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, .4);
                z-index: 900;
                display: none;
            }

            #file-upload-area{
                position: fixed;
                min-height: 30%;
                min-width: 25%;
                max-height: 60%;
                max-width: 55%;
                padding: 20px;
                box-sizing: border-box;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #fbfbfb;
                box-shadow: 0 0 19px -5px rgba(0, 0, 0, 0.35);
                border-radius: 5px;
                z-index: 901;
                display: none;
            }

            #file-upload-area h2{
                border-top: 1px solid #d5d5d5;
                border-bottom: 1px solid #d5d5d5;
                margin: 0;
                padding: 10px 0px;
                font-weight: 400;
            } 
            
            #file-upload-area form label{
                display: block;
                width: 80%;
                margin: 20px auto 0 auto;
                background: #e3e3e3;
                border-radius: 5px;
                text-align: center;
            }

            #file-upload-area form button{
                border: 0;
                display: block;

                background-color: #2776d7;
                padding: 20px;
                border-radius: 5px;
                width: 80%;
                margin: 0 auto;

                color: white;
                text-transform: capitalize;
                letter-spacing: 0.5px;
                box-sizing: border-box;
                cursor: pointer;
            }

            #file-upload-area form label i{
                font-size: 90px;
                margin-top: 20px;
                color: #2776d7;
            }

            #file-upload-area form label p{
                margin-top: 60px;
                padding-bottom: 20px;
            }

        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="file-upload-area">
            <h2>New File Import</h2>
            <form action="PHP/Scripts/fileUploadScript.php" method="post" enctype="multipart/form-data">
                <input draggable="true" onchange="returnFileNames()" type="file" name="filesToUpload[]" id="rlMediaUploadBttn" multiple hidden>
                <label for="rlMediaUploadBttn">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p>Drag or click to add files for uploading...</p>              
                </label>
                <div id="fileNameList"></div>
                <button id="fileUploadButton" type="submit">Upload Files</button>
            </form>
        </div>

        <div onclick="resetInputValue()" id="trans-overlay">

        </div>
        
        <div id="dashboard-container">
            <div id="dashboard-logo">
                <img src="Media\Images\logo.png"/>
            </div>

            <div id="dashboard-header">
                <div id="dashboard-header-left">

                </div>
                <div id="dashboard-header-right">
                    <div id="db-hdr-right-right">
                        <img src="https://th.bing.com/th/id/R.6ab0eefff471492cabad5f79cbbca612?rik=qRTcr2fnEwXepQ&pid=ImgRaw&r=0"/>
                    </div>
                    <div id="db-hdr-right-left">
                        <h3><?php echo $_SESSION['UserAccount']['FirstName']. " ". $_SESSION['UserAccount']['Surname'];?></h3>
                        <p><a>Settings</a><a href="PHP/Scripts/userAccountLogout.php">Sign Out</a></p>
                    </div>
                </div>
            </div>

            <div id="dashboard-navigation">
               <div id="dashboard-nav-upload">
                    <div onclick="showUploadArea()" id="add-media-button">Upload File <i class="fa-solid fa-file-arrow-up"></i></div>
                </div>
                <div id="dashboard-nav-menu">
                    <ul>
                        <li><a><i class="fa-solid fa-image"></i> Pictures</a></li>
                        <li><a><i class="fa-solid fa-film"></i> Videos</a></li>
                        <li><a><i class="fa-solid fa-file-word"></i> Documents</a></li>
                        <li><a><i class="fa-solid fa-file-zipper"></i> Compressed Files</a></li>
                        <li><a><i class="fa-solid fa-gear"></i> Settings</a></li>
                    </ul>
                </div>
            </div>

            <div id="dashboard-content">

            </div>

        </div>

    </body>
</html>