<?php
session_start();
if (!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.html");
    exit();
}

include 'db.php'; // connect to database

// Example: fetch timetable, exams, and uploads from database
// (You’ll need to create tables like timetable, exams, uploads)
$timetable = $conn->query("SELECT * FROM timetable");
$exams = $conn->query("SELECT * FROM exams");
$uploads = $conn->query("SELECT * FROM uploads");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - School System</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* keep your CSS styles here (same as before) */
  </style>
</head>
<body>
  <header>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <nav>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
  </header>

  <main>
    <section>
      <h2>Timetable</h2>
      <ul>
        <?php while($day = $timetable->fetch_assoc()): ?>
          <li><strong><?php echo $day['day']; ?>:</strong> <?php echo $day['subjects']; ?></li>
        <?php endwhile; ?>
      </ul>
    </section>

    <section>
      <h2>Exams</h2>
      <ul>
        <?php while($exam = $exams->fetch_assoc()): ?>
          <li><strong><?php echo $exam['subject']; ?> - <?php echo $exam['exam']; ?>:</strong> <?php echo $exam['score']; ?></li>
        <?php endwhile; ?>
      </ul>
    </section>

    <section>
      <h2>Upload Files</h2>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit"><i class="fas fa-upload"></i> Upload</button>
      </form>
    </section>

    <section>
      <h2>Uploaded Files</h2>
      <ul>
        <?php while($f = $uploads->fetch_assoc()): ?>
          <li><?php echo $f['user']; ?>: 
            <a href="uploads/<?php echo $f['filename']; ?>" target="_blank">
              <?php echo $f['filename']; ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Our School. All rights reserved.</p>
  </footer>
</body>
</html>