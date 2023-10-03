<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tag::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Tag::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Tag::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());
    
        return $tag;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
    
        return 204;
    }
}
