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
    <title>webrequest.ml</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/regular.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/brands.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/styles/zenburn.min.css">
</head>
<body>
<div class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
        <a href="../" class="navbar-brand">webrequest.ml</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../help/">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/javanile/awesome-webrequest" target="_blank">awesome</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-md-auto">
                <li class="nav-item">
                    <a target="_blank" rel="noopener" class="nav-link" href="https://github.com/thomaspark/bootswatch/"><i class="fa fa-github"></i> GitHub</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" rel="noopener" class="nav-link" href="https://twitter.com/bootswatch"><i class="fa fa-twitter"></i> Twitter</a>
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
                    <div class="card border-primary mb-3">
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
                    <div class="card border-primary mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h4 class="card-title">Primary card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card border-secondary mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h4 class="card-title">Secondary card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="row">
            <div class="col-lg-12">
                <p>Made by <a href="https://thomaspark.co/">Thomas Park</a>.</p>
                <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/master/LICENSE">MIT License</a>.</p>
                <p>Based on <a href="https://getbootstrap.com/" rel="nofollow">Bootstrap</a>. Icons from <a href="https://fontawesome.com/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="https://fonts.google.com/" rel="nofollow">Google</a>.</p>
            </div>
        </div>
    </footer>
</div>

<a href="https://github.com/you" target="_blank"><img loading="lazy" width="149" height="149" src="https://github.blog/wp-content/uploads/2008/12/forkme_right_green_007200.png?resize=149%2C149" style="position:absolute;top:0;right:0;border:0;" alt="Fork me on GitHub" data-recalc-dims="1"></a>

<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/languages/php.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.8.0/highlightjs-line-numbers.min.js"></script>
<script>hljs.highlightAll();/*hljs.initLineNumbersOnLoad();*/</script>

</body>
</html>
