<?php
/**
 *
 */

require_once __DIR__.'/../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$vendor = $uri[1] ?: 'javanile';
$package = $uri[2] ?? 'webrequest';
$variant = $uri[3] ?? '';
$variantFile = 'webrequest'.($variant ? '-'.$variant : '').'.php';
$variantPath = $vendor.'/'.$package.($variant ? '/'.$variant : '');
$publicUrl = 'http://'.$_SERVER['HTTP_HOST'].'/'.$variantPath.'?';
$repository = $vendor.'/'.$package;
$platform = 'github';
$bypassLandingPage = isset($_GET['_bypass_landing_page']) && $_GET['_bypass_landing_page'] == 'yes';
$isRequest = ($_SERVER['REQUEST_METHOD'] == 'POST') || $bypassLandingPage;
$controllerUrl = 'https://raw.githubusercontent.com/'.$vendor.'/'.$package.'/main/webrequest'.($variant ? '-'.$variant : '').'.php';
$editUrl = 'https://github.com/'.$vendor.'/'.$package.'/edit/main/webrequest'.($variant ? '-'.$variant : '').'.php';
$forkUrl = 'https://github.com/'.$vendor.'/'.$package.'/fork';
$controllerHash = md5($controllerUrl);
$controllerFile = sys_get_temp_dir().'/'.$controllerHash.'.php';
$insightsFile = sys_get_temp_dir().'/'.md5($_SERVER['REQUEST_URI']).'.php';
$statsFile = sys_get_temp_dir().'/'.$controllerHash.'-stats.php';
$stats = json_decode(@file_get_contents($statsFile), true);
$expireTime = time() - 5;
$fromCache = false;
$hasError = false;
$variants = [];
#var_dump(filemtime($controllerFile), $expireTime, filemtime($controllerFile) - $expireTime);

if (!file_exists($controllerFile) || filemtime($controllerFile) < $expireTime) {
    $client = new Github\Client();
    try {
        $controller = $client->api('repo')->contents()->download($vendor, $package, $variantFile, 'main');
    } catch (Throwable $error) {
        $controller = file_get_contents($controllerUrl);
    }
    if ($controller) {
        file_put_contents($controllerFile, $controller);
    } else {
        $hasError = true;
    }
} else {
    $fromCache = true;
    $controller = file_get_contents($controllerFile);
}

if (!file_exists($insightsFile) || filemtime($insightsFile) < $expireTime) {
    $client = new Github\Client();
    $info = $client->api('repo')->show($vendor, $package);
    $insights = [
        'description' => $info['description'],
    ];
    file_put_contents($insightsFile, json_encode($insights));
} else {
    $insights = json_decode(file_get_contents($insightsFile), true);
}

if ($isRequest) {
    // Update stats
    $currentMinute = intdiv(time(), 60);
    $delta = @$stats['minute'] > 0 ? $currentMinute - @$stats['minute'] : 0;
    $stats['samples'] = array_merge(array_fill(0, $delta, 0) ?: [], array_slice(@$stats['samples'] ?: [], 0, 60 - $delta));
    $stats['samples'][0] = @$stats['samples'][0] + 1;
    $stats['frequency'] = array_sum($stats['samples']);
    $stats['minute'] = $currentMinute;
    file_put_contents($statsFile, json_encode($stats));

    // Run the controller
    return require_once $controllerFile;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>webrequest.cc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/regular.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/brands.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/solid.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/styles/solarized-light.min.css">
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
        .table-sm th, .table-sm td {
            padding: 0;
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
        .source-panel {
            background-color: #fdf6e3;
            padding: 0 13px 0 13px;
        }
        .hljs-comment, h1 {
            color: #273C2C;
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
                    <a class="btn btn-lg btn-primary float-right" href="https://github.com/javanile/webrequest-template/generate" target="_blank">
                        <i class="fas fa-puzzle-piece"></i> Create Project
                    </a>
                    <h1 class="mb-3"><i class="fab fa-<?=$platform?>"></i> <?=$vendor?> / <?=$package?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 pr-lg-0">
                <div class="bs-component">
                    <div class="card border-primary card-shadow mb-3">
                        <div class="card-header"><i class="far fa-file-code"></i> Header</div>
                        <div class="source-panel">
                            <pre class="mb-0"><code id="script" lass="php"><?=htmlentities($controller, ENT_COMPAT)?></code></pre>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="<?=$editUrl?>" target="_blank" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                    <div class="card card-shadow mb-3">
                        <div class="card-header">Usage & Examples</div>
                        <div class="card-body">
                            <p class="card-text">Copy and paste the</p>
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <input id="webrequest-url" type="text" class="form-control font-weight-bold" readonly value="<?=$publicUrl?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-primary w-100">
                                                <i class="far fa-clipboard"></i>
                                                Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bs-component">
                    <div class="card card-shadow mb-3">
                        <div class="card-header">Insights</div>
                        <div class="card-body">
                            <p class="card-text"><?=$insights['description']?></p>
                            <table class="table table-borderless table-sm mb-0">
                                <tr>
                                    <th>Hourly Requests:</th>
                                    <td><?=intval(@$stats['frequency'])?></td>
                                </tr>
                                <tr>
                                    <th>Suitable Variants:</th>
                                    <td><?=intval(@$stats['frequency'])?></td>
                                </tr>
                            </table>
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
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="value1" value="value1">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="value1" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row position-relative">
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
                                <div class="form-group row position-relative">
                                    <div class="background-text">
                                        =
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="value3" value="value3">
                                    </div>
                                    <div class="col-6">
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
                            <li class="list-group-item"><a href="/php-nocode/ifttt" target="_blank">php-nocode/ifttt</a></li>
                            <li class="list-group-item"><a href="/php-nocode/games" target="_blank">php-nocode/games</a></li>
                            <li class="list-group-item"><a href="/php-nocode/tools" target="_blank">php-nocode/tools</a></li>
                        </ul>
                    </div>
                    <div class="card card-shadow mb-3">
                        <div class="card-header">Debug</div>
                        <div class="card-body">
                            <table class="table table-borderless table-sm mb-0">
                                <!--tr>
                                    <th>Controller URL:</th>
                                    <td><?=$controllerUrl?>
                                </tr-->
                                <tr>
                                    <th>From cache:</th>
                                    <td><?=$fromCache?'Yes':'No'?></td>
                                </tr>
                            </table>
                        </div>
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
                <p>Thanks to <a href="https://en.wikipedia.org/wiki/Joan_Stark" rel="nofollow" target="_blank">Spunk</a> from <a href="http://www.ascii-art.com" rel="nofollow" target="_blank">http://www.ascii-art.com</a>
            </div>
        </div>
    </footer>
</div>

<a href="<?=$forkUrl?>" target="_blank" class="d-none d-xl-block"><img loading="lazy" width="149" height="149" src="https://github.blog/wp-content/uploads/2008/12/forkme_right_green_007200.png?resize=149%2C149" style="position:absolute;top:0;right:0;border:0;" alt="Fork me on GitHub" data-recalc-dims="1"></a>

<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/highlight.min.js"></script>
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.7.2/build/languages/php.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.8.0/highlightjs-line-numbers.min.js"></script>
<script>hljs.highlightAll();/*hljs.initLineNumbersOnLoad();*/</script>
<script>
    document.getElementById('webrequest-url').addEventListener('click', event => {
        event.preventDefault();
        document.getElementById('webrequest-url').select()
    });
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
