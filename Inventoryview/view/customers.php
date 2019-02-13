<!doctype html>
<html lang="en">

<head>

    <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <?php include "layout/assets.php"; ?>

</head>

<body>
    <div class="wrapper">

        <!-- SIDE BAR -->

        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
       
            <div class="logo">
                <a href="#" class="simple-text">
                    Inventory Store
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
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
                    <li class="active">
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

                    <!-- Success alert for added-->
                        <div class="alert alert-success" id="suc-msg-area" style="display: none">
                          <strong id="cus_fname"></strong> 
                        </div>

                    <!-- Success alert for update-->
                        <div class="alert alert-success"  style="display: none ; width: 300px" id="suc-update-msg-area">
                            <strong id="id"></strong>
                        </div>

                    <!-- Success alert for delted -->
                        <div class="alert alert-success"  style="display: none; width: 300px" id="suc-delete-msg-area">
                            <strong id="delete-msg-area">
                                Status successfully changed
                            </strong>
                        </div>
                    
                <div class="container-fluid">
                    
                    <div class="row" style="margin: 0 0 20px 0">


                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#customer" style="float: right">Add Customer</button>

                        

                          <!-- Modal -->
                        <div class="modal fade" id="customer" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="padding-bottom: 24px; background-color: rgba(202, 202, 202, 0.61);">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Enter Details</h4>
                                    </div>
                                    <div class="modal-body" id="form"></div>

                                    
                                </div>
                            </div>
                        </div>

                        <!-- errors -->
                                    <div class="alert alert-danger" id="err-msg-area" style="display: none; width: 300px">
                                          <strong id="err-msg"></strong> 
                                    </div>


                            <!-- Edit Item Modal -->
                            <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                                  </div>
                                  <div class="modal-body" id="formedit">



                                  </div>
                                </div>
                              </div>
                            </div>

                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table-bordered" cellspacing="10" width="100%">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th style ="width: 150px !important;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                         <p><tt id="results"></tt></p>

                    </div>
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


    <script type="text/javascript">


        // ADD NEW CUSTOMER
            $(document).ready(function() {
                $("#form").alpaca({
                            "schema": {
                            "type": "object",
                            "required": false,
                            "properties": {
                                "cus_fname": {
                                    "type": "string",
                                    "required": false,
                                    "properties": {}
                                },
                                "cus_lname": {
                                    "type": "string",
                                    "required": false,
                                    "properties": {}
                                },
                                "cus_address": {
                                    "type": "string",
                                    "required": false,
                                    "properties": {}
                                },
                                "cus_city": {
                                    "type": "string",
                                    "required": false,
                                    "properties": {}
                                },
                                "cus_email": {
                                    "readonly": false,
                                    "required": false,
                                    "type": "string",
                                    "format": "email",
                                    "disallow": [],
                                    "enum": [],
                                    "properties": {}
                                }
                            }
                        },
                        "options": {
                            "focus": false,
                            "type": "object",
                            "helpers": [],
                            "validate": true,
                            "disabled": false,
                            "showMessages": true,
                            "collapsible": false,
                            "legendStyle": "button",
                            "form":{
                                "attributes":{
                                    /*"action":"/api/customers",
                                    "method": "post"*/
                                },
                                "buttons":{
                                    "submit":{
                                        "title": "Send Form Data",
                                        "click": function() {
                                            var value = this.getValue();

                                            var cus_fname = value.cus_fname;
                                            var cus_lname = value.cus_lname;
                                            var cus_address = value.cus_address;
                                            var cus_city = value.cus_city;
                                            var cus_email = value.cus_email;

                                            // Ajax request
                                            $.ajax({
                                                url:"http://127.0.0.1:8000/api/customers",
                                                type:"post",
                                                data:{cus_fname:cus_fname, cus_lname:cus_lname, cus_address:cus_address, cus_city:cus_city, cus_email:cus_email},
                                                success:function(data){
                                                    if ($.isEmptyObject(data.error)) {
                                                        
                                                        $("#err-msg-area").hide();
                                                        $("#suc-msg-area").show();
                                                        
                                                        $.each(data.successData, function (index, value) {
                                                        $("#" + index).text(value + ' added successfully');
                                                        $("#suc-msg-area").fadeOut(3000);
                                                        $("#example").ajax.reload();

                                                    })

                                                        
                                                    } else {
                                                        var errorString = "";
                                                        $("#err-msg-area").show();
                                                        $("#suc-msg-area").hide();
                                                        $.each(data.error, function(index, value){
                                                                errorString +='<li>'+value+'<li>';
                                                        });
                                                        $("#err-msg").html(errorString);
                                                        $("#err-msg-area").fadeOut(3000);
                                                    }
                                                }
                                            });
                                            
                                            // Hide modal
                                            $('#customer').modal('toggle');

                                            //Refresh table
                                            /*var table = $("#example").DataTable({
                                                ajax:"data.json"
                                            });

                                            setInterval(function(){
                                                table.ajax.reload();
                                            }, 1000);*/
                                            
                                            
                                        }
                                    }
                                }
                            },
                            "fields": {
                                "cus_fname": {
                                    "type": "text",
                                    "validate": true,
                                    "showMessages": true,
                                    "disabled": false,
                                    "hidden": false,
                                    "label": "First Name",
                                    "helpers": [],
                                    "hideInitValidationError": false,
                                    "focus": true,
                                    "optionLabels": [],
                                    "name": "cus_fnane",
                                    "typeahead": {},
                                    "allowOptionalEmpty": true,
                                    "inputType": "text",
                                    "data": {},
                                    "autocomplete": false,
                                    "disallowEmptySpaces": false,
                                    "disallowOnlyEmptySpaces": false,
                                    "renderButtons": true,
                                    "attributes": {},
                                    "fields": {}
                                },
                                "cus_laname": {
                                    "type": "text",
                                    "validate": true,
                                    "showMessages": true,
                                    "disabled": false,
                                    "hidden": false,
                                    "label": "Last Name",
                                    "helpers": [],
                                    "hideInitValidationError": false,
                                    "focus": true,
                                    "optionLabels": [],
                                    "name": "cus_lname",
                                    "typeahead": {},
                                    "allowOptionalEmpty": true,
                                    "data": {},
                                    "autocomplete": false,
                                    "disallowEmptySpaces": false,
                                    "disallowOnlyEmptySpaces": false,
                                    "renderButtons": true,
                                    "attributes": {},
                                    "fields": {}
                                },
                                "cus_address": {
                                    "type": "text",
                                    "validate": true,
                                    "showMessages": true,
                                    "disabled": false,
                                    "hidden": false,
                                    "label": "Address",
                                    "helpers": [],
                                    "hideInitValidationError": false,
                                    "focus": true,
                                    "optionLabels": [],
                                    "name": "cus_address",
                                    "typeahead": {},
                                    "allowOptionalEmpty": true,
                                    "data": {},
                                    "autocomplete": false,
                                    "disallowEmptySpaces": false,
                                    "disallowOnlyEmptySpaces": false,
                                    "renderButtons": true,
                                    "attributes": {},
                                    "fields": {}
                                },
                                "cus_city": {
                                    "type": "text",
                                    "validate": true,
                                    "showMessages": true,
                                    "disabled": false,
                                    "hidden": false,
                                    "label": "City",
                                    "helpers": [],
                                    "hideInitValidationError": false,
                                    "focus": true,
                                    "optionLabels": [],
                                    "name": "cus_city",
                                    "typeahead": {},
                                    "allowOptionalEmpty": true,
                                    "data": {},
                                    "autocomplete": false,
                                    "disallowEmptySpaces": false,
                                    "disallowOnlyEmptySpaces": false,
                                    "renderButtons": true,
                                    "attributes": {},
                                    "fields": {}
                                },
                                "cus_email": {
                                    "type": "text",
                                    "validate": false,
                                    "showMessages": true,
                                    "disabled": false,
                                    "hidden": false,
                                    "label": "Emai",
                                    "helpers": [],
                                    "hideInitValidationError": false,
                                    "focus": true,
                                    "optionLabels": [],
                                    "name": "cus_email",
                                    "typeahead": {},
                                    "allowOptionalEmpty": true,
                                    "data": {},
                                    "autocomplete": false,
                                    "disallowEmptySpaces": false,
                                    "disallowOnlyEmptySpaces": false,
                                    "renderButtons": true,
                                    "attributes": {},
                                    "readonly": false,
                                    "fields": {}
                                }
                            }
                        }
                                            
                    });
            });


            




            // EDIT CUSTOMER
            $(document).ready(function() {
                $("#formedit").alpaca({
                    "schema": {
                        "title":"",
                        "description":"",
                        "type":"object",
                        "properties"    : {
                            "cus_id": {
                            "type": "string",
                            "required": false,
                            "properties": {}
                            },
                            "cus_fname"     : {
                                "type"      :   "string",
                                "title"     :   "First Name",
                                "required"  :   true
                            },
                            "cus_lname"     : {
                                "type"      :   "string",
                                "title"     :   "Last Name",
                                "required"  :   true
                            },
                            "cus_address"   : {
                                "type"      :    "string",
                                "title"     :    "Address",
                                "required"  :    true
                            },
                            "cus_city"      : {
                                "type"      :   "string",
                                "title"     :   "City",
                                "required"  :   true
                            },
                            "cus_email"     :{
                                "type"      :   "string",
                                "format"    :   "email",
                                "title"     :   "Email",
                                "required"  :   true

                            }
                        
                        }
                    },
                    "options"   : {
                        
                        "form"  :{
                            "attributes"    :   {
                               /* "action"    :   "'http://127.0.0.1:8000/api/customers' + cus_id",
                                "method"    :   "put"*/
                            },
                            "buttons"       :   {
                                "submit"    :   {
                                    "title" :   "Update",
                                    // "click" :   function() {
                                    //     var val = this.getValue();
                                    //     if (this.isValid(true)) {
                                    //         alert("Valid value: " + JSON.stringify(val, null, "  "));
                                    //         this.ajaxSubmit().done(function() {
                                    //             alert("Posted!");
                                    //         });
                                    //     } else {
                                    //         alert("Invalid value: " + JSON.stringify(val, null, "  "));
                                    //     }

                                    "click" : function() {
                                            var value = this.getValue();

                                            var cus_fname = value.cus_fname;
                                            var cus_lname = value.cus_lname;
                                            var cus_address = value.cus_address;
                                            var cus_city = value.cus_city;
                                            var cus_email = value.cus_email;
                                            var cus_id  = value.cus_id;

                                            // Ajax request
                                            $.ajax({
                                                url:"http://127.0.0.1:8000/api/customers/"+cus_id,
                                                type:"PUT",
                                                data:{cus_fname:cus_fname, cus_lname:cus_lname, cus_address:cus_address, cus_city:cus_city, cus_email:cus_email},
                                                success:function(data){
                                                    if ($.isEmptyObject(data.error)) {
                                                        
                                                        $("#err-msg-area").hide();
                                                        $("#suc-update-msg-area").show();
                                                        $.each(data.successData, function (index, value) {
                                                            $("#" + index).text('ID:'+value + ' successfully updated');
                                                            $("#suc-update-msg-area").fadeOut(3000);

                                                    })

                                                        
                                                    } else {
                                                        var errorString = "";
                                                        $("#err-msg-area").show();
                                                        $("#suc-msg-area").hide();
                                                        $.each(data.error, function(index, value){
                                                                errorString +='<li>'+value+'<li>';
                                                        });
                                                        $("#err-msg").html(errorString);
                                                        $("#err-msg-area").fadeOut(3000);
                                                    }
                                                }
                                            });
                                            
                                            // Hide modal
                                            $('#edit-item').modal('toggle');
                                            }
                                        }
                                    }
                                },
                        
                        "fields"    :   {
                            "cus_id": {
                            "type": "hidden",
                            "label": "New hidden",
                            "helpers": [],
                            "validate": true,
                            "disabled": false,
                            "showMessages": true,
                            "renderButtons": true,
                            "fields": {}
                        },
                            "cus_fname" :   {
                                "size"  : 20,
                                "name"  :   "cus_fname",
                                "placeholder": "Enter First Name"
                            },
                            "cus_laname" :   {
                                "size"  : 20,
                                "name"  :   "cus_laname",
                                "placeholder": "Enter Last Name"
                            },
                            "cus_address"  :   {
                                "type"  :   "textarea",
                                "name"  :   "cus_address",
                                "rows"  :   5,
                                "cols"  :   40
                            },
                            "cus_city" :   {
                                "size"  : 20,
                                "name"  :   "cus_city",
                                "placeholder": "Enter Last Name"
                            },
                            
                        }
                    },
                    
                });
            });


            



             
        $(document).ready(function() {



             $('#example').DataTable({
                "processing" : true,
                "ajax" : {
                    "url" : "http://127.0.0.1:8000/api/customers",
                    dataSrc : ''
                },
                "columns" : [  {
                    "data" : "cus_fname"
                }, {
                    "data" : "cus_lname"
                }, {
                    "data" : "cus_address"
                }, {
                    "data" : "cus_city"
                }, {
                    "data" : "cus_email"
                }, {
                    "data" : "cus_status"
                }, {
                    data: null,
                        className: "center",
                },],
                "rowCallback": function( row, data, index ) {
                    $('td:eq(6)', row).html('<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary btn-xs edit-item" data-id="'+data.id+'">Edit</button>  | <button class="btn btn-danger btn-xs remove-item" data-id="'+data.id+'">Delete</button>');
                }
            });

        });


        /* Edit Item */
        $("body").on("click",".edit-item",function(){
            var cus_id = $(this).data('id');
            //alert(cus_id);
            // var cus_id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var cus_fname = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var cus_lname = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var cus_address = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
            var cus_city = $(this).parent("td").prev("td").prev("td").prev("td").text();
            var cus_email = $(this).parent("td").prev("td").prev("td").text();
            var cus_status = $(this).parent("td").prev("td").text();
            $("#edit-item").find("input[name='cus_id']").val(cus_id);
            $("#edit-item").find("input[name='cus_fname']").val(cus_fname);
            $("#edit-item").find("input[name='cus_lname']").val(cus_lname);
            $("#edit-item").find("textarea[name='cus_address']").val(cus_address);
            $("#edit-item").find("input[name='cus_city']").val(cus_city);
            $("#edit-item").find("input[name='cus_email']").val(cus_email);
            $("#edit-item").find("input[name='cus_status']").val(cus_status);
            // $("#edit-item").find("form").attr("action",url + '/' + id);
        });




        /* Remove Item */
        $("body").on("click",".remove-item",function(){
            var cus_id = $(this).data('id');
           //alert(cus_id);
            $.ajax({
                url: "http://127.0.0.1:8000/api/customers" + "/" + cus_id,
                type:'delete',
                
                success: function(data){ 
                  if(data.code == 200){

                    //$("#suc-delete-msg-area").show();
                    $("#suc-delete-msg-area").show().fadeOut(3000);
                  }else{
                    
                  }
                  }    
                
            })
           
   
        });


    $(document).ready(function() {
         $('#excelDataTable').DataTable();
    } );


  </script>


</html>