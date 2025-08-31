<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiemp_olx";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch listings
$result = $conn->query("SELECT * FROM listings ORDER BY created_at DESC");
$listings = [];
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) $listings[] = $row;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AIEMP OLX</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
<style>
  body { margin:0; font-family:'Inter', sans-serif; background:#121212; color:white; }
  a { text-decoration:none; color:inherit; }

  /* Header */
  header { display:flex; justify-content:space-between; align-items:center; padding:20px 40px; background:#1f1f1f; }
  .logo { font-weight:900; font-size:28px; }
  nav ul { display:flex; list-style:none; margin:0; padding:0; gap:20px; }

  /* Buttons */
  .btn { padding:10px 15px; border:none; border-radius:8px; font-weight:600; cursor:pointer; transition:0.3s; text-align:center; display:inline-block; }
  .btn-upload { background:#ffc107; color:#121212; }
  .btn-upload:hover { background:#e0a800; }
  .btn-home { background:#007bff; color:white; }
  .btn-home:hover { background:#0056b3; }
  .btn-buy { background:#007bff; color:white; width:100%; margin-top:10px; }
  .btn-buy:hover { background:#0056b3; }

  /* Container & Grid */
  .container { padding:40px; max-width:1200px; margin:auto; }
  .grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:30px; }

  /* Card / Glassmorphism with fixed size */
  .card { background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); padding:20px; border-radius:15px; text-align:center; box-shadow:0 4px 15px rgba(0,0,0,0.2); height:400px; display:flex; flex-direction:column; justify-content:flex-start; }
  .card img { width:100%; height:180px; object-fit:cover; border-radius:10px; margin-bottom:10px; flex-shrink:0; }
  .card h3, .card p, .price { margin:5px 0; flex-shrink:0; }

  /* Upload Form Modal */
  #uploadFormContainer { display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); justify-content:center; align-items:center; }
  #uploadForm { background:#1f1f1f; padding:25px; border-radius:15px; width:90%; max-width:400px; }
  #uploadForm input { width:100%; padding:10px; margin:8px 0; border-radius:8px; border:1px solid #555; background:rgba(255,255,255,0.05); color:white; }
  #uploadForm button { width:100%; margin-top:10px; }
  #closeForm { float:right; cursor:pointer; font-weight:bold; color:#ccc; }
</style>
<script>
function toggleForm() {
    const formContainer = document.getElementById('uploadFormContainer');
    formContainer.style.display = formContainer.style.display==='flex'?'none':'flex';
}
function showContact(name, contact) {
    alert('Contact '+name+': '+contact);
}
</script>
</head>
<body>

<header>
    <div class="logo">AIEMP OLX</div>
    <div style="display:flex; gap:15px;">
        <button class="btn btn-upload" onclick="toggleForm()">Upload Item</button>
        <a href="index.php" class="btn btn-home">Home</a>
    </div>
</header>

<div class="container">
    <div class="grid">
        <?php if(count($listings) > 0):
            foreach($listings as $item): ?>
            <div class="card">
                <img src="<?= $item['image_path'] ?>" alt="<?= $item['item_name'] ?>">
                <h3><?= $item['item_name'] ?></h3>
                <p>Seller: <?= $item['seller_name'] ?></p>
                <div class="price" style="color: green;">Price: <?= $item['price'] ?></div>
                <button class="btn btn-buy" onclick="showContact('<?= $item['seller_name'] ?>','<?= $item['contact_info'] ?>')">Buy / Contact</button>
            </div>
        <?php endforeach; else: ?>
            <p style="grid-column:1/-1; text-align:center;">No listings available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Upload Form Modal -->
<div id="uploadFormContainer">
    <div id="uploadForm">
        <span id="closeForm" onclick="toggleForm()">X</span>
        <h3>List Your Item</h3>
        <form action="upload2.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="item_name" placeholder="Item Name" required>
            <input type="text" name="seller_name" placeholder="Seller Name" required>
            <input type="text" name="contact_info" placeholder="Contact Info" required>
            <input type="text" name="price" placeholder="Price" required>
            <input type="file" name="item_image" accept="image/*" required>
            <button type="submit" class="btn btn-upload">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
