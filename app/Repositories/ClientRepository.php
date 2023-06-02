<?php
namespace App\Repositories;
use App\Exceptions\GeneralException;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return User
     */
    public function create(array $data): User
    {
        $data = [
            'company_name'    => $data['company_name'],
            'address_one'     => $data['address_one'],
            'address_tow'    => $data['address_tow'],
            'town'     => $data['town'],
            'country'     => $data['country'],
            'post_code'         => $data['post_code'],
            'notes'         => $data['notes'],
            'first_name'         => $data['first_name'],
            'last_name'         => $data['last_name'],
            'phone_number'         => $data['phone_number'],
            'mobile_number'         => $data['mobile_number'],
            'email'         => $data['email'],
            'job_title'         => $data['job_title'],
        ];

        $user =  User::create($data);
        return $user;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Company $company [explicite description]
     *
     * @return Company
     * @throws GeneralException
     */
    public function update(array $data, Company $company): Company
    {
        $data = [
            'name'    => $data['name'],
        ];

        if( $company->update($data) )
        {
            return $company;
        }

        throw new GeneralException('Company update failed.');
    }

    /**
     * Method delete
     *
     * @param Company $company [explicite description]
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(Company $company): bool
    {
        if( $company->delete() )
        {
            return true;
        }

        throw new GeneralException('Company delete failed.');
    }


    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Company $company): bool
    {
        $company->status = !$input['status'];
        return $company->save();
    }

    /**
     * Method getCompany
     *
     * @return Collection
     */
    public function getCompany(): Collection
    {
        return Company::all();
    }


}