<?php

#var_dump($_SERVER);
$uri = $_SERVER['REQUEST_URI'];
$file = tempnam(sys_get_temp_dir(), 'FOO.php');
$vendor = 'javanile';
$package = 'webrequest';
$platform = 'github';
$repository = 'javanile/webrequest';
$sources = [
    'github' => '',
];

$url = 'https://raw.githubusercontent.com/javanile/webrequest/main/tests/fixtures/script.php';
if (in_array($uri, ['/'])) {

} else {

}



$script = file_get_contents($url);
file_put_contents($file, $script);

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return require_once $file;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>webrequest.cc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/regular.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/brands.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/styles/solarized-light.min.css">
    <link rel="shortcut icon" href="/favicon.ico">
    <style>
        .navbar-shadow {
            box-shadow: 0 1px 2px 0 #333, 0 2px 6px 2px #CCC;
        }
        .card-shadow {
            box-shadow: 0 0px 2px 0 #333;
        }
        .card-header, .card-footer {
            background-color: #FFEDDF !important;
        }
        .navbar-dark .navbar-nav .nav-link, .text-white-70 {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        .background-text {
            text-align: center;
            margin: 0;
            padding: 0;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 0;
            color: #888;
            line-height: 36px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="navbar navbar-expand-lg navbar-dark navbar-shadow bg-primary mb-3 navbar-shadow">
    <div class="container">
        <a href="../" class="navbar-brand font-weight-bold">
            <img src="/logo.png" width="27" height="27" alt="webrequest.ml"> webrequest<small class="text-white-70">.cc</small>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  pb-0 mr-0" id="navbarResponsive">
        <span class="navbar-text font-italic text-white-70 pb-1 mr-auto">
           Webhooks Adapter suitable for 99% of No-code scenarios
        </span>
            <ul class="navbar-nav pb-0 d-flex">
                <li class="nav-item pb-0">
                    <a class="nav-link  pb-1" href="https://github.com/javanile/awesome-webrequest" target="_blank">...find out more on GitHub</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 class="mb-3"><i class="fab fa-<?=$platform?>"></i> <?=$vendor?> / <?=$package?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 pr-0">
                <div class="bs-component">
                    <div class="card border-primary card-shadow mb-3">
                        <div class="card-header"><i class="far fa-file-code"></i> Header</div>
                        <pre class="mb-0"><code id="script" lass="php"><?=htmlentities($script, ENT_COMPAT)?></code></pre>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bs-component">
                    <div class="card card-shadow mb-3">
                        <div class="card-header">Insights</div>
                        <div class="card-body">
                            <h4 class="card-title">Primary card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card card-shadow mb-3">
                        <div class="card-header">Try it out</div>
                        <div class="card-body">
                            <p class="card-text">This action will make a web request, then it will show you the result.</p>
                            <form>
                                <div class="form-group">
                                    <label for="webrequest-arguments">Arguments</label>
                                    <div class="form-group row position-relative">
                                        <div class="background-text">
                                            =
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="value1" value="value1">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="value1" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row position-relative">
                                        <div class="background-text">
                                            =
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="value2" value="value2">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="value2" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row position-relative">
                                    <div class="background-text">
                                        =
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="value3" value="value3">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="value3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="webrequest-body">Body</label>
                                    <textarea class="form-control" id="webrequest-body" rows="3"></textarea>
                                </div>
                                <div id="webrequest-result-panel" class="form-group" style="display: none">
                                    <label for="webrequest-result">Result</label>
                                    <textarea class="form-control" id="webrequest-result" rows="3" readonly></textarea>
                                </div>
                                <button id="webrequest-submit" type="button" class="btn btn-primary w-100">
                                    <span id="webrequest-submit-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none"></span>
                                    <span id="webrequest-submit-label">Submit</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card card-shadow mb-3">
                        <div class="card-header">Other & Popular</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="http://webrequest.cc/php-nocode/games" target="_blank">php-nocode/ifttt</a></li>
                            <li class="list-group-item"><a href="http://webrequest.cc/php-nocode/games" target="_blank">php-nocode/games</a></li>
                            <li class="list-group-item"><a href="http://webrequest.cc/php-nocode/games" target="_blank">php-nocode/tools</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="row">
            <div class="col-lg-12">
                <p>Made by <a href="https://www.linkedin.com/in/yafb/" target="_blank">Francesco Bianco</a>.</p>
                <p>Code released under the <a href="https://github.com/javanile/webrequest/blob/main/LICENSE" target="_blank">MIT License</a>. Hosted by <a href="https://heroku.com/" target="_blank">Heroku</a>.</p>
                <p>Based on <a href="https://bootswatch.com/" rel="nofollow" target="_blank">Bootswatch</a> &amp; <a href="https://getbootstrap.com/" rel="nofollow" target="_blank">Bootstrap</a>. Icons from <a href="https://fontawesome.com/" rel="nofollow" target="_blank">Font Awesome</a>. Web fonts from <a href="https://fonts.google.com/" rel="nofollow" target="_blank">Google</a>.</p>
            </div>
        </div>
    </footer>
</div>

<a href="https://github.com/you" target="_blank"><img loading="lazy" width="149" height="149" src="https://github.blog/wp-content/uploads/2008/12/forkme_right_green_007200.png?resize=149%2C149" style="position:absolute;top:0;right:0;border:0;" alt="Fork me on GitHub" data-recalc-dims="1"></a>

<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/languages/php.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.8.0/highlightjs-line-numbers.min.js"></script>
<script>hljs.highlightAll();/*hljs.initLineNumbersOnLoad();*/</script>
<script>
    document.getElementById('webrequest-submit').addEventListener('click', event => {
        event.preventDefault();
        let url = location.origin + location.pathname;
        document.getElementById('webrequest-result').value = 'Loading...';
        document.getElementById('webrequest-submit-label').style.display = 'none';
        document.getElementById('webrequest-submit-spinner').style.display = 'inline-block';
        fetch(url, {
            method: 'POST',
            mode: 'no-cors',
        }).then(response => {
            return response.text().then(result => {
                document.getElementById('webrequest-result').value = result;
                document.getElementById('webrequest-result-panel').style.display = 'block';
                document.getElementById('webrequest-submit-label').style.display = 'inline';
                document.getElementById('webrequest-submit-spinner').style.display = 'none';
            });
        });
    }, false);
</script>
</body>
</html>
