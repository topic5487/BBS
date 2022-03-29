<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function saving(User $user){
        if(empty($user->avatar)){
            $user->avatar =
            'https://img.tukuppt.com/png_preview/00/39/87/bMmr3S2MCC.jpg!/fw/780';
        }
    }
}
