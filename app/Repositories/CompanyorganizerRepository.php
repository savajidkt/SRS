<?php
namespace App\Repositories;
use App\Exceptions\GeneralException;
use App\Models\CompanyOrganizer;
use Illuminate\Database\Eloquent\Collection;
use App\Mail\CompanyOrganizerMail;
use Illuminate\Support\Facades\Mail;

class CompanyorganizerRepository
{

    // public function sendMail()
    // {
    //     $data = ['name'=>"jaydip"];
    //     $user['to'] ='jj.parejiya@gmail.com';
    //     Mail::send('mail.mail',$data,function($messages)use ($user){
    //         $messages->to('jj.parejiya@gmail.com');
    //         $messages->Subject('hellow world');
    //     });
    // }
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return CompanyOrganizer
     */
    public function create(array $data): CompanyOrganizer
    {
        $data = [
            'course_id'    => $data['course_id'],
            'first_name'    => $data['first_name'],
            'last_name'    => $data['last_name'],
            'email'    => $data['email'],
            
        ];
       
        Mail::to($data['email'])->send(new CompanyOrganizerMail($data));

        return CompanyOrganizer::create($data);
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param CompanyOrganizer $client [explicite description]
     *
     * @return CompanyOrganizer
     * @throws Exception
     */
    // public function update(array $data, CompanyOrganizer $client): CompanyOrganizer
    // {
 
    //     $clientData = [
    //         'company_name'    => $data['company_name'],
    //         'address_one'     => $data['address_one'],
    //         'address_tow'       => $data['address_tow'],
    //         'town'       => $data['town'],
    //         'country'       => $data['country'],
    //         'post_code'       => $data['post_code'],
    //         'notes'       => $data['notes'],
    //     ];

    //     if ($client->update($clientData)) {
    //         $client->contacts()->delete();
    //         foreach ($data['invoice'] as $key => $invoice) {
    //             $invoiceArr = [
    //                 'first_name'    => $invoice['first_name'],
    //                 'last_name'    => $invoice['last_name'],
    //                 'phone_number'    => $invoice['phone_number'],
    //                 'mobile_number'    => $invoice['mobile_number'],
    //                 'email'    => $invoice['email'],
    //                 'job_title'    => $invoice['job_title'],
    //             ];

    //             $client->contacts()->save(new ClientContact($invoiceArr));
    //         }

    //         return $client;
    //     }

    //     throw new Exception('Client update failed.');
    // }


}