<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use DateTime;
// use App\Http\Requests\CsvRequest;

class CsvfileController extends Controller
{
    /**
     * import a file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required',
            'id_number' => 'required',
            'member_number' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email|unique',
            'shares' => 'required',
            'divided_balance' => 'required',
        ]);*/
        // return 'imported';
        if($request->file('imported-file')){
            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader){

            })->get();

            if(!empty($data) && $data->count()){
                foreach ($data->toArray() as $row){
                  if(!empty($row)){
                    $dataArray[] =
                    [
                      'member_number' => $row['number'],
                      'name' => $row['name'],
                      'id_number' => $row['number'],
                      'mobile_number' => $row['mobile_number'],
                      'email' => $row['email'],
                      'shares' => $row['shares'],
                      'divided_balance' => $row['divided_balance'],
                      'user_id' => Auth::id(),
                      'created_at' => new DateTime(),
                      'updated_at' => new DateTime(),
                      // 'created_at' => $row['created_at'],
                    ];
                  }
                }
                if(!empty($dataArray)){
                 Admin::insert($dataArray);
                 // return back();
                }
            }
            return redirect('/manage#/admin')->with('success', 'Import success');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('csv.index');
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
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
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
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
