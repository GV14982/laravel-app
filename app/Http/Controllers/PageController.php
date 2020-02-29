<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $page = new Page;

        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $page->user_id = auth()->user()->id;
        $page->save();

        return redirect('/pages')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $data = Page::find($page->id);
        return view('pages.show')->with('page', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

        $data = Page::find($page->id);
        if($data->user_id !== auth()->user()->id) {
            return redirect('/pages')->with('error', 'Unauthorized');
        }
        return view('pages.edit')->with('page', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $data = Page::find($page->id);
        $data->title = $request->input('title');
        $data->body = $request->input('body');
        $data->save();

        return redirect('/pages')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $data = Page::find($page->id);
        if($data->user_id !== auth()->user()->id) {
            return redirect('/pages')->with('error', 'Unauthorized');
        }
        $data->delete();
        return redirect('/pages')->with('success', 'Page Removed');
    }
}
