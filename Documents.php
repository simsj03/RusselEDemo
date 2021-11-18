<?php  
	include_once 'assets/php/header.php';
    //include 'doc_file_uploadLogic.php';
?>
<body>
<style>
    .file-upload{
        display: inline-flex;
        align-items:center;
        font-size:40px;

    }
    .file-upload__input{
        display:none;
    }
    .file-upload__button{
        -webkit-appearance: none;
        background: red;
        border:2px solid black;
        border-radius: 4px;
        outline: none;
        padding: 10cm, 10cm;
        color:white;
        margin-right:50px;
        font-size:1em;
        cursor: pointer;
    }
        .file-upload_button:active{
            background: maroon;

        }
        .file-upload__label{
            max-width: 250px;
            font-size:0.95em;
            text-overflow:ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
</style>

<h1>Upload Class Documents Below</h1>


<form action="index.php" method="post" enctype="multipart/form-data">

          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
          

        <!-- <lable for='file'>Choose File:</lable>

        <div class="formgroup container-fluid">
            <input type="file" name="myfile" />   -->
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> 64 MB's worth in bytes -->
        <!-- </div> -->
        <!-- <div class="formgroup container-fluid">
            <label for="submit">Submit To Database</label><br />
            <input type="submit" name="submit"/>
        </div> -->

        <!-- <input type='file' name='file1'/>
        <input type='submit' value="Upload"/> -->
</form>

<script></script>
</body>

<html>
  <head>
    <title>Title of the document</title>
    <style>
      .button {
        background-color: red;
        border: none;
        color: white;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        margin: 4px 2px;
        cursor: pointer;
        position: fixed;
    bottom: 10px;
    left: 50%;
    margin-left: -104.5px; 
      }
    </style>
  </head>
  <body>
    <a href="https://docs.google.com/document/d/1aaWDsmpl2Oi2U7GuGyhtiQ7WQYhG0hloqyk8lmdEEfs/edit?usp=sharing" class="button">Need Help?</a>
  </body>
</html>