# PHP
Su dung github:
B1: Chon thu muc tuong tac voi git, dung lenh tao file .git
git init
B2: Dang nhap vao github.com, tao thu muc repository

B3:Lay file chua key cua tai khoan:
ssh-keygen -t rsa -C "duong.truong@asiantech.vn"

B4: Doc noi dung chua key:
cat ~/.ssh/id_rsa.pub

B5: coppy noi dung, vao tai khoan github =>setting => SSH and GPG keys , chon new SSH key và paste noi dung vao

B6:Chon thu muc Repository chon Clone or Download, Chon Use SSH va copy link

B7:Clone git vao thu muc: den thu muc can clone
git clone "link"

B8: Tao branch moi:
git branch "tenbranch"

B9: chuyen qua nhanh branch vua tao:
git checkout "tenbranchmuonchuyen"

B10:sau khi thay doi cac file trong git, can add va commit truoc khi merge:
git add.
git commit
Co the nhap git status de kiem tra trang thai cua cac file

B11:Chon duong dan den branch:
git remote add origin "duonglink"
co the nhap git remote -v de kiem tra
