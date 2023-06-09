<?php
namespace App\Repositories;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Collection;
use App\Models\AttendeeQuestions;

class AttendeequestionsRepository
{
    
    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param AttendeeQuestions $attendeeQuestions [explicite description]
     *
     * @return AttendeeQuestions
     * @throws Exception
     */
    public function update(array $data, AttendeeQuestions $attendee): AttendeeQuestions
    {
       
        $data = [
            'question'    => $data['question'],
            'category_id'    => $data['category_id'],
        ];

        if( $attendee->update($data) )
        {
            return $attendee;
        }

        throw new GeneralException('AttendeeQuestion update failed.');

        // throw new Exception('AttendeeQuestion update failed.');
    }

    /**
     * Method delete
     *
     * @param Client $client [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    // public function delete(Client $client): bool
    // {
    //     if ($client->delete()) {
    //         return true;
    //     }

    //     throw new Exception('ClientClient delete failed.');
    // }


}