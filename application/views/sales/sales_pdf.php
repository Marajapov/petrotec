<!DOCTYPE html>
<html>
<head>
  <title>Sales</title>
  
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
<?php 
    $employee = $this->db->get_where('employee', array('id' => $row->employee_id))->row();
    $customer = $this->db->get_where('customer', array('id' => $row->customerid))->row();
    $sales_item = $this->db->get_where('sales_item', array('sales_id' => $row->id))->result();
    
    $amount = $this->db->get_where('installment',array('salesid' => $row->id))->row();
    $total = 0;
    
?>
<div id="outtable">
    <table class="table-top" style="width: 100%;">
        <tbody>
            <tr>
                <td>
                    <img src="./admin_assets/assets/img/logo.png"  class="img-responsive" width="145"/>
                </td>
                <td>
                    <h3>Sales report</h3>
                    <small class="small-text"></small>
                </td>
                <td style="border: 1px solid black;">
                    <table style="width: 100%;">
                        <tr>
                            <td>Date:</td>
                            <td><?=Date('d.m.Y',strtotime($row->date_created));?></td>
                        </tr>
                        <tr>
                            <td>Sales Person:</td>
                            <td><?=$employee->firstname;?></td>
                        </tr>
                        <tr>
                            <td>Invoice No:</td>
                            <td>HR-DOC-000<?= $row->id;?></td>
                        </tr>
                        <tr>
                            <td>Customer:</td>
                            <td><?= $customer->fname;?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="top-header"><br />
            <h5>Sales Items</h5>
        </div>
    </div> <br/>


    <div class="middle" style="background:white; width: 100%;">
        <div class="inside-table">
            
            
            <table class="table table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th> Product </th>
                        <th> Quantity </th>
                        <th> Price </th>
                        <th> Sum </th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($sales_item)){
                foreach($sales_item as $ap){
                    $all_product = $this->db->get('product')->result();
                ?>
                    <tr>
                        <td> 
                        <?php foreach($all_product as $product)
                        {
                            if($product->id == $ap->productid)
                            {
                                echo $product->name;
                            }
                        }                        
                         ?> </td>

                        <td> <?= $ap->qty; ?> </td>		
                        <td> <?= $ap->price; ?> </td>		
                        <td> <?= $ap->qty * $ap->price;?></td> 
                    </tr>
                <?php  $total += ($ap->qty * $ap->price);
                }
                 } ?>
                </tbody>
		    </table>
            <div class="row" style="width: 100%">
                <p style="float: right; padding-right: 15px;">Total:<span ><?=$total;?></span></p><br/>
                <hr>
                <div class="info" style="float: right; font-size: 14px;">
                    <p >Amount: <span><?= $amount->paid; ?></span></p>
                    <p>Installment Date: <span><?= date('d.m.Y', strtotime($amount->date)); ?></span></p>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <span>Sign: ___________________________ </span>
                <span>Date: ___________________________ </span>
            </div>

        </div>
        
    </div> <!-- end of middle-->

</div>

</body>
</html>