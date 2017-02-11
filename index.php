<?php
include 'lib/Request.php';
include 'Database.php';
include 'Repositories/User.php';

Request::get('/', function () {
    return ['index'];
});

Request::get('/user/([0-9]+)', function ($id) {
    $user = new User();
    var_dump(['user/' . $id]);
});

Request::get('/index.php', function () {
    return ['index.php'];
});

Request::post('/index.php', function () {
    return ['o0o0o'];
});
