<!DOCTYPE html>
<html>
<head>
    <title></title>
<style>
    table,tr,td,th { border: 1px black solid;}

</style>
</head>

<body>
<table>
  <thead>
    <th>Price</th>
    <th>Quantity</th>
    <th>Width</th>
    <th>Height</th>
    <th>Total</th>
    <th>Action</th>
  </thead>

  <tbody id="product_table">
    <tr>
        <td><input type="text" name="price"></td>
        <td><input type="text" name="quantity"></td>
        <td><input type="text" name="width"></td>
        <td><input type="text" name="height"></td>
        <td><input type="text" name="total" class="totalPrice" readonly></td>
        <td><input type="button" value="X" onclick="deleteRow(this)"/></td>
    </tr>

  </tbody>
    <input type="button" name="submit" value="Add Row" onclick="add_fields();">

</table>
<span>Grand Total<input type="text" name="grandtotal" id="grandtotal" readonly></span>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

const table = document.getElementById('product_table');
table.addEventListener('input', ({ target }) => {
  const tr = target.closest('tr');
  const [price, quantity, width, height, total] = tr.querySelectorAll('input');

  var size = width.value * height.value;
  var rate = price.value * quantity.value;

  if (size != "") {
    total.value = size * rate;
  }else{
    total.value = rate; 
  }
  totalPrice();
});

function add_fields() {
  var row = document.createElement("tr");
  row.innerHTML =
    '<td><input type="text" name="price"></td>' +
    '<td><input type="text" name="quantity"></td>' +
    '<td><input type="text" name="width"></td>' +
    '<td><input type="text" name="height"></td>' +
    '<td><input type="text" name="total"  class="totalPrice" readonly></td>' +
    '<td><input type="button" value="X" onclick="deleteRow(this)"/></td>';

  table.appendChild(row);
}

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  totalPrice();
}
function totalPrice(){
var sum = 0;
 $(".totalPrice").each(function(){
 sum += parseFloat($(this).val());
});
$("#grandtotal").val(sum);
}

</script>
</html>