<?php

namespace App\Http\Controllers;

use App\Docs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('docs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return $request->all();
        $file = $request->file($request->file)->getClientOriginalName();
        $exploded = explode(',', $request->file);
        $decoded = base64_decode($exploded[1]);
        $file_name = pathinfo($file, PATHINFO_FILENAME);
        $ext = $request->file($request->file)->getClientOriginalExtension();
        if (str_contains($exploded[0], 'jpeg')) {
            $ext = 'jpg';
        }else{
            $ext = 'png';
        }
        $fileName = str_random().'.'.$ext;
        $path = public_path().'/docs'.$fileName;
        $path = $request->file($request->file)->storeas('public/docs', $fileName);
        file_put_content*/
        /*$fileNameWithExt = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('file')->getClientOriginalExtension();
        $fileToStore = $fileName.'_'.time().'.'.$ext;
        // return $fileToStore;
        $path = $request->file('file')->storeas('public/file', $fileToStore);
        $docs = new Docs;
        $docs->title = $request->title;
        $docs->file = $fileToStore;
        $docs->user_id = Auth::id();
        $docs->save();
        return redirect()->route('docs.index')
                        ->with('success', 'file successfully Uploaded');*/        
        // $fileNameWithExt = $request->file('pics')->getClientOriginalName();
        // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // $ext = $request->file('pics')->getClientOriginalExtension();
        // $fileToStore = $fileName.'_'.time().'.'.$ext;
        /*$uploadedFiles = $request->pics;
        foreach ($uploadedFiles as $file) {
           $file->store('docs');
        }
        // $uploadedFiles
        $docs = new Docs;
        $docs->title = $request->title;
        $docs->file = $request->file;
        $docs->user_id = Auth::id();
        $docs->save();

        return response(['status'=>'success']);*/
        $attachments = $request->file('attachments');
        foreach ($attachments as $key => $attachment) {
            dump($attachment)
        }

        try {
            returnresponse()->json(array{
                'success' => true,
                'data' => [],
                'errors' => []
            }, 200);
            
        } catch (\Exception $e) {
            returnresponse()->json(array{
                'success' => false,
                'data' => 'server error',
                'errors' => $e
            }, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function show(Docs $docs)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function edit(Docs $docs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docs $docs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docs $docs)
    {
        //
    }
}
