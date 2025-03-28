<?php
session_start();

// Include database connection and necessary files
require_once('../server/controllers/DatabaseController.php');

// Initialize the $consultations, $partners, and $contacts variables
$consultations = [];
$partners = [];
$contacts = [];
$orders = [];
$order_items = [];
$payments = [];
$products = [];
$small_business_payments = [];
$government_payments = [];
$enterprise_payments = [];

// Fetch consultations, partners, and contacts from the database
$pdo = DatabaseController::getPDO(); // Assuming you have a DatabaseController that manages the PDO connection

// Fetch consultations from the database (assuming 'created_at' for consultations)
$stmt = $pdo->prepare("SELECT * FROM consultations ORDER BY created_at DESC");
$stmt->execute();
$consultations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch partners from the database (assuming 'submitted_at' for partners)
$stmt = $pdo->prepare("SELECT * FROM partners ORDER BY submitted_at DESC");
$stmt->execute();
$partners = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch contact submissions from the database (assuming 'submitted_at' for contacts)
$stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY created_at DESC");
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch orders from the database
$stmt = $pdo->prepare("SELECT * FROM orders ORDER BY created_at DESC");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch order items from the database
$stmt = $pdo->prepare("SELECT * FROM order_items ORDER BY order_id DESC");
$stmt->execute();
$order_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch payments from the database
$stmt = $pdo->prepare("SELECT * FROM payments ORDER BY created_at DESC");
$stmt->execute();
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch products from the database
$stmt = $pdo->prepare("SELECT * FROM products ORDER BY name ASC");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch small business payments from the database
$stmt = $pdo->prepare("SELECT * FROM small_business_payments ORDER BY payment_status DESC");
$stmt->execute();
$small_business_payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch government payments from the database
$stmt = $pdo->prepare("SELECT * FROM government_payments ORDER BY payment_status DESC");
$stmt->execute();
$government_payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch enterprise payments from the database
$stmt = $pdo->prepare("SELECT * FROM enterprise_payments ORDER BY payment_status DESC");
$stmt->execute();
$enterprise_payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EndpointGuard</title>
    <link rel="stylesheet" href="../public/css/admin.css">
