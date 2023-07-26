<?php require('includes/config.php'); require('includes/functions.php');

//error_reporting(0);


$attendee_id = $_GET['id'];
$target_attendee_id = $_GET['id'];
$scores = array();
$raw_scores = array();

$_SESSION['image_name'] = array();

$categories = array (1=>'Having a Positive Outlook'	, 2=> 'Being Authentic'	, 3=> 'Valuing Self' , 4=> 'Having Vision'	, 5=> 'Being Politically Astute'	, 6=>'Valuing Others'	, 7 =>'Focusing on Achievement', 8 =>'Demonstrating Emotional Integrity', 9 =>'Role Modelling',10 => "Generating Engagement",11=>"Working Collaboratively",12=>"Developing Others"	);

$styles = array (1=>'category_1'	, 2=> 'category_2'	, 3=> 'category_3' , 4=> 'category_4'	, 5=> 'category_5'	, 6=>'category_6'	, 7 =>'category_7',8=>"category_8",9=>"category_9",10=>"category_10",11 => "category_11" ,12 => "category_12"	);

$sql = "SELECT * FROM course_attendees WHERE `id` ='".quote_smart($attendee_id)."';";
$result = mysql_query($sql);

$row = mysql_fetch_array($result);

extract($row);

$attendee_name = $first_name ." ".$last_name;
$key = 'ATTENDEE';
$sql = "SELECT * FROM `questionnaire_answers` WHERE attendee_id='$attendee_id' order by question_id asc "; 
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	extract($row);
	$index = ($question_id % 12) ;
	if($index == 0){
		$index  = 12;
	}	
	if(!isset($scores[$key][$index])){
		$scores[$key][$index] = 0;
	}
	$scores[$key][$index] += $answer;
	$raw_scores[$key][$question_id] = $answer;
	
}

$jobTitleArray = array();

$sql = "SELECT * FROM `sixty_contacts`  WHERE sixty_contacts.attendee_id='$attendee_id' AND sixty_contacts.questionnaire_filled ='YES'"; 
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){

	extract($row);
	if($job_title < 3 )
		$jobTitleArray[] = $job_title;
}

$jobTitleArray = array(0,1,2);

$sql = "SELECT * FROM `sixty_contacts` ,`questionnaire_answers` WHERE sixty_contacts.attendee_id='$attendee_id' AND sixty_contacts.questionnaire_filled ='YES'  AND sixty_contacts.id =`questionnaire_answers`.contact_id	 order by question_id asc"; 
$result = mysql_query($sql);

$k= 1;
$data = 1;

while($row = mysql_fetch_array($result)){

	extract($row);
	
	if($question_id > 0)
	{
		$key = $first_name." ".$last_name."_".$job_title;
		
		$index = ($data  % 12) ;
		if($index ==0){
			$index  = 12;
		}
		
		if(!isset($scores[$key][$index])){
			$scores[$key][$index] = 0;
		}
		
		$k++;
		
		/*
			if($data < 13)
				$scores[$key][$data] += $answer;	
		*/
		$scores[$key][$data] += $answer;	
		$raw_scores[$key][$question_id] = $answer;
		
		if($data > 12)
			$data = 1;
		else
			$data++;
		//$data++;
	}
}

$score_averages = array();

foreach($scores as $name=>$score){
	if($name !="ATTENDEE"){
		for($i = 1;$i<=12;$i++){
			$score_averages[$i] += $score[$i];
		}
	}
}

if(count($scores) > 1){
	for($i = 1;$i<=12;$i++){
		$score_averages[$i] = number_format($score_averages[$i]/(count($scores) - 1),2);
	}
}

$categories_text = "";
$sep = "";
$nameArray = array();

foreach($categories as $id=>$name){

	$textArray = explode(" ",$name);
	$name = "";
	for($i=0;$i<count($textArray);$i++)
	{
		$name .= $textArray[$i];
		
		if(strlen($textArray[$i+1]) > 3)
				$name .="\n";
		else	
			$name .= " ";
	}
	
	$nameArray[] = $name;
} 


// Standard inclusions   
// include("includes/pChart/pData.class");
 include("includes/pChart/pChart.class"); 
 include_once("includes/pChart/MyHorBar.class"); 
  
 $gData = array();
 $totalTitle = array();
 

for($k=0;$k<count($jobTitleArray);$k++)
{
	// $totalTitle[$jobTitleArray[$k]] = 0;
	
	 $temCounter = 0;
	 foreach($scores as $name=>$score){
			
			
			if($name =="ATTENDEE"){
				continue;
			}elseif(strstr($name,"_".$jobTitleArray[$k])){
			
				$temCounter++;
				for($i=1;$i<=count($scores[$name]);$i++)	
					$totalTitle[$k][$i] = $totalTitle[$k][$i] + $scores[$name][$i];
			}
	 }
	 if($temCounter > 0)
	 {
		 for($i=1;$i<=12;$i++)	
		 {
		 	if($totalTitle[$k][$i] > 0)
			 	$totalTitle[$k][$i] = $totalTitle[$k][$i]/$temCounter; 
		 }
	 }
	 else
	 {
	 	for($i=1;$i<=12;$i++)	
		{
		 	$totalTitle[$k][$i] = 0; 
		}
	 }
}

 /* pChart library inclusions */
