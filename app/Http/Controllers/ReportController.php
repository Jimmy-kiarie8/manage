<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
/*
    public function userReport()
    {
        return User::all();
    }*/

    public function getReport()
    {
        return Report::orderBy('created_at', 'DESC')->get();
    }

    public function userget()
    {
        return User::all();
    }

    public function getUser()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $report = new Report;
        $report->registered = $request->registered;
        $report->attended   = $request->attended  ;
        $report->proxies    = $request->proxies;
        $report->comments   = $request->comments;
        $report->user_id    = Auth::id();
        $report->user_name    = Auth::user()->name;
        $report->save();
        return  $report;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $report = Report::find($request->id);
        $report->registered = $request->registered;
        $report->attended   = $request->attended  ;
        $report->proxies    = $request->proxies;
        $report->comments   = $request->comments;
        // $report->user_id    = Auth::id();
        // $report->user_name  = Auth::user()->name;
        $report->save();
        return  $report;
        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        return Report::where('id', $report->id)->delete();
    }
}