<?php 
  include 'uploads/upload.php';

  // Handle search
  $searchQuery = "";
  if (isset($_GET['search'])) {
      $searchQuery = $_GET['search'];
      $files = array_filter($files, function($file) use ($searchQuery) {
          return stripos($file['name'], $searchQuery) !== false;
      });
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Resources</title>
    <style>
      body {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        font-family: 'Segoe UI', sans-serif;
        color: #e2e8f0;
        min-height: 100vh;
      }
      .top-bar {
        display: flex;
        justify-content: flex-end;
        padding: 15px 30px;
      }
      .home-btn {
        border-radius: 25px;
        background: #38bdf8;
        border: none;
        padding: 8px 20px;
        font-weight: 600;
        color: #0f172a;
        text-decoration: none;
        transition: 0.3s;
      }
      .home-btn:hover {
        background: #0ea5e9;
        color: #fff;
        box-shadow: 0 0 10px #38bdf8;
      }
      h1 {
        font-size: 3rem;
        font-weight: 700;
        text-align: center;
        margin: 20px 0 30px 0;
        color: #38bdf8;
        text-shadow: 0 0 10px rgba(56,189,248,0.7);
      }
      .search-upload {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
      }
      .search-box {
        display: flex;
        flex: 1;
        max-width: 600px;
      }
      .search-box input {
        border-radius: 30px 0 0 30px;
        background: rgba(255,255,255,0.1);
        border: none;
        color: #e2e8f0;
      }
      .search-box input::placeholder {
        color: #94a3b8;
      }
      .search-box button {
        border-radius: 0 30px 30px 0;
        background: #38bdf8;
        border: none;
        font-weight: 600;
        transition: 0.3s;
      }
      .search-box button:hover {
        background: #0ea5e9;
        box-shadow: 0 0 10px #38bdf8;
      }
      .upload-form {
        background: rgba(255,255,255,0.08);
        padding: 8px 16px;
        border-radius: 30px;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .upload-form input {
        font-size: 0.9rem;
        color: #e2e8f0;
      }
      .upload-form button {
        border-radius: 20px;
        background: #22c55e;
        border: none;
        padding: 6px 16px;
        font-weight: 600;
        transition: 0.3s;
      }
      .upload-form button:hover {
        background: #16a34a;
        box-shadow: 0 0 10px #22c55e;
      }
      table {
        width: 100%;
        background: rgba(255,255,255,0.05);
        border-radius: 15px;
        overflow: hidden;
        backdrop-filter: blur(10px);
      }
      th, td {
        text-align: center;
        padding: 14px;
        color: #e2e8f0;
      }
      th {
        background: rgba(56,189,248,0.2);
        color: #38bdf8;
        font-weight: 600;
      }
      tr:nth-child(even) {
        background: rgba(255,255,255,0.03);
      }
      .btn-download {
        border-radius: 20px;
        background: transparent;
        border: 1px solid #38bdf8;
        color: #38bdf8;
        padding: 5px 12px;
        transition: 0.3s;
      }
      .btn-download:hover {
        background: #38bdf8;
        color: #0f172a;
        box-shadow: 0 0 10px #38bdf8;
      }
    </style>
  </head>
  <body>

      <!-- Top Bar with Home Button -->
      <div class="top-bar">
        <a href="index.php" class="home-btn">🏠 Home</a>
      </div>

      <h1>Resources</h1>

      <!-- Search + Upload -->
      <div class="search-upload">
        <form class="search-box" method="get" action="resource.php">
          <input type="text" name="search" class="form-control" placeholder="🔍 Search files..." value="<?php echo htmlspecialchars($searchQuery); ?>">
          <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <form class="upload-form" action="resource.php" method="post" enctype="multipart/form-data">
          <input type="file" name="myfile" required>
          <button type="submit" name="save">Upload</button>
        </form>
      </div>

      <!-- Files Table -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>File Name</th>
            <th>Size</th>
            <th>Downloads</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($files)): ?>
            <?php foreach($files as $file): ?>
            <tr>
              <td><?php echo $file['id'];?></td>
              <td><?php echo $file['name'];?></td>
              <td><?php echo round($file['size'] / 1000, 2) . " KB";?></td>
              <td><?php echo $file['downloads'];?></td>
              <td>
                <a class="btn btn-sm btn-download" href="resource.php?file_id=<?php echo $file['id']?>">Download</a>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="5">No files found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
