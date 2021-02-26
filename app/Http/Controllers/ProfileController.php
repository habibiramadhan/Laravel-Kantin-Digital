<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('profile.index');
    }

    private function bannedPasswords()
    {
        return [
            '12345678', '87654321', 'password',
            'habibi123', 'faiz1234', 'alfi123'
        ];
    }

     // buat validasi password manual
     private function validatePasswords(array $data)
     {
         $messages = [
             'password.required' => 'Silahkan masukkan password Anda saat ini',
             'new-password.required' => 'Silahkan masukkan password baru',
             'new-password-confirmation.not_in' => 'Maaf, kata sandi umum tidak diperbolehkan. Silakan coba kata sandi baru yang lain.'
         ];
 
         $validator = Validator::make($data, [
             'password' => 'required|same:password',
             'new-password' => ['required', 'min:8', Rule::notIn($this->bannedPasswords())],
             'new-password-confirmation' => 'required|same:new-password',
         ], $messages);
 
         return $validator;
     }

     public function changeImage(Request $request)
     {
         $image = $request->image;
 
         list($type, $image) = explode(';', $image);
         list(, $image)      = explode(',', $image);
 
         $image = base64_decode($image);
         $image_name= date('dmY').time() . '-' . Str::slug(Auth::user()->name) .'.png';
 
         $user = User::find(Auth::user()->id);
         if(!empty($user->picture)){
             File::delete(public_path("images/profile/$user->picture"));
         }
         $user->update([
             'picture' => $image_name
         ]);
 
         $path = public_path("images/profile/$image_name");
         file_put_contents($path, $image);
 
         return response()->json(['status'=>true]);
     }

     // Change Password
    public function changePassword(Request $request)
    {
        if (Auth::check()) {
            $request_data = $request->All();
            $validator = $this->validatePasswords($request_data);

            if ($validator->fails()) {
                return back()->withErrors($validator->getMessageBag());
            } else {
                $current_password = Auth::user()->password;

                if (Hash::check($request_data['password'], $current_password)) {
                    $user_id = Auth::user()->id;
                    $user = User::find($user_id);
                    $user->password = Hash::make($request_data['new-password']);
                    $user->save();

                    return back()->with('success', 'Password Anda telah diubah');
                } else {
                    return back()->with('error', 'Maaf, password Anda saat ini tidak dikenali. Silahkan coba lagi');
                }   
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }

    

}
