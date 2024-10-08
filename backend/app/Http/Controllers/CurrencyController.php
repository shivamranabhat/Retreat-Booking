<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::filter(request(['search']))->latest()->select('currency','slug','created_at')->paginate(10);
        return view('admin.currency.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'currency'=>'required|unique:currencies,currency',
            'symbol'=>'required',
            'exchange_rate'=>'required'
        ],['currency.unique'=>'This currency is already exists']);
        $slug = Str::slug($formFields['currency']);
        Currency::create($formFields+['slug'=>$slug]);
        return redirect()->route('currencies')->with('message','Currency added successfully');
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $currency = Currency::whereSlug($slug)->first();
        return view('admin.currency.edit',compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $currency = Currency::whereSlug($slug)->first();
        $formFields = $request->validate([
            'currency'=>'required|unique:currencies,currency,'.$currency->id,
            'symbol'=>'required',
            'exchange_rate'=>'required'
        ],['currency.unique'=>'This name is already exists']);
        $slug = Str::slug($formFields['currency']);
        $currency->update($formFields+['slug'=>$slug]);
        return redirect()->route('currencies')->with('message','Currency updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $currency = Currency::whereSlug($slug)->first();
        $currency->delete();
        return redirect()->route('currencies')->with('message','Currency deleted successfully');
    }
}
