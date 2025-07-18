-- Membuat database jika belum ada
CREATE DATABASE IF NOT EXISTS cakeshop;
USE cakeshop;

-- Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'kasir', 'customer') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Products
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price INT,
    stock INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Orders
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_price INT,
    status ENUM('pending', 'paid', 'done') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tabel Order Items
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    subtotal INT,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Tabel Transactions
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    cashier_id INT,
    paid_amount INT,
    change_amount INT,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (cashier_id) REFERENCES users(id)
);

-- Tabel Promo
CREATE TABLE promo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    start_date DATE,
    end_date DATE,
    category ENUM('all','product','category') DEFAULT 'all',
    product_id INT DEFAULT NULL,
    product_category VARCHAR(50) DEFAULT NULL,
    discount_type ENUM('percent','nominal') DEFAULT 'percent',
    discount_value INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Akun Admin dan Kasir Default
-- (Baris ini dihapus sesuai permintaan user) 