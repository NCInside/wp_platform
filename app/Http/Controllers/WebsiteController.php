<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{

    /**
     * Apply the middleware to all methods except the specified ones.
     *
     * @return void
     */
    public function __construct()
    {
    $this->middleware(['auth', 'verified'], ['except' => ['index','show', 'works']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $websites = Website::where('visible', true)->orderBy('score', 'DESC')->paginate(6);

        if ($request->has('type')) {
            if ($request->input('type') != 'all') {
                $websites = Website::where('visible', true)->where('type', $request->input('type'))->orderBy('score', 'DESC')->paginate(6);
            }
        }

        return view('website.index', compact('websites'));
    }

    // public function filter(Request $request)
    // {
    //     $websites = Website::whereHas('user', function ($query) use ($searchTerm) {
    //         $query->where('name', 'like', '%'.$searchTerm.'%');
    //     })
    //     ->where('visible', true)
    //     ->get();

    //     return view('website.index', compact('websites'));
    // }

    /**
     * Display a listing of the user's resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function works()
    {
        return view('website.works',[
            'websites' => Website::where('user_id', Auth::id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ss' => ['required', 'image', 'file', 'max:4000'],
            'css' => ['required', 'file', 'mimes:css,txt','max:1000']
        ]);

        if (!Website::where('type', $request->type)->where('user_id', Auth::id())->first()) {
            $website = Website::create([
                'ss' => $request->file('ss')->store('ss-website'),
                'css' => Storage::putFileAs('css-website', $request->file('css'), Str::random(40).'.css'),
                'score' => 0,
                'visible' => false,
                'type' => $request->type,
                'user_id' => Auth::id()
            ]);
        }

        return redirect('/websites');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        if ($website->type == 'afl2') {
            return view('website.show', [
                'css' => $website->css,
                'websites' => Website::where('visible', true)->where('type', 'afl2')->whereNot('user_id', $website->user->id)->inRandomOrder()->limit(3)->get()
            ]);
        }
        else if ($website->type == 'animal') {
            return view('website.showanimal', [
                'css' => $website->css,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        return view('website.edit', [
            'website' => $website
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        $request->validate([
            'ss' => ['image', 'file', 'max:4000'],
            'css' => ['file', 'mimes:css,txt','max:1000']
        ]);

        if($request->file('ss')) {
            unlink('storage/'.$website->ss);
            $website->update([
                "ss" => $request->file('ss')->store('ss-website'),
                "visible" => false
            ]);
        }
        if($request->file('css')) {
            unlink('storage/'.$website->css);
            $website->update([
                "css" => Storage::putFileAs('css-website', $request->file('css'), Str::random(40).'.css'),
                "score" => 0,
                "visible" => false
            ]);
        }
        return redirect('/works');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        unlink('storage/'.$website->ss);
        unlink('storage/'.$website->css);
        $website->delete();

        if (Auth::user()->admin) {
            return redirect('/admin/websites');
        }

        return redirect('/websites');
    }
}
