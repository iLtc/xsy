<?php
class UcAction extends Action {
	function __construct(){
		parent::__construct();

		$this->client_id = 14;
		$this->client_secret = '2HQfOn7iRiFOhMJ4sfIv7x8A1XmIH387';
		$this->redirect_uri = 'http://'.$_SERVER['SERVER_NAME'].__APP__.'?m=Uc&a=callback';
	}

	public function login(){
		$state = md5(rand(1000000, 9999999));
		session('OAuthState', $state);

		$query = array(
			'client_id' => $this->client_id,
			'response_type' => 'code',
			'state' => $state,
			'redirect_uri' => $this->redirect_uri
		);

		$url = 'http://hometown.scau.edu.cn/open/OAuth/authorize'.'?'.http_build_query($query);

		redirect($url);
	}

	public function callback(){
		if(I('error')){
			echo '登录失败! <a href="'.__APP__.'?m=Uc&a=login">重试</a>';

		}else {
			$state = I('state');
			if ($state != session('OAuthState')) {
				echo '非法请求! <a href="'.__APP__.'?m=Uc&a=login">重试</a>';
				session('OAuthState', null);

			}else{
				session('OAuthState', null);

				$query = array(
					'client_id' => $this->client_id,
					'client_secret' => $this->client_secret,
					'grant_type' => 'authorization_code',
					'code' => I('code'),
					'redirect_uri' => $this->redirect_uri
				);

				$ret = $this->_post('http://hometown.scau.edu.cn/open/OAuth/access_token', http_build_query($query));
				$retArray = json_decode($ret, true);

				$url = 'http://hometown.scau.edu.cn/bbs/plugin.php?id=iltc_open:userinfo&uid='.$retArray['uid'];
				$ret = file_get_contents($url);

				$retArray1 = json_decode($ret, true);

				$username = $retArray1['data']['username'];
				$uid = $retArray['uid'];

				if(empty($username) || empty($uid)) {
					echo '无法获取用户信息! <a href="'.__APP__.'?m=Uc&a=login">重试</a>';
				}else {
					cookie('Xsy_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
					$this->redirect('Index/index');
				}

			}
		}
	}

	public function logout(){
		cookie('Xsy_auth', null);
		$this->redirect('Index/index');
	}

	private function _post($url, $post){
		$ch = curl_init();//初始化curl

		curl_setopt($ch,CURLOPT_URL, $url);//抓取指定网页
		curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//关闭SSL验证
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//POST数据
		$data = curl_exec($ch);//运行curl
		curl_close($ch);

		return $data;
	}
}