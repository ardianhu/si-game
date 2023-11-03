<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.admin_dashboard');
    }
    public function userList(){
        return view('admin.user_list');
    }
    public function getuserdata(){
        $users = User::all();
        $output = '';
        if ($users->count() > 0) {
            $output .= '<table id="dt_getuserdata" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Nomor</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Level</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>';
            $num = 1;
            foreach ($users as $user) {
                if ($user->is_admin == 1) {
                    $level = 'Admin';
                } else {
                    $level = 'User';
                }
                $output .= '<tr bg-white border-b dark:bg-gray-800 dark:border-gray-700>
                                    <td scope="row" class="px-6 py-4">' . $num . '</td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $user->name . '</th>
                                    <td class="px-6 py-4">' . $user->number . '</td>
                                    <td class="px-6 py-4">' . $user->email . '</td>
                                    <td class="px-6 py-4">' . $level . '</td>
                                    <td class="px-6 py-4">
                                    <button type="button" id="'. $user->id .'" class="delete_button focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-3 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="white"><g id="_01_align_center" data-name="01 align center"><path d="M22,4H17V2a2,2,0,0,0-2-2H9A2,2,0,0,0,7,2V4H2V6H4V21a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V6h2ZM9,2h6V4H9Zm9,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V6H18Z"/><rect x="9" y="10" width="2" height="8"/><rect x="13" y="10" width="2" height="8"/></g></svg></button>
                                    <button type="button" id="'. $user->id .'" data-modal-target="edit_modal" data-modal-toggle="edit_modal" class="edit_button focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-3 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="white"><g id="_01_align_center" data-name="01 align center"><path d="M5,19H9.414L23.057,5.357a3.125,3.125,0,0,0,0-4.414,3.194,3.194,0,0,0-4.414,0L5,14.586Zm2-3.586L20.057,2.357a1.148,1.148,0,0,1,1.586,0,1.123,1.123,0,0,1,0,1.586L8.586,17H7Z"/><path d="M23.621,7.622,22,9.243V16H16v6H2V3A1,1,0,0,1,3,2H14.758L16.379.379A5.013,5.013,0,0,1,16.84,0H3A3,3,0,0,0,0,3V24H18.414L24,18.414V7.161A5.15,5.15,0,0,1,23.621,7.622ZM18,21.586V18h3.586Z"/></g></svg></button>
                                    </td>
                                    </tr>
                                    ';
                //   <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deactiveModal{{$user->id}}"><i class="bx bxs-user-x"></i></button></i></a>
                $num++;
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Tidak ada data di dalam sistem!</h1>';
        }
    }
    public function adduser(Request $request){
        if ($request->level == 'true') {
            $is_admin = 1;
        } else {
            $is_admin = 0;
        }
        User::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $is_admin,
        ]);
        // $user = new User();
        // $user->name = $request->input('name');
        // $user->number = $request->input('number');
        // $user->email = $request->input('email');
        // $user->password = bcrypt($request->input('password'));
        // if ($request->input('level') == 'true') {
        //     $user->is_admin = 1;
        // } else {
        //     $user->is_admin = 0;
        // }
        // $user->save();
        // return redirect('/user_list');
        return response()->json(['success' => true]);
    }

    public function delete_user(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return response()->json(['success' => true]);
    }

    public function edit_user(Request $request){
        $user = User::find($request->id);
        return response()->json($user);
    }

    public function update_user(Request $request){
        $user = User::find($request->user_id);
        $valid =  Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|unique:users,email,'. $request->user_id .'|email:rfc,dns',
            'password' => 'nullable|'
        ], [
            'name.required' => 'nama harus diisi',
            'number.required' => 'number harus diisi',
            'email.required' => 'email harus diisi',
            'email.unique' => 'email sudah ada di sistem',
            'email.email' => 'email harus valid',
        ]);
        if ($valid->fails()) {
            return response()->json([
                'errors' => $valid->errors(),
            ], 442);
        }
        $data = $valid->validated();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return response()->json(['success' => true]);
    }
    public function pyscript(){
        return view('admin.pyscript');
    }
}
