<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function getData(Request $request)
{
    $users = User::query();

    return DataTables::of($users)
        ->addColumn('full_name', function($user) {
            return $user->firstName . ' ' . $user->surname;
        })
        ->addColumn('status', function($user) {
            if ($user->status == 1) {
                return '<a href="'.route('admin.users.status', [$user->id, 0]).'" class="btn btn-success btn-sm">Active</a>';
            } else {
                return '<a href="'.route('admin.users.status', [$user->id, 1]).'" class="btn btn-danger btn-sm">Deactive</a>';
            }
        })
        ->addColumn('actions', function($user) {
            $editUrl = route('admin.users.edit', $user->id);
            $deleteUrl = route('admin.users.delete', $user->id);

            return '
                <a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>
                <a href="'.$deleteUrl.'" class="btn btn-danger btn-sm" onclick="return confirm(\'Delete user?\')">Delete</a>
            ';
        })
        ->rawColumns(['status', 'actions'])  // <-- important to render HTML
        ->make(true);
}

     public function create(Request $request)
    {

        return view('admin.users.create',[

        ]);

    }

     public function store(Request $request)
    {

        dd($request->all());   
    }



    public function edit($id)
    {

        if($id == 0){
            $user = false;
        }else{
            $user = User::findOrFail($id);
        }
        
        $data = [
          'user' => $user
        ];

        return view('admin.users.edit',$data);
    }


    public function update(Request $request, $id)
    {
        
        if($id == 0){
            $user = new User();
        }else{
            $user = User::findOrFail($id);
        }

        
        $validations = [
            'businessEmail' => 'required|email',
            'personalEmail' => 'required|email',
            'password' => 'nullable|string',
            'avatar' => 'nullable|file',
            'uploadID' => 'nullable|file',
            'motorTradeProof' => 'nullable|file',
            'addressProof' => 'nullable|file',
        ];

      


        $request->validate($validations);

        $user->companyName = $request->companyName;
        $user->businessType = $request->businessType;
        $user->companyReg = $request->companyReg;
        $user->website = $request->website;
        $user->businessEmail = $request->businessEmail;
        $user->motorTradeInsurance = $request->motorTradeInsurance;
        $user->vatNumber = $request->vatNumber;
        $user->companyAddress1 = $request->companyAddress1;
        $user->companyAddress2 = $request->companyAddress2;
        $user->townCity = $request->townCity;
        $user->country = $request->country;
        $user->postcode = $request->postcode;
        $user->telephone = $request->telephone;
        
        $user->firstName = $request->firstName;
        $user->surname = $request->surname;
       
        $user->title = $request->title;
        $user->jobTitle = $request->jobTitle;
        $user->phone = $request->phone;
        $user->personalEmail = $request->personalEmail;
        $user->status = $request->status;
        $user->user_type = 0;


        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

     
        if ($request->file('avatar')) {
            // Remove existing thumbnail if it exists
            if ($user->avatar && file_exists(public_path('uploads/' . $user->avatar))) {
                unlink(public_path('uploads/' . $user->avatar));
            }
            $fileName = time() . '__ff__' . $request->file('avatar')->getClientOriginalName();
            $filePath = public_path('uploads/avatar');
            $request->file('avatar')->move($filePath, $fileName);
            $user->avatar = $fileName;
            // $user->save();
        }


        if ($request->file('uploadID')) {
            // Remove existing thumbnail if it exists
            if ($user->uploadID && file_exists(public_path('uploads/' . $user->uploadID))) {
                unlink(public_path('uploads/' . $user->uploadID));
            }
            $fileName = time() . '__ff__' . $request->file('uploadID')->getClientOriginalName();
            $filePath = public_path('uploads/uploadID');
            $request->file('uploadID')->move($filePath, $fileName);
            $user->uploadID = $fileName;
            // $user->save();
        }


        if ($request->file('motorTradeProof')) {
            // Remove existing thumbnail if it exists
            if ($user->motorTradeProof && file_exists(public_path('uploads/' . $user->motorTradeProof))) {
                unlink(public_path('uploads/' . $user->motorTradeProof));
            }
            $fileName = time() . '__ff__' . $request->file('motorTradeProof')->getClientOriginalName();
            $filePath = public_path('uploads/motorTradeProof');
            $request->file('motorTradeProof')->move($filePath, $fileName);
            $user->motorTradeProof = $fileName;
            // $user->save();
        }

        if ($request->file('addressProof')) {
            // Remove existing thumbnail if it exists
            if ($user->addressProof && file_exists(public_path('uploads/' . $user->addressProof))) {
                unlink(public_path('uploads/' . $user->addressProof));
            }
            $fileName = time() . '__ff__' . $request->file('addressProof')->getClientOriginalName();
            $filePath = public_path('uploads/addressProof');
            $request->file('addressProof')->move($filePath, $fileName);
            $user->addressProof = $fileName;
            // $user->save();
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
        
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function updateStatus($id, $status)
    {
        $user = User::findOrFail($id);
        $user->status = $status;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User status updated.');
    }
}
