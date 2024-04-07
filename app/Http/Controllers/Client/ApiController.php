<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Author;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\StoryCategory;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function chapter($s_slug, $c_slug)
    {
        $story          = DB::table('stories')->select('id','s_name','s_slug')->where('s_slug', $s_slug)->first();
        // if (!$story) { return redirect('/trang-chu'); }
        // $chapters       = DB::table('chapters')->select(['c_name','c_slug'])->where('c_story_id', $story->id)->get();
        $chapter        = Chapter::select(['id','c_name','c_slug','c_content','c_story_id'])->where('c_story_id', $story->id)->where('c_slug', $c_slug)->first();

        $idPrev         = DB::table('chapters')->where('c_story_id', $story->id)->where('id', '<', $chapter->id)->max('id');
        $idNext         = DB::table('chapters')->where('c_story_id', $story->id)->where('id', '>', $chapter->id)->min('id');

        $prev_chapter   = DB::table('chapters')->select('c_slug')->where('id',$idPrev)->first();
        $next_chapter   = DB::table('chapters')->select('c_slug')->where('id',$idNext)->first();
        if (!$prev_chapter) { $prev_chapter = $chapter->c_slug; }
        if (!$next_chapter) { $next_chapter = $chapter->c_slug; }

        $data    = [
            'chapter_story_info'     => $story,
            // 'total_chapters'  => $chapters,
            'chapter_content'   => $chapter,
            'next_chapter' => $next_chapter,
            'prev_chapter' => $prev_chapter,
        ];
        return $this->apiResponse($data, true, 200, 'Test');
    }

    public function apiResponse($data = null, $status = true, $code = 200, $message = null)
    {
        return response()->json([
            'data'        => $data,
            'status_code' => $data == null ? 404 : $code,
            'status'      => $status,
            'message'     => $data == null && $message == null ? 'Không tìm thấy dữ liệu' : $message,
        ]);
    }
}
