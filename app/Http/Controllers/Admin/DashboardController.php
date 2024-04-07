<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function __construct() {
        view()->share('activeDashboard', TRUE);
    }

    public function index()
    {
        $recently_added_stories = Story::select(['id','s_name','s_thumbnail','s_view','s_author_id'])->with('author:id,a_name')->orderBy('created_at','DESC')->take(3)->get();
        $hot_stories            = Story::select(['id','s_name','s_thumbnail','s_view','s_author_id'])->with('author:id,a_name')->where('s_hot',1)->latest('id')->take(3)->get();
        $most_viewed_stories    = Story::select(['id','s_name','s_thumbnail','s_view','s_author_id'])->with('author:id,a_name')->orderBy('s_view','DESC')->take(3)->get();
        // return response()->json($most_viewed_stories);
        $total_story   = DB::table('stories')->count();
        $total_chapter = DB::table('chapters')->count();
        $total_author  = DB::table('authors')->count();
        // $new = Story::select(['id','s_name','s_author_id'])->with('author:id,a_name')->get(5);
        $getData = [
            'total_story'     => $total_story,
            'total_chapter'     => $total_chapter,
            'total_author'     => $total_author,
            'recently_added_stories'=> $recently_added_stories,
            'hot_stories'           => $hot_stories,
            'most_viewed_stories'   => $most_viewed_stories,
        ];
        return view('admin.dashboard', $getData);
    }
}
