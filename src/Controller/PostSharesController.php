<?php

namespace App\Controller;

use Cake\Routing\Router;
use App\Controller\AppController;
// for facebook sdk
session_start ();
// added in v4.0.0

require_once ("autoload.php");
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

/**
 * PostShares Controller
 *
 * @property \App\Model\Table\PostSharesTable $PostShares
 */
class PostSharesController extends AppController {
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$postShares = $this->paginate ( $this->PostShares );
		
		$this->set ( compact ( 'postShares' ) );
		$this->set ( '_serialize', [ 
				'postShares' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Post Share id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$postShare = $this->PostShares->get ( $id, [ 
				'contain' => [ ] 
		] );
		
		$this->set ( 'postShare', $postShare );
		$this->set ( '_serialize', [ 
				'postShare' 
		] );
	}
	public function share($id = null) {
		$postShare = $this->PostShares->get ( $id, [ 
				'contain' => [ ] 
		] );
		$root = Router::url ( '/', true );
		$link = $root . 'media/' . $id;
		
		 
		$postShare['media_link'] = $link;
		$postShare['main_link'] = $root;
		
		$this->set ( 'postShare', $postShare );
		$this->set ( '_serialize', [ 
				'postShare' 
		] );
		/*
		if ($this->request->is ( 'post' ) && (! empty ( $_POST ['group'] ))) {
			foreach ( $_POST ['group'] as $check ) {
				// echo $check; // echoes the value set in the HTML form for each checked checkbox.
				// so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
				// in your case, it would echo whatever $row['Report ID'] is equivalent to.
				$pieces = explode ( " - ", $check );
				$pageId = $pieces [0];
				$accessToken = $pieces [1];
				$this->postToFaceBook ( $id, $postShare, null, null, $accessToken, $pageId );
			}
		}
		*/
	}
	public function test() {
		$this->autoRender = false;
		$link = Router::url ( '/', true ); // +'media/'+2;
		$a = $link . 'media/' . '2';
		echo $a;
	}
	public function media($id = null) {
		$this->viewBuilder ()->layout ( false );
		
		$postShare = $this->PostShares->get ( $id, [ 
				'contain' => [ ] 
		] );

		$this->set ( 'postShare', $postShare );
		$this->set ( '_serialize', [ 
				'postShare' 
		] );
		
		if ($this->isMobile ()) {
			/*
			 * $this->redirect(array("controller" => "post-shares",
			 * "action" => "myAction",
			 * $data_can_be_passed_here),
			 * $status, $exit);
			 */
			// $this->redirect ( $postShare ['target_link'] );
		} else {
			// $this->redirect($postShare ['link']);
		}
		// $this->autoRender = false;
		// $this->response->type ( 'html' );
		// $json = json_encode ( $object );
		
		// echo 'asdsasad';
		// $this->response->body ( $html);
	}
	public function isMobile() {
		$useragent = $_SERVER ['HTTP_USER_AGENT'];
		if (preg_match ( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent ) || preg_match ( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr ( $useragent, 0, 4 ) )) {
			return true;
		} else {
			return false;
		}
	}
	public function postToFaceBook($id = null, $postShare = null, $api_key = null, $api_secret = null, $accessToken = null, $page_id = null) {
		// Product information
		$name = $postShare ['title'];
		$root = Router::url ( '/', true );
		$link = $root . 'media/' . $id; // 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSa2SEqXUS5_0tDOcOMXyvZiObysrmdHrueObELaPSS949AoJwERrsy1GY';
		$picture = $postShare ['photo_url']; // 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSa2SEqXUS5_0tDOcOMXyvZiObysrmdHrueObELaPSS949AoJwERrsy1GY';
		$caption = $postShare ['fake_view']; // '< Webstore Slogan > ';
		$message = $postShare ['title']; // '< Product Short Description or anything >';
		/*
		 * FacebookSession::setDefaultApplication ( $api_key, $api_secret );
		 * $session = new FacebookSession ( $accessToken );
		 * // Auto posting
		 * $page_post = (new FacebookRequest ( $session, 'POST', '/' . $page_id . '/feed', array (
		 * 'access_token' => $accessToken,
		 * 'name' => $name,
		 * 'link' => $link,
		 * 'picture' => $picture,
		 * 'caption' => $caption,
		 * 'message' => $message
		 * ) ))->execute ()->getGraphObject ()->asArray ();
		 */
		
		$url = "https://graph.facebook.com/v2.5/".$page_id."/feed";
		$data = array (
				'access_token' => $accessToken,
				'link' => $link,
				'picture' => $picture,
				'caption' => $caption,
				'message' => $message
		);
		/*
		$options = array (
				'http' => array (
						'header' => "Content-type: application/x-www-form-urlencoded\r\n",
						'method' => 'POST',
						'content' => http_build_query ( $data ) 
				) 
		);
		
		$context = stream_context_create ( $options );
		$result = file_get_contents ( $url, false, $context );
		var_dump ( $result );
		*/
		//extract data from the post
		//set POST variables
		/*
		$url = "https://graph.facebook.com/v2.5/".$page_id."/feed";
		$fields = array(
				'access_token' => $accessToken,
				'link' => $link,
				'picture' => $picture,
				'caption' => $caption,
				'message' => $message
		);
		
		//url-ify the data for the POST
		$fields_string ="";
		foreach($fields as $key=>$value) { $fields_string =$fields_string.$key.'='.$value.'&'; }
		rtrim($fields_string, '&');
		
		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		
		//execute post
		$result = curl_exec($ch);
		$this->Flash->success ( $result );
		
		//close connection
		curl_close($ch);
		'access_token' => $accessToken,
				'link' => $link,
				'picture' => $picture,
				'caption' => $caption,
				'message' => $message
		*/
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS,
		//		"access_token=".$accessToken."&link=".$link."&picture=".$picture."&caption=".$caption."&message=".$message);
		
		// in real life you should use something like:
		curl_setopt($ch, CURLOPT_POSTFIELDS,
		          http_build_query($data));
		
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$server_output = curl_exec ($ch);
		$this->Flash->success ( $server_output );
		curl_close ($ch);
	}
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$postShare = $this->PostShares->newEntity ();
		if ($this->request->is ( 'post' )) {
			
			$postShare = $this->PostShares->patchEntity ( $postShare, $this->request->data );
			if ((! isset ( $postShare ['fake_view'] )) || strlen ( $postShare ['fake_view'] ) == 0) {
				$postShare ['fake_view'] = "    ";
			}
			if ((! isset ( $postShare ['photo_url'] )) || strlen ( $postShare ['photo_url'] ) == 0) {
				$yId;
				if (strpos ( $postShare ['link'], "https://www.youtube.com/watch?v=" ) !== false) {
					$yId = str_replace ( "https://www.youtube.com/watch?v=", "", $postShare ['link'] );
				} else {
					$yId = str_replace ( "https://www.youtube.com/v/", "", $postShare ['link'] );
				}
				$postShare ['link'] = "https://www.youtube.com/v/" . $yId;
				$postShare ['photo_url'] = "http://img.youtube.com/vi/" . $yId . "/0.jpg";
			}
			
			if ($this->PostShares->save ( $postShare )) {
				$this->Flash->success ( __ ( 'The post share has been saved.' ) );
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The post share could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'postShare' ) );
		$this->set ( '_serialize', [ 
				'postShare' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Post Share id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$postShare = $this->PostShares->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$postShare = $this->PostShares->patchEntity ( $postShare, $this->request->data );
			if ($this->PostShares->save ( $postShare )) {
				$this->Flash->success ( __ ( 'The post share has been saved.' ) );
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The post share could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'postShare' ) );
		$this->set ( '_serialize', [ 
				'postShare' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Post Share id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$postShare = $this->PostShares->get ( $id );
		if ($this->PostShares->delete ( $postShare )) {
			$this->Flash->success ( __ ( 'The post share has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The post share could not be deleted. Please, try again.' ) );
		}
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	public function success(){
		$this->Flash->success ( __ ( 'Bạn đã bắn bài thành công.' ) );
		
	}
	public function failed(){
		$this->Flash->error ( __ ( 'Bạn đã bắn bài thành công.' ) );
	
	}
	public function isAuthorized($user)
	{
		$action = $this->request->params['action'];
	
		// The add and index actions are always allowed.
		if (in_array($action, ['media'])) {
			return true;
		}
		if (!empty($user)){
			return true;
		}
		

		/*
		// Check that the bookmark belongs to the current user.
		$id = $this->request->params['pass'][0];
		$bookmark = $this->Bookmarks->get($id);
		if ($bookmark->user_id == $user['id']) {
			return true;
		}
		*/
		return parent::isAuthorized($user);
	}
}
