<?php

namespace App\Repositories;

use App\Models\EmailTemplate;
use Exception;

class TemplateManagerRepository
{


    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param EmailTemplate $templatemanager [explicite description]
     *
     * @return EmailTemplate
     * @throws Exception
     */
    public function update(array $data, EmailTemplate $templatemanager): EmailTemplate
    {
        $dataUpdate = [
            'template_name'    => $data['template_name'],
            'subject'    => $data['subject'],
            'template'     => $data['template'],
        ];

        if ($templatemanager->update($dataUpdate)) {
            return $templatemanager;
        }

        throw new Exception('Email Template update failed!');
    }

    public function updateHelp(array $data, EmailTemplate $templatemanager): EmailTemplate
    {
        $dataUpdate = [
            'name'    => $data['name'],
            'template'     => $data['template'],
        ];

        if ($templatemanager->update($dataUpdate)) {
            return $templatemanager;
        }

        throw new Exception('Email Template update failed!');
    }

    public function updateTemplate(array $data, EmailTemplate $templatemanager): EmailTemplate
    {
        $dataUpdate = [
            'name'    => $data['name'],
            'template'     => $data['template'],
        ];

        if ($templatemanager->update($dataUpdate)) {
            return $templatemanager;
        }

        throw new Exception('Email Template update failed!');
    }
    public function updateMessage(array $data, EmailTemplate $templatemanager): EmailTemplate
    {
        $dataUpdate = [
            'name'    => $data['name'],
            'template'     => $data['template'],
        ];

        if ($templatemanager->update($dataUpdate)) {
            return $templatemanager;
        }

        throw new Exception('Email Template update failed!');
    }
}
