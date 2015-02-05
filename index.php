<?php
require 'gallery/Gallery.php';

$gallery = new Gallery();
$gallery->setPath('gallery/images');
$images = $gallery->getImages(array('jpg'));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Gallery</title>
	<link rel="stylesheet" href="css/gallery.css">
</head>
<body>
	<div class="container">
		<?php if($images): ?>
		<div class="gallery cf">
			<?php foreach($images as $image): ?>
				<div class="gallery-item">
					<a href="<?php echo $image['full']; ?>"><img src="<?php echo $image['thumb']; ?>"></a>
				</div>
			<?php endforeach; ?>
		</div>
		<?php else: ?>
			There are no images.
		<?php endif; ?>
	</div>
</body>
</html>