<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Flatpage extends Controller {

	public function action_index($identifier)
	{
		$file_path = Kohana::Config('flatpages.path_prefix') . $identifier;

		$this->request->response = View::factory()->render($file_path);
	}

}

