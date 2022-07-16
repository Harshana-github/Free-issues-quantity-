<?php
require '../../Backend/drop_down.php';
require_once '../../Backend/code_increment.php';
require_once '../../Backend/drop_down.php';
require_once '../../Backend/insert.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card-mt-4">
                    <div class="card-header">
                        <h4>Placing Order
                        <a href="../View/view_placing_order.php" class="float-end btn btn-danger">BACK</a>
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">ADD MORE</a>

                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Select Customer</label>
                                            <select name="customer_name" id="" class="form-control">
                                                <option value="">-Select-</option>
                                                <?php echo $customer_list; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Order Number</label>
                                            <input type="text" name="order_number" class="form-control" placeholder="Enter Phone Number" value="<?php echo $OrderNumber;?>" style="color:brown" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Number</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Enter Qty</th>
                                    <th scope="col">FIQty</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="paste-new-forms">

                                </tbody>
                            </table>

                            <button type="submit" name="save_multiple_data" class="btn btn-primary">Save</button>

                            <div class="form-group mx-sm-3 mb-2">
                                <label class="sr-only">Net Total<input type="text" class="form-control" id="net" name="nettotal"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m"></div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $(document).on('click','.remove-btn',function(){
                $(this).closest('.main-form').remove();
                totalPrice();

            });

            $(document).on('click','.add-more-form',function(){
                
                $('.paste-new-forms').append(
                            '<tr class="main-form">\
                            <th scope="row"><select class="form-control" id="product_list" name="proname[]"><option>-Product Name-</option><?php echo $purchase_product_list; ?></select></th>\
                            <td><select class="form-control" id="product_num" name="pronum[]"><option>-Please Select Product Name-</option></select></td>\
                            <td><select class="form-control" id="product_price" name="price[]"><option>-Please Select Product Name-</option></select></td>\
                            <td><input type="text" class="form-control" name="qty[]" onkeyup="findTotal()" id="qty"></td>\
                            <td><input type="text" class="form-control" name="fqty[]" id="fqty" readonly></td>\
                            <td><input type="text" class="form-control" name="total[]" id="total" readonly></td>\
                            <td><button type="button" class="remove-btn btn btn-danger">Remove</button></td>\
                            </tr>\
                            <br/>\
                            ');
                            

            });

            $(document).on('change','#product_list',function(){
                var row = $(this).closest("tr");
                var ProductId = row.find("#product_list").val();
                var getURL = "../../Backend/get-product_number.php?product_id=" + ProductId;
                $.get(getURL, function(data, status) {
                    row.find("#product_num").html(data);
               
                });
            });
            $(document).on('change','#product_list',function(){
                var row = $(this).closest("tr");
                var ProductId = row.find("#product_list").val();
                var getURL = "../../Backend/get-product_price.php?product_id=" + ProductId;
                $.get(getURL, function(data, status) {
                    row.find("#product_price").html(data);
               
                });
            });
            $(document).on("keyup", "#qty", function() {
                
                var row = $(this).closest("tr");
                var qty = row.find("#qty").val();
                var price = row.find("#product_price").val();
                var $grand_total=$('#net');
                if (qty) {
                    var total = qty * price;
                    r1 = row.find("#total").val(total);
                }
                totalPrice()
            });
        });
        function totalPrice(){
            var sum = 0;
             $('tr').find('#total').each(function(){
            sum += parseInt($(this).val());
            });
        $("#net").val(sum);
        }
        $(document).on("keyup", "#qty", function() {
                var row = $(this).closest("tr");
                var qty = row.find("#qty").val();
                var product = row.find("#product_list").val();
                $.ajax({
                url:'get-free-issues-type.php',
                dataType:"json",
                data:'product_id='+product,
                cache: false,
                success:function(data){
                    if(data){
                            if(data.free_issues_type==1){
                                row.find("#fqty").val(1);
                            }else{
                                var r = (data.free_purchase_quantity/data.purchase_quantity)*qty;
                                row.find("#fqty").val(r);
                            }

                        
                    }
                }
                });
        });
    </script>
</body>
</html>
