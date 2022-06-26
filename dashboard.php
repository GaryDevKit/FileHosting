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
        <link rel="stylesheet" href="CSS\dashboard-styles.css">
        <script src="Javascript\Scripts\imageUploadFileNames.js"></script>
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
                <button id="fileUploadButton" type="submit">Please select a file</button>
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
                    <form action="">
                        <input type="text" placeholder="Search for a file..."></input>
                    </form>
                </div>
                <div id="dashboard-header-right">
                    <div id="db-hdr-right-right">
                        <img src="https://th.bing.com/th/id/R.6ab0eefff471492cabad5f79cbbca612?rik=qRTcr2fnEwXepQ&pid=ImgRaw&r=0"/>
                    </div>
                    <div id="db-hdr-right-left">
                        <h3><?php echo $_SESSION['UserAccount']['FirstName']. " ". $_SESSION['UserAccount']['Surname'];?></h3>
                        <p><a class="db-button">Settings</a><a class="db-button" href="PHP/Scripts/userAccountLogout.php">Sign Out</a></p>
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