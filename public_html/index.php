<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JSON Helper Library</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">JSON Helper Library</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://php.net" target="_blank">PHP</a></li>
                <li><a href="https://github.com/codedgr/JSON" target="_blank">GitHub</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" role="main">
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require dirname(__DIR__) . '/vendor/autoload.php';

        $array = [
            'first-element' => 'this value',
            'second-element' => [0, 1, 2, 3, 4],
        ];

        try {
            ?>
            <h2>Original Array</h2>
            <pre><?php print_r($array); ?></pre>

            <h2>Encoded JSON</h2>
            <pre><?php print_r($encodedJSON = \Coded\JSON\JSON::encode($array)); ?></pre>

            <h2>Decoded Object</h2>
            <pre><?php print_r($object = \Coded\JSON\JSON::decode($encodedJSON)); ?></pre>
            <?php
        } catch (\Coded\JSON\JSONException $e) {
            ?>
            <div class="alert alert-danger"><?php echo $e->getMessage(); ?></div>
            <?php
        }
        ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>