<?php
class PublicAction extends Action {
Public function verify(){
	//加载验证码
    import('ORG.Util.Image');
    Image::buildImageVerify(4,1);
}
}