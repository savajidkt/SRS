<?php

use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;

if (!function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        return 'dashboard';
    }
}

// Global helpers file with misc functions.
if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}


if (!function_exists('common')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function common()
    {
        return app('common');
    }
}

if (!function_exists('report_multiple_by_100')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function report_multiple_by_100($value, $isNotRound = 1)
    {
        return $isNotRound ? $value * 100 : round($value * 100);
    }
}
if (!function_exists('is_login_check')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function is_login_check()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    }
}


if (!function_exists('getEmailTemplatesByID')) {
    /**
     * getEmailTemplatesByID return email templates lists
     */
    function getEmailTemplatesByID($id)
    {
        return EmailTemplate::where('id', $id)->where('status', 1)->first();
    }
}

if (!function_exists('replaceHTMLBodyWithParam')) {
    /**
     * replaceHTMLBodyWithParam replace string
     */
    function replaceHTMLBodyWithParam($emailTemplate, $paramArr)
    {
        foreach ($paramArr as $key => $value) {
            $emailTemplate = str_replace("{" . $key . "}", $value, $emailTemplate);
            //$subject = str_replace("{" . $key . "}", $value, $subject);
        }
        return $emailTemplate;
    }
}

if (!function_exists('dateFormat')) {
    /**
     * numberFormat return number with two decimals
     */
    function dateFormat($date, $format = NULL)
    {
        if ($format) {
            return date($format, strtotime($date));
        } else {
            return date("d/m/Y", strtotime($date));
        }
    }
}




if (!function_exists('getBackgroudColorByStatus')) {

    function getBackgroudColorByStatus($attendees)
    {
        if (!$attendees->questionnaireself) {
            return false;
        }
        if ($attendees->referraluser->count() > 0) {
            foreach ($attendees->referraluser as $key => $referraluser) {
                if (!$referraluser->referralusers) {
                    return false;
                }
            }
        }
        return true;
    }
}
