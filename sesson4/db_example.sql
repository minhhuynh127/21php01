-- Lấy tất cả sản phẩm từ bảng products
SELECT * FROM products
ORDER BY productName;
-- Lấy danh sách sản phẩm có giá < $500
SELECT * FROM products WHERE listPrice < 500;
-- Lấy ra danh sách đơn hàng (bảng order) được mua vào tháng 5 năm 2014
SELECT * FROM orders WHERE orderDate LIKE '2014-05-__%';
-- Sửa tên sản phẩm có chữ chữ “Fe” thành chữ “Good product”
SELECT * FROM products WHERE productName LIKE '%Fe%';
UPDATE products SET productName = 'Good product' WHERE productName LIKE '%Fe%'; 
-- Xóa sản phẩm có giá lớn hơn $800
DELETE * FROM products WHERE listPrice > 800;