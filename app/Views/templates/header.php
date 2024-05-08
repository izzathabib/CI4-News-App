<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
</head>
<body>
    <!-- esc(): CodeIgniter global function
              : Help prevents XSS attacks -->
    <h1><?= esc($title) ?></h1>