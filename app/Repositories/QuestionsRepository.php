<?php
namespace App\Repositories;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Questions;

class QuestionsRepository
{
    
    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Questions $questions [explicite description]
     *
     * @return Questions
     * @throws Exception
     */
    public function update(array $data, Questions $question): Questions
    {
        // dd($data);
        $data = [
            'question'    => $data['question'],
        ];

        if( $question->update($data) )
        {
            return $question;
        }

        throw new GeneralException('Question update failed.');

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