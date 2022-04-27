<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid" style="background-color: #e3f2fd;">
        <div class="row">
            <div class="col-md-2">                   
                <h3 class="text-success">Trang bán hàng</h3>                   
            </div>        
            <div class="col-md-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav">
                            <li class="nav-item">
                                    <a href="index.php?action=home" class="nav-link text-success">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?action=product" class="nav-link text-success">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?action=selling" class="nav-link text-success">Selling</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?action=cart" class="nav-link text-success">Cart</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php
        include 'controller/controller.php';
        $controller = new Controller();
		$controller->handleRequest();
    ?>
</body>
</html>