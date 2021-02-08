<?php

class PostsController extends AppController{

	public $helpers = array('Html','Form','Flash');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Security->csrfCheck = false;
	}

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
			if( $post->save($this->request->data,false) ){
				$this->Flash->success( __('Your post was submitted successfully') );
				return $this->redirect(array('action'=>'index'));
			}else{
				var_dump($this->Post->getDataSource()->showLog());

				$this->Flash->error(__('Unable to add your post'));
			}

			/*$isHuman = captcha_validate($this->request->data['Post']['CaptchaCode']);

			// clear previous user input, since each Captcha code can only be validated once
			unset($this->request->data['Post']['CaptchaCode']);

			if ($isHuman) {
				$post = $this->Post;
				$post->create();
				if( $post->save( $this->request->data['Post'] ) ){
					$this->Flash->success( __('Your post was submitted successfully') );
					return $this->redirect(array('action'=>'index'));
				}else{
					die;
					$this->Flash->error(__('Unable to add your post'));
				}
			}else{
				$this->Flash->error(__('Captcha Verification Failed'));
			}*/

		}
	}

	public function edit($id = null){

		if( ! $id ){
			throw new NotFoundException(__("Invalid Post"));
		}
		$post = $this->Post->findById($id);
		if( ! $post ){
			throw new NotFoundException(__("Invalid Post"));
		}

		if( $this->request->is('put') ){
			$this->Post->id = $id;
			if( $this->Post->save($this->request->data) ){
				$this->Flash->success(__("Post Edited Successfully"));
				return $this->redirect( array( 'action' => 'view', $id) );
			}
			$this->Flash->error(__('Unable ot update the post'));
		}
		if( ! $this->request->data ){
			$this->request->data = $post;
			$this->set('post',$post['Post']);
		}
	}

	public function delete($id = null){

		if( $this->request->is('get') ){
			throw new MethodNotAllowedException(__("Method Not Allowed"));
		}
		if( ! $this->Post->delete($id) ){
			$this->Flash->error(__('Unable to delete the post'));
		}
		$this->Flash->success(__('Post Deleted Successfully'));
		return $this->redirect(array('action' => 'index'));
	}


}
