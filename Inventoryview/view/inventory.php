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
                <li>
                    <a href="dashboard.php">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
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
                        <p>Add GRN</p>
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


    <!-- PANEL	 -->
    <div class="main-panel">

        <!-- HEADER -->
        <nav class="navbar navbar-transparent navbar-absolute">

            <?php include "layout/navbar.php"; ?>

        </nav><!-- END OF HEADER -->

        <!-- CONTENT -->
        <div class="content">
            <div class="container-fluid">
                <form id="form" ></form>
                <link type="text/css" href="../assets/css/DateTime/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"> </script>
                <script src="https://code.cloudcms.com/alpaca/1.5.22/bootstrap/alpaca.min.js"></script>
                <link  href="https://code.cloudcms.com/alpaca/1.5.22/bootstrap/alpaca.min.css" rel="stylesheet" />
                <link  href="http://code.cloudcms.com/alpaca/1.5.23/bootstrap/alpaca.min.js" rel="stylesheet" />
                <link  href="http://code.cloudcms.com/alpaca/1.5.23/bootstrap/alpaca.min.css" rel="stylesheet" />

                <script type="text/javascript">
                    $("#form").alpaca({
                        "schema": {
                            "title": "Enter Item Details",
                            "type": "object",
                            "properties": {
                                "Item_name": {
                                    "title": "Item Name",
                                    "type": "string"
                                },
                                "Item_description": {
                                    "title": "Item Description",
                                    "type": "string"
                                },
                                "ItemCatogery": {
                                    "title": "Item Catogery",
                                    "type": "string",
                                    "enum":['Electronics','Foods','Clothes','juweliers']
                                },
                                "Item_category_code": {
                                    "title": "Item Catogery Code",
                                    "type": "int"
                                },
                                "SubCatogery": {
                                    "title": "Item Sub Catogery",
                                    "type": "string",
                                    "enum":['Mobiles','TV']
                                },
                                "Item_sub_category_code" : {
                                    "title" : "Item Sub Category Code",
                                    "type": "string"
                                },
                                "Item_unit" : {
                                    "title" : "Item Unit",
                                    "type": "string"
                                }
                            }
                        },
                        "options": {
                            "fields": {
                                "Item_category_code":{
                                    "type": "text"
                                },
                                "ItemCatogery": {
                                    "type": "text"
                                },
                                "SubCatogery": {
                                    "type": "text"
                                }
                            },
                            "form": {
                                "buttons": {
                                    "submit": {
                                        "click": function() {
                                            var value = this.getValue();

                                            $.ajax({

                                                url: "http://127.0.0.1:8000/api/inventory",
                                                type:"POST", //post
                                                data:{"Request":value},

                                                success:function(data){
                                                    if ($.isEmptyObject(data.error)) {
                                                        $("#err-msg-area").hide();
                                                        $("#suc-update-msg-area").show();
                                                        $.each(data.successUpdatedData, function (index, value) {
                                                            $("#" + index).text(' Inventory successfully added!');
                                                            $("#suc-update-msg-area").fadeOut(3000);
                                                            //$("#example").ajax.reload();

                                                        })


                                                    } else {
                                                        var errorString = "";
                                                        $("#err-msg-area").show();
                                                        $("#suc-msg-area").hide();
                                                        $.each(data.error, function(index, value){
                                                            errorString +='<li>'+value;
                                                        });
                                                        $("#err-msg").html(errorString);
                                                        $("#err-msg-area").fadeOut(10000);
                                                    }
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