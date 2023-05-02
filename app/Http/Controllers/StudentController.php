<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     **/

    public function index()
    {
        $students = Student::all();
        return view("students.index")->with("students",$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function create()
    {
        
        return view("students.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */

    public function store(Request $request)
    {

        // $host=$request->host(); //$request->httpHost(); // $request->schemeAndHttpHost(); dd($host);

        // $uri=$request->fullUrlWithQuery(['type' => 'phone']); dd($uri);

        // dd($uri);

        $rules = [ 

            'name' => ['required', 'max:255'],
            'mail' => ['required','email', 'max:255'],
            'phone' => ['required','max:10'],
            'image' => 'bail|required|image|max:1024',
            'section' => ['required', 'max:255']

        ];

        $messages = [ 

            'name.required' =>"name is required",
            'image.image' =>"please upload an image"

        ];

        $validatedData = Validator::make($request->all(),$rules,$messages);

        if($validatedData->fails()) 
        return redirect()->back()->withErrors($validatedData)->withInput();

        $path_image = $request->image->store("students" ,"public");

        Student::create([

            "name"=>$request->name,
            "mail"=>$request->mail,
            "phone"=>$request->phone,
            "section"=>$request->section,
            "image"=>$path_image

        ]);

        return redirect("student")->with("flash_message","Student Added!!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int 
     * @return \Illuminate\Http\Response
     * 
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view("students.show")->with("students" , $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view("students.edit")->with("students" , $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, $id)
    {

        $rules = [ 

            'name' => ['required','max:255'],
            'mail' => ['required','email', 'max:255'],
            'phone' => ['required','max:10'],
            'image' => 'bail|required|image|max:1024',
            'section' => ['required', 'max:255'], 

        ];

        $messages = [

            'name.required' =>"name is required",
            'image.image' =>"please upload an image", 

        ];

        if ($request->hasFile("picture")){ 

            $rules["image"] = 'bail|required|image|max:1024'; 

        }

        $validatedData = Validator::make($request->all(),$rules,$messages);

        if($validatedData->fails()) 
        return redirect()->back()->withErrors($validatedData)->withInput();


        $student = Student::find($id);
        
        if($request->hasFile("image")){ 

            Storage::delete($student->image);
            $chemin_image = $request->image->store("students","public"); 

        }

        $input = [
            
            "name"=>$request->name,
            "mail"=>$request->mail,
            "phone"=>$request->phone,
            "section"=>$request->section,
            "image"=>$chemin_image

        ];

        $student->update($input);
        return redirect("student")->with("flash_message","Student Updated!!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */

    public function destroy($id)
    {

        Student::destroy($id);
        return redirect("student")->with("flash_message","Student Deleted!!");

    }
}
