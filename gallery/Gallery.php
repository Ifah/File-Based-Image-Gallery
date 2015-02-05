<?php
class Gallery{
	public $path;

	public function __construct(){
		$this->path = __DIR__ . '\images';
	}

	public function setPath($path){

		if(substr($path, -1) === '/'){
			$path = substr($path, 0, -1);
		}

		$this->path = $path;
	}

	private function getDirectory($path){
		return scandir($path);
	}

	public function getImages($extensions = array('jpg', 'png')){
		$images = $this->getDirectory($this->path);

		foreach($images as $index => $image){
			// $extension = strtolower(end(explode('.', $image)));

			$extension = explode('.', $image);
			$extension = end($extension);
			$extension = strtolower($extension);
			
			if(!in_array($extension, $extensions)){
				unset($images[$index]);
			}else{
				$images[$index] = array(
					'full' => $this->path . '/' . $image,
					'thumb' => $this->path . '/thumbs/' . $image
					);
			}
		}
		return (count($images)) ? $images : false;
	}
}
?>