# Usage
```
include dirname( __FILE__ ) . '/Route.php';

Route::get( '/hello/user', function () {
	echo 'Hello User';
} );

Route::post( '/hello/user', function () {
	echo "No POST requests allowed for this endpoint.";
} );
//
Route::post( '/save', function () {
	echo "Item Saved.";
} );
```
