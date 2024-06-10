<!-- component -->
<style>
  html,
body {
  font-family: "Rubik", sans-serif;
}

/* navigation 
 - show navigation always on the large screen devices with (min-width:1024)
*/

@media (min-width: 1024px) {
  .top-navbar {
    display: inline-flex !important;
  }
</style>
<nav class="flex items-center bg-gray-800 p-3 flex-wrap">
      <a href="<?= BASE_PATH ?>index" class="p-2 mr-4 inline-flex items-center">
        <img src='assests/logo2.png' width= "50vh">
        <span class="text-xl text-white font-bold uppercase tracking-wide"
          >fastBurger</span
        >
      </a>
      <button
        class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler"
        data-target="#navigation"
      >
        <i class="material-icons">menu</i>
      </button>
      <div
        class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
        id="navigation"
      >
        <div
          class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto"
        >
          <a
            href="<?= BASE_PATH ?>dashboard"
            class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
          >
            <span>Dashboard</span>
          </a>
          <a
            href="<?= BASE_PATH ?>orders"
            class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
          >
            <span>Orders</span>
          </a>
          <a
            href="<?= BASE_PATH ?>shifts"
            class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
          >
            <span>Shifts</span>
          </a>
          <a
            href="<?= BASE_PATH ?>stock"
            class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
          >
            <span>Stock</span>
          </a>
          <a
            href="<?= BASE_PATH ?>staff"
            class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
          >
            <span>Staff</span>
          </a>

        </div>
      </div>
    </nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
  $(".nav-toggler").each(function(_, navToggler) {
    var target = $(navToggler).data("target");
    $(navToggler).on("click", function() {
      $(target).animate({
        height: "toggle"
      });
    });
  });
});

</script>