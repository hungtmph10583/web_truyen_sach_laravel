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
        // $categories     = Category::select(['c_name','c_slug'])->get();
        $new_stories    = Story::select(['id','s_name','s_slug','s_thumbnail','s_author_id','s_view'])->orderBy('created_at')->with('author:id,a_name')->paginate(8);
        $full_stories   = Story::select(['id','s_name','s_slug','s_thumbnail','s_author_id','s_view'])->where('s_full', 1)->with('author:id,a_name')->paginate(8);
        $hot_stories    = Story::select(['id','s_name','s_slug','s_thumbnail','s_author_id','s_view'])->where('s_hot', 1)->with('author:id,a_name')->paginate(8);
        
        $categories     = DB::table('categories')->select(['c_name','c_slug'])->get();
        // $new_stories    = DB::table('stories')->select(['id','s_name','s_slug','s_thumbnail','s_author_id'])->orderBy('created_at')->paginate(8);
        // $full_stories   = DB::table('stories')->select(['id','s_name','s_slug','s_thumbnail','s_author_id'])->where('s_full', 1)->paginate(8);
        // $hot_stories    = DB::table('stories')->select(['id','s_name','s_slug','s_thumbnail','s_author_id'])->where('s_hot', 1)->paginate(8);
        $recommends      = Story::select(['id','s_name','s_slug','s_thumbnail','s_view'])->with('categories:id,c_name')->orderBy('s_view','DESC')->take(5)->get();
        // return response()->json($recommend);
        
        $getData = [
            'categories'    => $categories,
            'new_stories'   => $new_stories,
            'hot_stories'   => $hot_stories,
            'full_stories'  => $full_stories,
            'recommends'    => $recommends,
        ];
        return view('client.index', $getData);
    }

    public function story($s_slug)
    {
        $story          = Story::where('s_slug', $s_slug)->with('author:id,a_name', 'categories:id,c_name,c_slug')->first();
        
        if (!$story) {  return  redirect('/trang-chu'); }
        $story->s_view  = $story->s_view + 1;
        $story->save();
        
        $recent_chapter = DB::table('chapters')->select(['id','c_name','c_slug'])->where('c_story_id', $story->id)->latest('id')->first();
        $chapters       = DB::table('chapters')->select(['c_name','c_slug'])->where('c_story_id', $story->id)->paginate(50);
        
        $categories     = DB::table('categories')->select(['c_name','c_slug'])->get();
        $authorStories  = Story::select(['id','s_name','s_slug','s_thumbnail'])->where('s_author_id', $story->author->id)->whereNotIn('s_slug', [$s_slug])->with('categories:id,c_name')->get();
        $getData        = [
            'story'         => $story,
            'recent_chapter'=> $recent_chapter,
            'chapters'      => $chapters,
            'categories'    => $categories,
            'authorStories'    => $authorStories,
        ];
        return view('client.story', $getData);
    }

    public function filter($slug)
    {
        if ($slug == 'truyen-moi-cap-nhat') {
            $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_view'])->with('categories:id,c_name')->orderBy('updated_at', 'DESC')->paginate(20);
            $heading = 'Truyện mới cập nhật';
        } elseif ($slug == 'truyen-hot') {
            $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_view'])->with('categories:id,c_name')->where('s_hot', 1)->paginate(20);
            $heading = 'Truyện hot';
        } elseif ($slug == 'truyen-full') {
            $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_view'])->with('categories:id,c_name')->where('s_full ', 1)->paginate(20);
            $heading = 'Truyện full';
        } elseif ($slug == 'truyen-de-cu') {
            $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_view'])->with('categories:id,c_name')->orderBy('created_at', 'DESC')->paginate(20);
            $heading = 'Truyện đề cử';
        } elseif ($slug == 'truyen-xem-nhieu-nhat') {
            $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_view'])->with('categories:id,c_name')->orderBy('created_at', 'ASC')->paginate(20);
            $heading = 'Truyện xem nhiều nhất';
        }else{
            return  redirect('/trang-chu');
        }
        // return response()->json($stories);
        $categories  = DB::table('categories')->select(['c_name','c_slug'])->get();
        $getData     = [
            'stories' => $stories,
            'heading' => $heading,
            'categories' => $categories,
        ];

        return view('client.filter', $getData);
    }

    public function category($c_slug)
    {
        $categories     = DB::table('categories')->select(['c_name','c_slug'])->get();
        $category       = DB::table('categories')->select(['id','c_name','c_slug'])->where('c_slug', $c_slug)->first();
        $stories        = Story::join("stories_categories","stories_categories.sc_story_id","=","stories.id")
            ->select(['id','s_name','s_slug','s_thumbnail','s_view'])->with('categories:id,c_name')->where("stories_categories.sc_category_id",$category->id)->paginate(15);
        
        $getData        = [
            'categories' => $categories,
            'category'   => $category,
            'stories'    => $stories
        ];
        return view('client.category', $getData);
    }

    public function chapter($s_slug, $c_slug)
    {
        $story          = DB::table('stories')->select('id','s_name','s_slug','s_view')->where('s_slug', $s_slug)->first();
        if (!$story) { return redirect('/trang-chu'); }
        $chapters       = DB::table('chapters')->select(['c_name','c_slug'])->where('c_story_id', $story->id)->get();
        $chapter        = Chapter::select(['id','c_name','c_slug','c_content','c_story_id'])->with('story:id,s_name')->where('c_story_id', $story->id)->where('c_slug', $c_slug)->first();

        $idPrev         = DB::table('chapters')->where('c_story_id', $story->id)->where('id', '<', $chapter->id)->max('id');
        $idNext         = DB::table('chapters')->where('c_story_id', $story->id)->where('id', '>', $chapter->id)->min('id');

        $prev_chapter   = DB::table('chapters')->select('c_slug')->where('id',$idPrev)->first();
        $next_chapter   = DB::table('chapters')->select('c_slug')->where('id',$idNext)->first();
        if (!$prev_chapter) { $prev_chapter = $chapter->c_slug; }
        if (!$next_chapter) { $next_chapter = $chapter->c_slug; }
        // dd($next_chapter);
        $getData    = [
            'story'     => $story,
            'chapters'  => $chapters,
            'chapter'   => $chapter,
            'n_chapter' => $next_chapter,
            'p_chapter' => $prev_chapter,
        ];
        // return response()->json($getData);
        return view('client.chapter', $getData);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $stories = Story::select('id','s_name','s_slug','s_thumbnail','s_view')->with('categories:id,c_name')->where('s_name','LIKE','%'.$keyword.'%')->paginate(18);
        // dd($stories);
        $heading = 'Tìm kiếm';
        $categories     = DB::table('categories')->select(['c_name','c_slug'])->get();
        $getData = [
            'stories' => $stories,
            'categories' => $categories,
            'heading' => $heading,
        ];
        return view('client.filter', $getData);
    }

    public function search_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['keywords']) {
            $stories = Story::select(['s_name','s_slug'])->where('s_name','LIKE','%'.$data['keywords'].'%')->get();
            $output  = '<ul class"dropdown-menu" style="display:block;">';
            foreach ($stories as $key => $value) {
                $output .= '<li class="li_search_ajax"><a href="javascript:;">'.$value->s_name.'</a></li>';
            }
        }
        $output .= '</ul>';
        echo $output;
    }
}
