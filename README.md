## Laravel Eloquent Activity Manage Package
This will manage the eloquent activity and save to database and developer can be easily manage the laravel app activity.

## Installation
Package installation using composer
```
composer require satya/eloquent-activity
```
Register service provider in your config/app.php file:

```
'providers' => [
    // ...
    Satya\EloquentActivity\EloquentActivityServiceProvider::class,
];
```

Run the migrations:
```php
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

## Retrieve App Activity
For retrieving app activity just use the Satya\EloquentActivity\Model\EloquentActivity model.

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

## Example to retrieving specific record history
This package has features to view the specific record history by calling the recordHistory morphMany relationship method.

* Controller 
    ```php
     /**
         * @param $id
         */
        public function history($id){
            $client = Client::where('id',$id)->first();
            if (!empty($client))
            {
                dump($client);
                dd($client->recordHistory->toArray());
            }
        }
    ``` 
* Model 
    ```php
    <?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    use Satya\EloquentActivity\Traits\EloquentActivity;
    
    class Client extends Model
    {
        use EloquentActivity;
    
        /**
         * @var string
         */
        protected $table = 'clients';
    
    
        /**
         * @var string[]
         */
        protected $fillable = [
            'first_name',
            'last_name'
        ];
    }
    
    ```
* Result
    <img src="src/images/rsrh.png">

## How to Implement Eloquent Activity Features without Package. 
Below link of article is helpful to implement this package features on your Laravel app without any package.

Link:-   https://satyaprakash-nishad.medium.com/laravel-model-custom-logs-with-traits-89a246d8bf1c
