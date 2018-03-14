## Installing
To install, simply add the library to your project. Composer is the default installation tool for this library.
If you do not use Composer for your project, you can still auto-load classes by  including the file **includes/classes.php** in the page or function.

Before you use any commands,  you need to create your own class with Amazon MWS configuration. Configuration have to implementing **AmazonConfigurationInterface.php**.

If you are operating outside of the United States, be sure to change the Amazon Service URL to the one matching your region.

## Usage
All of the technical details required by the API are handled behind the scenes,
so users can easily build code for sending requests to Amazon
without having to jump hurdles such as parameter URL formatting and token management. 
The general work flow for using one of the objects is this:

1. Create an object with credential (based on class described in Installing section)
2. Create an object for the task you need to perform.
3. Load it up with parameters, depending on the object, using *set____* methods.
4. Submit the request to Amazon. The methods to do this are usually named *fetch____* or *submit____* and have no parameters.
5. Reference the returned data, whether as single values or in bulk, using *get____* methods.
6. Monitor the performance of the library using the built-in logging system.

Note that if you want to act on more than one Amazon store, you will need a separate object for each store.

Also note that the objects perform best when they are not treated as reusable. Otherwise, you may end up grabbing old response data if a new request fails.

## Examples
Here is an example of a function used to get all warehouse-fulfilled orders from Amazon updated in the past 24 hours:
```php
function getAmazonOrders() {
    $config = new MyNewClassWithCredentialsForAmazonMWS();
    $amz = new AmazonOrderList($config);
    $amz->setLimits('Modified', "- 24 hours");
    $amz->setFulfillmentChannelFilter("MFN"); //no Amazon-fulfilled orders
    $amz->setOrderStatusFilter(
        array("Unshipped", "PartiallyShipped", "Canceled", "Unfulfillable")
        ); //no shipped or pending
    $amz->setUseToken(); //Amazon sends orders 100 at a time, but we want them all
    $amz->fetchOrders();
    return $amz->getList();
}
```
This example shows a function used to send a previously-created XML feed to Amazon to update Inventory numbers:
```php
function sendInventoryFeed($feed) {
    $config = new MyNewClassWithCredentialsForAmazonMWS();
    $amz=new AmazonFeed($config); 
    $amz->setFeedType("_POST_INVENTORY_AVAILABILITY_DATA_"); //feed types listed in documentation
    $amz->setFeedContent($feed);
    $amz->submitFeed();
    return $amz->getResponse();
}
```
