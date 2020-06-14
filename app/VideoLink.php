<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VideoLink
 *
 * @property int $id
 * @property string $filename
 * @property int $user_id
 * @property int $admin_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VideoLink whereUserId($value)
 * @mixin \Eloquent
 */
class VideoLink extends Model
{
    protected $table = 'video_links';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'admin_id', 'filename'];
    protected $hidden = ['created_at', 'updated_at'];
}
