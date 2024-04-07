<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Author;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\StoryCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:add story|edit story|delete story');
        // $this->middleware('permission:show story', ['only' => ['create','index']]);
        $this->middleware('permission:create story', ['only' => ['create','store']]);
        $this->middleware('permission:update story', ['only' => ['update','edit']]);
        $this->middleware('permission:delete story', ['only' => ['destroy']]);
        view()->share('activeStory', TRUE);
    }

    public function index(Request $request)
    {
        $pageSize = 10;
        $searchData = $request->except('page');
        if (count($request->all()) == 0) {
            $stories = Story::select(['id','s_name','s_slug','s_status','s_author_id','s_total_chapter'])->latest('id')->with('author:id,a_name', 'categories:id,c_name')->paginate($pageSize);
        }else{
            $storiesQuery = Story::select(['id','s_name','s_slug','s_status','s_author_id','s_total_chapter'])->where('s_name', 'like', '%' . $request->keyword . '%')->with('author:id,a_name', 'categories:id,c_name');
            $stories = $storiesQuery->latest('id')->paginate($pageSize)->appends($searchData);
        }
        // $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_status'])->with('categories:id,c_name')->get();
        // $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_status','updated_at'])->get();
        
        // return response()->json($stories);
        /**use `select` to get the necessary data from column useless then show it on the screen */
        view()->share('activeStory', TRUE);
        return view('admin.story.index', compact('stories', 'searchData'));
    }

    public function api()
    {
        $stories = Story::select(['id','s_name','s_slug','s_thumbnail','s_status','updated_at'])->take(10)->get();
        return response([
            'data' => $stories,
            'status' => 200
        ]);
    }

    public function create()
    {
        $categories = Category::select(['id','c_name'])->latest('id')->get();
        $authors    = Author::select(['id','a_name'])->latest('id')->get();
        view()->share('activeStoryAdd', TRUE);
        return view('admin.story.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $model = $request->validate(
            [
                's_name'    => 'required|unique:stories|max:255',
                'sc_stories_categories' => 'required',
                's_author_id'  => 'required',
                // 's_thumbnail' => 'required|image|mimes:jpg,png,jpeg,gì,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ],
            [
                's_name.required'   => 'Enter the story name!',
                's_name.unique'     => 'This name already exists!',
                's_name.max'        => 'The title of the story cannot exceed 255 characters!',
                'sc_stories_categories.required' => 'Choose categories of story!',
                's_author_id.required' => 'Enter the name author of the story!',
                // 's_thumbnail.required' => 'Upload the thumbnail of the story!'
            ]
        );
        $checkAuthorExists = Author::select('id','a_name')->where('a_slug', \Str::slug($request->s_author_id))->first();
        if (!$checkAuthorExists) {
            $author = new Author();
            $author->a_name = $request->add_new_author;
            $author->save();
            $s_author_id = $author->id;
        }else{
            $s_author_id = $checkAuthorExists->id;
        }
        $story = new Story();
        $story->fill($request->all());
        $story->s_slug = \Str::slug($request->s_name);
        $story->s_author_id = $s_author_id;
        // if ($request->hasFile('s_thumbnail')) {
        //     $story->s_thumbnail = $request->file('s_thumbnail')->storeAs('uploads/stories', uniqid() . '-' . $request->s_thumbnail->getClientOriginalName());
        // }
        $story->save();

        if($request->has('sc_stories_categories')){
            foreach($request->sc_stories_categories as $item){
                $Obj = new StoryCategory();
                $Obj->sc_story_id       = $story->id;
                $Obj->sc_category_id    = $item;
                $Obj->save();
            }
        }
        return redirect()->route('story.index')->with('success', 'Story created successfully');
    }

    public function show($s_slug)
    {
        $story = Story::with('author:id,a_name')->where('s_slug', $s_slug)->first();
        $chapters = Chapter::select(['c_name','c_slug'])->where('c_story_id', $story->id)->get();
        // return response()->json($story);
        $viewData = [
            'story'     => $story,
            'chapters'  => $chapters,
        ];
        return view('admin.story.show', $viewData);
    }

    public function edit($s_slug)
    {
        $story = Story::where('s_slug', $s_slug)->first();
        $categories = Category::select(['id','c_name'])->get();
        $select = DB::table('stories_categories')->select('sc_category_id')->where('sc_story_id', $story->id)->get();
        
        return view('admin.story.edit', compact('story', 'categories', 'select'));
    }

    public function update($s_slug, Request $request)
    {
        /**Find story by id for updates */
        $story = Story::where('s_slug', $s_slug)->first();
        /**Check story not exists */
        if (!$story) { return Redirect()->back()->with('danger', 'Story updated failed'); }
        /**Check story's validate conditions*/
        $model = $request->validate(
            [
                's_name' => [
                    'required',
                    Rule::unique('stories')->ignore($story->id)
                ],
                'sc_stories_categories' => 'required',
                's_author_id'  => 'required',
                // 's_thumbnail' => 'required|image|mimes:jpg,png,jpeg,gì,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ],
            [
                's_name.required'   => 'Enter the story name!',
                's_name.unique'     => 'This name already exists!',
                's_name.max'        => 'The title of the story cannot exceed 255 characters!',
                'sc_stories_categories.required' => 'Choose categories of story!',
                's_author_id.required' => 'Enter the name author of the story!',
                // 's_thumbnail.required' => 'Upload the thumbnail of the story!'
            ]
        );

        /**Check author exsits or not */
        $checkAuthorExists = Author::select('id','a_name')->where('a_slug', \Str::slug($request->s_author_id))->first();
        if (!$checkAuthorExists) {
            /**If the author does not exsits then save the author in data and get the author's id */
            $author = new Author();
            $author->a_name = $request->add_new_author;
            $author->save();
            $s_author_id = $author->id;
        }else{
            /**If the author exsits then get the author's id */
            $s_author_id = $checkAuthorExists->id;
        }

        /**Update story data according to the form into the database */
        $story->fill($request->all());
        $story->s_slug = \Str::slug($request->s_name);
        $story->s_author_id = $s_author_id;
        $story->save();

        // Handle sync of saving story categories
        $story->categories()->sync($request->sc_stories_categories);

        return redirect()->route('story.index')->with('success', 'Story updated successfully');
    }

    public function destroy($id)
    {
        $story = Story::find($id);
        if (!$story) { return Redirect()->back()->with('danger', 'Story deleted failed'); }

        /**Delete chapters of the story */
        $chapters = Chapter::where('c_story_id', $id)->get();
        if (count($chapters) > 0) {
            /**Make a loops that delete all chapters of this story */
            // foreach ($chapters as $item) {
            //     $chapter = Chapter::find($item->id);
            //     $chapter->delete();
            // }
            return Redirect()->back()->with('danger', 'You can not delete a story that already has chapters');
        }

        /**Delete all categories of the story in stories_categories table */
        StoryCategory::whereIn('sc_story_id',[$story->id])->delete();
        /**Delete the story thumbnails in the folder*/
        // $path = 'storage/' . $story->s_thumbnail;
        // if (file_exists($path)) {
        //     unlink($path);
        // }
        /**Delete story when conditions are met */
        $story->delete();
        return redirect()->route('story.index')->with('success', 'Story deteted successfully');
    }
}