<?php

class Video_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_choice($code) {
		$query = $this->db->query("SELECT title, id FROM choice WHERE choice.code = '" . $code . "'");
		$result = $query->result();
		$title = $result[0]->title;
		$id = $result[0]->id;
		$query = $this->db->query("SELECT title as verb, video_url FROM videos WHERE first = 0 AND choice = " . $id);
		$queryFirst = $this->db->query("SELECT title as verb, video_url FROM videos WHERE first = 1 AND choice = " . $id);
		return array(
				'title' => $title,
				'intro' => $queryFirst->row_array(),
				'videos' => $query->result(), 
		
				);
	}
	
	public function get_choices() {
		$query = $this->db->query("SELECT title, id, code FROM choice");
		return $query->result();
	}
	
	public function remove_video() {
		$id = $this->input->post('id');
		$query = $this->db->query("DELETE FROM videos WHERE id = '".$id."'");

	}

	public function remove_choice() {
		$id = $this->input->post('id');
		$query = $this->db->query("DELETE FROM choice WHERE id = '".$id."'");
		$query = $this->db->query("DELETE FROM videos WHERE choice = ".$id);

	}
	
	public function add_video() {
		$data = array(
						'title' => $this->input->post('title'),
						'video_url' => $this->input->post('vurl'),
						'choice' => $this->input->post('cid'),
						);
		$this->db->insert('videos', $data);
	}
	
	
	public function update_video() {
		$title = $this->input->post('title');
		$url = $this->input->post('vurl');
		$id = $this->input->post('id');
		$query = $this->db->query("UPDATE videos SET title = '".$title."', video_url = '".$url."' WHERE id = ".$id);
	}
	
	public function get_first() {
		$query = $this->db->query("SELECT videos.title as verb, video_url, choice.title AS headline FROM videos LEFT JOIN choice ON choice.id = videos.choice WHERE first = 1 ");
		return $query->row_array();
	}
	public function make_first() {
		$this->db->query("UPDATE videos SET first = 0");
		$id = $this->input->post('id');
		$this->db->query("UPDATE videos SET first = 1 WHERE id = ".$id);
	}
	public function get_videos() {
		$query = $this->db->query("SELECT id, title, code FROM choice");
		$groups = $query->result();
		$videos = array();
		if ($groups) {
			$choice_group = array();
			
			foreach ($groups as $group) {
				$group_title = $group->title;
				$query = $this->db->query("SELECT * FROM videos WHERE choice = " . $group->id);
				$result = $query->result();
				foreach ($result as $video) {
					$videos[] = array(
							'id' => $video->id,
							'verb' => $video->title,
							'url' => $video->video_url,
							'first' => $video->first
						);	
				}
				$choice_group[] = array(
									'id' => $group->id,
									'title' => $group->title,
									'code' => $group->code,
									'choices' => $videos
									);
							
				unset($videos);

			}
			return $choice_group;
		}
		
		else {
			return false;
		}
	}

	
	public function create_choice() {
		$title = $this->input->post('title');
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
    	for ($i = 0; $i < 10; $i++) {
        	$randomString .= $characters[rand(0, strlen($characters) - 1)];
    	}

		$data = array(
				'title' => $title,
				'code' => $randomString
				);
		
		$this->db->insert('choice', $data);
		return $this->db->insert_id();	
	}
	
	public function add_videos($id) {
		$urls = $this->input->post('video_url');
		$verbs = $this->input->post('verb');
		$i = 0;
		foreach ($urls as $url) {
			$data = array(
						'title' => $verbs[$i],
						'video_url' => $url,
						'choice' => $id
						);
			$this->db->insert('videos', $data);
			$i++;
		}

	}
/*	
	public function remove_file($id) {
		$fileQuery = $this->db->query("SELECT file FROM posts WHERE id = ".$id);
		$result = $fileQuery->row_array();
		$file = $result['file'];
		$this->db->query("UPDATE posts SET file = NULL WHERE id = ".$id);
		if (file_exists('./uploads/'.$file)) {
    		unlink('./uploads/'.$file) or die('failed deleting file');
  		}
	}

	public function get_post($id) {
		$query = $this->db->query("SELECT * FROM posts WHERE id = '".$id."'");
		return $query->row_array();
	}
	

	public function submit() {
		$headline = $this->input->post('headline');
		$body = $this->input->post('body');
		$frontpage = $this->input->post('frontpage');
		$upload_data = $this->upload->data();
		if ($upload_data) {
			$data = array(
				'headline' => $headline,
				'body' => $body,
				'created' => time(),
				'frontpage' => $frontpage,			
				'file' => $upload_data['file_name'],				
				);

		}
		else {
		
			$data = array(
				'headline' => $headline,
				'body' => $body,
				'created' => time(),
				'frontpage' => $frontpage,			
				);
		}
		$this->db->insert('posts', $data);
		
		//fire off any notices here
		
		return $this->db->insert_id();

	}
*/		
}