# ApiOvertimePay

Laravel 8, PHP 7.4

After clone -> Command Line :

<<<<<<< HEAD

1. run composer install to generate depedencies in vendor folder
2. change .env.example to .env
3. run php artisan key:generate
4. configure .env
5. php artisan migrate:fresh --seed
6. # php artisan serve
   **Get all posts:** `GET /api/posts`

**Get a single post:** `GET /api/posts/{id}`

**Create a new post:** `POST /api/posts`

**Update a post:** `PUT /api/posts/{id}`

**Delete a post:** `DELETE /api/posts/{id}`

## Routes

```
Route::get('/posts', [PostsApiController::class, 'index']);
Route::get('/post/{post}', [PostsApiController::class, 'get']);
Route::post('/posts', [PostsApiController::class, 'store']);
Route::put('/posts/{post}', [PostsApiController::class, 'update']);
Route::delete('/posts/{post}', [PostsApiController::class, 'destroy']);
```

### Laravel artisan commands

```
php artisan --version
rm database/database.sqlite
sqlite3 database/database.sqlite "create table aTable(field1 int); drop table aTable;"
php artisan make:model Post -m
php artisan migrate
php artisan migrate:fresh
php artisan migrate:status
php artisan migrate:reset
php artisan migrate:refresh
php artisan migrate
php artisan make:controller PostsApiController
```

### Insert fake/sample data to database

**$ php artisan tinker**

```
Psy Shell v0.10.7 (PHP 8.0.3 — cli) by Justin Hileman
>>> $post = new Post;
[!] Aliasing 'Post' to 'App\Models\Post' for this Tinker session.
=> App\Models\Post {#3329}
>>> $post->title = 'My first post'
=> "My first post"
>>> $post->content = 'My first blog post text...'
=> "My first blog post text..."
>>> $post->save()
=> true

>>> $post = new Post
=> App\Models\Post {#3322}
>>> $post->title = 'My second post'
=> "My second post"
>>> $post->content = 'My second blog post text'
=> "My second blog post text"
>>> $post->save()
=> true
```

### Database Preview

![sqlite laravel sample project database preview](sqlite-preview.png)

![sqlite laravel sample project database preview](database-post-table-preview.png)

## Acknowledgment

<!-- https://www.youtube.com/watch?v=WDha52dbLWM -->

I saw an Youtube video and It's encouraged me to write a similar project myself.

© Copyright Max Base 2021

> > > > > > > 64c6d35 (add link)