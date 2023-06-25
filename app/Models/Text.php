<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Text extends Model
{
    protected $table = 'texts';

    protected $fillable = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'text_user', 'text_id', 'user_id');
    }
    
    public function sharedByUser()
    {
        return $this->belongsTo(User::class, 'shared_by');
    }
}
