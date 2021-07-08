<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\biodata;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tahun_masuk' => ['required'],
            'jns_kelamin' => ['required'],
            'alamat' => ['required', 'string', 'max:100'],
            'tmp_lahir' => ['required', 'string', 'max:50'],
            'tgl_lahir' => ['required'],
            'kecamatan' => ['required', 'string', 'max:50'],
            'kabupaten' => ['required', 'string', 'max:50'],
            'nama_ayah' => ['required', 'string', 'max:50'],
            'nama_ibu' => ['required', 'string', 'max:50'],
            'pekerjaan_ortu' => ['required', 'string', 'max:50'],
            'no_hp' => ['required', 'max:20']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tahun_masuk' => $data['tahun_masuk'],
            'password' => Hash::make($data['password']),
        ]);
        biodata::create([
          'user_id' => $user->id,
          'jns_kelamin' => $data['jns_kelamin'],
          'alamat' => $data['alamat'],
          'tmp_lahir' => $data['tmp_lahir'],
          'tgl_lahir' => $data['tgl_lahir'],
          'kecamatan' => $data['kecamatan'],
          'kabupaten' => $data['kabupaten'],
          'nama_ayah' => $data['nama_ayah'],
          'nama_ibu' => $data['nama_ibu'],
          'no_hp' => $data['no_hp'],
          'pekerjaan_ortu' => $data['pekerjaan_ortu'],
        ]);
        return $user;
    }
}
