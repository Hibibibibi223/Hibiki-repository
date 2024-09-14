<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function getByLimit(int $limit_count = 3)
    {
        //この文により勝手にSQLが動いてくれている。
        //DESC降順　でorderBy並べ替えをし，limit取得制限を掛けている。
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    // fillメソッドを使用可能な変数とするためにtitleとbodyをクラス変数filableとして定義
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];
    public function category()
    {
        // Categoryに対するリレーション
        //「1対多」の関係なので単数系に
        return $this->belongsTo(Category::class);
    }
}

?>