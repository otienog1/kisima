<?php

/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
  throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}

require_once __DIR__ . '/vendor/autoload.php';
@session_start();

/*
 * You can acquire an OAuth 2.0 client ID and client secret from the
 * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
 * For more information about using OAuth 2.0 to access Google APIs, please see:
 * <https://developers.google.com/youtube/v3/guides/authentication>
 * Please ensure that you have enabled the YouTube Data API for your project.
 */
$OAUTH2_CLIENT_ID = '1032596817046-bh37gd58kvu8ttba3gse031pi2nvko5t.apps.googleusercontent.com';
$OAUTH2_CLIENT_SECRET = 'eWDVjjNXqf-9EawDEXcVb44b';

$client = new Google_Client();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);
$client->setScopes('https://www.googleapis.com/auth/youtube');
$client->setHttpClient(new \GuzzleHttp\Client(array(
        'verify' => __DIR__ . '/cert/cacert.pem',
    )));
// $redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'],
$redirect = filter_var('http://kisima.app/wp-admin/admin.php?page=kisima-video-upload',
    FILTER_SANITIZE_URL);
$client->setRedirectUri($redirect);

// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);

// Check if an auth token exists for the required scopes
$tokenSessionKey = 'token-' . $client->prepareScopes();
if (isset($_GET['code'])) {
  if (strval($_SESSION['state']) !== strval($_GET['state'])) {
    die('The session state did not match.');
  }

  $client->authenticate($_GET['code']);
  $_SESSION[$tokenSessionKey] = $client->getAccessToken();
  header('Location: ' . $redirect);
}

if (isset($_SESSION[$tokenSessionKey])) {
  $client->setAccessToken($_SESSION[$tokenSessionKey]);
}

$disabled = 'disabled';
// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {
  $htmlBody = '';
  $disabled = '';
  $title = '';
  $description = '';
  $location = '';

  if (isset($_REQUEST['upload'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $file = $_FILES['file'];

    if( $file['name'] != '' ){
      $size = $file['size'];
      $name = basename($file['name']);

      $target_dir = __DIR__ . '/';

      $destination  = $target_dir . $name;

      if ( move_uploaded_file( $file['tmp_name'], $destination ) ){
        
        $location = $destination;


      }else{
        echo "Unknown Error while uploading the video. Please Try again";
        exit();
      }

    }
  }

  try{
    // REPLACE this value with the path to the file you are uploading.
    $videoPath = $location;

    // Create a snippet with title, description, tags and category ID
    // Create an asset resource and set its snippet metadata and type.
    // This example sets the video's title, description, keyword tags, and
    // video category.
    $snippet = new Google_Service_YouTube_VideoSnippet();
    $snippet->setTitle($title);
    $snippet->setDescription($description);
    $snippet->setTags('');

    // Numeric video category. See
    // https://developers.google.com/youtube/v3/docs/videoCategories/list
    // $snippet->setCategoryId("22");

    // Set the video's status to "public". Valid statuses are "public",
    // "private" and "unlisted".
    $status = new Google_Service_YouTube_VideoStatus();
    $status->privacyStatus = "public";

    // Associate the snippet and status objects with a new video resource.
    $video = new Google_Service_YouTube_Video();
    $video->setSnippet($snippet);
    $video->setStatus($status);

    // Specify the size of each chunk of data, in bytes. Set a higher value for
    // reliable connection as fewer chunks lead to faster uploads. Set a lower
    // value for better recovery on less reliable connections.
    $chunkSizeBytes = 1 * 1024 * 1024;

    // Setting the defer flag to true tells the client to return a request which can be called
    // with ->execute(); instead of making the API call immediately.
    $client->setDefer(true);

    // Create a request for the API's videos.insert method to create and upload the video.
    $insertRequest = $youtube->videos->insert("status,snippet", $video);

    // Create a MediaFileUpload object for resumable uploads.
    $media = new Google_Http_MediaFileUpload(
        $client,
        $insertRequest,
        'video/*',
        null,
        true,
        $chunkSizeBytes
    );
    $media->setFileSize(filesize($videoPath));


    // Read the media file and upload it chunk by chunk.
    $status = false;
    $handle = fopen($videoPath, "rb");
    while (!$status && !feof($handle)) {
      $chunk = fread($handle, $chunkSizeBytes);
      $status = $media->nextChunk($chunk);
    }

    fclose($handle);

    // If you want to make other calls after the file upload, set setDefer back to false
    $client->setDefer(false);


    $htmlBody .= "<h3>Video Uploaded</h3><ul>";
    $htmlBody .= sprintf('<li>%s (%s)</li>',
        $status['snippet']['title'],
        $status['id']);

    $htmlBody .= '</ul>';

  } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
  }

  $_SESSION[$tokenSessionKey] = $client->getAccessToken();
} elseif ($OAUTH2_CLIENT_ID == 'REPLACE_ME') {
  $htmlBody = <<<END
  <h3>Client Credentials Required</h3>
  <p>
    You need to set <code>\$OAUTH2_CLIENT_ID</code> and
    <code>\$OAUTH2_CLIENT_ID</code> before proceeding.
  <p>
END;
} else {
  // If the user hasn't authorized the app, initiate the OAuth flow
  $state = mt_rand();
  $client->setState($state);
  $_SESSION['state'] = $state;

  $authUrl = $client->createAuthUrl();
  $htmlBody = <<<END
  <h3>Authorization Required</h3>
  <p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
}
?>

<style>
  .no-resize{
    resize: none;
  }
</style>

<h2>Video Upload</h2>
<div>
  <?php echo $htmlBody ?>
  <form action="" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td><label for="title">Title</label></td>
        <td><input type="text" name="title" id="title" class="regular-text" disabled="<?php echo $disabled ?>"></td>
      </tr>
      <tr>
        <td><label for="description">Description</label></td>
        <td><textarea name="description" id="description" rows="3" class="regular-text no-resize" disabled="<?php echo $disabled ?>"></textarea></td>
      </tr>
      <!-- <tr>
        <td><label for="tags">Tags</label></td>
        <td><input type="text" name="tags" id="tags" class="regular-text"></td>
      </tr> -->
      <tr>
        <td><label for="file"></label></td>
        <td>
          <input type="file" name="file" id="file" value="Upload" class="hidden">
          <button id="_choose" class="button button-secondary">Choose a File</button>
          <span id="file_name"></span>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><br></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="Submit" name="upload" id="upload_btn" value="Upload" class="button button-primary" disabled="<?php echo $disabled ?>"></td>
      </tr>
    </table>
  </form>
</div>

<script>
  (function($){
    $('#_choose').on('click', function(e){
      e.preventDefault();
      $('#file').click();
    });

    var input = $('#file');

    input.on('change', function(){
      var name = input[0].files[0].name;
      $('#file_name').html(name)
    });
  }(jQuery));
</script>