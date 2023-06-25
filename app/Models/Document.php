<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'name',
        'path',
        'is_editable',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'document_user', 'document_id', 'user_id');
    }

    public function sharedByUser()
    {
        return $this->belongsTo(User::class, 'shared_by');
    }
}
