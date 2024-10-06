<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::latest()->filter(request(['email','search']))->paginate(10);
        return view('admin.accounts.index',compact('accounts'));
    }
    /**
     * Create the specified resource.
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    //Account registration
    public function store(Request $request)
    {
        try
        {
            $formFields = $request->validate([
                'name'=>'required',
                'email'=>'required|unique:users,email',
                'password'=>'required|confirmed|min:5',
                'password_confirmation'=>'required',
            ],
            [
                'email.unique' => 'Account with email is already exists.',
            ]);
            //To make Hash Password
            $formFields['password'] = Hash::make($request->password);
            //create user
            User::create($formFields);
            return redirect()->route('accounts')->with('message','Account created successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $account = User::find($id);
        return view('admin.accounts.details',compact('account'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = User::find($id);
        return view('admin.accounts.edit',compact('account'));
    }
    public function update(Request $request, string $id)
    {
        try{
            $account = User::find($id);
            $formFields = $request->validate([
                'name'=>'required',
                'email'=> ['required',Rule::unique('users')->ignore($account->id)],
               
            ], [
                'email.unique' => 'Account with email is already exists.',
            ]);
            $account->update($formFields);
            return redirect()->route('accounts')->with('message','Account updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = User::find($id);
        if (!$account) {
            return redirect()->route('accounts')->with('error', 'Unable to delete this account');
        }
        $account->delete();
        return redirect()->route('accounts')->with('message', 'User deleted successfully');
    }
}
