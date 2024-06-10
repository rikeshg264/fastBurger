<!-- 
    Show all orders in a table, give the option to view the order details
    -- option to view the customer details
    --- Order for specific customer
    --- Order date and time
    --- Menu ordered from
    --- Cash / Card
    --- member of staff
    
-->
<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';

// the parameter that was passed from the order page - <td onclick="window.location.href='orderDetails/<?= $oid this 
// the value of that parameter get caught here using $_GET, I have created a variable again called $oid and given it
// the value of the the parameter that has been passed.
// we can now use that data in our new query
$oid = $_GET['oid'];
// this query is very similar to the previous and may differ to yours depending on your setup
// the main difference is that there is a where clause in this one
// I have limited the qurey to only show the details with the order number that has been passed from the previous page
$orderDetails = $conn->prepare("SELECT
o.order_id,
o.order_date,
c.customer_name,
c.customer_tel,
st.store_name,
p.payment_type,
o.menu_name,
s.staff_firstname
 from `order` o
 LEFT JOIN customer c ON o.fk_customer_id = c.customer_id
 LEFT JOIN menu_type m ON o.fk_menu_type_id = m.menu_type_id
 LEFT JOIN payment p ON o.fk_payment_id = p.payment_id
 LEFT JOIN staff s ON o.fk_staff_id = s.staff_id

 LEFT JOIN store st ON o.fk_store_id = st.store_id
 where o.order_id = $oid
");
$orderDetails->execute();
$orderDetails->store_result();
$orderDetails->bind_result($oid, $date, $customer, $custTel, $store, $payment_type, $menu, $staff);
// On the orders page we called the fetch() function in a while statements as I wanted ot call all rows
// I now only want details of one order, so we use the fetch() function at this stage.
$orderDetails->fetch();

?>

<!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<!-- I can now just call the variable created in the bind_result -->
<!-- the details that I have called is just some of the data that is required -->
<div class="flex w-full justify-center mt-20">
    <div class="flex flex-col w-1/4 mb-20">
        <h2 class="text-xl underline">Customer Details</h2>
        <p><span class="text-slate-600">Customer Name:</span> <?= $customer ?></p>
        <p><span class="text-slate-600">Customer Tel:</span> <?= $custTel ?></p>
    </div>
    <div class="flex flex-col w-1/4">
        <h2 class="text-xl underline">Order Details</h2>
        <p><span class="text-slate-600">Order Number: </span> <?= $oid ?></p>
        <p> <span class="text-slate-600">Order Date: </span> <?= $date ?></p>
        <p> <span class="text-slate-600">Payment Type: </span> <?= $payment_type ?></p>
        <p> <span class="text-slate-600">Menu Type: </span> <?= $menu ?></p>
    </div>
    <div class="flex flex-col w-1/4">
        <h2 class="text-xl underline">Store Details</h2>
        <p><span class="text-slate-600"> Store Location: </span> <?= $store ?></p>
    </div>
</div>

<?php
include '../partials/footer.php';