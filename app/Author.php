<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Author
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $middleName
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereUpdatedAt($value)
 */
class Author extends Model
{
    //
    protected $fillable = [
        'firstName', 'lastName', 'middleName'
    ];

    public function magazines()
    {
        return $this->belongsToMany('App\Magazine');
    }
}
