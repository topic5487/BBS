# Laravel SNS網站
## 網站簡介
利用 Laravel 實作一個網路論壇

## 主要功能
* 用戶<BR>
⌞註冊<BR>
⌞登入<BR>
⌞忘記密碼<BR>
⌞更改密碼<BR>
⌞編輯個人資料<BR>

* 用戶個人頁面<BR>
⌞個人簡介<BR>
⌞註冊時間<BR>
⌞用戶的所有文章和回覆<BR>

* 文章<BR>
⌞新增、編輯、刪除文章<BR>
⌞文章陳列排序(最新or最後回覆)<BR>
⌞文章分類<BR>
⌞文章被回覆時有通知<BR>

* 分類<BR>
⌞當前分類的所有文章<BR>
⌞文章陳列排序(最新or最後回覆)<BR>

* 權限系統<BR>
網站分為站長 管理員 用戶 遊客四種角色<BR>
1.站長(權限最大)<BR>
⌞站長可編輯用戶資料<BR>
⌞站長可刪除用戶<BR>
⌞站長可刪除分類<BR>
⌞站長包含管理員所有權限<BR>
2.管理員<BR>
⌞管理員可進入後台<BR>
⌞管理員可編輯分類<BR>
⌞管理員可刪除回覆<BR>
⌞管理員可編輯所有文章<BR>

## 運用技術

1. PHP
2. Laravel Framework 開發
3. MySQL 管理資料庫
4. Bootstrap 樣板 
5. Font Awesome做字體圖標工具
6. Google - reCAPTCHA做註冊驗證 防止惡意註冊
7. Socialite實現Github第三方登入
8. Intervention/image對圖片進行處理
9. Simditor更美觀好用的編輯器
10. Laravel-permission管理權限需求

