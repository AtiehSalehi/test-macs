<!DOCTYPE html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript">  
    $(document).ready(function() {

    // The event listener for the file upload
    document.getElementById('txtFileUpload').addEventListener('change', upload, false);

    // Method that checks that the browser supports the HTML5 File API
    function browserSupportFileUpload() {
        var isCompatible = false;
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        isCompatible = true;
        }
        return isCompatible;
    }

    // Method that reads and processes the selected file
    function upload(evt) {
        if (!browserSupportFileUpload()) {
            alert('The File APIs are not fully supported in this browser!');
            } 
        else {
                var data = null;
                var file = evt.target.files[0];
                var reader = new FileReader();
                reader.readAsText(file);
                reader.onload = function(event) {
                    var csvData = event.target.result;
                    data = $.csv.toArrays(csvData);
                    if (data && data.length > 0) {
                    alert('Imported -' + data.length + '- rows successfully!');
                    } else {
                        alert('No data to import!');
                    }
                };
                reader.onerror = function() {
                    alert('Unable to read ' + file.fileName);
                };
            }
        }
    });
</script>
    </head>
    <body>
        <div style="margin:2%">
            <div class="row">
                <div class="col-md-4">
                    <div id="dvImportSegments" class="fileupload ">
                        <fieldset>
                            <legend>Datei</legend>
                                <input type="file" name="File Upload" id="txtFileUpload" accept=".csv" />
                                <hr />
                                <div>
                                    <select class="form-control" id="op1">
                                    <option selected="selected">Select</option>
                                    </select>
                                </div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-md-3">
                        <fieldset>
                            <legend>Diagram-Type</legend>
                                <div>
                                    <select class="form-control" id="op1">
                                    <option selected="selected">Select</option>
                                    </select>
                                </div>
                        </fieldset>
                </div>
                <div class="col-md-3">
                        <fieldset>
                            <legend>Corporate-Design</legend>
                                <div>
                                    <select class="form-control" id="op1">
                                    <option selected="selected">Select</option>
                                    </select>
                                </div>
                        </fieldset>
                </div>
                <div class="col-md-2">
                        <fieldset>
                            <legend>Generieren</legend>
                                <div>
                                    <button>Generieren</button>
                                </div>
                                <br />
                                <div>
                                    <button>Speichern</button>
                                </div>
                        </fieldset>
                </div>
            </div>
            <hr />
            <div>
                <p>chart</p>
            </div>
        </div>
    </body>
</html>