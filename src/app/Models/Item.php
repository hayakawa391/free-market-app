<?php
//itemsテーブルと直接連動させ、データの取得・追加・削除・更新治ド行ってくれるもの
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    protected $fillable  = [
        'name',
        'brand',
        'description',
        'price',
        'status',
        'category',
        'img_url',
        'user_id',
        'is_sold',];
    public function sold(){
        return $this->is_sold ?? false;
    }

 
}
