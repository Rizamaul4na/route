<?php

/* Route Redirect */
Route::get('/school', function() {
    return '<h1>School</h1>';
});
Route::Redirect('/sekolah', '/school');



/* Route Fallback */
Route::Fallback(function () {
    return "Sorry, We can't found";
});



/* Route Priority */
Route::get('/room/1', function () {
    return "Room ke-1";
});
Route::get('/room/1', function () {
    return "Room ke-1";
});
Route::get('/room/1', function () {
    return "Room ke-1";
});

Route::get('/room/{a}', function ($a) {
    return "Room ke-$a";
});
Route::get('/room/{b}', function ($b) {
    return "Room ke-$b";
});
Route::get('/room/{c}', function ($c) {
    return "Room ke-$c";
});

/* RIZA.M */