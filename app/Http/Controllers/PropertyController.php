<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index(){
    $properties = Property::all();
    return view('properties.index', compact('properties'));
    }

    public function create(){
        return view('properties.create');
    } 

    public function store(Request $request){
        $validate = $request->validate([
            'property_name' => 'required|string|max:255',
            'property_type' => 'required|in:House,Building',
            'distance' => 'required|numeric',
            'property_owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Property::create($validate);
        return redirect()->route('properties.index');
    }

    public function edit(Property $property){
        return view ('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property){
        $validate = $request->validate([
            'property_name' => 'required|string|max:255',
            'property_type' => 'required|in:House,Building',
            'distance' => 'required|numeric',
            'property_owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $property->update($validate);
        return redirect()->route('properties.index');    
    }

    public function destroy(Property $property){
        $property->delete();
        return redirect()->route('properties.index');
    }

}
