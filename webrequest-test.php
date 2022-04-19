<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/javanile/webrequest-ui@main/dist/css/webrequest-ui.css" />
</head>
<body>
    <form webrequest="output" x-data="{ action: '<?=input('url')?>' }" x-bind:action="action">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid px-0">
                <a href="javascript:;" class="navbar-brand font-weight-bold">
                    <img src="https://cdn.jsdelivr.net/gh/javanile/webrequest-ui@main/dist/images/logo.png" width="27" height="27" alt="webrequest.ml">
                    webrequest<small class="text-white-70">.cc</small>
                </a>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <div class="d-flex w-100">
                        <input class="form-control font-weight-bold me-sm-2 border-0" type="text" placeholder="Webrequest URL to test..." x-model="action">
                        <button class="btn btn-secondary font-weight-bold my-2 my-sm-0 border-0" type="submit">
                            TEST!
                        </button>
                        <button class="ml-2" type="button"  onclick="document.getElementById('file-input').click();">
                            <i class="fa fa-folder-open"></i>Open
                        </button>
                        <button class="ml-2" type="button" id="runna">
                            <i class="fa fa-folder-open"></i>Runna
                        </button>
                        <input type="file" id="file-input" class="d-none"/>
                        <script>
                            function readSingleFile() {
                                const fi = document.getElementById('file-input')
                                var file = fi.files[0];
                                if (!file) {
                                    return;
                                }
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var contents = e.target.result;
                                    displayContents(contents);
                                };
                                reader.readAsText(file);
                            }
                            function displayContents(contents) {
                                var element = document.getElementById('output');
                                element.textContent = contents;
                            }
                            document.getElementById('runna')
                                .addEventListener('click', readSingleFile, false);
                        </script>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-light">
            <div class="row py-2">
                <div class="col-3">
                    <div class="row position-relative" x-data="{ value1: 'value1' }">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control font-weight-bold" placeholder="value1 name" x-model="value1">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" x-bind:placeholder="value1" x-bind:name="value1">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative" x-data="{ value2: 'value2' }">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control font-weight-bold" placeholder="value2 name" x-model="value2">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" x-bind:placeholder="value2" x-bind:name="value2">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative" x-data="{ value3: 'value3' }">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control font-weight-bold" placeholder="value3 name" x-model="value3">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" x-bind:placeholder="value3" x-bind:name="value3">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative" x-data="{ value4: 'value4' }">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control font-weight-bold" placeholder="value4 name" x-model="value4">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" x-bind:placeholder="value4" x-bind:name="value4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-2" style="display: none">
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value5" value="value5">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value5" value="">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value6" value="value6">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value6" value="">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value7" value="value7">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value7" value="">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value8" value="value8">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value8" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="output" class="dashed-box d-flex flex-grow-1 flex-column"></div>
    <script src="https://cdn.jsdelivr.net/gh/javanile/webrequest-ui@main/dist/js/webrequest-ui.js"></script>
</body>
</html>
