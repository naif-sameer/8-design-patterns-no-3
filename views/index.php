<?php include 'includes/nav.php'; ?>



<!-- posts list -->
<div class="mt-8 container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <?php
    for ($i = 0; $i < 10; $i++) {

    ?>

        <div class="overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <img class="object-cover w-full h-64" src="https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Article">

            <div class="p-6">
                <div>

                    <span class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">Product</span>

                    <a href="#" class="block mt-2 text-2xl font-semibold text-gray-800 transition-colors duration-200 transform dark:text-white hover:text-gray-600 hover:underline">I Built A Successful Blog In One Year</a>

                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie parturient et sem ipsum volutpat vel. Natoque sem et aliquam mauris egestas quam volutpat viverra. In pretium nec senectus erat. Et malesuada lobortis.</p>
                </div>


            </div>
        </div>

    <?php } ?>

</div>