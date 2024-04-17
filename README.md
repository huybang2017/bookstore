# Cơ sở dữ liệu Bookstore

## Bảng

1. **Addresses**: Lưu trữ thông tin địa chỉ của người dùng.

   - `AddressID`: Khóa chính.
   - `UserID`: Khóa ngoại tham chiếu đến bảng `Users`.
   - `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`: Thông tin chi tiết về địa chỉ.

2. **Authors**: Lưu trữ thông tin về các tác giả của sách.

   - `AuthorID`: Khóa chính.
   - `AuthorName`: Tên của tác giả.

3. **Categories**: Lưu trữ thông tin về các danh mục của sách.

   - `CategoryID`: Khóa chính.
   - `CategoryName`: Tên của danh mục.

4. **Coupons**: Lưu trữ thông tin về các phiếu giảm giá.

   - `CouponID`: Khóa chính.
   - `CouponCode`: Mã phiếu giảm giá.
   - `DiscountPercentage`: Tỷ lệ phần trăm giảm giá.
   - `ExpiryDate`: Ngày hết hạn của phiếu giảm giá.

5. **Favorites**: Lưu trữ thông tin về các sản phẩm mà người dùng đã đánh dấu là yêu thích.

   - `FavoriteID`: Khóa chính.
   - `UserID`: Khóa ngoại tham chiếu đến bảng `Users`.
   - `ProductID`: Khóa ngoại tham chiếu đến bảng `Products`.

6. **Images**: Lưu trữ đường dẫn của hình ảnh liên quan đến sản phẩm.

   - `ImageID`: Khóa chính.
   - `ProductID`: Khóa ngoại tham chiếu đến bảng `Products`.
   - `ImageURL`: Đường dẫn của hình ảnh.
   - `UserID`: Khóa ngoại tham chiếu đến bảng `Users`.
   - `AuthorID`: Khóa ngoại tham chiếu đến bảng `Authors`.

7. **OrderDetails**: Lưu trữ thông tin chi tiết về các sản phẩm trong đơn đặt hàng.

   - `OrderDetailID`: Khóa chính.
   - `OrderID`: Khóa ngoại tham chiếu đến bảng `Orders`.
   - `ProductID`: Khóa ngoại tham chiếu đến bảng `Products`.
   - `Quantity`: Số lượng sản phẩm.
   - `UnitPrice`: Giá của mỗi sản phẩm.

8. **Orders**: Lưu trữ thông tin về các đơn đặt hàng.

   - `OrderID`: Khóa chính.
   - `UserID`: Khóa ngoại tham chiếu đến bảng `Users`.
   - `OrderDate`: Ngày đặt hàng.
   - `TotalPrice`: Tổng giá tiền của đơn hàng.

9. **Payments**: Lưu trữ thông tin về thanh toán các đơn hàng.

   - `PaymentID`: Khóa chính.
   - `OrderID`: Khóa ngoại tham chiếu đến bảng `Orders`.
   - `PaymentMethod`: Phương thức thanh toán.
   - `PaymentDate`: Ngày thanh toán.
   - `Amount`: Số tiền thanh toán.

10. **Products**: Lưu trữ thông tin về các sản phẩm.

    - `ProductID`: Khóa chính.
    - `ProductName`: Tên sản phẩm.
    - `Description`: Mô tả sản phẩm.
    - `Price`: Giá sản phẩm.
    - `StockQuantity`: Số lượng tồn kho.
    - `AuthorID`: Khóa ngoại tham chiếu đến bảng `Authors`.
    - `CategoryID`: Khóa ngoại tham chiếu đến bảng `Categories`.

11. **Publishers**: Lưu trữ thông tin về các nhà xuất bản.

    - `PublisherID`: Khóa chính.
    - `PublisherName`: Tên nhà xuất bản.

12. **Reviews**: Lưu trữ thông tin về đánh giá của người dùng về các sản phẩm.

    - `ReviewID`: Khóa chính.
    - `UserID`: Khóa ngoại tham chiếu đến bảng `Users`.
    - `ProductID`: Khóa ngoại tham chiếu đến bảng `Products`.
    - `Rating`: Điểm đánh giá.
    - `Comment`: Bình luận của người dùng.
    - `ReviewDate`: Ngày đánh giá.

13. **Roles**: Lưu trữ thông tin về vai trò của người dùng.

    - `RoleID`: Khóa chính.
    - `RoleName`: Tên vai trò.

14. **Shipping**: Lưu trữ thông tin về vận chuyển của các đơn hàng.

    - `ShippingID`: Khóa chính.
    - `OrderID`: Khóa ngoại tham chiếu đến bảng `Orders`.
    - `ShippingMethod`: Phương thức vận chuyển.
    - `TrackingNumber`: Số theo dõi.
    - `ShippingDate`: Ngày giao hàng.
    - `EstimatedDeliveryDate`: Ngày dự kiến giao hàng.

15. **Users**: Lưu trữ thông tin về người dùng.
    - `UserID`: Khóa chính.
    - `Username`: Tên đăng nhập của người dùng.
    - `Password`: Mật khẩu của người dùng (đã được mã hóa).
    - `Email`: Địa chỉ email của người dùng.
    - `RoleID`: Khóa ngoại tham chiếu đến bảng `Roles`.
