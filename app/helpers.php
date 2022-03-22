<?php

use Illuminate\Support\Facades\Route;

function route_class(){
    //會將當前請求的路由名稱轉換為CSS類名稱，作用是針對某個頁面做頁面樣式訂製
    return str_replace('.', '-', Route::currentRouteName());
}

function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}
