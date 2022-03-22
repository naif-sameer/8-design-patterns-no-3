<?php include "../views/includes/nav.php"; ?>

<?php
// echo
// "<pre>";
// var_dump($params);
// echo "</pre>";
// exit;

$fb_link = "http://www.facebook.com/sharer.php?u=http://localhost:8000/post?id={$params["postsID"]}";

$twitter_link = "https://twitter.com/share?url=http://localhost:8000/post?id={$params["postsID"]}&amp;text=new-blog-post&amp;hashtags=blog-post";
?>

<!-- posts list -->
<?php if (isset($params)) { ?>
  <div class="mt-8 container mx-auto grid grid-cols-1 pb-16">

    <div class="overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
      <img class="object-cover w-full h-96" src="images/<?php echo $params['image'] ?>" alt="Article">

      <div class="p-6">
        <span class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400"><?php echo $params['category']; ?></span>

        <h2 class="block mt-2 text-2xl font-semibold text-gray-800 transition-colors duration-200 transform dark:text-white ">
          <?php echo $params['title'] ?>
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
          <?php echo $params["content"]; ?>
        </p>


        <!-- share buttons -->
        <div class="space-x-1 mt-4">
          <a class="inline-block px-4 py-2 rounded bg-blue-700" href="<?php echo $fb_link; ?>" target="_blank">

            <span>Facebook</span>
          </a>

          <a class="inline-block px-4 py-2 rounded bg-sky-500" href="<?php echo $twitter_link; ?>" target="_blank">

            <span>Twitter</span>
          </a>

        </div>
      </div>
    </div>
  </div>
<?php } ?>