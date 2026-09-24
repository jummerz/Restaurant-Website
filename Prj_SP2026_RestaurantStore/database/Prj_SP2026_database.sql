CREATE DATABASE IF NOT EXISTS Prj_SP2026_RestaurantStore;
USE Prj_SP2026_RestaurantStore;

DROP TABLE IF EXISTS Prj_SP2026_contact_messages;
DROP TABLE IF EXISTS Prj_SP2026_products;
DROP TABLE IF EXISTS Prj_SP2026_categories;
DROP TABLE IF EXISTS Prj_SP2026_site_settings;
DROP TABLE IF EXISTS Prj_SP2026_admin_users;

CREATE TABLE Prj_SP2026_admin_users (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Prj_SP2026_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(150) NOT NULL,
    category_description TEXT,
    status ENUM('Active','Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Prj_SP2026_products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    product_name VARCHAR(180) NOT NULL,
    product_description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image_name VARCHAR(255) DEFAULT 'placeholder.jpg',
    status ENUM('Active','Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES Prj_SP2026_categories(category_id) ON DELETE CASCADE
);

CREATE TABLE Prj_SP2026_site_settings (
    setting_id INT AUTO_INCREMENT PRIMARY KEY,
    h1_color VARCHAR(20) DEFAULT '#212529',
    h2_color VARCHAR(20) DEFAULT '#212529',
    h3_color VARCHAR(20) DEFAULT '#212529',
    p_color VARCHAR(20) DEFAULT '#333333',
    header_color VARCHAR(20) DEFAULT '#0d6efd',
    body_color VARCHAR(20) DEFAULT '#ffffff',
    footer_color VARCHAR(20) DEFAULT '#212529',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Prj_SP2026_contact_messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(150) NOT NULL,
    customer_email VARCHAR(150) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Password is admin123
INSERT INTO Prj_SP2026_admin_users (username, password, full_name)
VALUES ('admin', '$2y$10$YSEp7AxYJgUT0am0Lkuq4el7VKxlMX1x8o.VdX6SXyRuM9aem/l6C', 'Site Administrator');

INSERT INTO Prj_SP2026_categories (category_name, category_description) VALUES
('Appetizers', 'Small starters and side dishes'),
('Entrees', 'Main restaurant meals'),
('Desserts', 'Sweet dishes and treats'),
('Drinks', 'Cold and hot beverages');

INSERT INTO Prj_SP2026_products (category_id, product_name, product_description, price, image_name) VALUES
(1, 'Crispy Samosas', 'Golden fried pastry filled with seasoned potatoes and spices.', 5.99, 'samosa.jpg'),
(2, 'Chicken Biryani', 'Fragrant basmati rice cooked with marinated chicken and traditional spices.', 13.99, 'biryani.jpg'),
(2, 'Grilled Burger', 'Fresh grilled beef burger served with lettuce, tomato, and house sauce.', 11.49, 'burger.jpg'),
(3, 'Chocolate Cake', 'Rich chocolate cake served with a soft frosting layer.', 6.99, 'cake.jpg'),
(4, 'Mango Lassi', 'Refreshing yogurt-based mango drink.', 4.49, 'lassi.jpg');

INSERT INTO Prj_SP2026_site_settings (h1_color, h2_color, h3_color, p_color, header_color, body_color, footer_color)
VALUES ('#212529', '#343a40', '#495057', '#333333', '#0d6efd', '#ffffff', '#212529');
