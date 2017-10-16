(function($){

	// Get Uploads Playlist
	$.get(
	   "https://www.googleapis.com/youtube/v3/channels",{
	   part : 'contentDetails', 
	   forUsername : '7plus8Studios',
	   key: 'AIzaSyBdmwdOAhGwmLaNktf6_qP1vOqzlheJw1g'},
	   function(data) {
	      $.each( data.items, function( i, item ) {
	          pid = item.contentDetails.relatedPlaylists.uploads;
	          console.log(data);
	          getVideos(pid);
	      });
	  }
	);

	//Get Videos
	function getVideos(pid){
	    $.get(
	        "https://www.googleapis.com/youtube/v3/playlistItems",{
	        part : 'snippet', 
	        maxResults : 18,
	        playlistId : pid,
	        key: 'AIzaSyBdmwdOAhGwmLaNktf6_qP1vOqzlheJw1g'},
	        function(data) {
	            var results;
	            $.each( data.items, function( i, item ) {
	                results = `<div class="col-md-6">
								<a class="video-wrapper">
									<h4 class="display-8">` + item.snippet.title + `Title</h4>
									<iframe src="//www.youtube.com/embed/` + item.snippet.resourceId.videoId + `">
										
									</iframe>
									<p class="text-muted small mt-2">
										` + item.snippet.description + `
									</p>
								</a>
							</div>`;

	                $('#video_results').append(results);
	            });
	        }
	    );
	}

	$('#video_thumb').on('click', function(e){
		e.preventDefault();

		$('#player').addClass('open');
	});

}(jQuery));