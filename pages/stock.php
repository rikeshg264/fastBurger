<?php 
    include '../partials/header.php';
    include '../partials/navigation.php';
    require '../config/dbConfig.php';

    $stock = $conn->prepare("SELECT
i.item_id,
i.item_name,
i.stock_limit
 from `item` i
 ORDER BY i.item_id ASC
");
//  the variable $stock is now being instructed to run the query
$stock->execute();
//  store the results in the variable
$stock->store_result();
// binding the results - You are just giving the data a variable name to make it neater for
// returning to the interface. This will be called later in the code
$stock->bind_result($id, $name, $stock_limit);
?>

<!-- component -->
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Stocks</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                    <thead class="text-m font-bold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">No</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Item</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Stock</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <?php 

                                // Fetch and display the results
                                while ($stock->fetch()) {
                                    // Determine the row color based on stock limit
                                    $rowClass = ($stock_limit < 200) ? 'text-red-500' : 'text-green-500';

                                    echo "<tr>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>$id</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>$name</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left $rowClass'>$stock_limit</div></td>";
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

<?php include '../partials/footer.php';?>