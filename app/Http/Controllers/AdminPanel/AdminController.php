<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(User::query())->make(true);
        }
        return view('admin.admin', ['title' => 'Admin']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
        ]);
        $validate = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email,'],
            'username' => ['required', 'unique:users,username,'],
            'name' => ['required'],
            'phone' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->messages()
            ]);
        }
        if ($request->file('photo')) {
            // ada file yang diupload
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/img/', $filenameSimpan);
            $savepath = 'img/' . $filenameSimpan;
        } else {
            // tidak ada file yang diupload
            $savepath = 'img/1.png';
        }

        $user = new User();
        $user->photo = $savepath;
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->password = $request->get('password');
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Admin berhasil dibuat!',
            'content' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.profile', [
            'title' => 'Profil',
            'profile' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
        ]);
        $validate = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'username' => ['required', 'unique:users,username,' . $user->id],
            'name' => ['required'],
            'phone' => ['required'],
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->messages()
            ]);
        }
        if ($request->file('photo')) {
            // ada file yang diupload
            if ($user->photo && file_exists(storage_path('app/public/' . $user->photo)) && $user->photo != 'img/1.png') {
                Storage::delete('public/' . $user->photo);
            }
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/img/', $filenameSimpan);
            $savepath = 'img/' . $filenameSimpan;
        } else {
            // tidak ada file yang diupload
            $savepath = $user->photo;
        }
        $user->photo = $savepath;
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Profile berhasil diupdate!',
            'content' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return response()->json([
                'status' => 400,
                'message' => 'Admin pertama tidak dapat dihapus.',
            ]);
        }
        User::find($id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Admin berhasil dihapus.',
        ]);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        $validate = Validator::make($request->all(), [
            'currentPassword' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('Password lama tidak sesuai.'));
                }
            }],
            'newpassword' => ['required', 'confirmed', 'min:8'],
            'newpassword_confirmation' => ['required'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
            ]);
        }

        $user->password = Hash::make($request->input('newpassword'));
        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'Passowrd berhasil diubah.',
        ]);
    }
}
