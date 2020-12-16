# Uploadr
Easy-to-use codes for handling file uploads at the clientside and serverside in HTML, vanilla JavaScript, Vue.js (JavaScript and TypeScript), PHP, CodeIgniter and Node.js.
## How To Use
### Each framework/platform has its files in its own branch so checkout the branch for your platform.
### Libraries are written in a highly modular form and are designed to be quickly incorporated in any existing codebase within seconds. Simply copy (clone, download etc) the code to your files and interact with their interface.
### Most of the libraries are written in Object-Oriented forms, so you might need to understand (at least) OOP and objects instantiation to use some of them.
### Some quick examples
#### CodeIgniter (serverside file upload handling)
``` $file = 'profile_photo'; ```

``` $config = array('upload_path' => './uploads/profile_pictures/', 'allowed_types' => 'jpg|png|jpeg'); ```

``` $this->load->model->Uploadr; ```

``` $status = $this->Uploadr->single_file_upload($filename, $config) ```

``` print_r($status); ```

#### Vue.js
``` const Uploadr = new Uploadr(); ```

``` Uploadr.do_upload(file, success_callback, error_callback); ```

### Extensive documentation for the platform is provided in each branch 

#### Cheers!
``` Ozuru, Icheka Fortune ```
