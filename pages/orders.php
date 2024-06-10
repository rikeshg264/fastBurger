<?php

// include the database connection information,this will be included on all pages that requrie
// access to the database
include '../config/dbConfig.php';
// bring in the header component - this is the HTML components needed to render the page
include '../partials/header.php';
// include the navigation
include '../partials/navigation.php';

// all queries will be returned in a similar way, in this example I have returned all orders
// your query may be different denpending on what you want to return
// $orders is a variable wihich initially holds the query, the prepare() fucnction prevents
//  sql injection
$orders = $conn->prepare("SELECT
o.order_id,
o.order_date,
o.fk_payment_id,
c.customer_name,
p.payment_type
 from `order` o
 INNER JOIN customer c ON o.fk_customer_id = c.customer_id
 INNER JOIN menu_type m ON o.fk_menu_type_id = m.menu_type_id
 INNER JOIN payment p ON o.fk_payment_id = p.payment_id
 ORDER BY o.order_id ASC
");
//  the variable $orders is now being instructed to run the query
$orders->execute();
//  store the results in the variable
$orders->store_result();
// binding the results - You are just giving the data a variable name to make it neater for
// returning to the interface. This will be called later in the code
$orders->bind_result($oid, $date, $fk_payment_type, $customer, $payment_type);
?>

<!-- component -->
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2x1 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Shifts</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-m font-bold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Order Id</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Order Date</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Menu</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Cash/Card</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">View order details</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <?php 

                                // Fetch and display the results
                                while ($orders->fetch()) {
                                    // Determine the row color based on payment
                                    if ($payment_type == "Cash") {
                                      $rowClass = 'text-green-500';
                                  } elseif ($payment_type == "Card") {
                                      $rowClass = 'text-blue-500';
                                  } elseif ($payment_type == "Crypto") {
                                      $rowClass = 'text-Yellow-500';
                                  } elseif ($payment_type == "Apple Pay") {
                                   $rowClass = 'text-orange-500';
                                  } 
                                  else {
                                      $rowClass = 'text-black-500';
                                  }

                                    echo "<tr>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>$oid</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>$customer</div></td>"; 
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>$date</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>Lunch</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left $rowClass'>$payment_type</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap' onclick=\"window.location.href='orders_details/$oid'\"><i class='fa-solid fa-eye'></i></td>";
                                    echo "</tr>";

                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include '../partials/footer.php';