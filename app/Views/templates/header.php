<!doctype html>
<html>
<head>
    <title><?= esc($title) ?></title>
</head>
<body>
    <!-- esc(): CodeIgniter global function
              : Help prevents XSS attacks -->
    <h1><?= esc($title) ?></h1>