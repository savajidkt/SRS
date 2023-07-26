<?php
$maxLength = 0;
$attendee_id = $courseAttendeesList->id;
$target_attendee_id = $courseAttendeesList->id;

$scores = [];
$raw_scores = [];
$categories = [1 => 'Emotive', 2 => 'Assertive', 3 => 'Persuasive', 4 => 'Listening', 5 => 'Trusting', 6 => 'Inspiring', 7 => 'Knowing Self'];
$styles = [1 => 'emotive', 2 => 'assertive', 3 => 'persuative', 4 => 'listening', 5 => 'trusting', 6 => 'inspiring', 7 => 'knowing_self'];

$attendee_name = $courseAttendeesList->first_name . ' ' . $courseAttendeesList->last_name;

$key = 'ATTENDEE';
$data = 1;
foreach ($courseAttendeesList->questionnaireanser as $key1 => $value) {
    $index = $data % 7;
    if ($index == 0) {
        $index = 7;
    }

    if ($data == 8) {
        $data = 1;
    }

    if (!isset($scores[$key][$data])) {
        $scores[$key][$data] = 0;
    }

    if (!isset($raw_scores[$key][$value->question_id])) {
        $scores[$key][$data] += $value->answer;
        $raw_scores[$key][$value->question_id] = $value->answer;
        $data++;
    }
}

$result = DB::select("SELECT * FROM attendee_referens AS AR LEFT JOIN (SELECT * FROM (SELECT * FROM questionnaire_answers ORDER BY id DESC) AS A GROUP BY contact_id,question_id ORDER BY id ASC) AS MF ON AR.id = MF.contact_id WHERE AR.attendees_id=? AND AR.questionnaire_filled ='YES' ORDER BY MF.id ASC", [$attendee_id]);

$data = 1;
$questionCount = 1;
$previousKey = [];

foreach ($result as $key1 => $value) {
   
    $key = $value->first_name . ' ' . $value->last_name;
    $index = $data % 7;

    if ($data == 8) {
        $data = 1;
    }

    if ($questionCount == 36) {
        $questionCount = 1;
    }
    if ($questionCount == 1) {
        if (in_array($key, $previousKey)) {
            unset($previousKey[array_search($key, $previousKey)]);
        } else {
            $previousKey[] = $key;
        }
    }

    if (!isset($scores[$key][$data])) {
        $scores[$key][$data] = 0;
    }

    if (in_array($key, $previousKey)) {
        if (!isset($raw_scores[$key][$value->question_id])) {
            $scores[$key][$data] += $value->answer;
            $raw_scores[$key][$value->question_id] = $value->answer;
        }
    }

    $questionCount++;
    $data++;
}

$score_averages = [];

foreach ($scores as $name => $score) {
    if ($name != 'ATTENDEE') {
        for ($i = 1; $i <= 7; $i++) {
            $score_averages[$i] = $score[$i];
        }
    }
}

if (count($scores) > 1) {
    for ($i = 1; $i <= 7; $i++) {
        $score_averages[$i] = number_format($score_averages[$i] / (count($scores) - 1), 2);
    }
}

$categories_text = '';
$sep = '';
$nameArray = [];
foreach ($categories as $id => $name) {
    $nameArray[] = $name;
}

/* pChart library inclusions */
@include 'app/Libraries/pChart/classes/pData.class.php';
@include 'app/Libraries/pChart/classes/pDraw.class.php';
@include 'app/Libraries/pChart/classes/pRadar.class.php';
@include 'app/Libraries/pChart/classes/pImage.class.php';

$gData = [];
foreach ($scores as $name => $score) {
    if ($name == 'ATTENDEE') {
        $title = 'Your Score';
    } else {
        $title = $name;
    }

    $graphData = [];
    for ($i = 1; $i <= count($scores[$name]); $i++) {
        $graphData[$i] = $scores[$name][$i];
    }

    $gData['data'][] = $graphData;
    $gData['title'][] = ucwords($title);
}

