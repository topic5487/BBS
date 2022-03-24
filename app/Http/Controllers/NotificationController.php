<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //取得登入用戶所有通知
        $notifications = Auth::user()->notifications()->paginate(15);
        //標記為已讀，未讀數量清零
        Auth::user()->markAsRead();
        return view('notifications.index', compact('notifications'));
    }
}
