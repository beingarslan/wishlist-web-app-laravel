<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserWishListRequest;
use App\Http\Requests\UpdateUserWishListRequest;
use App\Models\UserWishList;

class UserWishListController extends Controller
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
     * @param  \App\Http\Requests\StoreUserWishListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserWishListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserWishList  $userWishList
     * @return \Illuminate\Http\Response
     */
    public function show(UserWishList $userWishList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserWishList  $userWishList
     * @return \Illuminate\Http\Response
     */
    public function edit(UserWishList $userWishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserWishListRequest  $request
     * @param  \App\Models\UserWishList  $userWishList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserWishListRequest $request, UserWishList $userWishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserWishList  $userWishList
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserWishList $userWishList)
    {
        //
    }
}
