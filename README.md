## Installation
Package installation using composer
```
composer require satya/eloquent-activity
```
```
Register service provider in your config/app.php file:
```
```
'providers' => [
    // ...
    Satya\EloquentActivity\EloquentActivityServiceProvider::class,
];
```

## Run the migrations:
```
php artisan migrate
```

## Basic Usage
First, add the Satya\EloquentActivity\Traits\EloquentActivity trait to your model(s):
```
use Illuminate\Database\Eloquent\Model;
use Satya\EloquentActivity\Traits\EloquentActivity;

class VendorCenter extends Model
{
    use EloquentActivity;

    //..
}
```

## Custom Eloquent Tag Name Setup
By default, the package uses the log name as an eloquent name. For example, VendorCenter is the class name, so the log tag name considers as “Vendor Center”. If you went customize tag name just use declare the protected variable tagName in the model class body.

```
protected $tagName = 'Vendor Information';
```

```
use Illuminate\Database\Eloquent\Model;
use Satya\EloquentActivity\Traits\EloquentActivity;

class VendorCenter extends Model
{
    use EloquentActivity;
    
    protected $tagName = 'Vendor Information';

    //..
}
```

##Retrive App Activity
For retrieving app activity just use the Satya\EloquentActivity\Model\Eloquent Activity model.

```
use Satya\EloquentActivity\Model\EloquentActivity;

class VendorCenterController extends Controller
{
    
    public function index(){
        //Retrieving app activity
        $activity = EloquentActivity::orderBy('created_at','DESC')->get();
    }
}
```


## How to Implement Eloquent Activity Features without Package.
Below link of article is helpfull to implement this package fetures on your Laravel app without any package.

Link:- https://satyaprakash-nishad.medium.com/laravel-model-custom-logs-with-traits-89a246d8bf1c
