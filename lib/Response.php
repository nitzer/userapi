<?php

class Response {
	static function handle($data) {
		echo json_encode($data);
	}
}