</head>
<body>
    <div class="admin-dashboard">
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

        <div class="tab-container">
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="showTab(event, 'consultations')">Consultations</button>
                <button class="tab-btn" onclick="showTab(event, 'partners')">Partners</button>
                <button class="tab-btn" onclick="showTab(event, 'contacts')">Contact Submissions</button>
                <button class="tab-btn" onclick="showTab(event, 'orders')">Orders</button>
                <button class="tab-btn" onclick="showTab(event, 'order_items')">Order Items</button>
                <button class="tab-btn" onclick="showTab(event, 'payments')">Payments</button>
                <button class="tab-btn" onclick="showTab(event, 'products')">Products</button>
                <button class="tab-btn" onclick="showTab(event, 'small_business_payments')">Small Business Payments</button>
                <button class="tab-btn" onclick="showTab(event, 'government_payments')">Government Payments</button>
                <button class="tab-btn" onclick="showTab(event, 'enterprise_payments')">Enterprise Payments</button>
            </div>

            <div id="consultations" class="tab-content">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($consultations) && !empty($consultations)): ?>
                            <?php foreach ($consultations as $consultation): ?>
                            <tr>
                                <td><?php echo date('Y-m-d H:i', strtotime($consultation['created_at'])); ?></td>
                                <td><?php echo htmlspecialchars($consultation['name']); ?></td>
                                <td><?php echo htmlspecialchars($consultation['email']); ?></td>
                                <td><?php echo htmlspecialchars($consultation['phone']); ?></td>
                                <td><?php echo htmlspecialchars($consultation['message']); ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="update_status" value="1">
                                        <input type="hidden" name="table" value="consultations">
                                        <input type="hidden" name="id" value="<?php echo $consultation['id']; ?>">
                                        <select name="status" class="status-select" onchange="this.form.submit()">
                                            <option value="pending" <?php echo $consultation['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="approved" <?php echo $consultation['status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="rejected" <?php echo $consultation['status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No consultations available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="partners" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Company</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($partners) && !empty($partners)): ?>
                            <?php foreach ($partners as $partner): ?>
                            <tr>
                                <td><?php echo date('Y-m-d H:i', strtotime($partner['submitted_at'])); ?></td>
                                <td><?php echo htmlspecialchars($partner['company_name']); ?></td>
                                <td><?php echo htmlspecialchars($partner['contact_name']); ?></td>
                                <td><?php echo htmlspecialchars($partner['email']); ?></td>
                                <td><?php echo htmlspecialchars($partner['phone']); ?></td>
                                <td><?php echo htmlspecialchars($partner['message']); ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="update_status" value="1">
                                        <input type="hidden" name="table" value="partners">
                                        <input type="hidden" name="id" value="<?php echo $partner['id']; ?>">
                                        <select name="status" class="status-select" onchange="this.form.submit()">
                                            <option value="pending" <?php echo $partner['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="approved" <?php echo $partner['status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="rejected" <?php echo $partner['status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No partners available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="contacts" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Solution</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($contacts) && !empty($contacts)): ?>
                            <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td><?php echo date('Y-m-d H:i', strtotime($contact['created_at'])); ?></td>
                                <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                <td><?php echo htmlspecialchars($contact['company']); ?></td>
                                <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                <td><?php echo htmlspecialchars($contact['phone']); ?></td>
                                <td><?php echo htmlspecialchars($contact['solution']); ?></td>
                                <td><?php echo htmlspecialchars($contact['message']); ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="update_status" value="1">
                                        <input type="hidden" name="table" value="contact_submissions">
                                        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
                                        <select name="status" class="status-select" onchange="this.form.submit()">
                                            <option value="pending" <?php echo $contact['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="approved" <?php echo $contact['status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="rejected" <?php echo $contact['status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No contacts available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="orders" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Payment Method</th>
                            <th>Total Amount</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($orders) && !empty($orders)): ?>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars($order['user_id']); ?></td>
                                <td><?php echo htmlspecialchars($order['name']); ?></td>
                                <td><?php echo htmlspecialchars($order['email']); ?></td>
                                <td><?php echo htmlspecialchars($order['address']); ?></td>
                                <td><?php echo htmlspecialchars($order['payment_method']); ?></td>
                                <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
                                <td><?php echo date('Y-m-d H:i:s', strtotime($order['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No orders available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="order_items" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($order_items) && !empty($order_items)): ?>
                            <?php foreach ($order_items as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['order_id']); ?></td>
                                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                <td><?php echo htmlspecialchars($item['price']); ?></td>
                                <td><?php echo date('Y-m-d H:i:s', strtotime($item['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No order items available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="payments" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Payment ID</th>
                            <th>Order ID</th>
                            <th>Card Number</th>
                            <th>Expiry Date</th>
                            <th>Mobile Number</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($payments) && !empty($payments)): ?>
                            <?php foreach ($payments as $payment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($payment['id']); ?></td>
                                <td><?php echo htmlspecialchars($payment['order_id']); ?></td>
                                <td><?php echo '**** **** **** ' . substr(htmlspecialchars($payment['card_number']), -4); ?></td>
                                <td><?php echo htmlspecialchars($payment['expiry_date']); ?></td>
                                <td><?php echo htmlspecialchars($payment['mobile_number']); ?></td>
                                <td><?php echo date('Y-m-d H:i:s', strtotime($payment['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No payments available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="products" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Features</th>
                            <th>Min Subscription Price</th>
                            <th>Max Subscription Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($products) && !empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['id']); ?></td>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo htmlspecialchars($product['description']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" width="50"></td>
                                <td><?php echo htmlspecialchars($product['features']); ?></td>
                                <td><?php echo htmlspecialchars($product['subscription_price_min']); ?></td>
                                <td><?php echo htmlspecialchars($product['subscription_price_max']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No products available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="small_business_payments" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Plan</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($small_business_payments) && !empty($small_business_payments)): ?>
                            <?php foreach ($small_business_payments as $payment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($payment['user_id']); ?></td>
                                <td><?php echo htmlspecialchars($payment['plan']); ?></td>
                                <td><?php echo htmlspecialchars($payment['amount']); ?></td>
                                <td><?php echo htmlspecialchars($payment['payment_method']); ?></td>
                                <td><?php echo htmlspecialchars($payment['payment_status']); ?></td>
                                <td><?php echo date('Y-m-d H:i:s', strtotime($payment['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No small business payments available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="government_payments" class="tab-content" style="display: none;">
                <table class="submission-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Plan</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($government_payments) && !empty($government_payments)): ?>
                            <?php foreach ($government_payments as $payment): ?>
                            <tr>
                                <td>
                    <td><?php echo htmlspecialchars($payment['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($payment['plan']); ?></td>
                    <td><?php echo htmlspecialchars($payment['amount']); ?></td>
                    <td><?php echo htmlspecialchars($payment['payment_method']); ?></td>
                    <td><?php echo htmlspecialchars($payment['payment_status']); ?></td>
                    <td><?php echo date('Y-m-d H:i:s', strtotime($payment['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No government payments available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div id="enterprise_payments" class="tab-content" style="display: none;">
    <table class="submission-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Plan</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($enterprise_payments) && !empty($enterprise_payments)): ?>
                <?php foreach ($enterprise_payments as $payment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($payment['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($payment['plan']); ?></td>
                    <td><?php echo htmlspecialchars($payment['amount']); ?></td>
                    <td><?php echo htmlspecialchars($payment['payment_method']); ?></td>
                    <td><?php echo htmlspecialchars($payment['payment_status']); ?></td>
                    <td><?php echo date('Y-m-d H:i:s', strtotime($payment['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No enterprise payments available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

    <script>
        function showTab(event, tabId) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.style.display = 'none';
    });
    
    // Remove active class from all tab buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab content
    document.getElementById(tabId).style.display = 'block';
    
    // Add active class to clicked button
    event.currentTarget.classList.add('active');
}
    </script>
</body>
</html>