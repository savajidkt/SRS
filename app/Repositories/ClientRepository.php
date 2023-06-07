<?php
namespace App\Repositories;
use App\Exceptions\GeneralException;
use App\Models\Company;
use App\Models\ClientContact;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Client;

class ClientRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Client
     */
    public function create(array $data): Client
    {
        dd($data);
        $clientData = [
            'company_name'    => $data['company_name'],
            'address_one'     => $data['address_one'],
            'address_tow'       => $data['address_tow'],
            'town'       => $data['address_tow'],
            'country'       => $data['address_tow'],
            'post_code'       => $data['address_tow'],
            'notes'       => $data['address_tow'],
        ];
        // $contact = Client::create($clientData);

        // foreach($books as $book)
        // {
        //     if(!empty($book))
        //     {
        //         $data[] =[
        //             'name' => $book,
        //             'user_id' => Auth::id(),
        //            ];                 

        //     }
        // }
        // Book::insert($data);

        foreach ($data['first_name'] as $key => $option) 
        {
            dd($option);            
            $optionArr = [
                'option'    => $option
            ];

            $contact->options()->save(new ClientContact($optionArr));
        }
        return $contact;
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