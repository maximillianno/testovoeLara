<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Magazine
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Magazine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Magazine whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Magazine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Magazine whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Magazine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Magazine whereUpdatedAt($value)
 */
class Magazine extends Model
{
    //
    protected $fillable = ['name', 'description', 'img', 'date'];

    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }
}
