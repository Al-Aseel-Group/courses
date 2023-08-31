# Course Steps

## Steps to make a new CRUD:
* Create a new project with this command `composer create-project --prefer-dist laravel/laravel <name>`, this will create a new project with the name you choose.

* Create a Controller with this command `php artisan make:controller <name>Controller --api`, this will create a controller with the basic CRUD methods which are: index, store, show, update, destroy.

* Create a Model with this command `php artisan make:model <name> -m`, this will create a model and a migration file.

* Open the migration file and add the fields you want to the table, like this example:

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('body');
        $table->timestamps();
    });
}
```
* Add the fields to the model, like this example:

```php
class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];
}
```

* Open the terminal and run this command to create new Database `mysql -u root `, then `create database <name>;` and `exit;`.

* Open the .env file and change the DB_DATABASE to the name you choose.

* Run this command to migrate the tables `php artisan migrate`.

* Open the routes/api.php file and add the routes you want, like this example:

```php
Route::apiResource('posts', \App\Http\Controllers\PostController::class);
```

* Open the PostController.php file and add the methods you want, like this example:

```php
public function index()
{
    // here we return all the posts
    return response()->json([
        'data'=>Post::all()
    ]);
}

public function store(Request $request)
{
    // here we validate the request and put the data in the $input variable
    $input = $request->validate([
        'title'=>'required',
        'body'=>'required'
    ]);

    // here we create a new post with the data in the $input variable
    $post = Post::create($request->all());

    // here we return a message to the user
    return response()->json([
        'message'=>'Post created successfully',
    ]);
}

public function show($id)
{
    // here we return the post with the id we get from the url
    return response()->json([
        'data'=>Post::findOrFail($id)
    ]);
}

public function update(Request $request, $id)
{
    // here we validate the request and put the data in the $input variable
    $input = $request->validate([
        'title'=>'required',
        'body'=>'required'
    ]);

    // here we update the post with the id we get from the url
    $post = Post::findOrFail($id)->update($input);

    // here we are returning an updated record
    return response()->json([
        'data' => $post,
    ]);
}

public function destroy($id)
{
    // here we delete the post with the id we get from the url
    $post = Post::findOrFail($id)->delete();

    // here we are returning a message to the user
    return response()->json([
        'message' => 'Post deleted successfully',
    ]);
}
```

## Steps to make Custom Requests:

* Create a new Custom Request with this command `php artisan make:request <name>Request`, this will create a new Custom Request.

* Open the Custom Request file and you will find two methods, the first one is authorize, this method is used to authorize the user to make the request, and the second one is rules, this method is used to validate the request, like this example:

```php
public function authorize()
{
    return true;
}

public function rules()
{
    return [
        'title'=>'required',
        'body'=>'required'
    ];
}
```
now you can use this Custom Request in the controller, like this example:

```php
public function store(PostRequest $request)
{
    // here we validate the request and put the data in the $input variable
   $input = $request->validated();

    // here we create a new post with the data in the $input variable
    Post::create($input);

    // here we return a message to the user
    return response()->json([
        'message'=>'Post created successfully',
    ]);
}
```
NOTE: you should add the Custom Request to the controller, like this example:

```php
use App\Http\Requests\PostRequest;
```

## Relationship:


