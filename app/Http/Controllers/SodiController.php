<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sods;
Use App\User;
use DB;

class SodiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$sods = Sods::orderBy('summa','desc')->get();
        $sods = Sods::all();
        return view('sodi.index')->with('sods',$sods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $sods = Sods::all();
        
        return view('sodi.create')->with('sods',$sods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'auto' => 'required',
            'summa' => 'required',
            'vieta' => 'required',
            'user_id' => 'required',
            'cover_image' =>'image|nullable|max:1999',
        ]);

        $test = $request->input('user_id');
            //Parbauda vai ir lietotajs ar jauno nomainito id 
        if(User::find($test)){

            //handle file upload
            if($request->hasFile('cover_image')){
                //filename with extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            }else{
                $fileNameToStore = 'noimage.jpg';
            }

            //Creates Sods
            $sods = new Sods;
            $sods->auto = $request->input('auto');
            $sods->summa = $request->input('summa');
            $sods->vieta = $request->input('vieta');
            $sods->user_id = $request->input('user_id');
            $sods->cover_image = $fileNameToStore;
            $sods->save();
        
        }
        else {
            $sods = Sods::all();
            return redirect('/sods')->with('sods', $sods)->with('error', 'Izveidosana neizdevas, neeksistejos user_id');
        };

        $sods = Sods::all();
        return redirect('/sods')->with('sods',$sods)->with('success', 'Sods veiksmigi izveidots');
        //return redirect()->back()->with('sods',$sods);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $sods = Sods::all();
        return view('sodi.read')->with('sods', $sods);     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'auto' => 'required',
            'summa' => 'required',
            'vieta' => 'required',
            'user_id' => 'required',
        ]);




        $test = $request->input('user_id');
            //Parbauda vai ir lietotajs ar jauno nomainito id 
        if(User::find($test)){

            $sods = Sods::find($id);
            $sods->auto = $request->input('auto');
            $sods->summa = $request->input('summa');
            $sods->vieta = $request->input('vieta');
            $sods->user_id = $request->input('user_id');
            $sods->save();

        }
        else {
            $sods = Sods::all();
            return redirect('/sods')->with('sods', $sods)->with('error', 'Atjaunosana neizdevas, nepareizs user_id');
        };
        
        $sods = Sods::all();
        return redirect('/sods')->with('sods', $sods)->with('success', 'Sods veiksmigi labots');
    }
    public function edit ($id)
    {   
        $sods = sods::find($id);
        return view('sodi.edit')->with('sods', $sods);   
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $sods = Sods::find($id);        
        $sods->delete();

        $sods = Sods::all();
        return redirect('/sods')->with('sods', $sods)->with('success', 'Sods veiksmigi dzests');; 
    }   
}
