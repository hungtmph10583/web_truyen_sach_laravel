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
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $stories        = Story::with('author:id,a_name', 'categories:id,c_name')->paginate(18);
        $categories     = Category::get();
        $new_stories    = Story::orderBy('created_at', 'DESC')->paginate(6);
        $full_stories   = Story::orderBy('created_at', 'DESC')->where('s_status', 3)->paginate(6);
        $hot_stories    = Story::with('author:id,a_name', 'categories:id,c_name')->where('s_hot', 1)->paginate(6);
        $find           = Story::find(25);
        
        $getData = [
            'stories'       => $stories,
            'categories'    => $categories,
            'new_stories'   => $new_stories,
            'hot_stories'   => $hot_stories,
            'full_stories'  => $full_stories,
            'find'          => $find,
        ];
        return view('client.index', $getData);
    }

    public function story($s_slug)
    {
        $story      = Story::where('s_slug', $s_slug)->with('author:id,a_name', 'categories:id,c_name,c_slug')->first();
        if (!$story) {
            return  redirect('/trang-chu');
        }
        $chapters   = Chapter::where('c_story_id', $story->id)->paginate(50);
        $categories = Category::get();
        $authorStories = Story::where('s_author_id', $story->author->id)->get();
        $getData = [
            'story'         => $story,
            'chapters'      => $chapters,
            'categories'    => $categories,
            'authorStories'    => $authorStories,
        ];
        return view('client.story', $getData);
    }

    public function filter($slug)
    {
        if ($slug == 'truyen-moi-cap-nhat') {
            $stories = Story::orderBy('updated_at', 'DESC')->paginate(20);
            $heading = 'Truyện mới cập nhật';
        } elseif ($slug == 'truyen-hot') {
            $stories = Story::where('s_hot', 1)->paginate(20);
            $heading = 'Truyện hot';
        } elseif ($slug == 'truyen-full') {
            $stories = Story::where('s_status', 3)->paginate(20);
            $heading = 'Truyện full';
        } elseif ($slug == 'truyen-de-cu') {
            $stories = Story::orderBy('created_at', 'DESC')->paginate(20);
            $heading = 'Truyện đề cử';
        } elseif ($slug == 'truyen-xem-nhieu-nhat') {
            $stories = Story::orderBy('created_at', 'ASC')->paginate(20);
            $heading = 'Truyện xem nhiều nhất';
        }else{
            return  redirect('/trang-chu');
        }
        
        $categories     = Category::get();

        $getData = [
            'stories' => $stories,
            'heading' => $heading,
            'categories' => $categories,
        ];

        return view('client.filter', $getData);
    }

    public function category($c_slug)
    {
        $categories     = Category::get();
        $category       = Category::where('c_slug', $c_slug)->first();
        $stories        = Story::join("stories_categories","stories_categories.sc_story_id","=","stories.id")
            ->where("stories_categories.sc_category_id",$category->id)->paginate(15);
        
        $getData        = [
            'categories' => $categories,
            'category'   => $category,
            'stories'    => $stories
        ];
        return view('client.category', $getData);
    }

    public function chapter($s_slug, $c_slug)
    {
        $story      = Story::where('s_slug', $s_slug)->first();
        if (!$story) { return  redirect('/trang-chu'); }
        $chapters       = Chapter::where('c_story_id', $story->id)->get();
        // $chapters       = Chapter::with('story:id,s_slug')->where('c_story_id', $story->id)->paginate(5);
        $chapter        = Chapter::with('story:id,s_name')->where('c_story_id', $story->id)->where('c_slug', $c_slug)->first();

        $next_chapter   = Chapter::where('c_story_id', $story->id)->where('id', '>', $chapter->id)->min('c_slug');
        $prev_chapter   = Chapter::where('c_story_id', $story->id)->where('id', '<', $chapter->id)->max('c_slug');
        // dd($next_chapter);
        $getData    = [
            'story'     => $story,
            'chapters'  => $chapters,
            'chapter'   => $chapter,
            'n_chapter' => $next_chapter,
            'p_chapter' => $prev_chapter,
        ];
        return view('client.chapter', $getData);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $stories = Story::with('author:id,a_name', 'categories:id,c_name')->where('s_name','LIKE','%'.$keyword.'%')->paginate(18);
        $heading = 'Tìm kiếm';
        $categories     = Category::select(['id','c_name','c_slug'])->get();
        $getData = [
            'stories' => $stories,
            'heading' => $heading,
            'categories' => $categories,
        ];
        return view('client.filter', $getData);
    }

    public function search_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['keywords']) {
            $stories = Story::select(['id','s_name','s_slug'])->where('s_name','LIKE','%'.$data['keywords'].'%')->get();
            $output  = '<ul class"dropdown-menu" style="display:block;">';
            foreach ($stories as $key => $value) {
                $output .= '<li class="li_search_ajax"><a href="javascript:;">'.$value->s_name.'</a></li>';
            }
        }
        $output .= '</ul>';
        echo $output;
    }
}
