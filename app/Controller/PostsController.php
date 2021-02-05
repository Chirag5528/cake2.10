<?php
class PostsController extends AppController{

	public $components = array('Flash');
	public $helpers = array('Html','Form','Flash');

	public function index(){
		$this->set('posts',$this->Post->find('all'));
	}

	public function view( $id = null ){
		if( !$id ){
			throw new NotFoundException('Invalid Post');
		}
		$post = $this->Post->findById($id);
		if( ! $post ){
			throw new NotFoundException('Invalid Post');
		}

		return $this->set('post',$post);
	}

	/**
	 * For adding a new POST resource
	 * /posts/add
	 * */

	public function add(){

		if( $this->request->is('post') ){
			$post = $this->Post;
			$post->create();
			if( $post->save( $this->request->data ) ){
				$this->Flash->success( __('Your post was submitted successfully') );
				return $this->redirect(array('action'=>'index'));
			}
			$this->Flash->error(__('Unable to add your post'));
		}
	}


}
