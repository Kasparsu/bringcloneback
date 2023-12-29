<?php

namespace App\Http\Controllers;

use App\Models\ItemTemplate;
use App\Http\Requests\StoreItemTemplateRequest;
use App\Http\Requests\UpdateItemTemplateRequest;
use App\Models\Category;

class ItemTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::with('itemTemplates', 'itemTemplates.icon')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemTemplateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemTemplateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemTemplate  $itemTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(ItemTemplate $itemTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemTemplate  $itemTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemTemplate $itemTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemTemplateRequest  $request
     * @param  \App\Models\ItemTemplate  $itemTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemTemplateRequest $request, ItemTemplate $itemTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemTemplate  $itemTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemTemplate $itemTemplate)
    {
        //
    }
}
