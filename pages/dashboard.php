<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';

// totalOrders
$totalOrders = $conn->prepare("SELECT
count(order_id)
 from `order` 
");
$totalOrders->execute();
$totalOrders->store_result();
$totalOrders->bind_result($orders);
$totalOrders->fetch();


// Unique Customers
$customer = $conn->prepare("SELECT
count(distinct customer_name )
 from customer
");
$customer->execute();
$customer->store_result();
$customer->bind_result($uniqueCustomers);
$customer->fetch();


// payment type
$payment = $conn->prepare("SELECT
    p.payment_type,
    COUNT(o.fk_payment_id)
FROM 
    `order` o
INNER JOIN 
    payment p ON o.fk_payment_id = p.payment_id
GROUP BY 
    p.payment_type
");
$payment->execute();
$payment->store_result();
$payment->bind_result($paymentType, $paymentCount);

// top staff
$staff = $conn->prepare("SELECT 
COUNT(o.order_id) AS order_count,
s.staff_firstname,
s.staff_surname,
s.staff_shift
FROM `order` o
LEFT JOIN staff s ON o.fk_staff_id = s.staff_id
GROUP BY s.staff_id, s.staff_firstname, s.staff_surname, s.staff_shift
ORDER BY order_count DESC
LIMIT 2
");
$staff->execute();
$staff->store_result();
$staff->bind_result($totalOrders, $firstName, $surname, $shift);
?>
<!-- component -->
        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <!--Start Topbar -->
            <!--End Topbar -->
          <main class="relative z-0 flex-1 pb-8 px-6 bg-white">
           
                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 mt-3">
                      <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                        style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                          <div class="absolute inset-0 bg-pink-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                          <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                            <div>
                              <h3 class="text-center text-white text-lg">
                              Orders
                              </h3>
                              <h3 class="text-center text-white text-3xl mt-2 font-bold">
                              <?= $orders ?>
                              </h3>
                              <h3 class="text-white text-lg mt-2 text-yellow-100 ">
                              orders in total!
                              </h3>
                              
                              <div class="flex space-x-4 mt-4">
                                 
                              </div>
                            </div>
                          </div>
                      </div>
                       <div class="relative w-full h-72 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                        style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                          <div class="absolute inset-0 bg-yellow-600 bg-opacity-75 transition duration-300 ease-in-out"></div>
                            <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                            <div>
                              <div class="text-white text-lg flex space-x-2 items-center">
                                <div class="bg-white rounded-md p-2 flex items-center">
                                  <i class="fas fa-toggle-off fa-sm text-yellow-300"></i>
                                </div>
                                <p>Payment</p>
                              </div>
                              <h3 class="text-white text-3xl mt-2 font-bold">
                              Breakdown of payment types
                              </h3>
                               <h3 class="text-white text-lg mt-2 text-yellow-100 ">
                               <?php while($payment->fetch()) : ?>
              <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
              <?= $paymentCount ?>
              <?= $paymentType ?>
            </p>
            <?php endwhile ?>
                              </h3>
                            </div>
                          </div>
                      </div>
                       <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                        style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                          <div class="absolute inset-0 bg-blue-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                          <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                            <div>
                              <div class="text-white text-lg flex space-x-2 items-center">
                                <div class="bg-white rounded-md p-2 flex items-center">
                                  <i class="fas fa-clipboard-check fa-sm text-blue-800"></i>
                                </div>
                                <p>Top Staff</p>
                              </div>
                              <h3 class="text-white text-3xl mt-2 font-bold">
                                  Most serving to customer
                              </h3>
                               <h3 class="text-white text-lg mt-2 ">
                               <?php while($staff->fetch()) : ?>
                                <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <?= $firstName . ' ' . $surname ?>
                                <?= $totalOrders ?>
                                </p>
                                <?php endwhile ?>
                            </h3>
                            </div>
                          </div>
                      </div>        
                    </div>
                    
                  <!-- End Content-->
              </div>
          </main>
        </div>
    </div>
</body>
<!-- 
<div class="min-h-screen bg-gray-50/50">
  
  <div class="p-4">
    <div class="mt-12">
      <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-3">
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
              <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
              <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd"></path>
              <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"></path>
            </svg>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Orders</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"></h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
              <strong>The store has taken <span class="text-green-500"><?= $orders ?></span> orders in total!</strong>
            </p>
          </div>
        </div>
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
              <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Payment</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"></h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
          <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">Breakdown of payment types </p>
            <?php while($payment->fetch()) : ?>
            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
              <?= $paymentCount ?>
              <?= $paymentType ?>
            </p>
            <?php endwhile ?>
          </div>
        </div>
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
              <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Top Staff</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"></h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
            <?php while($staff->fetch()) : ?>
            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
              <?= $firstName . ' ' . $surname ?>
              <?= $totalOrders ?>
            </p>
            <?php endwhile ?>
          </div>
        </div>
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
              <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
            </svg>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Customers</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"></h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
              <strong class="text-red-500"><?= $uniqueCustomers ?></strong> different customers have order from you!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<?php
include '../partials/footer.php';
?>