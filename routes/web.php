<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CookbookController;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/culinary', [PageController::class, 'culinary'])->name('culinary');
Route::get('/education', [PageController::class, 'education'])->name('education');

// Recipe public routes
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.detail');

// Inside public routes
Route::get('/recipes/{recipe}/download', [RecipeController::class, 'downloadCard'])->name('recipes.download');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Authentication routes
Route::post('/register', [UserController::class, 'store'])->name('register');

// Protected routes
Route::middleware([
    'auth:sanctum',
    'verified',
])->group(function () {
    // Recipe management
    Route::get('/recipe/create-new-recipe', [RecipeController::class, 'createNewRecipe'])->name('recipes.create-new-recipe');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Cookbook routes
    Route::get('/cookbook', [CookbookController::class, 'index'])->name('cookbook');
    Route::get('/cookbook/posts/create', [CookbookController::class, 'create'])->name('cookbook.posts.create');
    Route::post('/cookbook/posts', [CookbookController::class, 'store'])->name('cookbook.posts.store');
    Route::get('/cookbook/posts/{post}', [CookbookController::class, 'show'])->name('cookbook.posts.show');
    Route::get('/cookbook/my-posts', [CookbookController::class, 'userPosts'])->name('cookbook.my-posts');
    Route::post('/cookbook/posts/{post}/comments', [CookbookController::class, 'storeComment'])
        ->name('cookbook.posts.comments.store');
    Route::post('/cookbook/posts/{post}/comments/{comment}/replies', [CookbookController::class, 'storeReply'])
        ->name('cookbook.posts.comments.reply');

    // Profile routes
    Route::get('/profile/settings', [UserController::class, 'showProfileSettings'])->name('profile.settings');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile/destroy', [UserController::class, 'destroyProfile'])->name('profile.destroy');
});
