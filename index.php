<?php 
    include 'partials/header.php';
    include 'partials/navigation.php';
    require 'config/dbConfig.php';
?>

<!-- component -->
<style>
        .bg-image {
          background:url(https://media.istockphoto.com/id/496548376/photo/hamburgers-with-moblie-phone.jpg?s=612x612&w=0&k=20&c=pJnlInyLLJvbvTFYdEpYBsHvyZ5H7XU_TKsxadFcII0=);
          background-size:cover;
          background-repeat:no-repeat;
        }

        body {background:white !important;}
      
      </style>
      

      <div class="section bg-image flex overflow-hidden h-screen text-gray-800">
        <div class="hero bg-gray-200 text-center grid md:grid-cols-2 border w-4/6 m-auto p-8 bg-opacity-90 rounded-lg">
          <img class="icon m-auto rounded-lg" src="https://hips.hearstapps.com/hmg-prod/images/turkey-burger-index-64873e8770b34.jpg?crop=0.6666666666666667xw:1xh;center,top&resize=1200:*" alt="" />
          <div class="text m-auto text-lg md:ml-5 p-5 md:text-left">
            <div class="head text-3xl mb-3 font-semibold">Why We Love Burgers?</div>
            <div class="desc">There's a reason burgers are so beloved. Humans are drawn to foods that are savory, rich, and satisfying. Burgers encompass all of these qualities. The juicy, flavorful meat is rich and savory, often complemented by melted cheese, crisp vegetables, and a soft, toasted bun. Each bite offers a delightful combination of textures and flavors, making burgers an irresistible favorite for many.</div>
          </div>
        </div>
      </div>
      <!-- section end -->
      
      <div class="heading_section italic bg-gray-200 font-semibold text-3xl text-center p-5 pt-24 text-gray-800">Best selling Burgers with taste</div>
      <!-- section end -->
      
      <div class="section cards mx-auto border grid md:grid-cols-3 md:px-12 bg-gray-200 text-gray-800">
        <div class="card text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
          <div class="img"><img class="w-full h-full" src="https://s23209.pcdn.co/wp-content/uploads/2022/07/220602_DD_The-Best-Ever-Cheeseburger_267.jpg" alt=""/></div>
          <div class="text p-5 pt-2 text-center">
            <div class="title font-semibold my-2 text-xl text-red-700">Cheese  Burger</div> 
          </div>
        </div>
        <!-- eachcard -->
        <div class="card text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
          <div class="img"><img class="w-full h-full" src="https://www.kitchensanctuary.com/wp-content/uploads/2019/08/Crispy-Chicken-Burger-tall-FS-4512.webp" alt="" /></div>
          <div class="text p-5 pt-2 text-center">
            <div class="title font-semibold my-2 text-xl text-red-700">Chicken Burger</div>
          </div>
        </div>
        <!-- eachcard -->
        <div class="card text-sm shadow-lg max-w-sm m-5 mx-auto sm:mx-auto md:m-5 overflow-hidden flex flex-col rounded">
          <div class="img"><img class="w-full h-full" src="https://minimalistbaker.com/wp-content/uploads/2015/07/AMAZING-GRILLABLE-Veggie-Burgers-Hearty-flavorful-and-hold-up-on-the-grill-or-skillet-vegan-veggieburger-grilling-dinner-healthy-recipe.jpg" alt="" /></div>
          <div class="text p-5 pt-2 text-center">
            <div class="title font-semibold my-2 text-xl text-red-700">Veg Burger</div>
          </div>
        </div>
        <!-- eachcard -->
      </div>
      <div class="filling pt-14"></div>
      <!-- section end -->
    

     

<?php include 'partials/footer.php';?>