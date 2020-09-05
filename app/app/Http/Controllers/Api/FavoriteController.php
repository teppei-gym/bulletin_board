<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function changeStatus(Request $request)
    {
        $favorite = $request->all();

        $target = Favorite::where('post_id', $favorite['post_id'])
            ->where('user_id', $favorite['user_id'])->first(['id']);

        if (is_null($target)) {
            Favorite::create($favorite);
        } else {
            Favorite::find($target->id)->delete();
        }

        return Favorite::where('post_id', $favorite['post_id'])->count();
    }
}
