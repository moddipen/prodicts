<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body {
    font-family: "Poppins", sans-serif;
    color: #444444;
}

a,
a:hover {
    text-decoration: none;
    color: inherit;
}

.section-products {
    padding: 80px 0 54px;
}

.section-products .header {
    margin-bottom: 50px;
}

.section-products .header h3 {
    font-size: 1rem;
    color: #fe302f;
    font-weight: 500;
}

.section-products .header h2 {
    font-size: 2.2rem;
    font-weight: 400;
    color: #444444; 
}

.section-products .single-product {
    margin-bottom: 26px;
}

.section-products .single-product .part-1 {
    position: relative;
    height: 290px;
    max-height: 290px;
    margin-bottom: 20px;
    overflow: hidden;
}

.section-products .single-product .part-1::before {
		position: absolute;
		content: "";
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		transition: all 0.3s;
}

.section-products .single-product:hover .part-1::before {
		transform: scale(1.2,1.2) rotate(5deg);
}

.section-products #product-1 .part-1::before {
    background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
    background-size: cover;
		transition: all 0.3s;
}

.section-products #product-2 .part-1::before {
    background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
    background-size: cover;
}

.section-products #product-3 .part-1::before {
    background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
    background-size: cover;
}

.section-products #product-4 .part-1::before {
    background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
    background-size: cover;
}

.section-products .single-product .part-1 .discount,
.section-products .single-product .part-1 .new {
    position: absolute;
    top: 15px;
    left: 20px;
    color: #ffffff;
    background-color: #fe302f;
    padding: 2px 8px;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.section-products .single-product .part-1 .new {
    left: 0;
    background-color: #444444;
}

.section-products .single-product .part-1 ul {
    position: absolute;
    bottom: -41px;
    left: 20px;
    margin: 0;
    padding: 0;
    list-style: none;
    opacity: 0;
    transition: bottom 0.5s, opacity 0.5s;
}

.section-products .single-product:hover .part-1 ul {
    bottom: 30px;
    opacity: 1;
}

.section-products .single-product .part-1 ul li {
    display: inline-block;
    margin-right: 4px;
}

.section-products .single-product .part-1 ul li a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: #ffffff;
    color: #444444;
    text-align: center;
    box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
    transition: color 0.2s;
}

.section-products .single-product .part-1 ul li a:hover {
    color: #fe302f;
}

.section-products .single-product .part-2 .product-title {
    font-size: 1rem;
}

.section-products .single-product .part-2 h4 {
    display: inline-block;
    font-size: 1rem;
}

.section-products .single-product .part-2 .product-old-price {
    position: relative;
    padding: 0 7px;
    margin-right: 2px;
    opacity: 0.6;
}

.section-products .single-product .part-2 .product-old-price::after {
    position: absolute;
    content: "";
    top: 50%;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #444444;
    transform: translateY(-50%);
}
    </style>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Popular Products Section Using HTML , CSS , Bootstrap</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="section-products">
<a href="<?php echo  base_url();?>user/logout" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                </a>
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>Featured Product</h3>
										<h2>Popular Products</h2>
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->
                        <?php foreach($products as $product){
                            ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-<?php echo $product->id;?>" class="single-product">
                                    <img src="<?php echo base_url(); ?>public/assets/product_image/<?php echo $product->image ;?>" width="300">
										<div class="part-2">
												<h3 class="product-title">Name: <?php echo $product->title;?></h3>
                                                <h5 class="product-title">Discription: <?php echo $product->description ;?></h5>
												<h4 class="product-price">Price: $<?php echo $product->price;?></h4>
                                                <h4 class="product-price">QTY: <?php echo $product->qty;?></h4>
                                                <br>

                                                <form action="userproduct/buyproduct" method="post">
                                                    <input type="hidden" name="product_id" value="<?php echo $product->id;?>">
                                                    <input type="hidden" name="product_price" value="<?php echo $product->price;?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id');?>">
                                                    
                                                <select name="qty_buy">
                                                    <?php 
                                                    for($i=1;$i<=$product->qty;$i++){ ?>
                                                    <option><?php echo $i;?></option>
                                                <?php    
                                                }
                                                ?>
                                                </select>
                                                <input type="submit" name="addtocart" value="Buy">
                                            </form>
										</div>
								</div>
						</div>
                            <?php 
                        }
                        ?>
						
				</div>
		</div>
</section>
<!-- partial -->
  
</body>
</html>
