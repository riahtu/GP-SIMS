<?php
require 'session.php';
require 'crud.php';
$oop = new CRUD();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Golden Pharmaceutical</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fixedColumns.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables.min.css">
        <!-- DatePicker -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style_css.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
 </head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-brand">
            <img src="../img/logo.png" alt="Company Logo" style="height:55px;width: 55px;">   
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">       
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="not"><i class="fa fa-bell fa-lg"></i><span class="label label-warning badge" id="notify">
                    <?php
                        echo $counting0;
                    ?>
                    </span>
                </a> 
               <ul class="dropdown-menu">
                   <li>
                   <?php 
                        while ($row = mysqli_fetch_array($mysql,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Expiring Product</li>";
                            echo "<li><a href='viewProduct'>".$row['name'].' '.$row['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql2,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Out of Stocks</li>";
                            echo "<li><a href='viewProduct'>".$rows['name'].' '.$rows['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql3,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Overdue</li>";
                            echo "<li><a href='viewInvoice'>Sales No. ".sprintf('%04d',$rows['sales_no'])."</a></li>";
                        }
                   ?>
                   </li>
                   <li class='divider'></li>
               </ul>
            </li>        
            <li>
                    <a href="index"><i class="fa fa-fw fa-tachometer">&nbsp;</i>Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-fw fa-user-md"></b><?php echo $name;?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-6"><i class="fa fa-fw fa-inbox"></i> Collections Receipt <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-6" class="collapse">
                        <li><a href="addCR"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewCR"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-7"><i class="fa fa-fw  fa-credit-card"></i> Credit/Debit Memo <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-7" class="collapse">
                        <li><a href="addCM"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewCM"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-8"><i class="fa fa-fw  fa-shopping-cart"></i> Purchase Orders<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-8" class="collapse">
                        <li><a href="addPO"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewPO"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-9"><i class="fa fa-fw  fa-ruble"></i> Expenses<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-9" class="collapse">
                        <li><a href="viewExCat"><i class="fa fa-align-left">&nbsp;</i>Expenses Category</a></li>
                        <li><a href="viewExList"><i class="fa fa-align-right">&nbsp;</i>Expeses List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-tags"></i> Sales <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="addInvoice"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewInvoice"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="addProduct"><i class="fa fa-plus">&nbsp;</i>Inventory In</a></li>
                        <li><a href="viewProduct"><i class="fa fa-list">&nbsp;</i>View</a></li>
                        <li><a href="viewInvOut"><i class="fa fa-minus">&nbsp;</i>Inventory Out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="addCustomer"><i class="fa fa-user-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewCustomers"><i class="fa fa-users">&nbsp;</i>View</a></li>
                        <li><a href="viewCustPro"><i class="fa fa-user-circle">&nbsp;</i>Customers Profile</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-id-card"></i> Employee <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-4" class="collapse">
                        <li><a href="addEmployee"><i class="fa fa-user-plus">&nbsp;</i>Add </a></li>
                        <li><a href="viewEmployee"><i class="fa fa-users">&nbsp;</i>View </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-10"><i class="fa fa-fw fa-truck"></i> Suppliers <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-10" class="collapse">
                        <li><a href="addSup.php"><i class="fa fa-user-plus">&nbsp;</i>Add </a></li>
                        <li><a href="viewSup.php"><i class="fa fa-users">&nbsp;</i>View </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-5" class="collapse">
                        <li><a href="addUser"><i class="fa fa-user-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewUser"><i class="fa fa-users">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings"><i class="fa fa-fw fa-cogs">&nbsp;</i>Settings</a>
                </li>
                <li>
                    <hr>
                    <center>
                        <div class="container-fluid" style="color: #fff;">
                            <p><b style="font-size:16px;">Golden Pharmaceutical</b><br>
                            <i style="font-size: 10px;">Bolonsiri Road, Camaman-an,</i><br><i style="font-size: 9px"> Cagayan De Oro City</i><br><i style="font-size: 8px;">Telefax (088) 857-3088</i></p> 
                             <p>All Rights Reserved 2017.</p>   
                        </div>
                    </center>                    
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div class="container-fluid">
        <div class="row">
          <ol class="breadcrumb">
          <li><a href="index">Overview</a></li>
          <li class="active">View Customer's Profile</li>
          </ol>
          <hr>
        </div>
        <div class="row">
            <div class="col-sm-4">
              
            </div>
            <div class="col-sm-4">
              <button type="button" id="soa" class="btn btn-info form-control"><b class="fa fa-file-text">&nbsp;</b>Statement of Accounts</button>
            </div>
            <div class="col-sm-4">
              
            </div>
        </div>   
        <div class="row">
          <div class="col-sm-4">
            
          </div>
          <div class="col-sm-4">
            <select name="cust" class="cus form-control" style="display: none;">
              <?php
                $sql = mysqli_query($db,"SELECT * FROM tbl_customers GROUP BY full_name ASC");
                while ($row = mysqli_fetch_array($sql)) {
                    echo "<option value='".$row['cus_id']."'>".$row['full_name']."</option>";
                }
              ?>
            </select>
            <button class="btn btn-primary form-control cus"  style="display: none;">Submit</button>
          </div>
          <div class="col-sm-4">
            
          </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="input-group date min">
                <span class="input-group-addon" ><b class="fa fa-calendar">&nbsp;</b>Date From:</span>
                <input name="date" id="min" class="form-control" size="16" type="text" placeholder="">
                <input type="hidden" id="dateFrom">
              </div> 
            </div>
            <div class="col-sm-3">
              <div class="input-group date max">
                <span class="input-group-addon" ><b class="fa fa-calendar">&nbsp;</b>Date To:</span>
                <input name="date" id="max" class="form-control" size="16" type="text" placeholder="">
                <input type="hidden" id="dateTo">
              </div>
            </div>
            <div class="col-sm-4">
              
            </div>
            <div class="col-sm-2">
              
            </div>
        </div> 
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Sales Invoice No.</th>
                            <th>Terms</th> 
                            <th>Due Date</th> 
                            <th>DEBIT</th> 
                            <th>CREDIT</th> 
                            <th>Balance</th> 
                            <th>Edit</th> 
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db, "SELECT * FROM tbl_SOA") or die(mysql_error());
                      $i=1;
                    ?>
                    <tbody>
                      <?php
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        // if ($row['total']==$row['CREDIT']) {
                                
                        // }else{    
                        ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['dates']; ?></td>
                            <td><?php echo sprintf('%04d',$row['sales_no']); ?></td>
                            <td><?php echo $row['terms'];?></td>
                            <td><?php echo $row['due_date'];?></td>
                            <td><?php echo number_format($row['DEBIT'],2);?></td>
                            <td><?php echo number_format($row['CREDIT'],2);?></td>
                            <td><?php echo number_format($row['BALANCE'],2); ?></td>
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edits btn btn-warning btn-xs"  data-title="Edit"  data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                                <b data-placement="top" title="Delete"><button class="btn-deletes btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['id']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
                            </td> 
                          </tr>
                      <?php 
                        // }
                    }
                         ?>
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th> 
                        <th></th> 
                        <th></th> 
                        <th></th> 
                        <th></th> 
                        <th></th> 
                        <th></th>
                    </tfoot>
                </table>               
            </div>
          </div>
        </div>
    </div>
            <!-- /.row -->
        <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- DatePicker -->
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="../js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.flash.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var table = $('#datatables').dataTable({
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
           var min = $("#min").val();
            var max = $("#max").val();
            // Total over all pages

            // Total over this page
            pageTotal2 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $(api.column(1).footer()).html(
                'Date From: '+min
            );
            $(api.column(2).footer()).html(
                'Date To: '+max
            );
            $( api.column( 6 ).footer() ).html(
                'Accounts Receivable:'
            );    
            $( api.column( 7 ).footer() ).html(
                '₱'+pageTotal2.toFixed(2)
            );      
        },
       "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        // fixedColumns:{
        //     leftColumns: 2
        // },
        "oLanguage": {
          "sSearch": "<b class='fa fa-search fa-lg'>&nbsp;</b>",
          "sLengthMenu": "<b id='data-menu'><b class='fa fa-eye fa-lg'>&nbsp;</b>Show _MENU_ records</b>&nbsp;"
        },
        "pagingType": "full_numbers",
        dom: 'lBfrtip',
        buttons: [
            {
              "extend":'copy', "text":'<span class="fa fa-copy fa-lg">&nbsp;</span>Copy',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'excel', "text":'<span class="fa fa-file-excel-o fa-lg">&nbsp;</span>Excel',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'pdf', "text":'<span class="fa fa-file-pdf-o fa-lg">&nbsp;</span>PDF',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'print', "text":'<span class="fa fa-print fa-lg">&nbsp;</span>Print',"className": 'btn btn-primary btn-xs' 
            }
        ]
    });
     $('.min,.max').datepicker({format: "mm-dd-yyyy",'clearBtn':true,todayHighlight:true,autoclose:true}).change(function () {
           table.fnFilter();
    });
    // DateRange
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
      var min = $('.min').datepicker('getDate');
      var max = $('.max').datepicker('getDate');
      var startDate = new Date(data[1]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate <= max) { return true;}
      if(max == null && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
      return false;
    });   
    $('.btn-edits').click(function(event) {
        var id = $(this).data("id");
        var us = $(this).data("us");
        var pa = $(this).data("pa");
        $("#us").val(us);
        $("#pa").val(pa);
        $("#id").val(id);
    });
    $('.btn-deletes').click(function(event) {
       var did = $(this).data("did");
       $("#delid").val(did);
    });
    $("#not").click(function(event) {
        $("#notify").hide();
    });
    function check() {
        var val = $("#notify").text();
        if (val==0) {
            $("#notify").hide();
        }
    }
    check();    
    $("#soa").click(function(event) {
      $(".cus").slideToggle('500');
    });
});
</script>
</body>
</html>