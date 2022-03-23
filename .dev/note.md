Create a simple blog using oop concept that contains the following : The

admin can log in
and write a post according to the sections and review the posts The browser can view posts and share them on social media ... upload your project to GitHub and put link bellow. \*

- admin can

  - login ✅
  - write post✅
  - reivew post✅

- users can
  - view posts ✅
  - share them on social media ✅

<!-- controller -->

```php
public function categories(Router $router)
{
    $keyword = $_GET['search'] ?? '';
    // $products = $router->database->getProducts($keyword);
    $products = [];

    $router->render('blog/categories', [
        'products' => $products,
        'keyword' => $keyword
        ]);
    }

public function create(Router $router)
      {
          $productData = [
              'image' => ''
          ];
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productData['title'] = $_POST['title'];
        $productData['description'] = $_POST['description'];
        $productData['price'] = $_POST['price'];
        $productData['imageFile'] = $_FILES['image'] ?? null;

        $product = new Post();
        // $product->load($productData);
        // $product->save();
        header('Location: /products');
        exit;
    }

    $router->render('products/create', [
        'product' => $productData
    ]);
}

public function update(Router $router)
{
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: /products');
        exit;
    }
    // $productData = $router->database->getProductById($id);
    $productData = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productData['title'] = $_POST['title'];
        $productData['description'] = $_POST['description'];
        $productData['price'] = $_POST['price'];
        $productData['imageFile'] = $_FILES['image'] ?? null;

        // $product = new Product();
        // $product->load($productData);
        // $product->save();
        header('Location: /products');
        exit;
    }

    $router->render('products/update', [
        'product' => $productData
    ]);
}

public function delete(Router $router)
{
    $id = $_POST['id'] ?? null;
    if (!$id) {
        header('Location: /products');
        exit;
    }

    // if ($router->database->deleteProduct($id)) {
    //     header('Location: /products');
    //     exit;
    // }
}

```

## db

```php

namespace app;

use app\models\Product, app\AppDatabase;
use PDO;

/**
 * Class Database
 *
 * @package app
 */
class Database
{
    public $pdo = null;
    public static ?Database $db = null;

    public function __construct()
    {
        $this->pdo =  new AppDatabase();
    }

    public function getProducts($keyword = '')
    {


        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM products WHERE title like :keyword ORDER BY create_date DESC');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function updateProduct(Product $product)
    {
        $statement = $this
            ->pdo
            ->prepare(
                "UPDATE products SET title = :title,
                                        image = :image,
                                        description = :description,
                                        price = :price WHERE id = :id"
            );
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':id', $product->id);

        $statement->execute();
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();
    }
}

```

## models

```php
public ?int $id = null;
    public string $title;
    public string $content;
    public string $image;


```

```php

    /*
    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->imageFile = $data['imageFile'];
        $this->imagePath = $data['image'] ?? null;
    }

    */

    /*
    public function save()
    {
        $errors = [];
        // check images direction
        if (!is_dir(__DIR__ . '/../public/images')) {
            mkdir(__DIR__ . '/../public/images');
        }

        if (!$this->title) {
            $errors[] = 'Product title is required';
        }

        if (!$this->price) {
            $errors[] = 'Product price is required';
        }

        if (empty($errors)) {
            if ($this->imageFile && $this->imageFile['tmp_name']) {
                if ($this->imagePath) {
                    unlink(__DIR__ . '/../public/' . $this->imagePath);
                }
                $this->imagePath = 'images/' . UtilHelper::randomString(8) . '/' . $this->imageFile['name'];

                mkdir(dirname(__DIR__ . '/../public/' . $this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], __DIR__ . '/../public/' . $this->imagePath);
            }

            // $db = Database::$db;
            if ($this->id) {
                // $db->updateProduct($this);
            } else {
                // $db->createProduct($this);
            }
        }
    }

    */
```

##

##

##
