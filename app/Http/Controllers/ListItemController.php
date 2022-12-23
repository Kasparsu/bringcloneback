<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use App\Http\Requests\StoreListItemRequest;
use App\Http\Requests\UpdateListItemRequest;

class ListItemController extends Controller
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
     * @param  \App\Http\Requests\StoreListItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function show(ListItem $listItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ListItem $listItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListItemRequest  $request
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListItemRequest $request, ListItem $listItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListItem $listItem)
    {
        //
    }
}
