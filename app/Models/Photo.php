<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function user() {
        // SELECT * FROM users WHERE id = $this->user_id
        return $this->belongsTo("App\Models\User", "user_id");
    }

    /*public function like($user = null, $liked = true) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => $liked, 
        ]);
    }

    public function dislike($user = null) {
        return $this->like($user, false);
    }
*/
    public function likes() {
        return $this->hasMany("App\Models\Like");
    }
}
