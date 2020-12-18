# Uploadr Vanilla PHP Package
Easy-to-use codes for serverside handling of file uploads using vanilla PHP.
## How To Use (7 lines or less)
### Copy the Uploadr.php file to a suitable folder your projct directory.
  
### Load the Uploadr controller class:

``` require_once("path_to_your_folder/Uploadr.php"); ```

### Next, initialize the Uploadr class: (you don't need to know Object-Oriented PHP)

``` $uploadr = new Uploadr(); ```

### Point Uploadr to the destination folder for your upload:

``` $uploadr->setDir('../uploads/profile_photos/'); ```

### Set allowed extensions for your file. Only files whose file extensions are marked ALLOWED will be uploaded:

``` $uploadr->setExtensions(array('jpg','jpeg','png','gif')); ```

### Set a ceiling for the size of your file. Files that exceed this ceiling will not be uploaded: (values are in megabytes)

``` $uploadr->setMaxSize(15); // sets max_size to 15 megabytes or 15,000,000 bytes ```

You may pass floating point values for smaller units:

``` $uploadr->setMaxSize(.01); // sets max_size to 10 kilobytes or 10,000 bytes ```

A quick Google search can help convert your values for you!

### Upload the file and test for completion:

``` $uploadr->uploadFile('my_file'); 
// where my_file is the value of the 'name' attribute of the file input element in the HTML form, the name of the file object/blob in the FormData API request object, or the value of the 'file' parameter in any Uploadr clientside SDK ```

#### Example file upload successful test script:

``` if ($uploadr->uploadFile('my_file')) {
    echo "File uploaded successfully! :>> " . $uploadr->getUploadName();
} else {
    echo "An error occurred and the file could not be uploaded. :>> " . $uploadr->getMessage();
}
```

### The full code could look like this:

``` 
require_once("../../uploads/profile_photos/");

$uploadr   =   new Uploadr();

$uploadr->setDir('uploads/images/');

$uploadr->setExtensions(array('jpg','jpeg','png','gif'));

$uploadr->setMaxSize(.5);

if ($uploadr->uploadFile('my_file')) {
    echo $uploadr->getUploadName();
} else {
    echo $uploadr->getMessage();
}

```
#### Leave a star if you find this helpful.

#### Cheers!
``` Ozuru, Icheka Fortune (harry_potter_of_php) ```

``` echo "May the code be with us all" ```
