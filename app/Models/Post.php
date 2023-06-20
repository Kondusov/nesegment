<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $guarded = false;

    const STATUS_PUBLISHED = 1;
    const STATUS_IN_WORK = 2;
    const STATUS_COMPLETED = 3;
    const STATUS_CANCELED = 0;

    public static function getStatus($status)
    {
        return [
            self::STATUS_PUBLISHED => 'Прием заявок',
            self::STATUS_IN_WORK => 'В работе',
            self::STATUS_COMPLETED => 'Завершено',
            self::STATUS_CANCELED => 'Отменено'
        ];
    }

    public function tags(){

        return $this->belongsToMany( Tag::class, 'post_tags', 'post_id', 'tag_id' );
    }

    public function category(){

        return $this->belongsTo( Category::class, 'category_id', 'id' );
    }

    public function LikedUsers(){

        return $this->belongsToMany( User::class, 'post_user_likes', 'post_id', 'id' );
    }
    
    public function comments(){

        return $this->hasMany( Comment::class, 'post_id', 'id' );
    }
    
    public function ownerPost(){

        return $this->belongsTo( User::class, 'owner_post', 'id' );
    }


}
