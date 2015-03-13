<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap.min.js"></script>

    <script src="/js/jquery-1.11.0.min.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
    <link rel="stylesheet" href="/css/dropzone.css" media="all">
    <script src="/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/presentacion_fotos.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/dropzone.js" type="text/javascript" charset="utf-8"></script>


    <style>

        .wrapper {

            width: 700px;
            margin: auto;
        }
    </style>
</head>
<body>


<div class="wrapper">
    <div id="dropzone">
        
        <form url="upload" class="dropzone" id ="my-dropzone">
          <!-- Single file upload 
          <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
          -->
          <!-- Multiple file upload-->
          <div class="fallback">
              <input name="file" type="file" multiple />
          </div>
        </form>
        
    </div>
</div>
<script language="javascript">


// myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.myDropzone = {
    init: function() {
      this.on("addedfile", function(file) {

        var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
        var _this = this;

        removeButton.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();

           var fileInfo = new Array();
           fileInfo['name']=file.name;

            $.ajax({
                type: "POST",
                url: "{{ url('/delete-image') }}",
                data: {file: file.name},
                beforeSend: function () {
                    // before send
                },
                success: function (response) {
               
                    if (response == 'success')
                       alert('deleted');
                },
                error: function () {
                    alert("error");
                }
            });


          _this.removeFile(file);

          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });


        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
    }
  };

</script>
</body>
</html>