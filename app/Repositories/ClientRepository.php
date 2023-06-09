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
        $clientData = [
            'company_name'    => $data['company_name'],
            'address_one'     => $data['address_one'],
            'address_tow'       => $data['address_tow'],
            'town'       => $data['town'],
            'country'       => $data['country'],
            'post_code'       => $data['post_code'],
            'notes'       => $data['notes'],
        ];
        $client = Client::create($clientData);

        foreach ($data['invoice'] as $key => $invoice) 
        {         
            $invoiceArr = [
                'first_name'    => $invoice['first_name'],
                'last_name'    => $invoice['last_name'],
                'phone_number'    => $invoice['phone_number'],
                'mobile_number'    => $invoice['mobile_number'],
                'email'    => $invoice['email'],
                'job_title'    => $invoice['job_title'],
            ];

            $client->contacts()->save(new ClientContact($invoiceArr));
        }
        return $client;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Client $client [explicite description]
     *
     * @return Client
     * @throws Exception
     */
    public function update(array $data, Client $client): Client
    {
 
        $clientData = [
            'company_name'    => $data['company_name'],
            'address_one'     => $data['address_one'],
            'address_tow'       => $data['address_tow'],
            'town'       => $data['town'],
            'country'       => $data['country'],
            'post_code'       => $data['post_code'],
            'notes'       => $data['notes'],
        ];

        if ($client->update($clientData)) {
            $client->contacts()->delete();
            foreach ($data['invoice'] as $key => $invoice) {
                $invoiceArr = [
                    'first_name'    => $invoice['first_name'],
                    'last_name'    => $invoice['last_name'],
                    'phone_number'    => $invoice['phone_number'],
                    'mobile_number'    => $invoice['mobile_number'],
                    'email'    => $invoice['email'],
                    'job_title'    => $invoice['job_title'],
                ];

                $client->contacts()->save(new ClientContact($invoiceArr));
            }

            return $client;
        }

        throw new Exception('Client update failed.');
    }

    /**
     * Method delete
     *
     * @param Client $client [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Client $client): bool
    {
        if ($client->delete()) {
            return true;
        }

        throw new Exception('ClientClient delete failed.');
    }


}