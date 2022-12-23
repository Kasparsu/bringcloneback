<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use App\Http\Requests\StoreItemListRequest;
use App\Http\Requests\UpdateItemListRequest;

class ItemListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreItemListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function show(ItemList $itemList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemList $itemList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemListRequest  $request
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemListRequest $request, ItemList $itemList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemList $itemList)
    {
        //
    }
}
