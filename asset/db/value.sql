-- Chèn một số vai trò (Roles) mẫu
INSERT INTO Roles (RoleName) VALUES 
('Admin'),
('User'),
('Guest');

-- Chèn một số tác giả (Authors) mẫu
INSERT INTO Authors (AuthorName) VALUES 
('John Smith'),
('Emily Johnson'),
('Michael Brown'),
('Emma Wilson');

-- Chèn một số nhà xuất bản (Publishers) mẫu
INSERT INTO Publishers (PublisherName) VALUES 
('ABC Publications'),
('XYZ Books'),
('Bestseller Publishing'),
('Great Reads Press');

-- Chèn một số danh mục (Categories) mẫu
INSERT INTO Categories (CategoryName) VALUES 
('Fiction'),
('Non-fiction'),
('Science Fiction'),
('Fantasy'),
('Romance'),
('Mystery'),
('Horror');

-- Chèn một số sản phẩm (Products) mẫu
INSERT INTO Products (ProductName, Description, Price, StockQuantity) VALUES 
('The Great Gatsby', 'A novel by F. Scott Fitzgerald', 12.99, 100),
('To Kill a Mockingbird', 'A classic by Harper Lee', 10.50, 80),
('1984', 'A dystopian novel by George Orwell', 9.99, 120),
('Pride and Prejudice', 'A romantic novel by Jane Austen', 11.49, 90);

-- Chèn một số người dùng (Users) mẫu
INSERT INTO Users (Username, Password, Email, RoleID) VALUES 
('admin', 'adminpassword', 'admin@example.com', 1),
('user1', 'userpassword', 'user1@example.com', 2),
('user2', 'userpassword', 'user2@example.com', 2);

-- Chèn một số địa chỉ (Addresses) mẫu
INSERT INTO Addresses (UserID, AddressLine1, City, State, ZipCode, Country) VALUES 
(2, '123 Main St', 'New York', 'NY', '10001', 'USA'),
(3, '456 Elm St', 'Los Angeles', 'CA', '90001', 'USA');

-- Chèn một số đơn hàng (Orders) mẫu
INSERT INTO Orders (UserID, OrderDate, TotalPrice) VALUES 
(2, '2024-04-15', 25.98),
(3, '2024-04-16', 12.50);

-- Chèn một số chi tiết đơn hàng (OrderDetails) mẫu
INSERT INTO OrderDetails (OrderID, ProductID, Quantity, UnitPrice) VALUES 
(1, 1, 1, 12.99),
(1, 2, 2, 10.50),
(2, 3, 1, 9.99),
(2, 4, 1, 11.49);

-- Chèn một số nhận xét (Reviews) mẫu
INSERT INTO Reviews (UserID, ProductID, Rating, Comment, ReviewDate) VALUES 
(2, 1, 5, 'One of my favorite books!', '2024-04-15'),
(3, 3, 4, 'Interesting read, but a bit too dark for my taste.', '2024-04-16');

-- Chèn một số sản phẩm yêu thích (Favorites) mẫu
INSERT INTO Favorites (UserID, ProductID) VALUES 
(2, 1),
(3, 3);

-- Chèn một số thanh toán (Payments) mẫu
INSERT INTO Payments (OrderID, PaymentMethod, PaymentDate, Amount) VALUES 
(1, 'Credit Card', '2024-04-15', 25.98),
(2, 'PayPal', '2024-04-16', 12.50);

-- Chèn một số mã giảm giá (Coupons) mẫu
INSERT INTO Coupons (CouponCode, DiscountPercentage, ExpiryDate) VALUES 
('SPRINGSALE', 10.00, '2024-04-30'),
('SUMMERSALE', 15.00, '2024-06-30');

-- Chèn một số ảnh sản phẩm (Images) mẫu
INSERT INTO Images (ProductID, ImageURL) VALUES 
(1, 'https://example.com/image1.jpg'),
(2, 'https://example.com/image2.jpg'),
(3, 'https://example.com/image3.jpg');
