<?php
    use Day09\Products\Create as Product;
    use Day09\Categories\Create as Category;
    use Day09\Products\ListData as ProductList;
    use Day09\Categories\ListData as CategoryList;

    include "Categories/Create.php";
    include "Products/Create.php";
    include "Categories/List.php";
    include "Products/List.php";

    Category::print();
    Product::print();
    ProductList::print();
    CategoryList::print();
    // Create::print();