<?php
  $uploadSuccess = '';
  $blogFail = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      // Directory where uploaded files will be stored
      $targetDir = "uploads/news/";
      $targetDirThumb = "uploads/news/thumbnail/";

      if (isset($_FILES["upload-picture"]) && $_FILES["upload-picture"]["error"] == 0) {
          // Use the original file name
          $originalFileName = basename($_FILES["upload-picture"]["name"]);
          $targetFile = $targetDir . $originalFileName;

          // Check if the file already exists
          if (file_exists($targetFile)) {
              $blogFail = '<div class ="blogFail">Es existiert bereits ein Bild mit diesem Namen!</div>';
          } else {
              // Get the file type of the uploaded file
              $fileType = exif_imagetype($_FILES["upload-picture"]["tmp_name"]);

              // Check if the file type is JPEG (IMAGETYPE_JPEG)
              if ($fileType !== false && $fileType == IMAGETYPE_JPEG) {
                  // Attempt to move the uploaded file to the specified directory
                  if (move_uploaded_file($_FILES["upload-picture"]["tmp_name"], $targetFile)) {
                      // Create an image resource from the uploaded file
                      $sourceImage = imagecreatefromjpeg($targetFile);

                      // Define the thumbnail dimensions
                      $thumbnailWidth = 720;
                      $thumbnailHeight = 480;

                      // Create a new true color image for the thumbnail
                      $thumbnail = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);

                      // Resize and copy the uploaded image to the thumbnail image
                      imagecopyresized($thumbnail, $sourceImage, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, imagesx($sourceImage), imagesy($sourceImage));

                      // Thumbnail file name
                      $thumbnailFileName = $targetDirThumb . 'thumbnail_' . $originalFileName;

                      // Save the thumbnail as a new file
                      imagejpeg($thumbnail, $thumbnailFileName);

                      // Free up memory
                      imagedestroy($sourceImage);
                      imagedestroy($thumbnail);

                      // Process other form data (blog content)
                      $blogContent = $_POST["blogContent"];
                      $uploadDate = date('Y-m-d H:i:s'); // Current date and time

                      // Thumbnail file path
                      $picturePath = $thumbnailFileName;

                      // Original uploaded file name
                      $pictureName = 'thumbnail_' . $originalFileName;

                      // SQL query to insert blog post
                      $sql = "INSERT INTO blogposts (content, upload_date, picturepath, picturename) VALUES (?, ?, ?, ?)";

                      // Prepare and bind
                      $stmt = $conn->prepare($sql);
                      $stmt->bind_param("ssss", $blogContent, $uploadDate, $picturePath, $pictureName);

                      // Execute the query
                      if ($stmt->execute()) {
                          $uploadSuccess = "<div id='uploadSuccess'>The file " . $originalFileName . " wurde hochgeladen und ein neuer Blogbeitrag erstellt.</div><br>";
                      } else {
                          echo "Error: " . $stmt->error;
                      }
                      
                      // Close statement
                      $stmt->close();
                  } else {
                      $blogFail = '<div class ="blogFail">Ein Fehler ist während dem Hochladen aufgetreten!</div>';
                  }
              } else {
                  $blogFail = '<div class ="blogFail">Das Bildformat muss JPEG sein!</div>';
              }
          }
      }
  }
?>


<!-- Form for creating a new blogpost (text + thumbnail) -->
<div id="upload-form">
  <form enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label class="upload-label" for="blogContent">Neuen News-Beitrag Erstellen</label><br><br>
    <textarea required id="blogContent" name="blogContent" rows="10" cols="100" placeholder="Enter your blog content here..."></textarea><br><br>
    <div class="container">
      <div class="row mx-0 justify-content-center">
          <div class="w-100 rounded-1 p-4 border text-secondary border-secondary" style="background-color: rgba(128, 128, 128, 0.285);">
            <label for="upload-picture" class="form-label d-block text-dark mb-3">Thumbnail Upload</label>
            <div class="input-group mb-3">
              <input required name="upload-picture"  id="upload-picture" type="file" class="form-control border-secondary bg-transparent text-light" />
              <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-primary rounded-0 rounded-end px-3" id="upload-button">
                  Erstellen
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>
</div>

<?php
    echo $blogFail;
    echo $uploadSuccess;
?>
<br><br>
