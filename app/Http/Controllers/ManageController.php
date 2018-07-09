<?php

namespace App\Http\Controllers;

use App\Manage;
use App\User;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\ManageRequest;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (Auth::user()->priverage == 'Admin') {
			$manages = Manage::all();
		}else{
			$manages = Manage::where('user_id', Auth::id())->get();
		}
		$users = User::Limit(3)->get();
		return view('manage', ['manages' => $manages, 'users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

    public function getData()
    {
        return Manage::orderBy('created_at', 'DESC')->get();
    }

    public function getUser()
    {
        return User::all();
    }

    public function getMembers()
    {
        return Admin::all();
    }

    public function getorg()
    {
        return Manage::count();
    }

    public function getuserNo()
    {
        return User::count();
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ManageRequest $request) {
        // return $request->all();
		$manage = new Manage;
		$manage->name = $request->name;
		$manage->email = $request->email;
		$manage->color = $request->color;
		$manage->logo = $request->logo;
		$manage->number = $request->number;
        $manage->user_id = Auth::id();
		$manage->priverage = 'organization';
		$manage->save();
	    return $manage;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Manage  $manage
	 * @return \Illuminate\Http\Response
	 */
	public function show(Manage $manage) {
		// return User::all();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Manage  $manage
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Manage $manage) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Manage  $manage
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Manage $manage) {
		// if (Auth()->user()->id != $manage->user_id) {
		// 	return redirect('/manage')->with('error', 'Unauthorized user');
		// }else{
			$manage = Manage::find($request->id);
	        $manage->name = $request->name;
	        $manage->email = $request->email;
	        $manage->color = $request->color;
	        $manage->logo = $request->logo;
	        $manage->number = $request->number;
	        $manage->save();
    	// }
        // return $request->all();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Manage  $manage
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Manage $manage) {
		Manage::where('id', $manage->id)->delete();
	}
}
