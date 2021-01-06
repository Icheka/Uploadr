/**
* Author: Ozuru, Icheka Fortune
* Uploadr JavaScript Library
* Version 1.0.0
* Dependencies: axios
* https://github.com/icheka/Uploadr
*/

class Uploadr {
	constructor() {
		this.data = null;
		this.errors = null;
	}

	single_upload(file, url, logs=true) {
		const uploadr_ = serialize(file);
		axios.post(url, uploadr_)
			.then(res => {
				if (logs == true) console.log(`File Upload Success! Your file was uploaded succesfully! :>>`, res);
				this.data = res;
			})
			.catch(err => {
				if (logs == true) console.log(`Uploadr Error: There was an error sending your file :>>`, err);
				this.errors = err.response;
			});
	
	serialize(file) {
		const X = new FormData();
		X.append('uploadr_file', file);
		return X;
	}
	
}

/*
Visit https://github.com/Icheka/Uploadr for Uploadr's full serverside and clientside library documentation

const url = 'https://my-special-server-address/dir1/sub-dir1/change-profile-image.asp';
const uploadr = new Uploadr();
uploadr.single_upload(file_object, url, logs=true);
// setting the third parameter to true will output logs in your console that can provide more information about the network requests Uploadr is making. 
// setting this to false is recommended for production software.

// test whether the upload was successful...
if (uploadr.errors == null) {
	// the upload was successful
	console.log("My Uploadr file upload was successful :>>", uploadr.data.data);
	// see the docs for a complete list of parameters that you can access about your upload request
} else {
	// an error occurred. Find out what it is.
	console.log("An error occurred with my file upload :>>", uploadr.errors.data);
	// see the docs for a complete list of parameters that you can access about your upload request
}

*/
