<?php

use app\helpers\SessionHelper;

include 'includes/nav.php';


?>


<!-- add post form -->
<div class="container mx-auto py-8">
  <div class="py-4">
    <h2 class="text-4xl">Add Post </h2>
  </div>

  <form method="POST" action="/post/add" class="space-y-4" enctype="multipart/form-data">
    <!-- author id -->
    <input type="hidden" name="author_id" value="<?php echo SessionHelper::get_userID(); ?>">

    <!-- title -->
    <div>
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>

      <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>

    <!-- content -->
    <div>
      <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post content</label>
      <textarea name="content" id="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="content..."></textarea>
    </div>

    <!-- image -->
    <div>
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_input_avatar">Upload image</label>

      <input name="image" class="block w-full text-sm rounded-lg border  cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_input_avatar_help" id="user_input_avatar" type="file">
    </div>


    <!-- category -->
    <div>
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post Category</label>

      <div class="space-y-2">

        <div class="flex items-center">
          <input value="1" id="category-option-1" type="radio" name="category_id" value="USA" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="category-option-1" aria-describedby="category-option-1" checked="">

          <label for="category-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            web
          </label>
        </div>

        <div class="flex items-center">
          <input value="2" id="category-option-2" type="radio" name="category_id" value="Germany" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="category-option-2" aria-describedby="category-option-2">
          <label for="category-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Phone
          </label>
        </div>

        <div class="flex items-center">
          <input value="3" id="category-option-3" type="radio" name="category_id" value="Spain" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="category-option-3" aria-describedby="category-option-3">
          <label for="category-option-3" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Vuejs
          </label>
        </div>
        <div class="flex items-center">
          <input value="4" id="category-option-4" type="radio" name="category_id" value="United Kingdom" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="category-option-4" aria-describedby="category-option-4">
          <label for="category-option-4" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            js
          </label>
        </div>

        <div class="flex items-center">
          <input value="5" id="option-disabled" type="radio" name="category_id" value="China" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600">

          <label for="option-disabled" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Css
          </label>
        </div>
      </div>

    </div>



    <button type="submit" name="add_post" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add post</button>
  </form>

</div>