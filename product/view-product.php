<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Products</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <div class="card-body p-1 pt-2">
                    <a href="addproduct.php" class="btn btn-primary brand-bg-color">Add Product</a>
                    <?php
                        require_once '../classes/product.class.php';

                        session_start();

                        $productObj = new Product();
                        $array = $productObj->showAll();
                    ?>
                    <div class="table-responsive mt-3">
                        <table id="table-products" class="table table-nowrap table-hover table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Total Stocks</th>
                                    <th>Available Stocks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <?php
                            $i = 1;
                            if (empty($array)) {
                            ?>
                                <tr>
                                    <td colspan="7"><p class="search">No product found.</p></td>
                                </tr>
                            <?php
                            }
                            foreach ($array as $arr) {
                                $available = $arr['stock_in'] - $arr['stock_out'];
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $arr['code'] ?></td>
                                <td><?= $arr['name'] ?></td>
                                <td><?= $arr['category_name'] ?></td>
                                <td><?= $arr['price'] ?></td>
                                <td><?= $arr['stock_in'] ?></td>
                                <td><?= $available ?></td>
                                <td>
                                    <a href="stocks.php?id=<?= $arr['id'] ?>">Stock In/Out</a>
                                    <a href="editproduct.php?id=<?= $arr['id'] ?>">Edit</a>
                                    <?php
                                        if (isset($_SESSION['account']['is_admin'])) {
                                    ?>
                                    <a href="#" class="deleteBtn" data-id="<?= $arr['id'] ?>" data-name="<?= $arr['name'] ?>">Delete</a>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>