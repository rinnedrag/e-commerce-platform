<?php


namespace App\Adapters;


use App\User;
use App\VideoLink;

class MediaServerAdapter
{
    public function saveVideoLink($userID, $adminID, $filename) {
        $videoLink = VideoLink::create([
            'user_id' => $userID,
            'admin_id' => $adminID,
            'filename' => $filename
        ]);
        return $videoLink;
    }
}
