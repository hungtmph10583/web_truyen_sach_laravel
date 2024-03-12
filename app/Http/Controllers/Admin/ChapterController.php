<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Chapter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function __construct() {
        view()->share('activeChapter', TRUE);
    }

    public function index()
    {
        view()->share('activeChapterList', TRUE);
        $chapters   = Chapter::select(['id','c_name','c_slug','c_story_id'])->with('story:id,s_name,s_slug')->paginate(20);
        $getData = [
            'chapters' => $chapters,
        ];
        return view('admin.chapter.index', $getData);
    }

    public function create()
    {
        $stories = Story::select(['id','s_name'])->latest('id')->get();
        view()->share('activeChapterAdd', TRUE);
        return view('admin.chapter.create', compact('stories'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'c_story_id'    => 'required',
                'c_name'        => 'required',
                'c_content'     => 'required',
            ],
            // [
            //     'c_story_id.required'   => 'Chọn truyện của chương!',
            //     'c_name.required'       => 'Nhập vào tên chương truyện!',
            //     'c_content.required'    => 'Nhập vào nội dung chương truyện!'
            // ]
        );

        $model = new Chapter();
        // $model->fill($request->all());
        // dd($request->c_content);
        $dom = new \DomDocument();
        $dom->loadHtml(mb_convert_encoding($request->c_content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile  = $dom->getElementsByTagName('imageFile');
        foreach ($imageFile as $item => $image) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imageData  = base64_decode($data);
            $image_name = "/upload/chapter_image/" . time().$item.'.png';
            $path   = public_path() . $image_name;
            file_put_contents($path, $imageData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $c_content = $dom->saveHTML($dom->documentElement);
        // dd($c_content);
        $model->c_name = $request->c_name;
        $model->c_slug = \Str::slug($request->c_name);
        $model->c_story_id = $request->c_story_id;
        $model->c_content = $c_content;
        
        $model->save();
        return Redirect::to("admin/chapter/")->with('success', 'Chapter created successfully');
    }

    public function show($s_slug, $c_slug)
    {
        $story = Story::where('s_slug', $s_slug)->first();
        $chapter = Chapter::with('story:id,s_name')->where('c_story_id', $story->id)->where('c_slug', $c_slug)->first();
        $viewData = [
            'story' => $story,
            'chapter' => $chapter,
        ];
        return view('admin.chapter.show', $viewData);
    }

    public function edit($c_slug)
    {
        $chapter    = Chapter::where('c_slug', $c_slug)->first();
        $stories    = Story::get();

        $getData    = [
            'chapter'   => $chapter,
            'stories'   => $stories,
        ];
        return view('admin.chapter.edit', $getData);
    }

    public function update(Request $request, $c_slug)
    {
        $request->validate(
            [
                'c_story_id'    => 'required',
                'c_name'        => 'required',
                'c_content'     => 'required',
            ]
        );
    
        $chapter = Chapter::where('c_slug', $c_slug)->first();
        if (!$chapter) {
            return redirect()->route('chapter.index')->with('danger','Chapter update failed');
        }
        // dd($request->c_content);
        // $dom = new \DomDocument('1.0', 'UTF-8');
        $dom = new \DomDocument();
        @$dom->loadHtml(mb_convert_encoding($request->c_content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile  = $dom->getElementsByTagName('imageFile');
        foreach ($imageFile as $item => $image) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imageData  = base64_decode($data);
            $image_name = "/upload/chapter_image/" . time().$item.'.png';
            $path   = public_path() . $image_name;
            file_put_contents($path, $imageData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $c_content = $dom->saveHTML($dom->documentElement);

        $chapter->c_name = $request->c_name;
        $chapter->c_slug = \Str::slug($request->c_name);
        $chapter->c_story_id = $request->c_story_id;
        $chapter->c_content = $c_content;
        $chapter->save();
        return Redirect::to("admin/chapter/")->with('success', 'Chapter updated successfully');
    }

    public function destroy($id)
    {
        $chapter = Chapter::find($id);
        if (!$chapter) {
            return Redirect::to("admin/chapter/")->with('danger', 'Chapter deleted failed');
        }
        $chapter->delete();
        return Redirect()->back()->with('success', 'Chapter deleted successfully');
    }
}
