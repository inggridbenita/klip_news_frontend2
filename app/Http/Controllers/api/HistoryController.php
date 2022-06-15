<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function getUserHistories(Request $request)
    {
        $userId = session('id');
        $histories = History::where('user_id', $userId)->select('news_id')->get();
        return $histories;
    }
}