generateGraph($target_attendee_id . '_all_result.png', $nameArray, $gData);
generateGraph($target_attendee_id . '_compare_with_average.png', $nameArray, $scores['ATTENDEE'], $score_averages, 'Average Score of Others');

$extraCharts = [];
foreach ($scores as $name => $score) {
    if ($name == 'ATTENDEE') {
        continue;
    }
    $extraCharts['name'][] = $name;
    $imgName = $target_attendee_id . '_' . str_replace(' ', '-', $name) . '.png';
    $extraCharts['image'][] = $imgName;    
    generateGraph($imgName, $nameArray, $scores['ATTENDEE'], $scores[$name], $name);
}




?>




<html>

<head>
    <style type="text/css" media="all">
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }

        @page {
            margin: 0cm !important;
        }

        #header,
        #footer {
            position: fixed;
            left: 0;
            right: 0;
            color: #aaa;
            font-size: 0.9em;
        }

        #footer p {
            margin: 0;
        }

        #footer {
            margin: 0 !important;
            padding: 0 !important;
        }

        #header {
            top: 0;
            border-bottom: 0.1pt solid #aaa;
        }

        #footer {
            bottom: 8px;
            border-top: 0.1pt solid #aaa;
        }

        #header table,
        #footer table {
            border-collapse: collapse;
            border: none;
        }

        .page-number {
            text-align: center;
        }

        .page-number:before {
            content: "Page "counter(page);
        }

        hr {
            page-break-after: always;
            border: 0;
        }

        body {
            font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
        }

        .purpletext {
            color: #000;
        }

        table {
            border-collapse: collapse;
        }

        table form {
            margin: 0;
        }

        body {
            background: #FFF;
        }

        .table {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .table th {
            border-color: transparent;
        }

        .table th.bottom-border {
            border-bottom-color: #000000;
        }

        .border-table th {
            border-color: #000000;
        }

        .table td,
        .table th {
            /* border-color: transparent; */
            padding: 11px 12px 10px;
            line-height: 21px;
        }

        .table td,
        .table th {
            /* border-color: transparent; */
            padding: 11px 12px 10px;
            line-height: 21px;
        }

        .question_table {
            border-collapse: collapse;
            border-spacing: 0px;
            width: 90%;
            margin-top: 3px;
            background: #FFF;
        }

        .question_table td,
        .question_table th {
            padding: 1px 7px 3px;
            line-height: 17px;
        }

        .table th {
            cursor: default;
        }

        .table tbody tr:hover td,
        .table tbody tr:hover th {
            cursor: pointer;
            background-image: url("../img/shadows/b10.png");
            background-color: transparent !important;
        }

        .table tbody tr.success td {
            background-color: #4d9b4d;
        }

        .table tbody tr.error td {
            background-color: #b9423e;
        }

        .table tbody tr.warning td {
            background-color: #d38e2c;
        }

        .table tbody tr.info td {
            background-color: #3e95ae;
        }

        .emotive {
            background-color: #ff0000;
        }

        .assertive {
            background-color: #ff9900;
        }

        .persuative {
            background-color: #ffff00;
        }

        .listening {
            background-color: #339966;
        }

        .trusting {
            background-color: #00ccff;
        }

        .inspiring {
            background-color: #3366ff;
        }

        .knowing_self {
            background-color: #ff00ff;
        }

        .table .actions {
            text-align: right;
        }

        .table .actions button {
            visibility: hidden;
            background: none;
            border: 0;
            color: #999999;
        }

        .table .actions button:hover {
            color: #ef4723;
        }

        .table a {
            color: #7e838b;
            text-decoration: none;
        }

        .title {
            font-weight: bold;
            color: #000066;
            text-align: center;
            width: 640px;
        }

        .graph-title {
            text-align: center;
            font-weight: bold;
            color: black;
            font-size: 20px;
            margin-top: 10px;
        }

        .attendy-name {
            text-align: center;
            font-weight: bold;
            color: #000066;
        }

        .sep50 {
            clear: both;
            height: 50px;
        }

        .graph-sep {
            height: 200px;
            clear: both;
        }

        .clear {
            clear: both;
        }

        .border {
            padding: 15px;
            border: 2px solid #000000;
            width: 640px;
        }

        .graph {
            margin: 0px;
            marin-left: 50px;
        }

        #main {
            padding: 0px;
            width: 640px;
            text-align: left;
            float: left;
            font-size: 120%;
            margin-top: -10px;
            margin: 0px;
        }

        table.page_header {
            width: 100%;
            border-collapse: collapse;
            background-color: #FFF;
        }

        table.page_footer {
            width: 100%;
            border-collapse: collapse;
            background-color: #FFF;
        }

        div.note {
            border: solid 1mm #DDDDDD;
            background-color: #EEEEEE;
            padding: 1mm;
            border-radius: 2mm;
            width: 100%;
        }

        ul.main {
            width: 95%;
            list-style-type: square;
        }

        ul.main li {
            padding-bottom: 2mm;
        }

        h1 {
            text-align: center;
            font-size: 14mm;
            color: #000066;
        }

        h3 {
            text-align: center;
            font-size: 11mm;
            color: #000066;
            text-transform: capitalize;
        }

        h1.title {
            text-align: center;
            font-size: 14mm
        }

        h3.attendy-name {
            text-align: center;
            font-size: 11mm
        }

        h3.graph-title {
            text-align: center;
            font-weight: bold;
            color: black;
            margin-top: 10px;
            font-size: 6mm;
        }

        .page_break {
            page-break-before: always;
        }

        footer {
            position: fixed;
            bottom: -56px;
            left: 0px;
            right: 0px;
            height: 50px;

        }
    </style>
