<!doctype html>
<html lang="en">

<head>
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
    <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->

<!--    <!-- alpaca -->-->
<!--    <link type="text/css" href="https://code.cloudcms.com/alpaca/1.5.23/bootstrap/alpaca.min.css" rel="stylesheet"/>-->
<!--    <script type="text/javascript" src="https://code.cloudcms.com/alpaca/1.5.23/bootstrap/alpaca.min.js"></script>-->

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
                <li class="active">
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
            <div class="container-fluid">
                <form id="form"></form>
                <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
                <script src="https://code.cloudcms.com/alpaca/1.5.22/bootstrap/alpaca.min.js"></script>
                <link href="https://code.cloudcms.com/alpaca/1.5.22/bootstrap/alpaca.min.css" rel="stylesheet"/>-->

                <!-- Le styles -->
                <link type="text/css" href="../assets/css/DateTime/bootstrap.min.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/bootstrap-theme.min.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/font-awesome.min.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/bootstrap.vertical-tabs.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/syntax.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/style.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/custom.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/jquery-ui.css" rel="stylesheet">
                <link type="text/css" href="../assets/css/DateTime/bootstrap.vertical-tabs.css" rel="stylesheet">


                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>



                <!-- jQuery -->
                <script type="text/javascript" src="../assets/js/DateTime/jquery.min.js"></script>

                <!-- Bootstrap -->
                <script type="text/javascript" src="../assets/js/DateTime/bootstrap.min.js"></script>
                <script type="text/javascript" src="../assets/js/DateTime/bootstrap-datetimepicker.min.js"></script>
                <script type="text/javascript" src="../assets/js/DateTime/moment-with-locales.min.js"></script>
                <link type="text/css" href="../assets/css/DateTime/bootstrap-datetimepicker.css" rel="stylesheet">

                <!-- Handlebars -->
                <script type="text/javascript" src="../assets/js/DateTime/handlebars.min.js"></script>

                <!-- Alpaca -->
                <script type="text/javascript" src="../assets/js/DateTime/alpaca.js"></script>
                <link type="text/css" href="../assets/css/DateTime/alpaca.css" rel="stylesheet"/>

                <!-- jQuery UI Support -->
                <script type="text/javascript" src="../assets/js/DateTime/jquery-ui.js"></script>
                <link type="text/css" href="../assets/css/DateTime/jquery-ui.min.css" rel="stylesheet"/>

                <!-- Required for jQuery UI DateTimePicker control -->
                <script type="text/javascript" src="../assets/js/DateTime/jquery-ui-timepicker-addon.js"></script>
                <link type="text/css" href="../assets/css/DateTime/jquery-ui-timepicker-addon.css" rel="stylesheet"/>

                <!-- datatables (for TableField) -->
                <script src="../assets/js/DateTime/jquery.dataTables.js" type="text/javascript"></script>
                <script src="../assets/js/DateTime/dataTables.bootstrap.js" type="text/javascript"></script>
                <script src="../assets/js/DateTime/dataTables.rowReorder.js" type="text/javascript"></script>
                <link type="text/css" href="../assets/css/DateTime/dataTables.bootstrap.css" rel="stylesheet"/>

                <div id="field"></div>

                <div id="field2"></div>

                <script type="text/javascript">
                    $("#field").alpaca({
                        // "data": {
                        //     "date": ""
                        // },
                        "schema": {
                            "title": "Goods Issue Note",
                            "type": "object",
                            "properties": {
                                "customer_id": {
                                    "title": "Customer ID",
                                    "type": "number"
                                },
                                "date": {
                                    "title": "Date",
                                    //"format": "datetime",
                                    "type": "string"
                                },
                                "cus_name": {
                                    "title": "Customer Name",
                                    "type": "string"
                                },
                                "cus_address": {
                                    "title": "Customer Address",
                                    "type": "string"
                                },
                                "cus_city": {
                                    "title": "Customer City",
                                    "type": "string"
                                },
                                "gin_remarks": {
                                    "title": "Remarks",
                                    "type": "string"
                                }
                            }

                        }
                        //,
                        // "options": {
                        //     "date": {
                        //         "picker": {
                        //             "format": "DD/MM/YYYY"
                        //         },
                        //         "manualEntry": true
                        //     },

                        // }


                    });



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
                                        alert(value);
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