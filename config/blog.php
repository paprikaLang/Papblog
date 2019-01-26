<?php
/**
 * Created by PhpStorm.
 * User: paprika
 * Date: 2019/1/26
 * Time: 5:52 AM
 * config('blog.title') 将会返回 title 配置项的值;
 * 使用 storage 配置使用的文件系统，使用 webpath 配置 Web 访问根目录
 */
return [
    'name' => "papblog",
    'title' => "papblog",
    'subtitle' => 'https://github.com/paprikaLang',
    'description' => 'laravel blog system',
    'author' => 'paprikaLang',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage/uploads',
    ],
];