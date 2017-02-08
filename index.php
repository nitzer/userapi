<?php 
include 'lib/Request.php';

Request::get('/index.php', function(){
    return ['o0o0o'];
});


Request::post('/index.php', function(){
    return ['o0o0o'];
});
