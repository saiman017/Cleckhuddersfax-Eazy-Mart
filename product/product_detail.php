<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>index page</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    
    .product-container {           
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-wrap: wrap;
    }
    
    .product-img-container {
      flex: 0 0 100%;
      margin-bottom: 20px;
    }
    
    .product-img-container img {
      max-width: 100%;
      border-radius: 8px;
    }
    
    .product-details-container {
      flex: 1;
    }
    
    .product-title {
      color: #333;
      font-size: 24px;
      margin: 0 0 10px;
    }
    
    .category-name {
      color: #666;
      font-size: 16px;
      margin-bottom: 10px;
    }
    
    .product-description {
      color: #444;
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 10px;
    }
    
    .product-rating {
      color: #FFD700;
      font-size: 18px;
      margin-bottom: 10px;
      display: flex;
    }
    
    .product-rating ion-icon {
      margin-right: 5px;
      cursor: pointer;
    }
    
    .product-price {
      color: #333;
      font-size: 20px;
      margin: 0;
    }
    
    .add-to-cart-btn {
      background-color: orange;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    
    .add-to-cart-btn:hover {
      background-color: #e68a00;
    }
    
    .comment-section {
      margin-top: 20px;
    }
    
    .comment-section textarea {
      width: calc(100% - 42px); /* Adjusted width to accommodate for button */
      height: 100px;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      margin-right: 10px;
    }
    
    .comment-section button {
      background-color: orange;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 14px;
      cursor: pointer;
      border-radius: 4px;
      margin-top: 10px;
      transition: background-color 0.3s ease;
    }
    
    .comment-section button:hover {
      background-color: #e68a00;
    }
    
    .comments {
      margin-top: 20px;
    }
    
    .comments h3 {
      font-size: 20px;
      color: #333;
      margin-bottom: 10px;
    }
    
    .comment {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #f9f9f9;
      border-radius: 8px;
    }
    
    .comment p {
      font-size: 14px;
      color: #666;
      margin: 5px 0;
    }
    
    .comment p.comment-text {
      margin-bottom: 5px;
    }
    
    .comment p.comment-author {
      font-style: italic;
      color: #999;
    }
    
    @media (min-width: 768px) {
      .product-img-container {
        flex: 0 0 40%;
        margin-right: 20px;
      }
      .product-details-container {
        flex: 0 0 55%;
      }
    }
  </style>
</head>
<body>

<div><?php include('../includes/head.php');?></div>
 
<main>
  <div class="product-container">
    <div class="product-img-container">
      <img src="../assets/images/Shop/vegetable (2).jpg" alt="product name">
      <div class="comments">
        <h3>Comments</h3>
        <div class="comment">
          <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec ultrices felis.</p>
          <p class="comment-author">- User123</p>
        </div>
        <div class="comment">
          <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec ultrices felis.</p>
          <p class="comment-author">- User456</p>
        </div>
      </div>
    </div>
    <div class="product-details-container">
      <h2 class="product-title">Product Name</h2>
      <p class="category-name">Category Name</p>
      <p class="product-description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec ultrices felis, in posuere dolor.
      </p>
      <div class="product-rating" id="rating">
        <ion-icon name="star-outline"></ion-icon>
        <ion-icon name="star-outline"></ion-icon>
        <ion-icon name="star-outline"></ion-icon>
        <ion-icon name="star-outline"></ion-icon>
        <ion-icon name="star-outline"></ion-icon>
      </div>
      <p class="product-price">Rs 150.00 </p>
      <button class="add-to-cart-btn">Add to Cart</button>
      <div class="comment-section">
        <textarea placeholder="Leave a comment"></textarea>
        <button>Submit Comment</button>
      </div>
    </div>
  </div>
  
</main>

<section id="feature-product2" class="section-p2">
    <h2>Related Product</h2>
    <div><?php include('../product/product_list.php');?></div>
</section>
<div><?php include('../includes/footer.php');?></div>

<script>
  const ratingIcons = document.querySelectorAll('.product-rating ion-icon');

  ratingIcons.forEach(icon => {
    icon.addEventListener('click', () => {
      const clickedIndex = Array.from(ratingIcons).indexOf(icon);
      for (let i = 0; i < ratingIcons.length; i++) {
        if (i <= clickedIndex) {
          ratingIcons[i].setAttribute('name', 'star');
        } else {
          ratingIcons[i].setAttribute('name', 'star-outline');
        }
      }
    });
  });
</script>

</body>
</html>
