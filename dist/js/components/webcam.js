Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90

  });

 

function setup() {
	Webcam.reset();
	Webcam.attach( '#my_camera' );
}

function take_snapshot() {
	// take snapshot and get image data
	
	Webcam.snap( function(data_uri) {
		// display results in page
		$savePHP = '../csdcapp/functions/saveimage.php' + '?cs_no=' + document.getElementById('cs_no').value;
			
		Webcam.upload( data_uri, $savePHP, function(code, text) {
			document.getElementById('results').innerHTML = 
			'<img src="'+data_uri+'" class="img-fluid" />';
		} );	
	} );
}