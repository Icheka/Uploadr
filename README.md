# Uploadr CodeIgniter Package
Easy-to-use codes for serverside handling of file uploads using the CodeIgniter PHP framework.
## How To Use
### Copy the Uploadr.php file to your <Models> folder (within the <application> folder of your CodeIgniter project directory.
  
### Load the Uploadr model in your controller:

``` $this->load->model("Uploadr"); ```

The Uploadr library requires two parameters to be passed in most of its methods:

``` $file: the value of the <name> attribute of the file input form control for the file to be uploaded. In asynchronous uploads (e.g using the Axios library), $file is the name (key) of the file object name:value pair in the FormData API object that will be passed in the request body of the POST request. More information on this is available below.```

``` $config: an array of configuration options for the file upload handler. The $config array has two required elements: i) $config['upload_path'] ii) $config['allowed_types'] ```

#### i) $config['upload_path']: the relative path to the folder where the uploaded file will be saved. For example:

``` $config['upload_path'] = './uploads/books/classics/'; ```

Note that the top-most directory in the upload path should be on the same level as the <application> folder of your CodeIgniter project.

*application --- 
*system      ---
*user_guide  ---
*uploads     ---  books
                      |
                      --- classics 
                      --- detective
                      --- romance
*index.php

``` $config['upload_path'] = './upload/books/classics/'; ```

A similar directory structure that can be used for saving profile pictures in a social networking website could be:

*application --- 
*system      ---
*user_guide  ---
*uploads     ---  photos
                      |
                      --- profile_photos
                      --- stories
                      --- chats 
*index.php*

``` $config['upload_path'] = './uploads/photos/profile_photos/'; ```

#### ii) $config['allowed_types'] : file types allowed for this upload. For example:

``` $config['allowed_types'] = 'jpg|png|jpeg|gif'; ```

I recommend performing some type validation at the clientside to filter unwanted types too.

If no $config array is passed to the function, a default of <./uploads/> and <jpg|png|jpeg|svg|txt|wepg|csv|gif> will be used:

``` $this->Uploadr->single_upload('profile_photo') will default to: $this->Uploadr->single_upload('profile_photo', array('upload_path' => './uploads/', 'allowed_types' => 'jpg|png|jpeg|svg|txt|wepg|csv|gif')) ```

#### Below is a list of parameters that may be passed through the <$config> array: 
+ upload_path   --- <string>   --- the relative path to the upload directory
+ allowed_types --- <string>   --- file types that should be can be uploaded
+ file_name     --- <string>   --- the name with which the newly uploaded file will be saved
+ overwrite     --- <boolean>  --- whether an existing file of the filename should be oerwritten with the new one. If set to <false>, a new file having the same filename as an old one will be renamed and its file name will be appended with an integer, (e.g 'my_file.pdf', 'my_file1.pdf', 'my_file2.pdf')
+ max_size      --- <integer: (bytes)>  --- the ceiling on the size of any file to be uploaded. Files that exceed this value will not be uploaded
+ max_width     --- <integer: (pixels)> --- the ceiling on the width of any file to be uploaded
+ max_height    --- <integer: (pixels)> --- the ceiling on the height of any file to be uploaded
+ encrypt_name  --- <boolean>           --- whether to encrypt this file name or not. If set to <false> the file will be saved with either the value of <file_name> if it exists, or the original name of the file as it exists on the local machine

### How to handle single file uploads 

#### Single file uploads can be handled with the <single_upload> method:

``` $this->Uploadr->single_upload(string $filename, array $config); ```

The line above would be valid only for PHP 7 and above. It can be written without type hinting as follows:

``` $this->Uploadr->single_upload($filename, $config); ```

#### The <single_upload> method can return one of three messages depending on the status of the upload process 

##### i) 'Config array must contain <upload_path> and <allowed_types>': a $config array that does not have the required parameters was passed to the method. If you did specify these parameters, the problem might have arisen due to a misspelled parameter key or value.

##### ii) <$data['status'] = 'Successful'>: The upload was successful. The file can be found within the directory specified in $config['upload_path']. The <$data> array contains other parameters that provide useful information about the file upload process.

##### iii) <$data['status] = 'Failed'>: The upload failed. This might be due to being passed a file whose size exceeds <max_size>, no write access to the <upload_path>, etc. 

##### Here's how you might upload a file and test for its success or failure

``` $this->load->model("Uploadr"); ```

``` $config = array("upload_path" => "./uploads/photos/", "allowed_types" => "png|jpg|jpeg|gif", "max_size" => 60000); ```

``` $data = $this->Uploadr->single_upload('image', $config); ```

``` 
if ($data['status'] == 'Success') {
   print_r($data);
} elseif ($data['status'] == 'Failed') {
   echo $data['error_message'];
} else {
   // there are problems in the <$config> array 
   echo $data['status'];
}
```


#### Cheers!
``` Ozuru, Icheka Fortune (harry_potter_of_php) ```

``` echo "May the code be with us all" ```
