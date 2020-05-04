<?php

Route::group([
    'middleware' => [],
    'namespace' => $this->namespace,
    'prefix' => 'reembolsos',
], function () {
    Route::get('/', 'RefundController@getList');
});
