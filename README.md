# 由於 Lumen 8.x 預設安裝少了一些在 Laravel 好用的 make 指令
1. 安裝 lumen-generator 套件
    composer require flipbox/lumen-generator
2. 執行 php artisan key:generate

# 安裝 JWT
1. composer require tymon/jwt-auth
2. 修改 bootstrap\app.php

    // 反註解下面這幾行，Lumen 8.x 預設已經註解掉
    $app->withEloquent();
    $app->register(App\Providers\AuthServiceProvider::class);
    $app->routeMiddleware([
        'auth' => App\Http\Middleware\Authenticate::class,
    ]);

    // 新增下面這行
    $app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);

3. 執行 php artisan jwt:secret 產生 JWT 的密鑰

# 建立 User migration 及 假資料
1. Lumen 8.x 預設安裝並沒有 user 的 migration 需手動建立
    php artisan make:migration create_users_table
2. 修改 database\migrations\時間序列_create_users_table.php
3. 執行 php artisan migrate 建立 users 資料表並修改
4. 修改 Models\User.php 的 fillable 資料
5. 修改 database\factories\UserFactory.php 及 database\seeders\DatabaseSeeder.php
6. 建立幾筆假資料
    php artisan db:seed

# 修改 Models\User.php 新增 JWT functions
1. 加入 JWT function
2. 建立 config\auth.php
    Lumen 8.x 預設安裝並沒有 config 這個目錄，
    自行從 vendor\laravel\lumen-framework\config 目錄中
    複製 auth.php 到 config\auth.php 中
3. 修改 config\auth.php

# 定義路由
1. 修改 routes\web.php

# 建立 UserLoginController
1. 建立 UserLoginController
    php artisan make:controller Api\UserLoginController
2. 修改 UserLoginController

# 使用 Postman 測試
post => localhost/login
get => localhost/me
get => localhost/logout
