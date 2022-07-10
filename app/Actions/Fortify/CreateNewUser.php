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
        Validator::make($input, [
            'no_ktp' => ['required', 'numeric', 'digits:16', 'unique:users'],
            'nama' => ['required', 'alpha'],
            'no_hp' => ['required', 'numeric', 'min:9'],
            'tgl_lahir' => ['required', 'date', 'before:-17 years'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'foto' => ['mimes:jpg,jpeg,png'],
            'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        if ($input['role'] == "Pelanggan") {
            $o = "0";
            $data = new Pelanggan;
            $data->nama_pelanggan = $input['nama'];
            $data->noktp_pelanggan = $input['no_ktp'];
            $data->alamat_pelanggan = $input['alamat'];
            $data->tgllahir_pelanggan = $input['tgl_lahir'];
            $data->nohp_pelanggan = $input['no_hp'];
            $data->jenkel_pelanggan = $input['jenkel'];

            $image = $input['foto'];

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $input['foto']->move('userimage', $imagename);

            $data->foto_pelanggan = $imagename;
            $data->save();

            // Pelanggan::create([
            //     'nama_pelanggan' => $input['nama'],
            //     'noktp_pelanggan' => $input['no_ktp'],
            //     'alamat_pelanggan' => $input['alamat'],
            //     'tgllahir_pelanggan' => $input['tgl_lahir'],
            //     'nohp_pelanggan' => $input['no_hp'],
            //     'foto_pelanggan' => $input['foto'],
            //     'jenkel_pelanggan' => $input['jenkel'],
            // ]);
            return User::create([
                'email' => $input['email'],
                'role' => $input['role'],
                'usertype' => $o,
                'password' => Hash::make($input['password']),
                'no_ktp' => $input['no_ktp'],

            ]);
        } else {
            $o = "1";
            $data = new Pembudidaya;
            $data->nama_pembudidaya = $input['nama'];
            $data->noktp_pembudidaya = $input['no_ktp'];
            $data->alamat_pembudidaya = $input['alamat'];
            $data->tgllahir_pembudidaya = $input['tgl_lahir'];
            $data->nohp_pembudidaya = $input['no_hp'];
            $data->jenkel_pembudidaya = $input['jenkel'];

            $image = $input['foto'];

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $input['foto']->move('userimage', $imagename);

            $data->foto_pembudidaya = $imagename;
            $data->save();
            // Pembudidaya::create([
            //     'nama_pembudidaya' => $input['nama'],
            //     'noktp_pembudidaya' => $input['no_ktp'],
            //     'alamat_pembudidaya' => $input['alamat'],
            //     'tgllahir_pembudidaya' => $input['tgl_lahir'],
            //     'nohp_pembudidaya' => $input['no_hp'],
            //     'foto_pembudidaya' => $input['foto'],
            //     'jenkel_pembudidaya' => $input['jenkel'],
            // ]);
            return User::create([
                'email' => $input['email'],
                'role' => $input['role'],
                'usertype' => $o,
                'password' => Hash::make($input['password']),
                'no_ktp' => $input['no_ktp'],

            ]);
            return redirect('/');
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
        return redirect('/');
    }
}