</head>

<body>
    <div id="header">
        <table class="page_header" border="1" bordercolor="#000066">
            <tr>
                <td style="width: 70%; text-align: left;font-size:5mm; color:#000066; padding:10px; border-right:none;">
                    <?php
                    $messgeTemplate = getEmailTemplatesByID(17);
                    $header_text = '';
                    if ($messgeTemplate) {
                        $paramArr = [];
                        $header_text = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
                    }
                    echo $header_text;
                    ?>
                </td>
                <td style="width: 30%; text-align:right;border-left:none;color:#000066;">
                    <img src="{{ url("/public/images/srs_logo2.gif") }}" />
                </td>
            </tr>
        </table>
    </div>
    <footer id="footer">
        <table class="page_footer" border="1" bordercolor="#000066">
            <tr>
                <td style="width: 100%; text-align: left;color:#000066;padding:10px;">
                    <table border="0" width="100%">
                        <tr>
                            <td style="width: 80%; text-align: left;color:#000066" valign="middle">


                                <?php
                                $messgeTemplate = getEmailTemplatesByID(18);
                              
                                $footer_text = '';
                                if ($messgeTemplate) {
                                    $paramArr = ['year' => date('Y')];
                                    $footer_text = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
                                }
                                echo $footer_text; 
                                ?>


                            </td>
                            <td valign="middle" style="width:20%;text-align: right;color:#000066">
                                <div class="page-number pagenum"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </footer>
   
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1>Influencing Spectrum Results<br />
        <span align="center">For</span><br />
        <?php echo ucfirst($attendee_name); ?>
    </h1>
    <br><br><br><br><br><br><br><br>
    <div style="text-align: center; width: 100%;">
        <br>
        <img src="{{ url("/public/images/report.png") }}" />
        
        <br>
    </div>
    <div class="page_break"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div align="center" class="note">
        <h3 class="graph-title">Your Influencing Spectrum - All Results</h3><br /><br />
        <?php            
        $image_all_result = url("/storage/app/public/pdf/{$target_attendee_id}_compare_with_average.png");
        ?>
        <img src="<?php echo $image_all_result; ?>" />
    </div>
    <div class="page_break"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>

    <div align="center" class="note">
        <h3 class="graph-title">Your Influencing Spectrum - Comparison with Average score of others</h3><br /><br />
         <?php            
        $image_compare_with_average = url("/storage/app/public/pdf/{$target_attendee_id}_all_result.png");
        ?>
        <img src="<?php echo $image_compare_with_average; ?>" />
    </div>

    <div class="page_break"></div>
    <br><br><br><br><br><br><br><br>
    <h3 class="attendy-name">Your Influencing Spectrum <br /> <?php echo $attendee_name; ?></h3>
    <br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <table class="table table2 border-table" align="center" border="1" style="font-size:21px;">
        <thead>
            <tr style="padding-top:40px">
                <th style="width:6%"><b>Names:</b></th>

                <th width="10" style="padding-bottom: 10px;padding-right:0px;" align="left" valign="bottom"><img
                        src="<?php echo loadImage('Your Score', 'text=Your*Score&whitebg=1&font=22'); ?>" /></th>
                <?php
                foreach ($scores as $name => $score) {
                    if ($name != 'ATTENDEE') {
                        echo " <th width='10' style=\"padding-bottom: 10px;padding-right:0px\" align=\"left\" valign=\"bottom\"> " . ' <img src="' . loadImage($name, 'text=' . str_replace(' ', '*', $name) . '&whitebg=1&font=22') . '" /></th>';
                    }
                }
                ?>
                <th style="width:15%">
                    <p> Average Of Others </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($index = 1; $index <= 7; $index++) {
                    ?>
            <tr class="<?php echo $styles[$index]; ?>">
                <td class=""><?php echo $categories[$index]; ?></td>
                <td class=""><?php echo $scores['ATTENDEE'][$index]; ?></td>
                <?php
                foreach ($scores as $name => $score) {
                    if ($name != 'ATTENDEE') {
                        echo ' <td>' . $scores[$name][$index] . '</td> ';
                    }
                }
                ?>
                <td align="center"><?php echo $score_averages[$index]; ?></td>
            </tr>

            </div>
            <?php } ?>
        </tbody>
    </table>
     
    <br><br><br><br><br>
    <?php for ($i = 0; $i < count($extraCharts['image']); $i++) { ?>
    <div class="page_break"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div align="center" class="note">
        <h3 class="graph-title">Your Influencing Spectrum - Comparison with <?php echo $extraCharts['name'][$i]; ?></h3>
        <br /><br />
          <?php            
        $image_compare_with = url("/storage/app/public/pdf/{$extraCharts['image'][$i]}");
        ?>
        <img src="<?php echo $image_compare_with; ?>" />
    </div>
    <?php } ?>
    <div class="page_break"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <h3 class="attendy-name">Your Influencing Spectrum <br /> <?php echo $attendee_name; ?></h3>
    <div
        style="text-align: center;width: 250px;margin: 20px auto 20px 240px; padding-top:5px; padding-bottom:3px; padding-left:10px;color: #FFF; background-color:#800080; font-weight:bold;">
        <b>2 = VERY like you </b><br>
        <b>1 = QUITE like you </b><br>
        <b>0 = NOT like you</b>
    </div>
    <table class="table question_table" style="width: 99%; margin-top: 1em;" border="1" align="center">
        <thead>
            <tr valign="bottom">
                <th width="1" class="bottom-border" style="padding-right:0px"></th>
                <th width="250" class="bottom-border"></th>
                <th width="10" class="bottom-border" style="padding-bottom: 10px;padding-right:0px;" align="left"
                    valign="bottom"><img src="<?php echo loadImage('Your Score', 'text=Your*Score&whitebg=0&font=22'); ?>" />
                </th>
                <?php
                foreach ($scores as $name => $score) {
                    if ($name != 'ATTENDEE') {
                        echo " <th width='10' class='bottom-border' style=\"padding-bottom: 10px;padding-right:0px\" align=\"left\" valign=\"bottom\">" . '<img src="' . loadImage($name, 'text=' . str_replace(' ', '*', $name) . '&whitebg=1') . '" /></th>';
                    }
                }
                ?>
            </tr>
        </thead>
        <tfoot>
            <tr height="<?php echo $maxLength * 5; ?>">
                <?php
                foreach ($scores as $name => $score) {
                    if ($name != 'ATTENDEE') {
                        echo '<th></th>';
                    }
                }
                ?>
            </tr>
        </tfoot>
        <tbody>
            <?php
                $results = getQuestions(0, 15);
                $k = 1;
                $questionWidth = 500 - ((count($scores) * 30) + 40);
                foreach ($results as $key1 => $result) {


                    $index = $result->id % 7;
                    if ($index == 0) {
                        $index = 7;
                    }
                    ?>
            <tr>
                <td class="<?php echo $styles[$index]; ?>" width="1"><?php
                echo $k;
                $k++;
                ?></td>
                <td width="<?php echo $questionWidth; ?>" style="font-size:12px;" class="purpletext">
                    <?php echo $result->question; ?></td>
                <td width="10" style="padding-right:0px" align="center">
                    <?php echo $raw_scores['ATTENDEE'][$result->id]; ?></td>
                <?php
                foreach ($scores as $name => $score) {
                    if ($raw_scores[$name][$result->id] == '') {
                        $raw_scores[$name][$result->id] = 0;
                    }
                    if ($name != 'ATTENDEE') {
                        echo " <td width='10' style=\"padding-right:0px\" align='center'>" . $raw_scores[$name][$result->id] . '</td> ';
                    }
                }
                ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <div class="page_break"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <div class="sep50"></div>
    <table class="table question_table" style="width: 99%; margin-top: 1em;" border="1" align="center">
        <thead>
            <tr valign="bottom">
                <th width="1" class="bottom-border" style="padding-right:0px"></th>
                <th width="250" class="bottom-border"></th>
                <th width="10" class="bottom-border" style="padding-bottom: 10px;padding-right:0px;"
                    align="left" valign="bottom"><img src="<?php echo loadImage('Your Score', 'text=Your*Score&whitebg=0&font=22'); ?>" />
                </th>
                <?php
                foreach ($scores as $name => $score) {
                    if ($name != 'ATTENDEE') {
                        echo " <th width='10' class='bottom-border' style=\"padding-bottom: 10px;padding-right:0px\" align=\"left\" valign=\"bottom\">" . '<img src="' . loadImage($name, 'text=' . str_replace(' ', '*', $name) . '&whitebg=1') . '" /></th>';
                    }
                }
                ?>
            </tr>
        </thead>
        <tfoot>
            <tr height="<?php echo $maxLength * 5; ?>">
                <?php
                foreach ($scores as $name => $score) {
                    if ($name != 'ATTENDEE') {
                        echo '<th></th>';
                    }
                }
                ?>
            </tr>
        </tfoot>
        <tbody>
            <?php
            echo "<pre>";
                $results = getQuestions(15, 20);
               
                $questionWidth = 500 - ((count($scores) * 30) + 40);
                foreach ($results as $key1 => $result) {

                    

                    $index = $result->id % 7;
                    if ($index == 0) {
                        $index = 7;
                    }
                    ?>
            <tr>
                <td class="<?php echo $styles[$index]; ?>" width="1"><?php
                echo $k;
                $k++;
                ?></td>
                <td width="<?php echo $questionWidth; ?>" style="font-size:12px;" class="purpletext">
                    <?php echo $result->question; ?>
                </td>
                <td width="10" style="padding-right:0px" align="center">
                     @if (array_key_exists($result->id,$raw_scores['ATTENDEE']))
                     <?php echo $raw_scores['ATTENDEE'][$result->id]; ?></td>
                     @else
                     <?php echo '0'; ?></td>
                     @endif
                    
                <?php
                foreach ($scores as $name => $score) {

                 //   if ($raw_scores[$name][$result->id] == '') {
                        if (!array_key_exists($result->id,$raw_scores['ATTENDEE'])){
                        $raw_scores[$name][$result->id] = 0;
                    }
                    if ($name != 'ATTENDEE') {
                        echo " <td width='10' style=\"padding-right:0px\" align='center'>" . $raw_scores[$name][$result->id] . '</td> ';
                    }
                }
                ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
