<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class CacheController extends Controller
{
    public function getCacheData (string $id) {
        return Redis::get('user:profile:'.$id);
    }

    public function setCacheData (string $id, string $data) {
        Redis::set('user:profile:'.$id, $data);
    }
}
