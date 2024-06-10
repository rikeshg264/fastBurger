<?php

// include the database connection information,this will be included on all pages that requrie
// access to the database
include '../config/dbConfig.php';
// bring in the header component - this is the HTML components needed to render the page
include '../partials/header.php';
// include the navigation
include '../partials/navigation.php';

$staff = $conn->prepare("SELECT 
s.staff_firstname,
s.staff_surname,
s.staff_shift
FROM `order` o
LEFT JOIN staff s ON o.fk_staff_id = s.staff_id
GROUP BY s.staff_id, s.staff_firstname, s.staff_surname, s.staff_shift
;
");
$staff->execute();
$staff->store_result();
$staff->bind_result($firstName, $surname, $shift);
?>
<!-- component -->
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Shifts</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-m font-bold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Firstname</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Surname</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Shift</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <?php 

                                // Fetch and display the results
                                while ($staff->fetch()) {
                                    // Determine the row color based on stock limit
                                    $rowClass = ($shift == "Day") ? 'text-yellow-500' : 'text-black-500';

                                    echo "<tr>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>$firstName</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left'>$surname</div></td>";
                                    echo "<td class='p-2 whitespace-nowrap'><div class='text-left $rowClass'>$shift</div></td>";
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