<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message',
    ];
    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(Chat::class);
    }

    public function createForSend($session_id)
    {
        return $this->chats()->create([
            'session_id' => $session_id,
            'type' => 0,
            'user_id' => auth()->id()]);
    }

    public function createForReceive($session_id, $to_user)
    {
        return $this->chats()->create([
            'session_id' => $session_id,
            'type' => 1,
            'user_id' => $to_user]);
    }
}