include("includes/pChart/classes/pData.class.php");
include("includes/pChart/classes/pDraw.class.php");
include("includes/pChart/classes/pRadar.class.php");
include("includes/pChart/classes/pImage.class.php");

//if(!file_exists("temp/".$target_attendee_id."_compare_with_average.png"))
	generateRadarGraph($target_attendee_id."_compare_with_average.png",$nameArray,$scores['ATTENDEE'],$score_averages,"Average Score of Other");

for($i=1;$i<=12;$i++)
{
	$extraCharts['name'][] = $name;
	$imgName =$target_attendee_id."_".$i.".png";
	$extraCharts['image'][] = $imgName;
	
	if(count($jobTitleArray) > 0)
	{
		$gData = array();
		
		$counter = 0;
		$gData[$counter]['data'] = $score_averages[$i];
		$gData[$counter]['title'] = "Average Score of Other";
		
		for($n=0;$n<count($totalTitle);$n++)
		{
			$name = getJobTitleForGraph($n);
			$counter++;
			$gData[$counter]['data'] = $totalTitle[$n][$i];
			$gData[$counter]['title'] = $name;
			$gData[$counter]['key'] = $n;
		}
		generateBarGraph($imgName,$nameArray,$scores['ATTENDEE'][$i],$gData);
	}
	else
		generateBarGraph($imgName,$nameArray,$scores['ATTENDEE'][$i],$score_averages[$i],"Average Score of Other");
}

$imageName = $_SESSION['image_name'];
$imageFinalName = "";
foreach($imageName  as $key => $value)
{
	$imageFinalName .= $value-1;
}

