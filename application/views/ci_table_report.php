<!DOCTYPE html>
<html>
<head>
  <title>Request <?=$row->request_name;?></title>
  
  <style type="text/css">
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
    #outtable{
        padding:5px;
        /*border: 1px solid red;*/
        width: 100%;
      
    }
    thead th{
      text-align: left;
      padding: 10px;
    }
    tbody td{
        padding: 8px;
        font-size: 10px;
    }
    /* tbody tr:nth-child(even){
      background: #F6F5FA;
    } */
    .small-text {
        font-size:9px;
        font-weight: none;
        padding: 0;
    }
    .top-header {
        width: 60%;
        margin: 0 auto;
        padding-top: 10px;
    }
    h5{
        margin:0;
        padding:0;
    }
    .border-none {
        border:none !important;
    }
    .inside-table{
        padding:3px;
    }
    .rowline{
        width: 100%;
    }
    .leftside{
        width: 70%;
        
    }
    .borderline{
        border: 1px solid black;
        width: 50%;
        padding: 2px;
    }
    .rightside{
        background: blue;
        width: 50%;
    }
    .leftside ul li{
        padding: 5px 0;
        font-size: 12px;
    }
    .leftside ul li span{
        float:right;
    }
  </style>
</head>
<body>

<div id="outtable">
    <table class="table-top" style="width: 100%;">
        <tbody>
            <tr>
                <td>
                    <img src="./admin_assets/assets/img/logo.png"  class="img-responsive" width="145"/>
                </td>
                <td>
                    <h3>Request for leave form</h3>
                    <small class="small-text">(To be completed by Employee & filled in Employee's File)</small>
                </td>
                <td style="border: 1px solid black;">
                    <table style="width: 100%;">
                        <tr>
                            <td>Date:</td>
                            <td><?=Date('d.m.Y');?></td>
                        </tr>
                        <tr>
                            <td>Department:</td>
                            <td><?=$row->department;?></td>
                        </tr>
                        <tr>
                            <td>Do No:</td>
                            <td>HR-DOC-00<?= $row->id;?></td>
                        </tr>
                        <tr>
                            <td>End User:</td>
                            <td>End User</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="top-header">
            <h5>Request for leave form</h5>
            <small class="small-text">(To be completed by Employee & filled in Employee's File)</small>
        </div>
    </div> <br/>


    <div class="rowline">
        <table style="width:100%;">
            <tr>
                <td width="50%" align="left">
                    <div class="leftside">
                        <ul style="list-style-type:none;">
                            <li>
                                Name:<span class="borderline"><?=$row->request_name;?>&nbsp;</span>
                            </li>
                            <li>
                                Department:<span class="borderline"><?=$row->request_department;?>&nbsp;</span>
                            </li>
                            <li>
                                Section:<span class="borderline"><?=$row->request_section;?>&nbsp;</span>
                            </li>
                        </ul>
                    </div>
                </td>

                <td width="50%">
                    <div class="leftside">
                        <ul style="list-style-type:none;">
                            <li>
                                Employee Initials:<span class="borderline"><?=$row->request_employee_initials;?>&nbsp;</span>
                            </li>
                            <li>
                                Job Title:<span class="borderline"><?=$row->request_job_title;?>&nbsp;</span>
                            </li>
                        </ul>
                    </div> 
                </td>
            </tr>
        </table>
    </div> <br/>

    <div class="middle" style="background:black; width: 100%;">
        <span style="color: white; padding: 2px; margin: 0;">May I request that I be granted:</span>
        <div class="inside-table">
            <p style="text-decoration:underline; background: white; padding-bottom: 10px; margin:0; font-size:11px;">Please attach necessary certificate as dictated by Company Policies & Procedures</p>

            <table style="width: 100%; background: white; padding: 3px;">
                <tbody>
                    <tr>
                        <td width="5%;"><?php if($row->request_emergency_leave == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="15%;">Emergency Leave</td>
                        <td width="5%;"><?php if($row->request_funeral_leave == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="15%;">Funeral Leave</td>
                        <td width="5%;"><?php if($row->request_personal_leave == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="15%;">Personal Leave without Pay</td>
                    </tr>
                    <tr>
                        <td width="5%;"><?php if($row->request_maternity_leave == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="15%;">Maternity Leave</td>
                        <td width="5%;"><?php if($row->request_annual_leave == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="15%;">Annual Leave</td>
                        <td width="5%;"><?php if($row->request_other == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="15%;">Other:<?php if($row->request_other == 1){ echo $row->request_other_text; }?></td>
                    </tr>
                    
                </tbody>
                
            </table>
            <table style="width: 100%; background: white; padding:3px;">
                <tbody>
                    <tr>
                        <td width="30%">From: <?=$row->request_from;?></td>
                        <td width="30%">To: <?=$row->request_to;?></td>
                        <td width="30%">No of Days: <?=$row->request_number_days;?></td>
                    </tr>
                </tbody>
            </table>

            <table style="width:100%; background: white; padding: 3px;">
                <tbody>
                    <tr>
                        <td width="20%">Reason:</td>
                        <td width="80%"><?=$row->request_reason;?></td>
                    </tr>
                </tbody>
            </table>

            <div style="background:white; padding:3px; margin:0; font-size: 13px;">
				<p><strong>For Sick Leave:</strong> Sick Leave Pay availment should be supported by adequate evidence in accordance with approved Company Policies & Procedures.
				Any fraudulent claims for leave may result in the loss of pay for the period of absense and further disciplinary action.</p>
            </div>
            
            <table style="width: 100%; background: white; padding:3px;">
                <tbody>
                    <tr>
                        <td width="80%">Where you / Will you be under a doctor's care?</td>
                        <td width="20%"><?php if($row->request_doctor_yes==1) { echo "Yes"; } elseif($row->request_doctor_no == 1) { echo"No"; }?></td>
                    </tr>
                </tbody>
            </table>

             <table style="width:100%; background: white; padding: 3px;">
                <tbody>
                    <tr>
                        <td width="20%">Name of Clinic/Hospital:</td>
                        <td width="80%"><?=$row->request_clinic_name;?></td>
                    </tr>
                </tbody>
            </table>

            <table style="width:100%; background: white; padding: 3px;">
                <tbody>
                    <tr>
                        <td width="50%" style="border-top: 1px solid black;">Employee's signature:</td>
                        <td width="50%" style="border-top: 1px solid black;">Date:</td>
                    </tr>
                </tbody>
            </table>

            

        </div>
        
    </div> <!-- end of middle-->

     <div class="middle" style="background:black; width: 100%;">
        <span style="color: white; padding: 2px; margin: 0;">Department Head Approval</span>
        <div class="inside-table">
            <table style="width: 100%; background: white; padding: 3px;">
                <tbody>
                    <tr>
                        <td width="5%"><?php if($row->request_department_head_clearance_only == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="95%">Department Head Clearance Only - for leave of one week or less</td>                        
                    </tr>
                    <tr>
                        <td width="5%"><?php if($row->request_full_clearance_required == 1) {?><div style="font-family: DejaVu Sans, sans-serif;font-size:14px;">✔</div> <?php } ?></td><td width="95%">Full Clearance required - for leave of more than one week</td>
                    </tr>
                    
                </tbody>
                
            </table>

            <table style="width:100%; background: white; padding: 3px;">
                <tbody>
                    <tr>
                        <td width="50%" style="border-top: 1px solid black;">Department Head:</td>
                        <td width="50%" style="border-top: 1px solid black;">Date:</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
    </div><!-- head approval -->

    <div class="middle" style="background:black; width: 100%;">
        <span style="color: white; padding: 2px; margin: 0;">HR Department Validation</span>
        <div class="inside-table">
            
            <table style="width:100%; background: white; padding: 3px;">
                <tbody>
                    <tr width="100%">
                        <td colspan="2">Remark:</td>
                    </tr>
                    <tr>
                        <td width="50%" style="border-top: 1px solid black;">Department Head:</td>
                        <td width="50%" style="border-top: 1px solid black;">Date:</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
    </div><!-- head approval -->



</div>

</body>
</html>