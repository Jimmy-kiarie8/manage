<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use App\Http\Requests\SurveyRequest;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('survey');
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

    public function getSurvey()
    {
        return Survey::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyRequest $request)
    {
        // return $request->all();
        $survey = new Survey;
        $survey->title = $request->title;
        $survey->user_id = Auth::id();
        // return $survey->user_id;
        $survey->questions = $request->questions;
        $survey->save();
        return $survey;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyRequest $request, Survey $survey)
    {
        // return $request->all();
        $surveyU = Survey::find($request->id);
        $surveyU->title = $request->title;
        $surveyU->questions = $request->questions;
        $surveyU->save();
        return $surveyU;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        Survey::where('id', $survey->id)->delete();
    }
}
