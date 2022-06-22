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
                background: #e7e7e7;
                grid-area: logo;
                display: flex;
                border-right: 1px solid #c7c7c7;
            }

            #dashboard-header{
                background: #f5f5f5;
                grid-area: header;
                border-bottom: 1px solid #c7c7c7;
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
                background: #b1b1b1;
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
                max-width: 80%;
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

        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div id="dashboard-container">
            <div id="dashboard-logo">
                <img src="Media\Images\logo.png"/>
            </div>

            <div id="dashboard-header">
            </div>

            <div id="dashboard-navigation">
               <div id="dashboard-nav-upload">
                    <div id="add-media-button">Upload File <i class="fa-solid fa-file-arrow-up"></i></div>
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