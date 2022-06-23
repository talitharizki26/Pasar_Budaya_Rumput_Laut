<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Pembudidaya;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // Validator::make($input, [
        //     'no_ktp' => ['required', 'integer'],
        //     'no_hp' => ['required', 'integer'],
        //     'nama' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'foto' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        //     'password' => $this->passwordRules(),
        //     'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        // ])->validate();
        if ($input['role'] == "Pelanggan") {
            $o = "0";
            Pelanggan::create([
                'nama_pelanggan' => $input['nama'],
                'noktp_pelanggan' => $input['no_ktp'],
                'alamat_pelanggan' => $input['alamat'],
                'tgllahir_pelanggan' => $input['tgl_lahir'],
                'nohp_pelanggan' => $input['no_hp'],
                'foto_pelanggan' => $input['foto'],
                'jenkel_pelanggan' => $input['jenkel'],
            ]);
            User::create([
                'email' => $input['email'],
                'role' => $input['role'],
                'usertype' => $o,
                'password' => Hash::make($input['password']),
                'no_ktp' => $input['no_ktp'],

            ]);

        } else {
            $o = "1";
            Pembudidaya::create([
                'nama_pembudidaya' => $input['nama'],
                'noktp_pembudidaya' => $input['no_ktp'],
                'alamat_pembudidaya' => $input['alamat'],
                'tgllahir_pembudidaya' => $input['tgl_lahir'],
                'nohp_pembudidaya' => $input['no_hp'],
                'foto_pembudidaya' => $input['foto'],
                'jenkel_pembudidaya' => $input['jenkel'],
            ]);
            User::create([
                'email' => $input['email'],
                'role' => $input['role'],
                'usertype' => $o,
                'password' => Hash::make($input['password']),
                'no_ktp' => $input['no_ktp'],

            ]);
        }


        // return User::create([
        //     'no_ktp' => $input['no_ktp'],
        //     'nama' => $input['nama'],
        //     'email' => $input['email'],
        //     'role' => $input['role'],
        //     'usertype' => $o,
        //     'password' => Hash::make($input['password']),
        //     'jenkel' => $input['jenkel'],
        //     'no_hp' => $input['no_hp'],
        //     'tgl_lahir' => $input['tgl_lahir'],
        //     'alamat' => $input['alamat'],
        //     'foto' => $input['foto'],
        // ]);
    }
}
