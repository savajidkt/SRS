<div class="pagestart page6 p-7">

  <div class="subhead_top">Individual Scores & Implications</div>
  <h2 class="head_top">Establishing Rapport</h2>
  <div class="topgraybox">
    <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
        <tr>
          <td style="width:50px;"> <img style="width:50px; height:50px;"
                src="{{asset('pdf/img/establishing-rapport.jpg')}}"
                alt="Bandelli-Associates-Logo 1"
              /> </td>

          <td style="padding-left:14px;">
            <div style="color:#FFCC01; font-size:40px;"><b>{{$establishing_report_per}}%</b></div>
            <div style="background:#EAEBED; border-radius: 25px; height:6px; width:100%;">
              <div style="background:#FFCC01; border-radius: 25px; width:{{$establishing_report_per}}%; height:6px;"></div>
            </div>

            <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="width: 50%; font-size:11px; color:#3D3F42">Low</td>
                  <td style="width: 30%; font-size:11px; color:#3D3F42">Average</td>
                  <td style="text-align:right; font-size:11px; color:#3D3F42">High</td>
                </tr>
            </table>
          </td>
        </tr>
    </table>
  </div>

  <h3 class="report_head">Relational implications</h3>
  <p class="report_p">Leaders with similar scores tend to:</p>
  @if($establishing_report_per <= 33) 
  <ul>
  <li>Focus on the task at hand rather than the impression they make on coworkers</li>
  <li>Seem direct and usually focus on getting their message across to colleagues</li>
  <li>Be less concerned about finding common ground with others</li>
  <li>Have difficulties noticing social cues and the body language of coworkers</li>
  <li>Prefer to stick to business-related topics rather than discuss personal ones</li>
  <li>Avoid using humor in work-related settings</li>
    </ul>

    <div style="background:#FFCC01; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p">Compared to other leaders, your scores suggest that you may seem reserved or socially reticent when meeting people for the first time. Colleagues may view you as quiet and somewhat unenthusiastic about small talk or exchanging pleasantries. New members of your team may see you as hard to get to know and perhaps shy, uninterested, or aloof. Your interactions with new employees tend to focus on work outcomes and holding people accountable for performance. Because you are comfortable working alone, you may miss out on opportunities to connect new employees to other members of your team.</p>
    <div style="background:#FFCC01; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
    <li>Minimize their social interactions with new people</li>
    <li>Take their time getting to know others</li>
    <li>Sometimes have difficulty identifying similarities and differences with others</li>
    <li>Be quiet and more reserved when they meet new people</li>
    <li>Be more formal and serious when they first interact with others</li>
    </ul>
    @endif
    @if($establishing_report_per >=34 && $establishing_report_per < 67) 
  <ul>
  <li>
      Make a strong first impression when they first meet colleagues </li>
    <li> Understand the importance of making good first impressions on coworkers </li>
    <li>Choose their words carefully when interacting with someone for the first time</li>
    <li>Try to find common ground when meeting new colleagues</li>
    <li>Maintain eye contact when someone is speaking with them</li>
    <li>May miss some nonverbal cues and body language of coworkers</li>
    </li>
    
    </ul>

    <div style="background:#FFCC01; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p">Compared to other leaders, your scores suggest that you understand how to build rapport with both internal and external stakeholders of your organization. The motto “you never get a second chance to make a good first impression,” resonates with you. You have an innate ability to pick the appropriate energy needed for a given audience and tailor your interpersonal style to the people with whom you are interacting. When communicating with new employees, you make them feel valued and appreciated. You ask questions to draw others into a conversation and connect on shared experiences or interests. From the first day someone joins your team, you look to create opportunities for enjoyable interactions and personal connections.</p>
    <div style="background:#FFCC01; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
      <li>Excel in social interactions and project positive energy to others</li>
      <li>Be enthusiastic about connecting with new people</li>
      <li>Easily identify similarities and differences with others</li>
      <li>Strike a healthy balance between listening and talking when meeting others</li>
      <li>Be playful, fun, and engaging in social settings</li>
    </ul>
    @endif
    @if($establishing_report_per >=68 && $establishing_report_per <=100)
  <ul>
    <li>
      Make a strong first impression when they first meet colleagues </li>
    <li>Understand that it matters how they say things, not just what they say </li>
    <li>Find common ground quickly with new coworkers</li>
    <li>Maintain good eye contact throughout conversations to build credibility and convey interest</li>
    <li>Use nonverbal cues and body language to show interest in what coworkers are communicating</li>
    <li>Use humor appropriately to engage others in a conversation</li>
    </li>
    </ul>
    <div style="background:#FFCC01; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p">Compared to other leaders, your scores suggest that you understand how to build rapport with both internal and external stakeholders of your organization. The motto “you never get a second chance to make a good first impression,” resonates with you. You have an innate ability to pick the appropriate energy needed for a given audience and tailor your interpersonal style to the people with whom you are interacting. When communicating with new employees, you make them feel valued and appreciated. You ask questions to draw others into a conversation and connect on shared experiences or interests. From the first day someone joins your team, you look to create opportunities for enjoyable interactions and personal connections.</p>
    <div style="background:#FFCC01; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
      <li>Excel in social interactions and project positive energy to others</li>
      <li>Be enthusiastic about connecting with new people</li>
      <li>Easily identify similarities and differences with others</li>
      <li>Strike a healthy balance between listening and talking when meeting others</li>
      <li>Be playful, fun, and engaging in social settings</li>
    </ul>
    @endif
    <div class="footerblock">
    <div style="position:relative; width:100%;">  
      <div class="r-img2" style="position:absolute; top:-155px; right:0px;"> 
        <img 
          src="{{asset('pdf/img/EstablishingRapportSilhouette.png')}}"
          alt="Bandelli-Associates-Logo 1"
        /> 
		
      </div>
    </div>

      <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
        <tr>
          <td style="width:140px;"> 
            <div class="flogo">
              <img
                class="Bandelli-Associates-Logo"
                src="{{asset('pdf/img/bandelli-associates-logo-1-1@2x.png')}}"
                alt="Bandelli-Associates-Logo 1"
              />
            </div> 
          </td>
          <td style="border-left:2px solid #ccc; padding-left: 20px;"> 
                <div class="textname">
            Bandelli Relational Intelligence Assessment
            </div> 
          </td>
          <td> &nbsp; </td>
          <td> <div class="pagenumber">6</div> </td>

        </tr>
    </table>

  </div>
</div>
<div style="page-break-after: always;"></div>