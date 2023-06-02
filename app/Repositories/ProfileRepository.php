<?php

namespace App\Repositories;

use App\Models\Admin;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileRepository
{
    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Admin $admin [explicite description]
     *
     * @return Admin
     * @throws Exception
     */
    public function update(array $data, Admin $admin): Admin
    {
        // dd($data);
        $password = $data['password'];
        $savedata = [
            'name'          => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'phone_number'  => $data['phone_number'],
            'mobile_number' => $data['mobile_number'],
            'type'          => $data['type'],
            'status'        => $data['status'],
        ];
        
        if (isset($password)) {
            $savedata['password'] = Hash::make($password);
        }
        // dd($savedata);
        $admin->update($savedata);
        
        return $admin;
        // if(  )
        // {
        // }

        throw new Exception('Admin update failed.');
    }

}

