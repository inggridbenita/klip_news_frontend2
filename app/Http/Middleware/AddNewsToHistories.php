<?php

namespace App\Http\Middleware;

use App\Models\History;
use App\Models\News;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class AddNewsToHistories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $newsId = $request->get('id');
        $userId = session('id');

        if (News::where('id', $newsId)->count() == 0) {
            $news = new News();
            $news->id = $newsId;
            $news->save();
        }

        if (History::where('user_id', $userId)->where('news_id', $newsId)->count() == 0) {
            $history = new History();
            $history->user_id = $userId;
            $history->news_id = $newsId;
            $history->save();
        }
        else {
            $history = History::where('user_id', $userId)
                                ->where('news_id', $newsId)
                                ->update(['updated_at' => Carbon::now()]);
        }
        return $next($request);
    }
}
