<?php
session_start();
include 'db.php';

$user = null;
if (isset($_SESSION['user_id'])) {
    $resultUser = mysqli_query($conn, "SELECT * FROM users WHERE id = " . intval($_SESSION['user_id']));
    $user = mysqli_fetch_assoc($resultUser);
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>الدرر الشيعية</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { font-family: Tahoma; margin: 0; padding: 0; background: #f7f7f7; direction: rtl; }
    header, nav, footer { background: #2e6f1f; color: white; padding: 15px 20px; }
    nav a, .login-icon { color: white; text-decoration: none; margin-left: 15px; }
    main { padding: 20px; }
    .box-grid {
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-top: 20px;
      border: 1px solid #ccc;
      padding: 15px;
      background: #fff;
      border-radius: 10px;
    }
    .box-item {
      background: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 15px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .box-item i {
      font-size: 28px;
      color: #2e6f1f;
    }
    a.box-link {
      text-decoration: none;
      color: inherit;
    }
    .user-profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<header>
  <div style="display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center;">
      <?php if ($user): ?>
        <div class="user-profile" style="margin-left: 15px;">
          <img src="uploads/<?= htmlspecialchars($user['image']) ?>" alt="صورة المستخدم">
          <div style="margin-right: 10px;">
            <strong><?= htmlspecialchars($user['username']) ?></strong><br>
            <a href="edit_profile.php" style="color:white; font-size: 13px;">تعديل الملف الشخصي</a>
          </div>
        </div>
        <a href="dashboard.php" class="login-icon"><i class="fas fa-tools"></i></a>
        <a href="logout.php" class="login-icon"><i class="fas fa-sign-out-alt"></i></a>
      <?php else: ?>
        <a href="login.php" class="login-icon"><i class="fas fa-user-circle"></i> تسجيل الدخول</a>
      <?php endif; ?>
    </div>
    <div><h1 style="margin: 0;">الدرر الشيعية</h1></div>
  </div>
</header>

<nav>
  <a href="index.php"><i class="fas fa-home"></i> الرئيسية</a>
  <a href="about.php"><i class="fas fa-info-circle"></i> من نحن</a>
  <a href="contact.php"><i class="fas fa-envelope"></i> اتصل بنا</a>
</nav>

<main>
  <h2>الموسوعات</h2>
  <div class="box-grid">
    <a class="box-link" href="qaed_fiqhia.php">
      <div class="box-item"><i class="fas fa-balance-scale"></i> موسوعة القواعد الفقهية</div>
    </a>
    <a class="box-link" href="osol_fiqh.php">
      <div class="box-item"><i class="fas fa-university"></i> موسوعة أصول الفقه</div>
    </a>
    <a class="box-link" href="fiqh.php">
      <div class="box-item"><i class="fas fa-book"></i> الموسوعة الفقهية</div>
    </a>
    <a class="box-link" href="adyan.php">
      <div class="box-item"><i class="fas fa-globe"></i> موسوعة الأديان</div>
    </a>
    <a class="box-link" href="tarikh.php">
      <div class="box-item"><i class="fas fa-landmark"></i> الموسوعة التاريخية</div>
    </a>
    <a class="box-link" href="arabic.php">
      <div class="box-item"><i class="fas fa-language"></i> موسوعة اللغة العربية</div>
    </a>
    <a class="box-link" href="not_authentic.php">
      <div class="box-item"><i class="fas fa-ban"></i> أحاديث منتشرة لا تصح</div>
    </a>
    <a class="box-link" href="quran_uloom.php">
      <div class="box-item"><i class="fas fa-book-open"></i> موسوعة علوم القرآن وأصول التفسير</div>
    </a>
    <a class="box-link" href="ahadith_imamiyah.php">
      <div class="box-item"><i class="fas fa-scroll"></i> موسوعة الأحاديث الإمامية</div>
    </a>
  </div>
</main>

<footer>
  <p>&copy; 2025 - جميع الحقوق محفوظة - الدرر الشيعية</p>
</footer>

</body>
</html>