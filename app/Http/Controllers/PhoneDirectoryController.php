<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneDirectoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function delete(Request $request, $id){

 
        $result = \App\PhoneDirectory::where('id', '=', (int)$id)->where('user_id', '=', auth()->user()->id )->delete();

 
        if( $result ){

            return back()->with([
                'message' => 'Record has been deleted successfully.'
            ]);

        }else{

            return back()->with([
                'message' => 'Record could not be deleted.'
            ]);

        }
    }

    public function create(){
        
        return view('phone.create');
    }

    public function save(Request $request){

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required'
        ]);

        $all_except_token = $request->except('_token');
        
        $all_except_token['user_id'] = auth()->user()->id;

        $isSaved = \App\PhoneDirectory::create( $all_except_token );

        if( $isSaved ){

            return redirect('/home')->with([
                'message' => 'Record has been saved'
            ]);

        }else{

            return redirect('/home')->with([
                'message' => 'Record could not be saved'
            ]);


        }

    }


    public function edit(Request $request, $id){

        $phone_record = \App\PhoneDirectory::where('id', '=', (int) $id )->where('user_id', '=', auth()->user()->id )->first();

        return view('phone.edit')->with([
            'phone_record' => $phone_record
        ]);
    }

    public function update(Request $request){
        
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required'
        ]);

        $all = $request->except(['_token', 'id', 'user_id']); // user_id was thrown in here to stop any possible injection. 

        $isUpdated = \App\PhoneDirectory::where('id', '=', $request->id )->where('user_id', '=', auth()->user()->id )->update( $all );
        
        if( $isUpdated ){
            return redirect( '/home' )->with([
                'message' => 'Record has been updated'
            ]);
        }else{
            return redirect( '/home' )->with([
                'message' => 'Record could not be updated'
            ]);            
        }     

    }
}
