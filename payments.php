<?php
// payments.php

$host     = "localhost";
$user     = "root";
$password = ""; // change if you set a password
$dbname   = "rentals_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Default query
$query = "SELECT * FROM mpesa_payments WHERE 1";

// Handle search
if (!empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $query .= " AND (PhoneNumber LIKE '%$search%' OR MpesaReceiptNumber LIKE '%$search%')";
}

// Handle status filter
if (isset($_GET['status']) && $_GET['status'] !== "") {
    $status = intval($_GET['status']);
    $query .= " AND ResultCode = $status";
}

// Handle date filter
if (!empty($_GET['from_date']) && !empty($_GET['to_date'])) {
    $from = $conn->real_escape_string($_GET['from_date']);
    $to   = $conn->real_escape_string($_GET['to_date']);
    $query .= " AND DATE(created_at) BETWEEN '$from' AND '$to'";
}

$query .= " ORDER BY id DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>M-Pesa Payments</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f4f6;
      padding: 20px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    form {
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      gap: 10px;
      flex-wrap: wrap;
    }
    input, select, button {
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      background: #16a34a;
      color: white;
      border: none;
      cursor: pointer;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      text-align: left;
      font-size: 14px;
    }
    th {
      background: #16a34a;
      color: white;
    }
    tr:hover {
      background: #f1f5f9;
    }
  </style>
</head>
<body>

  <h2>📋 M-Pesa Payments Records</h2>

  <!-- 🔍 Search & Filters -->
  <form method="GET">
    <input type="text" name="search" placeholder="Search Phone/Receipt" value="<?= $_GET['search'] ?? '' ?>">
    
    <select name="status">
      <option value="">All Status</option>
      <option value="0" <?= (($_GET['status'] ?? '') === "0") ? 'selected' : '' ?>>✅ Success</option>
      <option value="1" <?= (($_GET['status'] ?? '') === "1") ? 'selected' : '' ?>>❌ Failed</option>
    </select>

    From: <input type="date" name="from_date" value="<?= $_GET['from_date'] ?? '' ?>">
    To: <input type="date" name="to_date" value="<?= $_GET['to_date'] ?? '' ?>">

    <button type="submit">Filter</button>
    <a href="payments.php" style="padding:8px; background:#ef4444; color:white; text-decoration:none; border-radius:6px;">Reset</a>
  </form>

  <table>
    <tr>
      <th>ID</th>
      <th>Receipt</th>
      <th>Amount</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['MpesaReceiptNumber'] ?: '---' ?></td>
          <td><?= $row['Amount'] ?></td>
          <td><?= $row['PhoneNumber'] ?></td>
          <td><?= $row['TransactionDate'] ?></td>
          <td>
            <?= $row['ResultCode'] == 0 ? "✅ Success" : "❌ Failed" ?>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="6" style="text-align:center;">No payments found</td></tr>
    <?php endif; ?>
  </table>

</body>
</html>
<?php $conn->close(); ?>
