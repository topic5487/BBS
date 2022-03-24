<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    //一篇文章對應一個主題
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //一篇文章有很多回覆
    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeOrder($query, $order){
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
    }

    public function scopeRecentReplied($query){
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query){
        return $query->orderBy('created_at', 'desc');
    }

    public function link($params = []){
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }
}