function generateRadarGraph($imageName,$nameArray,$scores,$secondAverage = array(),$title="")
{
	 // Dataset definition 
	 $DataSet = new pData;
	 
	 $i=1;
	 
	 
	 foreach($nameArray as $key=>$value)
	 {
		//$oldnameArray[$key] = " ";
		
		$i++;
	 }
	 
	// $nameArray[6] = "";
	 //$nameArray[9] = "";
	 
	 $newNameArray[] = $nameArray[9];
	 $newNameArray[] = $nameArray[10];
	 $newNameArray[] = $nameArray[11];
	 
	 $newNameArray[] = $nameArray[5];
	 $newNameArray[] = $nameArray[4];
	 $newNameArray[] = $nameArray[3];
	 
	 $newNameArray[] = $nameArray[2];
	 $newNameArray[] = $nameArray[1];
	 $newNameArray[] = $nameArray[0];
	 
	 $newNameArray[] = $nameArray[8];
	 $newNameArray[] = $nameArray[7];
	 $newNameArray[] = $nameArray[6];
	 
	 $newScores[] = $scores[10];
	 $newScores[] = $scores[11];
	 $newScores[] = $scores[12];
	 
	 $newScores[] = $scores[6];
	 $newScores[] = $scores[5];
	 $newScores[] = $scores[4];
	 
	 $newScores[] = $scores[3];
	 $newScores[] = $scores[2];
	 $newScores[] = $scores[1];
	 
	 $newScores[] = $scores[9];
	 $newScores[] = $scores[8];
	 $newScores[] = $scores[7];
	 
	 
	 $newSecondAverage[] = $secondAverage[10];
	 $newSecondAverage[] = $secondAverage[11];
	 $newSecondAverage[] = $secondAverage[12];
	 
	 $newSecondAverage[] = $secondAverage[6];
	 $newSecondAverage[] = $secondAverage[5];
	 $newSecondAverage[] = $secondAverage[4];
	 
	 $newSecondAverage[] = $secondAverage[3];
	 $newSecondAverage[] = $secondAverage[2];
	 $newSecondAverage[] = $secondAverage[1];
	 
	 $newSecondAverage[] = $secondAverage[9];
	 $newSecondAverage[] = $secondAverage[8];
	 $newSecondAverage[] = $secondAverage[7];
	 
	 
	 
	/* Prepare some nice data & axis config */ 
	$MyData = new pData();   
	$MyData->addPoints($newScores,"Your Score"); 
	$MyData->addPoints($newSecondAverage,"Average Score of Other"); 
	$MyData->setSerieDescription("Your Score","Your Score");
	$MyData->setSerieDescription("Average Score of Other","Average Score of Other");
	
	/* Create the X serie */ 
	$MyData->addPoints($newNameArray,"Labels");
	$MyData->setAbscissa("Labels");
	
	/* Create the pChart object */
	$myPicture = new pImage(750,700,$MyData);
	
	/* Define general drawing parameters */
	$myPicture->setFontProperties(array("FontName"=>"Fonts/Arial.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
	$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
	
	/* Create the radar object */
	$SplitChart = new pRadar();
	
	/* Draw the 2nd radar chart */
	$myPicture->setGraphArea(30,80,720,550);
	$Options = array("Layout"=>RADAR_LAYOUT_CIRCLE, "LabelPos"=>RADAR_LABELS_HORIZONTAL,"AxisRotation"=>290);
	$SplitChart->drawRadar($myPicture,$MyData,$Options);
	
	/* Write down the legend */
	
	$myPicture->drawLegend(270,640,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_HORIZONTAL));
	
	/* Render the picture */
	 
	 $myPicture->setFontProperties(array("FontName"=>"Fonts/Arial.ttf","FontSize"=>6));
	 $TextSettings = array("DrawBox"=>TRUE,"R"=>0,"G"=>00,"B"=>00,"Angle"=>0,"FontSize"=>10,"BackgroundR"=>255,"BackgroundG"=>0,"BackgroundB"=>0);
	 
	 $myPicture->drawText(10,50,"Self Management",$TextSettings);
	 $myPicture->drawText(590,50,"Relationship Management",$TextSettings);
	 $myPicture->drawText(10,530,"Self Awareness",$TextSettings);
	 $myPicture->drawText(590,530,"Relationship Awareness",$TextSettings);
	
		
	 $myPicture->drawText(360,20,"DOING",$TextSettings);
	 $myPicture->drawText(680,310,"OTHERS",$TextSettings);
	 $myPicture->drawText(30,300,"SELF",$TextSettings);
	 $myPicture->drawText(360,610,"BEING",$TextSettings);	
	 
	 $myPicture->Render("temp/".$imageName);
}

function generateRadarGraphOld($imageName,$nameArray,$scores,$secondAverage = array(),$title="")
{
	 // Dataset definition 
	 $DataSet = new pData;
	 
	 $DataSet->AddPoint($nameArray,"Label");
	 $DataSet->SetAbsciseLabelSerie("Label");
	
	 $DataSet->AddPoint($scores,"Your Own Assessment");
	 $DataSet->AddSerie("Your Own Assessment");
	 $DataSet->AddPoint($secondAverage,$title);
	 $DataSet->AddSerie($title);
	
	 
	 $Test = new pChart(750,700);
	 $Test->setFontProperties("Fonts/arial.ttf",12);
	 $Test->setGraphArea(30,120,720,510);
	 
	 //$Test->setColorPalette(5,255,0,0);
	 
	 $Test->drawTextBox(30,80,220,130,"Relationship Management",0,0,0,0, ALIGN_CENTER,TRUE,234,197,68,30);
	 $Test->drawTextBox(750,50,550,100,"Self Awareness",0,0,0,0, ALIGN_CENTER,TRUE,234,197,68,30);
	 $Test->drawTextBox(30,550,220,600,"Self Management",0,0,0,0, ALIGN_CENTER,TRUE,234,197,68,30);
 	 $Test->drawTextBox(750,550,550,600,"Relationship Awareness",0,0,0,0, ALIGN_CENTER,TRUE,234,197,68,30);
	 
	 $Test->drawTextBox(340,65,440,95,"BEING",0,0,0,0, ALIGN_CENTER,TRUE,63,53,234,30);
 	 $Test->drawTextBox(750,260,600,290,"OTHERS",0,0,0,0, ALIGN_CENTER,TRUE,63,53,234,30);
	 $Test->drawTextBox(50,380,180,350,"DOING",0,0,0,0, ALIGN_CENTER,TRUE,63,53,234,30); 
	 $Test->drawTextBox(340,530,440,560,"SELF",0,0,0,0, ALIGN_CENTER,TRUE,63,53,234,30);
	 
	 $Test->drawTextBox(280,100,350,115,"Having a Positive Outlook",0,0,0,0, ALIGN_CENTER,TRUE,63,255,255,255);
	 $Test->drawTextBox(280,100,350,115,"Being Authentic Outlook",0,0,0,0, ALIGN_CENTER,TRUE,63,255,255,255);
	 
	 $Test->setFontProperties("Fonts/ArialBold.ttf",12);
	 
	 // Draw the radar graph
	 
	 $Test->drawRadarAxis($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE,10,0,0,0,0,0,0);
	 $Test->setLineStyle(2); 
	 
	 $Test->drawFilledRadar($DataSet->GetData(),$DataSet->GetDataDescription(),0,10);
	 $Test->setLineStyle(1);
	
	 // Finish the graph
	 
	 $Test->setFontProperties("Fonts/tahoma.ttf",12);
	 $Test->drawLegend(270,600,$DataSet->GetDataDescription(),255,255,255);
	
	 
	 $Test->Render("temp/".$imageName);
	 //$Test->Stroke("temp/".$imageName);
	 
	 /*
	 $filename = "temp/".$imageName;
	
	// Get new sizes
	list($width, $height) = getimagesize($filename);
	$percentageWidth = 100 / $width * 100;
	$newheight2 = $height / 100 * $percentageWidth / 100 * 100;
	$newheight = floor($newheight2);
	$newwidth = 650;

	// Load
	$thumb = imagecreatetruecolor($newwidth, 570);
	$source = imagecreatefrompng($filename);

	// Resize
	imagecopyresampled ($thumb, $source, 0, 0, 0, 0, $newwidth , 570 , $width, $height);

	// Output
	imagepng($thumb,$filename);
	*/
	//$Test->Stroke("example8.png");
}

function generateBarGraph($imageName,$nameArray,$scores,$secondAverage=array(),$title="")
{
  
	/* Create and populate the pData object */
	$MyData = new pData(); 
	
	$MyData->addPoints($scores,"Your score");
	$MyData->setAxisName(0,"Average Out of 10");
	
	$serieSettings = array("R"=>224,"G"=>100,"B"=>46);
	$MyData->setPalette("Your score",$serieSettings);
			
			
	for($p=0;$p<count($secondAverage);$p++)
	{
		if($secondAverage[$p]['data'] > 0)
		{
			if(!in_array($secondAverage[$p]['key']+1,$_SESSION['image_name']))
				$_SESSION['image_name'][] = $secondAverage[$p]['key']+1;
				
			$MyData->addPoints($secondAverage[$p]['data'],$secondAverage[$p]['title']);
			$MyData->setSerieDescription($secondAverage[$p]['title']);
			
			if(isset($secondAverage[$p]['key']) && $secondAverage[$p]['key']==0)
				$serieSettings = array("R"=>189,"G"=>224,"B"=>46);
			elseif($secondAverage[$p]['key']==1)
				$serieSettings = array("R"=>47,"G"=>151,"B"=>224);
			elseif($secondAverage[$p]['key']==2)
				$serieSettings = array("R"=>180,"G"=>49,"B"=>227);
			else
				$serieSettings = array("R"=>225,"G"=>214,"B"=>46);
			
			$MyData->setPalette($secondAverage[$p]['title'],$serieSettings);
		}
	}
	
	
	 
	/* Create the pChart object */
	$myPicture = new pImage(230,230,$MyData);
	
	/* Draw the chart scale */ 
	$myPicture->setGraphArea(15,10,220,190);
	
	$myPicture->setFontProperties(array("FontName"=>"Fonts/Arial.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
	
	$myPicture->drawScale(array("CycleBackground"=>false,"DrawSubTicks"=>false,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10, "Pos"=>SCALE_POS_TOPBOTTOM)); 
	
	/* Draw the chart */ 
	$myPicture->drawBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"Surrounding"=>30,"Interleave"=>1));
	
	/* Render the picture (choose the best way) */
	$myPicture->render("temp/".$imageName);
}

?>

<?php //include('./includes/header.php');?>
<style type="text/css">
	
.bglite 	
{
background-color:rgb(204,255,255);
}

table {
  border-collapse: collapse;
}
table form {
  margin: 0;
}

.table {
 

}

.table th {
  border-color: transparent; 
}

.table td, .table th {
 /* border-color: transparent; */
  padding: 11px 12px 10px;
  line-height: 21px;
}
.table th {
  cursor: default;
}
.table tbody tr:hover td,
.table tbody tr:hover th {
  cursor: pointer;
  background-image: url("../img/shadows/b10.png");
  background-color:  transparent !important;
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

.category_1 {
	background-color: #FD0001;
}
.category_2 {
	background-color: #FE9900;
}
.category_3 {
	background-color: #FFCB00;
}
.category_4 {
	background-color: #FEFE00;
}
.category_5 {
	background-color: #CDFECC;
}
.category_6 {
	background-color: #98CB01;
}
.category_7 {
	background-color: #319864;
}
.category_8 {
	background-color: #33CBCE;
}
.category_9 {
	background-color: #00CDFC;
}
.category_10 {
	background-color: #CD99FE;
}
.category_11 {
	background-color: #FE00FE;
}
.category_12 {
	background-color: #FF99C9;
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
	.title{
		font-weight:bold;color:#000066;text-align:center;width:640px;
	 }
	 .graph-title {
		text-align:center;font-weight:bold;color:black;font-size:20px; margin-top:10px;
	 }
	 .attendy-name{
		text-align:center;font-weight:bold;color:#000066;
	 }
	 .sep50{
	 	clear:both;
		height:50px;
	 }
	 .sep20{
	 	clear:both;
		height:20px;
	 }
	 .graph-sep {
	 	height:200px;
		clear:both;
	 }
	 .clear{
	 	clear:both;
	 }
	 .border {
	 	padding:15px;
		border:1px solid #000000;
	 }
	 
	 .border1 {
	 	border: 1px solid black;
	 }
	 .graph {
	 	margin:0px;
		marin-left:50px;
	 }
	 #main {
	 	padding:0px; width:640px; text-align:left;float:left; font-size:120%;margin-top:-10px; margin:0px;
	 }
	 
	 table.page_header {width: 100%; border: none; background-color: #000066; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #000066; border-top: solid 1mm #AAAADD; padding: 2mm}
    /*div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; } */
    ul.main { width: 95%; list-style-type: square; }
    ul.main li { padding-bottom: 2mm; }
    h1 { text-align: center; font-size: 14mm;color:#000066;}
    h3 { text-align: center; font-size: 11mm;color:#000066; text-transform:capitalize;}
	h1.title { text-align: center; font-size: 14mm}
    h3.attendy-name { text-align: center; font-size: 11mm} 
	h3.graph-title {
		text-align:center;font-weight:bold;color:black;margin-top:10px;
		 font-size: 5mm;
	 }
	
	.yellow_box
	{
		height:30px;
		background-color:;
		color:#000000;
		font-size:3mm;
	}
	
	.blue_box
	{
		height:30px;
		background-color:#003399;
		color:#000000;
		font-size:3mm;
	}
	.border th {
		text-align:center;
	}
	
	.main_title{
		background-color:#99CC99;
		text-align:left;
	}
	.average_total{
		background-color:#FFFF99;
		text-align:center;
	}
	.div5 {
		width:50px;
		display:block;
	}
	.small-td {
		width:50%;
	}
	.td5 {
		width:50px;
	}
	.green {
		color:#00FF00;
	}
	.red {
		color:#FF0000;
	}
	
	.smallhead {
		font-size: 8mm
		color:#0033CC;
	}
</style>


<page  backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 50%; text-align: left;font-size: 5mm; color:#FFFFFF">
                    <?php  $body = getTempalte("header_text",array(),0); echo $body['template']; ?>
                </td>
                <td style="width: 50%; text-align: right">
                   <img src="<?php echo $siteUrl;?>/img/srs_logo.jpg" style="height:80px;"/>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 80%; text-align: left;color:#FFFFFF">
                    <?php  $body = getTempalte("footer_text",array('year'=>date('Y')),0); echo $body['template']; ?>
                </td>
				<td style="width:20%;text-align: right;color:#FFFFFF">
					[[page_cu]]/[[page_nb]]
				</td>
            </tr>
        </table>
    </page_footer>
    <br><br><br><br><br><br><br><br>
	 <h1>Enlightened Leadership Results</h1>
    <h3><?php echo $attendee_name;?></h3><br>
    <br><br><br><br><br>
    <div align="center" style=" width: 100%;">
          <img src="<?php echo $siteUrl; ?>/img/report2.png" width=""/>
	</div>
    <br><br><br><br><br>
</page>

<page pageset="old">
	<br><br><br><br><br><br><br><br>
	 <h1 class="title">Enlightened Leadership</h1>
	 <h3 class="attendy-name"><?php echo $attendee_name;?></h3>
	 <div class="sep50"></div>
	 <div align="left" class="note" style="padding: 0mm; width:100%;">
	 		<h3 class="graph-title">Enlightened Leadership - Comapare with Average</h3><br />
			<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id."_compare_with_average.png"; ?>" align="left"/>
	 </div>
	 <br><br><br>
</page>


<page pageset="old">
	<br><br><br><br><br><br><br><br>
	 <h1 class="title">Enlightened Leadership</h1>
	 <div  style="margin-left:10px"><img src="<?php echo $siteUrl; ?>/img/legend/<?php echo $imageFinalName; ?>.jpg" align=""/></div>
	 <br /><br />
	 <div class="sep50"></div>
	 <div>
	 		<div class="border" style="padding:0px; width:80%">
				 <h3 class="attendy-name">Self Management</h3>
				<table border="0" width="100%">
					<tr>
						<th>
							Focusing On Achievement
						</th>
						<th>
							Demonstrating Emotional Integrity
						</th>
						<th>
							Role  Modelling
						</th>
					</tr>
					<tr>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_7.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_8.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_9.png"/>
						</td>
					</tr>
						
				</table>
			</div>
			<div class="sep50"></div>	
			<div class="border" style="padding:0px; width:80%">
				 <h3 class="attendy-name">Self Awareness</h3>
				<table border="0" width="100%">
					<tr>
						<th>
							Having a Positive Outlook
						</th>
						<th>
							Being Authentic
						</th>
						<th>
							Valuing Self
						</th>
					</tr>
					<tr>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_1.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_2.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_3.png"/>
						</td>
					</tr>
						
				</table>
			</div>
	 </div>
	 <br><br><br><br><br>
</page>

<page pageset="old">
	<br><br><br><br><br><br><br><br>
	 <h1 class="title">Enlightened Leadership</h1>
	 <div  style="margin-left:10px"><img src="<?php echo $siteUrl; ?>/img/legend/<?php echo $imageFinalName; ?>.jpg" align=""/></div>
	 <br /><br />
	 <div class="sep50"></div>
	 <div>
	 		<div class="border" style="padding:0px; width:80%"> 
				 <h3 class="attendy-name">Relationship Management</h3>
				<table border="0" width="100%">
					<tr>
						<th>
							Generating Engagement
						</th>
						<th>
							Working Collaboratively
						</th>
						<th>
							Developing Others
						</th>
					</tr>
					<tr>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_10.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_11.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_12.png"/>
						</td>
					</tr>
						
				</table>
			</div>
			<div class="sep50"></div>	
			<div class="border" style="padding:0px; width:80%">
				 <h3 class="attendy-name">Relationship Awareness</h3>
				<table border="0" width="100%">
					<tr>
						<th>
							Having Vision
						</th>
						<th>
							Being Politically Astute
						</th>
						<th>
							Valuing Others
						</th>
					</tr>
					<tr>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_4.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_5.png"/>
						</td>
						<td>
							<img src="<?php echo $siteUrl; ?>/temp/<?php echo $target_attendee_id; ?>_6.png"/>
						</td>
					</tr>
						
				</table>
			</div>
	 </div>
	 <br><br><br><br><br>
</page>


<page pageset="old">
	<br><br><br><br><br><br><br><br>
	 <h1 class="title">Enlightened Leadership
	 
	 </h1>
	 <h3 class="attendy-name" style="color:#009999">Top 5</h3>
	 
	 <div>
	 		<h3 class="graph-title">Your scored highest in the following five categories:</h3><br /><br />
			<table border=1  style="border-collapse:collapse;" width="100%" align="center">
				<tr>
					<th>
						Category
					</th>
					<th>
						Average Score
					</th>
				</tr>
					<?php 	$tempArray = ($scores['ATTENDEE']);
							 
							$tempCat = array();
							$tempVal = array();
							
							foreach($tempArray as $key => $val)
							{
								$tempCat[] = $key;
								$tempVal[] = $val;
							}
							
						 	for($i=11;$i>=7;$i--) { ?>
						<tr>
							<td>
								<?php  echo $categories[$tempCat[$i]]; ?>
							</td>
							<td align="center">
								<?php echo  $tempVal[$i]; ?>
							</td>
						</tr>
					<?php } ?>
			</table>
	 </div>
	 <div class="sep20"></div>
	 <h3 class="attendy-name" style="color:#009999">Bottom 5</h3>
	
	 <div>
	 		<h3 class="graph-title">You scored lowest in the following five categories:</h3><br /><br />
			<table border=1  style="border-collapse:collapse;" width="100%" align="center">
				<tr>
					<th>
						Category
					</th>
					<th>
						Average Score
					</th>
				</tr>
				<?php for($i=0;$i<=4;$i++) { ?>
					<tr>
						<td>
							<?php echo $categories[$tempCat[$i]]; ?>
						</td>
						<td align="center">
							<?php echo  $tempVal[$i]; ?>
						</td>
					</tr>
				<?php } ?>
			</table>
	 </div>
	 
	 <div class="sep20"></div>
	 <h3 class="attendy-name" style="color:#009999">5 Biggest Difference</h3>
	 <div>
	 		<h3 class="graph-title">The largest differences between your self assessment and the average assessment of other people were in the following five categories:</h3><br /><br />
			<table border=1  style="border-collapse:collapse;" width="100%" align="center">
				<tr>
					<th>
						Category
					</th>
					<th>
						Your Score
					</th>
					<th>
						Average Score
					</th>
					<th>
						Difference
					</th>
				</tr>
				<?php 
					  
					  $diffAverage = array();
					  
					  for($i=1;$i<=12;$i++)
					  {
					  	$diffAverage['data'][$i] = (float) $score_averages[$i] - (float) $scores['ATTENDEE'][$i];
						$diffAverage['category'][] = $i;		
					  }
					  
					  $tempArray = $diffAverage['data'];
					  
					  asort($tempArray);
					  
					  $tempCat = array();
					  $tempVal = array();
						
					  $count=1;	
					  foreach($tempArray as $key => $val)
					  {
							
						if($count==6)
							break;	
						//for($i=0;$i<5;$i++) { 
					?>
					<tr>
						<td>
							<?php echo $categories[$key]; ?>
						</td>
						<td align="center">
							<?php echo $scores['ATTENDEE'][$key]; ?>
						</td>
						<td align="center">
							<?php echo $score_averages[$key]; ?>
						</td>
						<td align="center" class="<?php echo ($val > 0)?"green":"red"; ?>">
							<?php echo  abs($val); ?>
						</td>
					</tr>
				<?php  $count++; } ?>
			</table>
			<div class="sep20"></div>
			<div align="center"> The differences are shown in <font color="#FF0000">red</font> if you rated yourself higher than the average assessment and <font  color="#00FF00">green</font> otherwise.</div>
	 </div>
	 <br><br><br><br><br>
</page>

<page pageset="old">
	 <br><br><br><br><br><br><br><br>
	 <h1 class="title">Enlightened Leadership</h1>
	 <h3 class="attendy-name">Complete Questionaries Data</h3>
		<div class="border">
			<p>The following pages contain the full results for the Enlightened 
Leadership Questionnaire, as well as the totals for each characteristic	.</p>
		</div>
	<br><br><br><br><br>
</page>

<page pageset="old">
		<br><br><br><br><br><br><br><br>
		
		<h1 class="title">Enlightened Leadership</h1>
		<br /><br />
		
		<table  class="table"  width="100%" align="center" border="1">
            <thead>
			<?php
				
				$maxLength = 0;	
				foreach($scores as $name=>$score){
					if($name !="ATTENDEE"){
						if(strlen($name) > $maxLength)
							$maxLength = $name;
					}
				}
				
			
			?>
			 <tr height="<?php echo $maxLength*5; ?>">
			 	<th colspan="6">&nbsp;</th>
				<?php				
				foreach($scores as $name=>$score){
					if($name !="ATTENDEE"){
						echo "<th>&nbsp;</th>";
					}
				}
				?>
			 </tr>
			 <tr height="<?php echo $maxLength*5; ?>">
			 	<th colspan="6">&nbsp;</th>
				<?php				
				foreach($scores as $name=>$score){
					if($name !="ATTENDEE"){
						echo "<th>&nbsp;</th>";
					}
				}
				?>
			 </tr>
              <tr class="bglite">
                <th width="1" style="padding-right:0px"> # </th>
                <th width="150"> Questions </th>
				<th width="30" > A </th>
				<th width="30" > B </th>
				<th width="30" > C </th>
               <th width="10" style="padding-bottom: 10px;padding-right:0px;" align="left" valign="bottom"><img src="<?php echo $siteUrl; ?>vertical.php?text=Your*Score" /></th>
				<?php				
				foreach($scores as $name=>$score){
					if($name !="ATTENDEE"){
					
						$name = str_replace(" ","*",$name);
						$nameArr = explode("_",$name);
						echo " <th class='bglite' width='10' style=\"padding-bottom: 10px;padding-right:0px\" align=\"left\" valign=\"bottom\">".'<img src="'.$siteUrl.'vertical.php?text='.$nameArr[0].'" /></th>';
					}
				}
				?>
              </tr>
            </thead>

			<tbody>
				<?php 
				
				$sql = "SELECT * FROM questions WHERE `type` = 'attendee' AND course_type='Leadership Course' order by id asc;";
				$result = mysql_query($sql);
				$k=1;
				while($row = mysql_fetch_array($result)){
					
					extract($row);	
					$index = $k % 12;
					if($index == 0){
						$index = 12;
					}
				?>
				
				<tr>
				<td class="<? echo $styles[$index]; ?>" width="1" align="center"><?php echo $k.")"; $k++?></td>
				<td width=150 class=""><?php echo $question;?></td>
				<td width=30 class=""><?php echo $option_3;?></td>
				<td width=30 class=""><?php echo $option_2;?></td>
				<td width=30 class=""><?php echo $option_1;?></td>
				<td width=10 class="" style="padding-bottom: 10px;padding-right:0px"><?php echo $raw_scores['ATTENDEE'][$id] ;?></td>
				<?php	
				
				
				foreach($scores as $name=>$score){
					if($name !="ATTENDEE"){
						echo " <td width=10 style=\"padding-bottom: 10px;padding-right:0px\">".$raw_scores[$name][($id+60)]."</td> \n" ;
					}
				}
				?>				
				</tr>
				<?php } ?>
            </tbody>
			<tfoot>
				<tr>
					<th colspan="10" align="center" class="smallhead">
						A = 0 points, B = 1 point, C = 2 points
					</th>
				</tr>
			</tfoot>
          </table>
		  
	  <br><br><br><br><br>
</page>



<page pageset="old">
	<br><br><br><br><br><br><br><br>
	 <h1 class="title">Enlightened Leadership</h1>
	 
	 <h3 class="graph-title">The question scores are given here in the order shown on the previous pages, i.e. your own 
score in the left column and then the others from left to right.</h3>

	<table width="100%" border="0">
					<tr>
						<td class="small-td">
							<h3 class="graph-title" align="left">SELF MANAGEMENT</h3>
							 <table border="1" class="small-td">
							 <?php for($i=7;$i<10;$i++)  { ?>
									<tr>
										<th colspan="8" class="main_title">
											<?php echo strtoupper($categories[$i]); for($s= strlen(trim($categories[$i]));$s<=35;$s++) { echo "&nbsp;"; } ?>
										</th>
									</tr>
									<?php $myTotal = 0; $otherTotal = 0; for($j=$i;$j<60;$j=$j+12) { ?>
									<tr>
										<td class="<?php echo $styles[$i]; ?>" width="30%" align="center">
											<?php echo $j; ?>
										</td>
										<td width=20 align='center'><?php echo $raw_scores['ATTENDEE'][$j+105]; $myTotal += $raw_scores['ATTENDEE'][$j+105];?></td>
										<?php
										
										$count=1;				
										foreach($scores as $name=>$score){
											if($name !="ATTENDEE"){
												echo " <td width=20 align='center'>".$raw_scores[$name][$j+60+105]."</td> \n" ; $otherTotal += $raw_scores[$name][$j+60+105];
												$count++;
											}
										}
										
										for($p=$count;$p<7;$p++)
											echo " <td width=20 align='center'>0</td> \n";
										?>	
									</tr>
									<?php } ?>
									<tr class="average_total">
										<td class="average_total">
											AVERAGE TOTAL
										</td>
										<td align="center">
											<?php echo $myTotal; ?>
										</td>
										<td colspan="7" align="center">
											<?php echo round( ((float) $otherTotal / (float) (count($scores)-1)),2); ?>
										</td>
									</tr>
							<?php } ?>
							</table>
						</td>
						<td class="td5">
							<div class="div5"></div>
						</td>
						<td class="small-td">
							<h3 class="graph-title" align="left">RELATIONSHIP MANAGEMENT</h3>
							 <table border="1" class="small-td">
							 <?php for($i=10;$i<13;$i++)  { ?>
									<tr>
										<th colspan="8" class="main_title">
											<?php echo strtoupper($categories[$i]);  for($s= strlen(trim($categories[$i]));$s<=50;$s++) { echo "&nbsp;"; }?>
										</th>
									</tr>
									<?php $myTotal = 0; $otherTotal = 0; for($j=$i;$j<=60;$j=$j+12) { ?>
									<tr>
										<td class="<?php echo $styles[$i]; ?>" width="30%" align="center">
											<?php echo $j; ?>
										</td>
										<td width=20 align='center'><?php echo $raw_scores['ATTENDEE'][$j+105]; $myTotal += $raw_scores['ATTENDEE'][$j+105];?></td>
										<?php
										
										$count=1;				
										foreach($scores as $name=>$score){
											if($name !="ATTENDEE"){
												echo " <td width=20 align='center'>".$raw_scores[$name][$j+60+105]."</td> \n" ; $otherTotal += $raw_scores[$name][$j+60+105];
												$count++;
											}
										}
										
										for($p=$count;$p<7;$p++)
											echo " <td width=20 align='center'>0</td> \n";
										?>		
									</tr>
									<?php } ?>
									<tr class="average_total">
										<td class="average_total">
											AVERAGE TOTAL
										</td>
										<td align="center">
											<?php echo $myTotal; ?>
										</td>
										<td colspan="7" align="center">
											<?php echo round( ((float) $otherTotal / (float) (count($scores)-1)),2); ?>
										</td>
									</tr>
							<?php } ?>
			</table>
						</td>
					</tr>
					
				</table>
	
	<table width="100%" border="0">
					<tr>
						<td class="small-td">
							<h3 class="graph-title" align="left">SELF AWARENESS</h3>
							 <table border="1" class="small-td">
							 <?php for($i=1;$i<4;$i++)  { ?>
									<tr>
										<th colspan="8" class="main_title">
											<?php echo strtoupper($categories[$i]);  for($s= strlen(trim($categories[$i]));$s<=50;$s++) { echo "&nbsp;"; }?>
										</th>
									</tr>
									<?php $myTotal = 0; $otherTotal = 0; for($j=$i;$j<60;$j=$j+12) { ?>
									<tr>
										<td class="<?php echo $styles[$i]; ?>" width="30%" align="center">
											<?php echo $j; ?>
										</td>
										<td width=20 align="center"><?php echo $raw_scores['ATTENDEE'][$j+105]; $myTotal += $raw_scores['ATTENDEE'][$j+105];?></td>
										<?php
										
										$count=1;				
										foreach($scores as $name=>$score){
											if($name !="ATTENDEE"){
												echo " <td width=20 align='center'>".$raw_scores[$name][$j+60+105]."</td> \n" ; $otherTotal += $raw_scores[$name][$j+60+105];
												$count++;
											}
										}
										
										for($p=$count;$p<7;$p++)
											echo " <td width=20 align='center'>0</td> \n";
										?>	
									</tr>
									<?php } ?>
									<tr class="average_total">
										<td class="average_total">
											AVERAGE TOTAL
										</td>
										<td align="center">
											<?php echo $myTotal; ?>
										</td>
										<td colspan="7" align="center">
											<?php echo round( ((float) $otherTotal / (float) (count($scores)-1)),2); ?>
										</td>
									</tr>
							<?php } ?>
			</table>
						</td>
						<td class="td5">
							<div class="div5"></div>
						</td>
						<td class="small-td">
							<h3 class="graph-title" align="left">RELATIONSHIP AWARENESS</h3>
							 <table border="1" class="small-td">
							 <?php for($i=4;$i<7;$i++)  { ?>
									<tr>
										<th colspan="8" class="main_title" width="100%">
											<?php echo strtoupper(trim($categories[$i])); for($s= strlen(trim($categories[$i]));$s<=50;$s++) { echo "&nbsp;"; } ?>
										</th>
									</tr>
									<?php $myTotal = 0; $otherTotal = 0; for($j=$i;$j<60;$j=$j+12) { ?>
									<tr>
										<td class="<?php echo $styles[$i]; ?>" width="30%" align="center">
											<?php echo $j; ?>
										</td>
										<td width=20 align="center"><?php echo $raw_scores['ATTENDEE'][$j+105]; $myTotal += $raw_scores['ATTENDEE'][$j+105];?></td>
										<?php
										
										$count=1;				
										foreach($scores as $name=>$score){
											if($name !="ATTENDEE"){
												echo " <td width=20 align='center'>".$raw_scores[$name][$j+60+105]."</td> \n" ; $otherTotal += $raw_scores[$name][$j+60+105];
												$count++;
											}
										}
										
										for($p=$count;$p<7;$p++)
											echo " <td width=20 align='center'>0</td> \n";
										?>	
									</tr>
									<?php } ?>
									<tr class="average_total">
										<td class="average_total">
											AVERAGE TOTAL
										</td>
										<td align="center">
											<?php echo $myTotal; ?>
										</td>
										<td colspan="7" align="center">
											<?php echo round( ((float) $otherTotal / (float) (count($scores)-1)),2); ?>
										</td>
									</tr>
							<?php } ?>
			</table>
						</td>
					</tr>
					
				</table> 
	<br><br><br><br>
</page>