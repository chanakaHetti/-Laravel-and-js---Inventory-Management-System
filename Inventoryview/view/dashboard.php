<!doctype html>
<html lang="en">

<head>
    
    <?php include "layout/assets.php"; ?>

</head>

<body>
    <div class="wrapper">

        <!-- SIDE BAR -->

        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                    Inventory Store
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="inventory.php">
                            <i class="material-icons">library_books</i>
                            <p>Inventory Item</p>
                        </a>
                    </li>
                    <li>
                        <a href="category.php">
                            <i class="material-icons">library_books</i>
                            <p>Inventory Category</p>
                        </a>
                    </li>
                    <li>
                        <a href="subcategory.php">
                            <i class="material-icons">library_books</i>
                            <p>Inventory Sub-Category</p>
                        </a>
                    </li>
                    <li>
                        <a href="grn.php">
                            <i class="material-icons">content_paste</i>
                            <p>ADD GRN</p>
                        </a>
                    </li>
                    <li>
                        <a href="gin.php">
                            <i class="material-icons">content_paste</i>
                            <p>ADD GIN</p>
                        </a>
                    </li>
                    <li>
                        <a href="suppliers.php">
                            <i class="material-icons">person</i>
                            <p>Suppliers Details</p>
                        </a>
                    </li>
                    <li>
                        <a href="customers.php">
                            <i class="material-icons">person</i>
                            <p>Customers Details</p>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>
        </div>

        <!-- END OF SIDE BAR -->


        <!-- PANEL   -->
        <div class="main-panel">

            <!-- HEADER -->
            <nav class="navbar navbar-transparent navbar-absolute">
                
                <?php include "layout/navbar.php"; ?>
                
            </nav><!-- END OF HEADER -->



            <!-- CONTENT -->
            <div class="content">
                <!-- <link type="text/css" href="../assets/css/DateTime/bootstrap.min.css" rel="stylesheet"> -->
                <div class="container-fluid">

                    
                        
                        <div class="row" style="    margin-bottom: 35px;">


                            <!-- DROPDOWNN -->
                            <div class="col-md-4">

                                <div class="form-group">

                                    <form>
                                        <label for="exampleFormControlSelect1"></label>
                                        <select class="form-control">
                                            <option>Find Here</option>>
                                            <option value="gin" >GIN</option>
                                            <option value="grn" >GRN</option>
                                            <option value="inventory">Inventory</option>
                                        </select>
                                    </form>
                                </div>

                            </div>


                            <!-- SEARCH BOX -->
                            <div class="col-md-4 col-md-offset-1">

                                <div class="form-group">
                                    <form>
                                        <label for="exampleFormControlSelect1"></label>
                                        <input style="padding-left: 5px" type="text" placeholder="Search Here" id="search" class="form-control" value="">
                                    </form>
                                </div>

                            </div>


                            <!-- SEARCH BUTTON -->
                            <div class="col-md-2 com-md-offset-1" style="margin-top: 35px;">
                                
                                <!-- <label for="exampleFormControlSelect1"></label> -->
                                <button type="button" class="btn">Search</button>

                            </div>

                        </div>


                        <!-- WELCOME DIV -->
                        <div class="welcome">

                              <div class="jumbotron" style="text-align: -webkit-center;">
                                    <h1>WELCOME TO</h1>      
                                    <p>Inventory Management System</p>
                              </div> 

                              <div class="row" style="text-align: -webkit-center !important;  margin-bottom: 40px;">
                                  
                                  <i class="material-icons">list</i>
                                  <i class="material-icons">find_in_page</i>
                                  <i class="material-icons">settings</i>
                                  <i class="material-icons">verified_user</i>
                                  <i class="material-icons">language</i>

                              </div>


                        </div>


                        <!-- GIN -->
                        <div class="row">
                            
                            <div class="gin box">

                                <input name="textbox1" type="text" id="bu"/>
                                <input name="buttonExecute" type="button" id="butto"  value="Execute" />
                                <input name="textbox1" type="text" id="bu2"/>

                                 <script>
                                  $( function() {
                                    $.ajax({
                                        url:'../json/test.json',
                                        url:'http://127.0.0.1:8000/api/customers/',
                                        datatype:'json',
                                        type:'get',
                                        cache:false,
                                        success:function(data){
                                            // $(data).each(function(index,value){
                                                    
                                            // });

                                            $("#butto").click(function(){
                                                // var json = data;
                                                // console.log(data);
                                                var u_data = $("#bu").val();
                                                $.each(data, function(i, v) {
                                                    if (v.cus_fname == u_data) {
                                                        alert("Address is " +v.cus_address);
                                                        $("#cus_address").val(v.cus_address);
                                                    }
                                                });
                                            });

                                        }
                                    }); 
                                   
                                  } );
                                  </script>







                                
                                <form id="form"></form>

                                <div id="field"></div>

                                <div id="field2"></div>

                                
                                <script type="text/javascript">


                                    // FIELD ONE
                                    $("#field").alpaca({
                                        "data"  :   {
                                            "date"  :   ""
                                        },
                                        "schema":   {
                                            "title" :   "Goods Issue Note",
                                            "type"  :   "object",
                                            "properties":   {
                                                "customer_id"   : {
                                                    "title" : "Customer ID",
                                                    "type"  : "number"
                                                },
                                                "date"  : {
                                                    "title" : "Date",
                                                    //"format": "datetime",
                                                    "type"  : "string"
                                                },
                                                "cus_name": {
                                                    "title" : "Customer Name",
                                                    "type"  : "string"
                                                },
                                                "cus_address": {
                                                    "title" : "Customer Address",
                                                    "type"  : "string"
                                                },
                                                "cus_city": {
                                                    "title" : "Customer City",
                                                    "type"  : "string"
                                                },
                                                "gin_remarks": {
                                                    "title" : "Remarks",
                                                    "type"  : "string"
                                                }
                                            }

                                        }
                                        ,
                                        "options": {
                                            "date": {
                                                "picker": {
                                                    "format": "DD/MM/YYYY"
                                                },
                                                "manualEntry": false
                                            },
                                            "cus_name":{
                                                    "id" : "cus_name"
                                            },
                                            "cus_address" :{
                                                    "id" : "cus_address"
                                            },
                                            "form": {
                                                "buttons": {
                                                    "submit": {
                                                        "click": function () {
                                                            $.ajax({
                                                                url:'../json/test.json',
                                                                url:'http://127.0.0.1:8000/api/customers/',
                                                                datatype:'json',
                                                                type:'get',
                                                                cache:false,
                                                                success:function(data){
                                                                    var u_data = $("#cus_name").val();
                                                                    $.each(data, function(i, v) {
                                                                        if (v.cus_fname == u_data) {
                                                                            lert("Address is " +v.cus_address);
                                                                            $("#cus_address").val(v.cus_address);
                                                                        }
                                                                    });
                                                                }
                                                            }); 
                                                    }
                                                }
                                            }
                                        }

                                        }


                                    });

                                    


                                    // FIELD TWO
                                    $("#field2").alpaca({
                                        "data": [{
                                            "title": "title1",
                                            "amount": 2.53
                                        }],
                                        "schema": {
                                            "title": "Enter Item Details",
                                            "type": "array",
                                            "label": "gin_items",
                                            "items": {
                                                "type": "object",
                                                "properties": {
                                                    "inventory_item_id": {
                                                        "type": "number",
                                                        "title": "Inventory Item ID"
                                                    },
                                                    "item_name": {
                                                        "type": "string",
                                                        "title": "Item Name"
                                                    },
                                                    "grn_quantity": {
                                                        "type": "number",
                                                        "title": "Quantity"
                                                    },
                                                    "grn_remarks": {
                                                        "type": "string",
                                                        "title": "Item Remarks"
                                                    }
                                                }
                                            }
                                        },
                                        "options": {
                                            "type": "table",
                                            "form": {
                                                "buttons": {
                                                    "submit": {
                                                        "click": function () {
                                                         var div1 = $("#field").alpaca("get").getValue();
                                                         var div2 = $("#field2").alpaca("get").getValue();
                                                        //var ths = this.getValue();

                                                        var sum = $.extend(div1, div2);

                                                        // var customer_id = div1.customer_id;
                                                        // var gin_date = div1.date;
                                                        // var cus_name = div1.cus_name;
                                                        // var cus_address = div1.cus_address;
                                                        // var sup_city = div1.sup_city;
                                                        // var gin_remarks = div1.gin_remarks;

                                                        var value = JSON.stringify(sum);
                                                        // alert(value);
                                                        // Ajax request
                                                        $.ajax({
                                                            url: "http://127.0.0.1:8000/api/gins",
                                                            method: "post",
                                                            data: value,
                                                            dataType: 'json',
                                                            contentType: "application/json",
                                                             success: function(result,status,jqXHR ){
                                                                  // alert(result);
                                                             },
                                                             error(jqXHR, textStatus, errorThrown){
                                                                 // alert(errorThrown);
                                                             }
                                                        });
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    });

                                </script>

                            </div>
                        </div>





                        <!-- GRN VIEW -->
                         <div class="row">   
                            <div class="grn box">
                                
                                <div class="table-responsive">
                                    <table id="grn" class="table table-bordered" cellspacing="10" width="100%">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Suplier Name</th>
                                                <th>Suplier Address</th>
                                                <th>Suplier City</th>
                                                <th>Suplier Remark</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>





                        <!-- INVENTORY VIEW -->
                        <div class="row">   
                            <div class="inventory box">
                                
                               

                            </div>
                        </div>



                            
                        <!-- View GIN ITEM MODAL -->
                            <div class="modal fade" id="view-gin-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">GIN Report</h4>
                                  </div>
                                  <div class="modal-body">

                                        <div class="table-responsive">

                                            <table id="gin-item" class="table table-bordered" cellspacing="10" width="100%">

                                                <thead>
                                                    <tr>
                                                        <th>Item ID</th>
                                                        <th>Item Quantity</th>
                                                        <th>Item Name</th>
                                                        <!-- <th>Item Unit</th>
                                                        <th>Date</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>

                                        </div>

                                  </div>
                                </div>
                              </div>
                            </div>


                            <!-- View GRN ITEM MODAL -->
                            <div class="modal fade" id="view-grn-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">GRN Report</h4>
                                  </div>
                                  <div class="modal-body">

                                        <div class="table-responsive">

                                            <table id="grn-item" class="table table-bordered" cellspacing="10" width="100%">

                                                <thead>
                                                    <tr>
                                                        <th>Item ID</th>
                                                        <th>Item Quantity</th>
                                                        <th>Item Name</th>
                                                        <!-- <th>Item Unit</th>
                                                        <th>Date</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>

                                            <div id="grn-item-data"></div>

                                        </div>

                                  </div>
                                </div>
                              </div>
                            </div>





                    <script type="text/javascript">
                        
                        $(document).ready(function(){
                            $("select").change(function(){
                                $(this).find("option:selected").each(function(){
                                    var optionValue = $(this).attr("value");
                                    if(optionValue){
                                        $(".box").not("." + optionValue).hide();
                                        $("." + optionValue).show();
                                        $(".welcome").hide();
                                    } else{
                                        $(".box").hide();
                                        $(".welcome").show();
                                    }
                                });
                            }).change();
                        });


                        // GIN LOAD
							$(document).ready(function() {
                            $('#gin').DataTable({
                                "processing" : true,
                                "ajax" : {
                                    "url" : "../json/test.json",
                                    // "url" : "http://127.0.0.1:8000/api/customers",
                                    dataSrc : ''
                                },
                                "columns" : [  {
                                    "data" : "id"
                                    // "data" : "item[].item_id"
                                }, {
                                    "data" : "name"
                                    // "data" : "item[].gin_qty"
                                }, {
                                    "data" : "address"
                                    // "data" : "item[].item_id"
                                }, {
                                    "data" : "city"
                                    // "data" : "item[].item_id"
                                }, {
                                    "data" : "remark"
                                    // "data" : "item[].item_id"
                                },

                                {
                                    data: null,
                                        className: "center",
                                },],
                                "rowCallback": function( row, data, index ) {
                                    $('td:eq(5)', row).html('<button data-toggle="modal" data-target="#view-gin-item" class="btn btn-primary btn-xs edit-item" data-id="'+data.id+'">View</button>');
                                }
                                
                            });

                        });



                        // GIN ITEM GET

                        $("body").on("click",".edit-item",function(){
                            var i = $(this).data('id');

                            var mydata = [];
                                $.ajax({
                                  url       :   '../json/test.json',
                                  async     :   false,
                                  data      :   'data',
                                  cache     :    false,
                                  dataType  :   'json',
                                  success   : function manageRow(data) {

                                    var mydata = data[i-1];
                                    // console.log(mydata);

                                    // var json = JSON.parse(mydata);

                                    // console.log(mydata["name"]); 
                                    // console.log(mydata.item[0]);


                                    // alert(mydata);

                                    // ginItem = JSON.stringify(mydata.item);


                                    // alert(ginItem);
                                    // console.log(ginItem);


                                    // alert(ginItem.item_id);
                                    // console.log(ginItem[0].gin);
                                    

                                    var rows = '';
                                     $.each( data, function( index) { 
                                        rows = rows + '<tr>';
                                        rows = rows + '<td>'+data.item_id+'</td>';
                                        rows = rows + '<td>'+data.gin_qty+'</td>';
                                        rows = rows + '<td>'+data.gin_item_name+'</td>';
                                        rows = rows + '</tr>';
                                     });

                                     $('#gin-item tbody').html(rows);
                                    }
                                });
                        });


                        



                        //GRN LOAD
                         $(document).ready(function() {
                            $('#grn').DataTable({
                                "processing" : true,
                                "ajax" : {
                                    // "url" : "../json/grn.json",/
                                    "url" : "http://127.0.0.1:8000/api/grns/1",
                                    dataSrc : ''
                                },
                                "data" : "data",
                                "columns" : [  {
                                    "datatype" : "supplier_id"
                                    // "data" : "item[].item_id"
                                }, {
                                    "data" : "inventory_item_id"
                                    // "data" : "item[].gin_qty"
                                }, {
                                    "data" : "grn_quantity"
                                    // "data" : "item[].item_id"
                                }, {
                                    "data" : "grn_id"
                                    // "data" : "item[].item_id"
                                }, {
                                    "data" : "grn_item_remarks"
                                    // "data" : "item[].item_id"
                                },

                                {
                                    data: null,
                                        className: "center",
                                },],
                                "rowCallback": function( row, data, index ) {
                                    $('td:eq(5)', row).html('<button data-toggle="modal" data-target="#view-grn-item" class="btn btn-primary btn-xs edit-item" data-id="'+data.id+'">View</button>');
                                }
                                
                            });

                        });


                         // GRN ITEM GET
                        $("body").on("click",".edit-item",function(){
                            var i = $(this).data('id');

                            var mydata = [];
                                $.ajax ({
                                  url       :   '../json/grn.json',
                                  async     :   false,
                                  data      :   'data',
                                  cache     :    false,
                                  dataType  :   'json',
                                  success   : function manageRow(data) {
                                    var mydata = data[i-1];
                                    // console.log(mydata);

                                    // var json = JSON.parse(mydata);

                                    // console.log(mydata["name"]); 
                                    // console.log(mydata.item[0]);


                                    // alert(mydata);

                                     var grnItem = JSON.stringify(mydata);
                                     var item_id = grnItem.grn_item_id;

                                    alert(grnItem);
                                    alert(mydata);
                                    // console.log(ginItem);

                                    $('<div class="item"></div>').html(grnItem).appendTo('#grn-item-data');
                                        
                                   


                                    // alert(ginItem.item_id);
                                    // console.log(ginItem[0].gin);
                                    

                                    // var rows = '';
                                    //  $.each( data, function( index) { 
                                    //     rows = rows + '<tr>';
                                    //     rows = rows + '<td>'+data.inventory_item_id+'</td>';
                                    //     rows = rows + '<td>'+data.sup_name+'</td>';
                                    //     rows = rows + '<td>'+data.id+'</td>';
                                    //     rows = rows + '</tr>';
                                    //  });

                                    //  $('#grn-item tbody').html(rows);



                                    // LOAD DATA ON DIV
                                    // $(data).each(function(){
                                    //     var id = $(this).attr('id');
                                    //     var name = $(this).attr('sup_name');
                                    //     var item = $(this).attr('inventory_item_id');
                                    //     alert(item);
                                    //     var item2 = JSON.stringify(item)
                                        // alert(item2);

                                    //     $('<div class="item"></div>').html(item).appendTo('#grn-item-data');
                                    // });


                                }
                            });

                        });



                        // INVENTORY LOAD
                        // $(document).ready(function() {
                        //     $('#inventory').DataTable({
                        //         "processing" : true,
                        //         "ajax" : {
                        //             "url" : "http://127.0.0.1:8000/api/customers",
                        //             dataSrc : ''
                        //         },
                        //         "columns" : [  {
                        //             "data" : "cus_fname"
                        //         }, {
                        //             "data" : "cus_laname"
                        //         }, {
                        //             "data" : "cus_address"
                        //         }, {
                        //             "data" : "cus_city"
                        //         }, {
                        //             "data" : "cus_email"
                        //         }, {
                        //             "data" : "status"
                        //         }, {
                        //             data: null,
                        //                 className: "center",
                        //                 // defaultContent: '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary btn-xs edit-item">Edit</button>  | <button class="btn btn-danger btn-xs remove-item">Delete</button>'
                        //         },],
                        //         "rowCallback": function( row, data, index ) {
                        //             $('td:eq(6)', row).html('<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary btn-xs edit-item" data-id="'+data.customer_id+'">Edit</button>  | <button class="btn btn-danger btn-xs remove-item" data-id="'+data.customer_id+'">Delete</button>');
                        //         }
                        //     });

                        // });

                    </script>
                    
                </div>
            </div><!-- END OF CONTENT -->

            <!-- FOOTER -->
            <footer class="footer">
                
                <?php include "layout/footer.php"; ?>

            </footer><!-- END OF FOOTE -->
        </div><!-- END OF PANEL -->
    </div>
</body>
<!--   Core JS Files   -->


</html>