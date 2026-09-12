<?php
// routes/web.php
// only for web view, (for api create api.php, & change PostController, UserController to send json)
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
Route::resource('posts', PostController::class); // gives all CRUD routes

use App\Http\Controllers\UserController;
Route::resource('users', UserController::class);

Route::get('/', function () {
    //return view('welcome'); // shows resources/views/welcome.blade.php
    $user = 'Anup';
    return view('homepage', ['user'=>$user]); // passing values
});


// named route
Route::get('/test', function () {
    return "test page content";
})->name("testPage");

// path parameters using route
Route::get('/portfolio/{name}/{age}', function (string $name, int $age) {
    return ["name"=>$name, "age"=>$age]; // Laravel will automatically convert the PHP array into a JSON response
    // or, return response()->json(["name" => $name, "age" => $age]);
});

/*
 GET: http://127.0.0.1:8000/portfolio/john/25
 response: {"name":"john","age":"25"}
*/

// Route Group with a Prefix
Route::prefix("portfolio")->group(
    function(){
        Route::get('/company', function(){ // http://127.0.0.1:8000/portfolio/company
            return "company page";
        });

        Route::get('/organization', function(){ // http://127.0.0.1:8000/portfolio/organization
            return "organization page";
        });
    }
);

// query parameters
use Illuminate\Http\Request as HttpRequest; // here not, use Illuminate\Routing\Route\Request;

Route::get('/portfolio', function (HttpRequest $request) {
    $name = $request->query('name') ?? 'unknown';
    $id = $request->query('id') ?? 'none';

    return ['name' => $name, 'id' => $id];
});
/*
http://127.0.0.1:8000/portfolio
{"name":"unknown","id":"none"}

http://127.0.0.1:8000/portfolio?name=john&id=1
{"name":"john","id":"1"}
*/

// about page
Route::get('/about', function () {
    return view('about');
})->name("aboutPage");


Route::get('/register', function () {
    return view('register-page'); // shows resources/views/register-page.blade.php (uses post form)
})->name("registerPage");


// post request example
// improvement: can write form logic inside a Controller
Route::post("/formsubmitted", function(HttpRequest $request){
    $request->validate([
        'fullname'=>'required|string|min:3|max:70',
        'email'=>'required|email|min:3|max:50',
        'password' => 'required|string|min:6|confirmed', // Must match password_confirmation field
    ]);
    $fullname = $request->input('fullname', 'Guest'); // normal php: $fullname = $_POST['fullname]; (not auto sanitized)
    $email = $request->input('email'); // $email = $request->email;
    $hashedPassword = Hash::make($request->input('password')); // hash pw before saving
    // save in db
    //return "Form Submitted! " . json_encode(["full name"=>$fullname, "email"=>$email]);
    //return "Your full name is $fullname, and your email is $email";
    return back()->with('success', 'Form submitted successfully!'); // Redirect back to the form with a success flash message
    // ^ Laravel redirects the user back to the form page and stores the
    // 'success' message in the session for just the next request (flash data)
})->name("formsubmitted");



/*
post routes:
Method,     URL,                 Action,    Name
GET,        /posts,              index,     posts.index
GET,        /posts/create,       create,    posts.create
POST,       /posts,              store,     posts.store
GET,        /posts/{post},       show,      posts.show
GET,        /posts/{post}/edit,  edit,      posts.edit
PUT/PATCH,  /posts/{post},       update,    posts.update
DELETE,     /posts/{post},       destroy,   posts.destroy
*/
