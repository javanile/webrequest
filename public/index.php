<?php

#var_dump($_SERVER);
$uri = $_SERVER['REQUEST_URI'];
$file = tempnam(sys_get_temp_dir(), 'FOO.php');
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
    <title>Bootswatch: Minty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/styles/default.min.css">
    <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/languages/php.min.js"></script>
</head>
<body>

<div class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a href="../" class="navbar-brand">Bootswatch</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="themes">Themes <span class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="themes">
                        <a class="dropdown-item" href="../default/">Default</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../cerulean/">Cerulean</a>
                        <a class="dropdown-item" href="../cosmo/">Cosmo</a>
                        <a class="dropdown-item" href="../cyborg/">Cyborg</a>
                        <a class="dropdown-item" href="../darkly/">Darkly</a>
                        <a class="dropdown-item" href="../flatly/">Flatly</a>
                        <a class="dropdown-item" href="../journal/">Journal</a>
                        <a class="dropdown-item" href="../litera/">Litera</a>
                        <a class="dropdown-item" href="../lumen/">Lumen</a>
                        <a class="dropdown-item" href="../lux/">Lux</a>
                        <a class="dropdown-item" href="../materia/">Materia</a>
                        <a class="dropdown-item" href="../minty/">Minty</a>
                        <a class="dropdown-item" href="../morph/">Morph</a>
                        <a class="dropdown-item" href="../pulse/">Pulse</a>
                        <a class="dropdown-item" href="../quartz/">Quartz</a>
                        <a class="dropdown-item" href="../sandstone/">Sandstone</a>
                        <a class="dropdown-item" href="../simplex/">Simplex</a>
                        <a class="dropdown-item" href="../sketchy/">Sketchy</a>
                        <a class="dropdown-item" href="../slate/">Slate</a>
                        <a class="dropdown-item" href="../solar/">Solar</a>
                        <a class="dropdown-item" href="../spacelab/">Spacelab</a>
                        <a class="dropdown-item" href="../superhero/">Superhero</a>
                        <a class="dropdown-item" href="../united/">United</a>
                        <a class="dropdown-item" href="../vapor/">Vapor</a>
                        <a class="dropdown-item" href="../yeti/">Yeti</a>
                        <a class="dropdown-item" href="../zephyr/">Zephyr</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../help/">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://blog.bootswatch.com/">Blog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Minty <span class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="download">
                        <a class="dropdown-item" rel="noopener" target="_blank" href="https://jsfiddle.net/bootswatch/3bojykn2/">Open in JSFiddle</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../5/minty/bootstrap.min.css" download>bootstrap.min.css</a>
                        <a class="dropdown-item" href="../5/minty/bootstrap.css" download>bootstrap.css</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../5/minty/_variables.scss" download>_variables.scss</a>
                        <a class="dropdown-item" href="../5/minty/_bootswatch.scss" download>_bootswatch.scss</a>
                    </div>
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
                    <h1 id="typography">Typography</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bs-component">
                    <pre><code id="script" lass="php"><?=$script?></code></pre>
                    <p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li class="float-end"><a href="#top">Back to top</a></li>
                    <li><a href="https://blog.bootswatch.com/">Blog</a></li>
                    <li><a href="https://blog.bootswatch.com/rss/">RSS</a></li>
                    <li><a href="https://twitter.com/bootswatch">Twitter</a></li>
                    <li><a href="https://github.com/thomaspark/bootswatch">GitHub</a></li>
                    <li><a href="../help/#api">API</a></li>
                    <li><a href="../help/#donate">Donate</a></li>
                </ul>
                <p>Made by <a href="https://thomaspark.co/">Thomas Park</a>.</p>
                <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/master/LICENSE">MIT License</a>.</p>
                <p>Based on <a href="https://getbootstrap.com/" rel="nofollow">Bootstrap</a>. Icons from <a href="https://fontawesome.com/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="https://fonts.google.com/" rel="nofollow">Google</a>.</p>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
