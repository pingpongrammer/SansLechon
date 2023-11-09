<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FreebiesController extends Controller
{
        
    public function freebies(){
        $freeb1 = Categories::orderBy('id','DESC')
                            ->where('shop', 'sweet bites')
                            ->where('type', 'cake')
                            ->get();
        $freeb2 = Categories::orderBy('id','DESC')
                            ->where('shop', 'mombizz')
                            ->get();
        $freeb3 = Categories::orderBy('id','DESC')
                            ->where('type', 'minimalist')
                            ->get();
        return view('admin.freebies.freebies', ['freeb1'=>$freeb1, 'freeb2'=>$freeb2, 'freeb3'=>$freeb3 ]);
    }

    public function freebiesView(Request $request, $id){
        $freeb1 = Categories::find($id);
        return view('admin.freebies.freebiesView', ['freeb1'=>$freeb1]);
    }

    
    public function addfreebies(){
        return view('admin.freebies.addfreebies');
    }


    public function storeFreebies(Request $request){
        // dd($request->all());
        $request->validate([
            'img' => 'required', 
            'shop' => 'required', 
            'type' => 'required', 
            'description' => 'required', 
            'small' => '', 
            'medium' => 'required', 
            'large' => 'required', 
            'extraLarge' => '', 

        ]);
    
        $pot = null;
    
        if($request->hasFile('img')){
            $pot = $request->file('img')->store('pictures', 'public');
        }
    
        $categories = new Categories([
            'img' => $pot,
            'shop' => $request->shop,
            'type' => $request->type,
            'description' => $request->description,
            'small' => $request->small,
            'medium' => $request->medium,
            'large' => $request->large,
            'extraLarge' => $request->extraLarge,
        ]);
        $categories->save();
    
        return back()->with('message', 'Freebies Added Successfully');
    }

    public function freebiesDelete(Request $request, $id)
    {
        $freebies = Categories::find($id);
    
       $freebies->delete();
    
        return back()->with('error', 'Freebies Successfully Deleted');;
    }

    public function freebiesUpdate(Request $request, $id)
    {
        $request->validate([
            'shop' => 'required',
            'type' => 'required',
            'description' => 'required',
            'small' => '',
            'medium' => 'required',
            'large' => 'required',
            'extraLarge' => '',
        ]);
    
        // Find the existing record
        $freebies = Categories::find($id);
    
        // Check if a new image is provided
        if ($request->hasFile('img')) {
            // Validate and store the new image
            $request->validate([
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            ]);
    
            $pot = $request->file('img')->store('pictures', 'public');
    
            // Delete the old image if it exists
            if ($freebies->img) {
                Storage::disk('public')->delete($freebies->img);
            }
    
            // Update the image field
            $freebies->update(['img' => $pot]);
        }
    
        // Update other fields
        $freebies->update([
            'shop' => $request->input('shop'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'small' => $request->input('small'),
            'medium' => $request->input('medium'),
            'large' => $request->input('large'),
            'extraLarge' => $request->input('extraLarge'),
        ]);
    
        return back()->with('message', 'Freebies Successfully Updated');
    }
}
