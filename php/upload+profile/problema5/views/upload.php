<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"

</head>
<body class="d-flex align-items-center">

<form class=" col-4 offset-4 mt-4" action="../upload_post.php" method="post" enctype="multipart/form-data">

    <div class="input-group mb-3 form-group">
        <div class="input-group-prepend">
            <input type="submit" value="Upload" class="input-group-text" name="submit">
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input form-control-file" id="image" name="image" required>
            <label class="custom-file-label" for="file">Choose file</label>
        </div>
    </div>


</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<script>
    $('#image').change(function () {
        $(this).next('.custom-file-label').html($(this).val())
    })
</script>
</body>

</html>

