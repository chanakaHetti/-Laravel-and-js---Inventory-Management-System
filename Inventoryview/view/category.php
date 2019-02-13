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
                    <li class="active">
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
                    <li >
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
                          <strong id="category_name"></strong> 
                        </div>

                    <!-- Success alert for update-->
                        <div class="alert alert-success"  style="display: none ; width: 300px" id="suc-update-msg-area">
                            <strong id="id"></strong>
                        </div>

                    <!-- Success alert for delted -->
                        <div class="alert alert-success"  style="display: none; width: 300px" id="suc-delete-msg-area">
                            <strong id="delete-msg-area">
                                Successfully deleted
                            </strong>
                        </div>
                    
                <div class="container-fluid">
                    
                    <div class="row" style="margin: 0 0 20px 0">


                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#customer" style="float: right">Add Categoris</button>

                        

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
                                    <th>Category</th>
                                    
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
                                "category_name": {
                                    "type": "string",
                                    "required": false,
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

                                            var category_name = value.category_name;
                                            
                                            // Ajax request
                                            $.ajax({
                                                url:"http://127.0.0.1:8000/api/categories",
                                                type:"post",
                                                data:{category_name:category_name},
                                                success:function(data){
                                                    if ($.isEmptyObject(data.error)) {
                                                        
                                                        $("#err-msg-area").hide();
                                                        $("#suc-msg-area").show();

                                                        $.each(data.addedItem, function (index, value) {
                                                        $("#" + index).text(value + ' added successfully');

                                                        
                                                        $("#suc-msg-area").fadeOut(3000);
                                                        /*$("#example").ajax.reload();*/

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
                            "category_id": {
                            "type": "string",
                            "required": false,
                            "properties": {}
                            },
                            "category_name"     : {
                                "type"      :   "string",
                                "title"     :   "Category name",
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
                                    "click" : function() {
                                            var value = this.getValue();

                                            var category_name = value.category_name;
                                           
                                            var category_id  = value.category_id;

                                            // Ajax request
                                            $.ajax({
                                                url:"http://127.0.0.1:8000/api/categories/"+category_id,
                                                type:"PUT",
                                                data:{category_name:category_name},
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
                            "category_id": {
                            "type": "hidden",
                            "label": "New hidden",
                            "helpers": [],
                            "validate": true,
                            "disabled": false,
                            "showMessages": true,
                            "renderButtons": true,
                            "fields": {}
                            },
                            "category_name" :   {
                                "size"  : 20,
                                "name"  :   "category_name",
                                "placeholder": "Enter First Name"
                        }
                            
                        }
                    }
                    
                });
            });


    // Load data to the table when page load
        $(document).ready(function() {

             $('#example').DataTable({
                "processing" : true,
                "ajax" : {
                    "url" : "http://127.0.0.1:8000/api/categories",
                    dataSrc : ''
                },
                "columns" : [  {
                    "data" : "category_name"
                },{
                    data: null,
                        className: "center",
                },],
                "rowCallback": function( row, data, index ) {
                    $('td:eq(1)', row).html('<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary btn-xs edit-item" data-id="'+data.id+'">Edit</button>  | <button class="btn btn-danger btn-xs remove-item" data-id="'+data.id+'">Delete</button>');
                }
            });

        });


        /* Edit Item */
        // Get data from table to the form
        $("body").on("click",".edit-item",function(){
            var category_id = $(this).data('id');
            var category_name = $(this).parent("td").prev("td").text();
            
            // Assign table data into form input elements for edit
            alert(category_name);
            $("#edit-item").find("input[name='category_id']").val(category_id);
            $("#edit-item").find("input[name='category_name']").val(category_name);


            
        });




        /* Remove Item */
        $("body").on("click",".remove-item",function(){
            var category_id = $(this).data('id');
           //alert(cus_id);
            $.ajax({
                url: "http://127.0.0.1:8000/api/categories" + "/" + category_id,
                type:'delete',
                
                success: function(data){ 
                  if(data.code == 200){

                    $("#suc-delete-msg-area").show();
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