<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Story;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    public function __construct() {
        view()->share('activeAuthor', TRUE);
    }
    
    public function index()
    {
        $authors = Author::select('id','a_name','created_at')->latest('id')->paginate(20);
        view()->share('activeAuthorList', TRUE);
        return view('admin.author.index', compact('authors'));
    }

    public function create()
    {
        view()->share('activeAuthorAdd', TRUE);
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        $request->validate([ 'a_name' => 'required|unique:authors,a_name|max:255', ],[
            'a_name.required' => 'Enter author name!',
            'a_name.unique'   => 'Author name already exists!',
            'a_name.max'      => 'Author names cannot exceed 255 characters!'
        ]);

        $author = new Author();
        $author->fill($request->all());
        $author->a_slug = \Str::slug($request->a_name);
        $author->save();

        return redirect()->route('author.index')->with('success', 'Author created successfully');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('admin.author.edit', compact('author'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'a_name' => [
                'required',
                Rule::unique('authors')->ignore($id)
            ],
        ],[
            'a_name.required' => 'Enter author name!',
            'a_name.unique'   => 'Author name already exists!'
        ]);
        /**Find author by id for updates */
        $author = Author::find($id);
        /**Check author not exists */
        if (!$author) { return Redirect()->back()->with('danger', 'Author deleted failed'); }
        $author->fill($request->all());
        $author->a_slug = \Str::slug($request->a_name);
        $author->save();
        return redirect()->route('author.index')->with('success', 'Author updated successfully');
    }

    public function destroy($id)
    {
        /**Find author by id */
        $author = Author::find($id);
        /**Check author not exists */
        if (!$author) { return Redirect()->back()->with('danger', 'Author deleted failed'); }
        /**Check authors who already have stories */
        if ($author->stories->count() > 0) { return Redirect()->back()->with('danger', 'You cannot delete authors who already have stories'); }
        /**Delete the author if all conditon are met */
        $author->delete();
        return redirect()->route('author.index')->with('success','Delete author successfully');
    }
}
