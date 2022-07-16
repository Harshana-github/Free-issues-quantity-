<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form>
  <input type="text" class='quantity' name="tb1" value="1" />
  <input type="hidden" class='total' name="total" value="10" />
  <span class="total_amount">10</span>
</form>

<form>
  <input type="text" class='quantity' name="tb1" value="2" />
  <input type="hidden" class='total' name="total" value="10" />
  <span class="total_amount">20</span>
</form>

<form>
  <input type="text" class='quantity' name="tb1" value="3" />
  <input type="hidden" class='total' name="total" value="10" />
  <span class="total_amount">30</span>
</form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.quantity').on('input', function(){
  var form = $(this).closest('form');
  var totalAmt = parseInt(form.find('.total').val());
  var quantity = parseInt($(this).val());

  form.find('.total_amount').text(totalAmt*quantity);
})
    </script>
</body>
</html>