<?php
/**
 * Created by PhpStorm.
 * User: Stéphane
 * Date: 15-12-17
 * Time: 13:59
 */

class FileInterface {

	private $filePath = null;
	private $handle;

	public function setResource($file) {
		$this->filePath = $file;
	}

	public function setExistingResource($file) {
		if(file_exists($file)) {
			$this->filePath = $file;
		}
	}

	private function closeFileHandle() {
		if ($this->handle != null) {
			fclose($this->handle);
		}
	}

	public function openInWriteMode() {
		$this->closeFileHandle();
		$this->handle = fopen($this->filePath, 'w');
	}

	public function openInReadMode() {
		if ($this->filePath != null) {
			$this->closeFileHandle();
			$this->handle = fopen($this->filePath, 'r');
		}
	}

	public function getResource() {
		return $this->filePath;
	}

	public function getData() {
		$this->openInReadMode();
		if ($this->handle != null) {
			$content = fread($this->handle, filesize($this->filePath));
			$this->closeFileHandle();
			return $content;
		}
		return null;
	}

	public function updateData() {
		// TODO: Implement updateData() method.
	}

	public function deleteData() {
		// TODO: Implement deleteData() method.
	}

	public function insertData($arg) {
		$result = fwrite($this->handle, $arg);
		$this->closeFileHandle();
		return $result;
	}
}