<!DOCTYPE html>
<head>
    <title>
        DECRYPT
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center">Image Encryption & Decryption</h1>
<hr>
<br><br>
<h3 class="text-center">Decryption</h1>
<br><br>
<div class="col-md-9 col-md-offset-2">
<form name="passdata" action="." method="post">
<div class="row">
    <div class="col-sm-9 form-group">
        <label for="key">Secret Key:</label>
        <input type="text" class="form-control" id="uname" name="key" value="" maxlength="10" placeholder="Enter your secret key" required="">
    </div>
</div>
<div class="row">
    <div class="col-sm-9 form-group">
        <label for="file">Select File: </label>
        <input type="file" class="form-control" id="file" name="file" required="">
    </div>
</div>
<div class="row">
    <div class="col-sm-9 form-group">
        <button type="submit" name="decrypt" class="btn btn-lg btn-success btn-block">Decrypt</button>
    </div>
</div>
</form>

</div>
</body>
</html>