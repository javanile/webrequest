<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://unpkg.com/webrequest-ui@0.1.6/dist/css/webrequest-ui.css" />
</head>
<body>
    <form webrequest="output" x-data="{ action: '' }" x-bind:action="action">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid px-0">
                <a href="javascript:;" class="navbar-brand font-weight-bold">
                    <img src="https://unpkg.com/webrequest-ui@0.1.6/dist/images/logo.png" width="27" height="27" alt="webrequest.ml">
                    webrequest<small class="text-white-70">.cc</small>
                </a>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="text" placeholder="Webrequest URL to test..." x-model="action">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">TEST!</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-light">
            <div class="row py-2">
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value1" value="value1">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value1" value="">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value2" value="value2">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value2" value="">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value3" value="value3">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value3" value="">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row position-relative">
                        <div class="background-text">
                            =
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value4" value="value4">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="value4" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-2">
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
    <div id="output" class="h-100 bg-dark"></div>
    <script charset="utf-8" src="https://unpkg.com/webrequest-ui@0.1.6/dist/js/webrequest-ui.js"></script>
</body>
</html>
