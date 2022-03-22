<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic){
        //讀取分類 ID 關聯的話題，並分頁
        $topics = $topic->Order($request->order)->where('category_id', $category->id)
        ->with('user', 'category')
        ->paginate(20);

        return view('topics.index', compact('topics', 'category'));
    }
}
