# Route
    - Route la nhung tuyen duong duoc dinh nghia trong website
    - De xu ly cac yeu cau request tu phia nguoi dung va dieu huong chung den cac phuong thuc xu ly tuong ung trong controller
    ** Phuong thuc - Duong dan - Controller - Function - Name

# Laravel
    - ** Laravel la 1 framework duoc xay dung tren ngon ngu PHP mo hinh MVC
    - ** Cung cap cac phuong thuc giup xay dung va mo rong website nhanh chong

# Authentication
    - La mot trong nhung phuong thuc laravel cung cap dung de xay dung tinh nang Login,..
    - Laravel da xay dung nhung phuong thuc do roi

# Middleware
    - ** La mot lop chung gian giua Client va Server
    - ** Dung de xu ly, loc, kiem tra cac request hop le
    - ** Chung thuc hien xu ly truoc khi Request den Controller

# Validation
    - ** Kiem tra du lieu nguoi dung nhap vao
    - ** Laravel cung cap nhung quy tac co san
    - ** Va laravel cung cho phep tao ra cac quy tac tuy chinh

# Session ** La du lieu duoc luu tru tren server
# Coockie ** La du lieu duoc luu tru tren trinh duyet

# Eloquent
    - ** Cung cap nhung phuong thuc truy xuat du lieu don gian, ho tro thao tac nhanh gon voi DB
    - **[U] Cu phap ngan gon, de tiep can, don gian hon Query Builder
    - **[N] Khong the xu ly duoc cac cau lenh SQL phuc tap

# Query Builder
    - De rang tao, chay nhung cau lenh truy van tu DB
    - Co the su dung thuc thi hau het cac thao tac ve DB
    - Lam viec duoc voi tat ca cac DB duoc ho tro

# Queues
    - What is it?
    - Là hàm đợi
    - What is it used for

# Design partten
## Repository partten:
    - La lop trung gian giua tang Business Login va Data Access
    - Giup cho viec truy cap du lieu chat che bao mat hon
## Repository
    - Dong vai tro la mot lop ket noi giua Business va Model

# Cau truc thu mua cua 1 du an Laravel
- Cau truc tuan theo mo hinh MVC
- Thu muc goc bao gom
- **[App]**
    - compact 
- **[Public]**
- **[Resource]**
    - Blade: la template engine
- **[Database]**
- **[Route]**

# Artisan
    - La cong cua cua Laravel cung cap san dc viet bang PHP
        + serve: chay web server
        + migrate: tao ra bang du lieu
        + migrate:rollback: xoa di bang du lieu
# .env
    - file chua cau hinh web
    - Sua .env => clear config => cache lai 

Cơ sở dữ liệu (Select, Subquery, Join, Function, Trigger)
transaction 

# OOP
    ** Dong goi
        - Dữ liệu và hành động liên quan đến dữ liệu thì sẽ dc đóng gói, gói gọn trong lớp đó
        - Biểu hiện là các thuộc tính là Private
        - Chỉ có thể truy cập được đến các thuộc tính Private này từ bên trong lớp chứa nó
        - Do đó dữ liệu sẽ dc bảo vệ & bảo mật để ko bị truy cập trái phép
    ** Ke thua
        - Cho phép lớp con kế thừa thuộc tính và phương thức từ lớp cha
        - Tái sử dụng code, mở rộng các ĐẶC TÍNH có sẵn mà ko cần phải ĐỊNH NGHĨA lại
    ** Da hinh
        - Đối tượng có nhiều vai trò, hình dạng tùy thuộc vào bối cảnh khác nhau
        - Lớp con viết lại những phương thức của lớp cha
    ** Truu tuong
        - Hiển thị ra những thành phần cần thiết cho người dùng, ẩn đi những chi tiết không cần thiết
        - Tập trung vào những tính năng quan trọng, che dấu đi những chi tiết phức tạp
    
    - Phân biệt Class và Object

    - Contructor là gì? Cho ví dụ