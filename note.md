# Laravel 步驟

## setup env

複製 .env 
```
cp .env.example .env
```
修改 .env 裡的db設定 到相應的設定
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
啟動 mysql db
```
mysql.server start
```
安裝相依包
```
composer install
npm install
```
建立 schemas laravel 並建立table
```
php artisan migrate
```
產生app key
```
php artisan key:generate
```
啟動 測試伺服器 
```
php artisan serve
```
顯示相關指令
```
php artisan list
```

------------------------
## MVC setup

建立 controller 注意大小寫

檔案會在app/Http/controllers
```
php artisan make:controller <MyController> 
```
建立 model 名字要跟資料庫table名一樣

檔案會在app or app/model 裡
```
php artisan make:model <Tablename>
```
model 使用方式
```
use app/<Tablename>

<Tablename>::all();
<Tablename>::where(<colname>,<value>)->get();
<Tablename>::orderBy(<colname>)->get(); # 可以加入orderBy(<colname>,'desc')等參數
<Tablename>::latest()->get(); #根據時間
```

-----

建立 migration 用php 注意命名方式 要跟資料庫table名一樣
```
 php artisan make:migration create_<tablename>_table 
```


```
any file
@extends('layouts.layouts')

@section("content")
@endsection
==>
layout file
@yield("content")
```



```
composer require laravel/ui="1.*"   
php artisan ui vue --auth
```

#Cpanel config

##run artisan with php page

route/web.php Artisan::call(`<commend>`);
```
Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

});
```
## Laravel 常見問題: Specified key was too long
mysql

編輯專案目錄下的 app/Providers/AppServiceProvider.php

新增一個引用
```
use Illuminate\Support\Facades\Schema;
```
接著修改 boot function, 將預設長度定為 191
```
public function boot()
{
Schema::defaultStringLength(191);
}
```

## html tag 注意

不能將form 放在 table 裡 (會產生error)

```
<table>
    <form>
    </form>
</table>
```
