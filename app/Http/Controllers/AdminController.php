<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile_number = $request->mobile_number;
        $admin->id_number = $request->id_number;
        $admin->member_number = $request->member_number;
        $admin->shares = $request->shares;
        $admin->divided_balance = $request->divided_balance;
        $admin->manage_id = $request->manage_id;
        $admin->user_id = Auth::id();
        $admin->save();
        return $admin;
    }

    public function getAdmin()
    {
        if (Auth::user()->priverage == 'Admin') {
            return Admin::orderBy('manage_id', 'DESC')->get();
        }else{
            return Admin::where('user_id', Auth::id())->orderBy('manage_id', 'ASC')->get();
        }
    }

    public function getadminNo()
    {
        return Admin::count();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        // return Admin::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request->all();
        $admin = Admin::find($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile_number = $request->mobile_number;
        $admin->id_number = $request->id_number;
        $admin->member_number = $request->member_number;
        $admin->shares = $request->shares;
        $admin->divided_balance = $request->divided_balance;
        $admin->manage_id = $request->manage_id;
        $admin->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        // if (Auth()->user()->id != $admin->user_id) {
        //     return redirect('/')->with('error', 'Unauthorized user');
        // }else{
            Admin::where('id', $admin->id)->delete();
        // }
    }
}
