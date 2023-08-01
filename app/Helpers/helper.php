<?php



use Carbon\Carbon;

use App\Models\Questions;

use App\Models\EmailTemplate;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



if (! function_exists('home_route')) {

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

if (! function_exists('app_name')) {

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





if (! function_exists('common')) {

    /**

     * Access (lol) the Access:: facade as a simple function.

     */

    function common()

    {

        return app('common');

    }

}



if (! function_exists('report_multiple_by_100')) {

    /**

     * Access (lol) the Access:: facade as a simple function.

     */

    function report_multiple_by_100($value, $isNotRound = 1)

    {

        return $isNotRound ? $value*100 : round($value*100);

    }

}

if (! function_exists('is_login_check')) {

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



if (!function_exists('getEmailTemplatesHeaderFooter')) {

    /**

     * getEmailTemplatesByID return email templates lists

     */

    function getEmailTemplatesHeaderFooter()

    {



        $returnArr = [];

        $header = EmailTemplate::where('id', 17)->where('status', 1)->first();

        if($header){

            $returnArr['header'] = $header->template;

        }

        

        $footer = EmailTemplate::where('id', 18)->where('status', 1)->first();

        if($footer){

            $returnArr['footer'] = replaceHTMLBodyWithParam($footer->template, array('year' => date('Y')));       

        }

        return $returnArr;

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



if (!function_exists('enableReportButton')) {



    function enableReportButton($attendees)

    {

        if (!$attendees->questionnaireself) {

            return false;

        }

        if ($attendees->referraluser->count() > 0) {

            foreach ($attendees->referraluser as $key => $referraluser) {                

                if ($referraluser->referralusers) {

                    return true;

                }

            }

        }

        return false;

    }

}





/***

 * Report Function

 */



function loadImage($imageName, $queryString)

{

    



    $fileName = str_replace(' ', '', $imageName) . '_rotate_w.png';

    

    if (Storage::disk('pdf')->exists('22_' . $fileName)) {

        return  url("/storage/app/public/pdf/22_{$fileName}");

    } else {

        createImage($imageName, $queryString);

        return  url("/storage/app/public/pdf/22_{$fileName}");

    }

}



function createImage($string, $queryString)

{



    if (strstr($queryString, "whitebg=1"))

        $fileName = str_replace(" ", "", $string) . "_rotate_w.png";

    else

        $fileName = str_replace(" ", "", $string) . "_rotate.png";



    if (strstr($queryString, "font=")) {

        $fileName = "22_" . $fileName;

        $font = 14;

    } else

        $font   = 12;



    $string = ucwords($string);



    $width  = (ImageFontWidth($font) * strlen($string)) + 0;

    $height = ImageFontHeight($font);



    $im = @imagecreate($width, $height);

    if (strstr($queryString, "whitebg=1"))

        $background_color = imagecolorallocate($im, 255, 255, 255); //white background

    else

        $background_color = imagecolorallocate($im, 204, 255, 255); //white background



    $text_color = imagecolorallocate($im, 0, 0, 0); //black text

    imagealphablending($im, true);



    $black = imagecolorallocate($im, 0, 0, 0);

    $fontType = 'Fonts/calibri.ttf';

    //imagettftext($im, $font, 0, 4, 14, $black, $fontType, $string);



    imagestring($im, $font, 0, 0,  $string, $text_color);



    imagepng($im, Storage::disk('pdf')->path('/') . str_replace(" ", "", $string) . ".png");



    rotateImage(Storage::disk('pdf')->path('/')."" . str_replace(" ", "", $string) . ".png", Storage::disk('pdf')->path('/')."" . $fileName, 90);



    //$src_img=imagecreatefromjpeg("temp/".$fileName);

    //imagepng($src_img);

}



function rotateImage($sourceFile, $destImageName, $degreeOfRotation)

{

    //function to rotate an image in PHP

    //developed by Roshan Bhattara (http://roshanbh.com.np)



    //get the detail of the image

    $imageinfo = getimagesize($sourceFile);

    switch ($imageinfo['mime']) {

            //create the image according to the content type

        case "image/jpg":

        case "image/jpeg":

        case "image/pjpeg": //for IE

            $src_img = imagecreatefromjpeg("$sourceFile");

            break;

        case "image/gif":

            $src_img = imagecreatefromgif("$sourceFile");

            break;

        case "image/png":

        case "image/x-png": //for IE

            $src_img = imagecreatefrompng("$sourceFile");

            break;

    }

    //rotate the image according to the spcified degree

    $src_img = imagerotate($src_img, $degreeOfRotation, 0);

    imagealphablending($src_img, true);

    //output the image to a file

    imagejpeg($src_img, $destImageName);

}



function generateGraph($imageName, $nameArray, $scores, $secondAverage = array(), $title = "")

{

    

    // Dataset definition



    $MyData = new pData();



    /* Create the X serie */



    $newNameArray[] = $nameArray[4];

    $newNameArray[] = $nameArray[3];

    $newNameArray[] = $nameArray[2];

    $newNameArray[] = $nameArray[1];

    $newNameArray[] = $nameArray[0];

    $newNameArray[] = $nameArray[6];

    $newNameArray[] = $nameArray[5];



    $serieSettings = array(array("R" => 242, "G" => 9, "B" => 9), array("R" => 0, "G" => 0, "B" => 128), array("R" => 0, "G" => 100, "B" => 0), array("R" => 160, "G" => 82, "B" => 45), array("R" => 0, "G" => 128, "B" => 128), array("R" => 218, "G" => 112, "B" => 214), array("R" => 153, "G" => 50, "B" => 204));





    if (count($secondAverage) > 0) {

        $newScore = array();



        $newScore[] = $scores[5];

        $newScore[] = $scores[4];

        $newScore[] = $scores[3];

        $newScore[] = $scores[2];

        $newScore[] = $scores[1];

        $newScore[] = $scores[7];

        $newScore[] = $scores[6];



        $MyData->addPoints($newScore, "Your Score");

        $MyData->setSerieDescription("Your Score", "Your Score");

        $MyData->setPalette("Your Score", $serieSettings[0]);



        $newScore = array();



        $newScore[] = $secondAverage[5];

        $newScore[] = $secondAverage[4];

        $newScore[] = $secondAverage[3];

        $newScore[] = $secondAverage[2];

        $newScore[] = $secondAverage[1];

        $newScore[] = $secondAverage[7];

        $newScore[] = $secondAverage[6];



        $MyData->addPoints($newScore, $title);

        $MyData->setSerieDescription($title, $title);



        $MyData->setPalette($title, $serieSettings[1]);

    } else {

        

        for ($i = 0; $i < count($scores['data']); $i++) {

            $newScore = array();



            $newScore[] = $scores['data'][$i][5];

            $newScore[] = $scores['data'][$i][4];

            $newScore[] = $scores['data'][$i][3];

            $newScore[] = $scores['data'][$i][2];

            $newScore[] = $scores['data'][$i][1];

            $newScore[] = $scores['data'][$i][7];

            $newScore[] = $scores['data'][$i][6];

          

            $MyData->addPoints($newScore, $scores['title'][$i]);

            $MyData->setSerieDescription($scores['title'][$i], $scores['title'][$i]);



            if (isset($serieSettings[$i]))

                $MyData->setPalette($scores['title'][$i], $serieSettings[$i]);

        }

    }



    $MyData->addPoints($newNameArray, "Labels");

    $MyData->setAbscissa("Labels");



    /* Create the pChart object */

    $myPictureOBJ = new pImage();

    $myPicture = $myPictureOBJ->pImage(700, 900, $MyData);



    /* Define general drawing parameters */



    



    $fontnamePath = getcwd().'/public/Fonts/calibri.ttf';

    $myPictureOBJ->setFontProperties(array("FontName" => $fontnamePath, "FontSize" => 15, "R" => 0, "G" => 0, "B" => 0));

    //$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));



    /* Create the radar object */

    $SplitChart = new pRadar();



    /* Draw the 2nd radar chart */

    $myPictureOBJ->setGraphArea(60, 30, 630, 880);



    $Options = array("Layout" => RADAR_LAYOUT_STAR, "LabelPos" => RADAR_LABELS_HORIZONTAL, "AxisRotation" => 12, "FixedMax" => 10);

    $SplitChart->drawRadar($myPictureOBJ, $MyData, $Options);



    /* Write down the legend */



    $myPictureOBJ->drawLegend(483,730, array("Style" => LEGEND_BOX, "Mode" => LEGEND_VERTICAL));



    /* Render the picture */



    $myPictureOBJ->setFontProperties(array("FontName" => "Fonts/calibri.ttf", "FontSize" => 6));

    $TextSettings = array("DrawBox" => TRUE, "R" => 0, "G" => 00, "B" => 00, "Angle" => 0, "FontSize" => 10, "BackgroundR" => 255, "BackgroundG" => 0, "BackgroundB" => 0);

    $myPictureOBJ->Render("temp/" . $imageName);

}





if (!function_exists('getQuestions')) {

    /**

     * getEmailTemplatesByID return email templates lists

     */

    function getQuestions($start,$end)

    {

        return Questions::skip($start)->take($end)->get();

    }

}


if (!function_exists('courseExpired')) {
    /**
     * getEmailTemplatesByID return email templates lists
     */
    function courseExpired($start_date, $end_date="")
    {

        $todayDate = Carbon::now()->format('d/m/Y');
      
        $date1 = Carbon::createFromFormat('d/m/Y', $todayDate);
        $date2 = Carbon::createFromFormat('d/m/Y', $start_date);

        if ($date2->gt($date1)) {
            return true;
        } else {
            return false;
        }
        return false;
    }
}
